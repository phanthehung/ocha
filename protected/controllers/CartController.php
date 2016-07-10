<?php 

class CartController extends Controller
{

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}


	public function accessRules()
	{
		return array(
			array('allow',  // allow all users
				'users'=>array('*'),
			),
		);
	}

	public function actionView()
	{
		$session = Yii::app()->session;
    	$session->open();
    	$cart = $session['cart'];
    	$session->close();
    	$this->render('view',array('cart'=>$cart));
	}

	public function actionUpdate()
	{
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
			$value = $_POST['value'];
			if (!is_numeric($value) ) {
				return;
			}		
			if ($value > -1 && is_int($value*1)) {
				$session = Yii::app()->session;
				$session->open();
				if (isset($session['cart'])) {
					$cart = $session['cart'];				
					$cart["i".$id]->quantity = $value;								
				}
				echo '{"succed":"true"}';
				$session->close();
			}			
		}		
	}

	public function actionDelete($id)
	{
		$this->redirect(Yii::app()->baseUrl."/site/signup");
	}


	public function actionIndex()
	{
		$session = Yii::app()->session;
    	$session->open();
    	$cart = $session['cart'];
    	$session->close();
    	$this->render('view',array('cart'=>$cart));
	}

	public function loadModel($id)
	{
		$model=OrderDetail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='order-detail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function actionAdd(){
        if ( isset( $_POST['id'] ) && Yii::app()->request->isAjaxRequest) {
        	$id = $_POST['id'];
        	$session = Yii::app()->session;
            $session->open();            
        	if (isset($session['cart'])){
            	$cart = $session['cart'];
            	if (isset($cart["i".$id])) {
            		$cart["i".$id]->quantity++;
            	}
            	else{
            		$product = Product::model()->findByPk($id);
			        $orderDetail = new OrderDetail;
			        $orderDetail->setProduct($product);
            		$cart["i".$id] = $orderDetail;
            		$session['cart'] = $cart;
            	}
            }
            else{
            	$product = Product::model()->findByPk($id);
			    $orderDetail = new OrderDetail;
		        $orderDetail->setProduct($product);
           		$cart = array("i".$id => $orderDetail);
           		$session['cart'] = $cart;            	
            }
        	$session->close();          

            echo '{"succed":"true"}';
        }
        else {
        	$this->redirect(Yii::app()->baseUrl."/site/index");
        }
    }

    public function actionCheckout($id=-1){
    	if ($id ==-1) {
    		$this->redirect('view');
    	}
    	else if($id == 0){
    		$session = Yii::app()->session;
	    	$session->open();
	    	$cart = $session['cart'];
	    	$session->close();
	    	$this->render('contact',array('cart'=>$cart));    		
    	}
    	else{
    		$total = 0;
    		$order = new Order;
    		$order->user = $_POST['user'];
    		$order->address = $_POST['address'];
    		$order->phone = $_POST['phone'];
    		$order->email = $_POST['email'];
    		$order->inserted = date('Y-m-d H:i:s');

// $phpdate = strtotime( $mysqldate );
// $mysqldate = date( 'Y-m-d H:i:s', $phpdate );
    		
    		if ($_POST['note'] == "") {
    			$order->note = "empty";
    		}
    		else{
    			$order->note = $_POST['note'];
    		}    		
    		if ($order->user == null || $order->phone == null) {
    			Yii::app()->user->setFlash('mss','<div class="alert-error">Vui lòng điền đầy đủ thông tin</div>');
    			$this->render('contact');
    			break;
    		}
    		$order->total = $total;
    		if ($order->save()) {
    			$session = Yii::app()->session;
    			$session->open();
    			if (isset($session['cart'])) {
    				$cart = $session['cart'];
    				foreach ($cart as $value) {
    					if ($value->quantity > 0) {
    						$itemTotal = $value->proPrice*$value->quantity;
   							$value->orId = $order->orderId;
	    					$value->inserted = date('Y-m-d H:i:s');
	    					$total += $itemTotal;
	    					$value->save();
    					}    					
    				}
    				$order->total = $total;
    				$order->update();
    			}
    			$session['cart'] = null;
    			$session->close();
    			Yii::app()->user->setFlash('mss','<div class="alert-succeed">Thanh toán thành công. Mời bạn tiếp tục mua sản phẩm </div>');
    			
    			$this->render('view');
    		}
    		else{print_r($order->getErrors());}
    	}
    }

    public function actionClear(){
    	$session = Yii::app()->session;
	    $session->open();
    	if (isset($session['cart'])) {
    		unset($session['cart']);
    	}
    	$session->close();
    	$this->redirect(array('cart/view'));
    }

}
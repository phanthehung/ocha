<?php 

class OrderController extends AController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
			// 'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(          
			array('deny',  // deny all users
				'users'=>array('*'),
			),
        );
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionDetail($id)
	{
		$model = $this->loadModel($id);
		$detail = new OrderDetail('search');
		$detail->orId = $id;
		$this->render('detail',array(
			'model'=>$model,'detail'=>$detail
		));
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Order']))
		{
			$model->attributes=$_POST['Order'];
			$model->updated = date('Y-m-d H:i:s');
			$model->updater = Yii::app()->user->getState('id',NULL);
			if($model->save()){
				Yii::app()->user->setFlash('mss','<div class="alert alert-success"><h4>Thành công!</h4>Cập nhập thành công.</div>');
				$this->redirect(array('detail','id'=>$model->orderId));
			}else{
				Yii::app()->user->setFlash('mss','<div class="alert alert-error"><h4>Error!</h4>Quá trình lưu bị lỗi. Xin vui lòng thử lại</div>');
				$this->render('update',array(
					'model'=>$model,
				));
			}
		}else{
			$this->render('update',array(
				'model'=>$model,
			));
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		$model->state = -1;
		$model->updated = date('Y-m-d H:i:s');
			$model->updater = Yii::app()->user->getState('id',NULL);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']) && $model->save()){
			Yii::app()->user->setFlash('mss','<div class="alert alert-success"><h4>Thành công!</h4>Hủy thành công.</div>');
		}
		else{
			Yii::app()->user->setFlash('mss','<div class="alert alert-error"><h4>Error!</h4>Quá trình lưu bị lỗi. Xin vui lòng thử lại</div>');
		}
		$this->redirect(Yii::app()->request->urlReferrer);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($id=0)
	{

		$this->pageTitle = "OCHA";
       	$this->breadcrumbs = array('Đơn hàng chưa giao'=>array('index'));
       	$model = new Order('search');
       	$model->unsetAttributes();
       	if(isset($_GET['Order'])){
       	    $model->attributes = $_GET['Order'];
       	}

       	if ($id == 1) {
       		$model->state = 1;
       	} else if($id == 2) {
       		$model->state = -1;
       	}else{
       		$model->state = 0;
       	}  	
       	$this->render('index',array('model' => $model));

		// $dataProvider=new CActiveDataProvider('Order');
		// $this->render('index',array(
		// 	'dataProvider'=>$dataProvider,
		// ));
	}

	public function actionDelivered($id){
		$model = $this->loadModel($id);
		$model->state = 1;
		$model->updated = date('Y-m-d H:i:s');
			$model->updater = Yii::app()->user->getState('id',NULL);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']) && $model->save()){
			Yii::app()->user->setFlash('mss','<div class="alert alert-success"><h4>Thành công!</h4>Cập nhập thành công.</div>');
		}else{
			Yii::app()->user->setFlash('mss','<div class="alert alert-error"><h4>Error!</h4>Quá trình lưu bị lỗi. Xin vui lòng thử lại</div>');
		}
		$this->redirect(Yii::app()->request->urlReferrer);
	}

	public function actionDeleteItem($order,$item){
		$model = OrderDetail::model()->findByPk($item);
		$decrease = $model->proPrice * $model->quantity;
		$model->delete();
		$order =$this->loadModel($order);
		if ($order->detail == null) {
			$order->delete();
			if(!isset($_GET['ajax'])){
				$this->redirect(Yii::app()->baseUrl."/admin/order");
			}
		}else{
			$order->total -= $decrease;
			$order->updated = date('Y-m-d H:i:s');
			$order->updater = Yii::app()->user->getState('id',NULL);
			if(!isset($_GET['ajax']) && $order->save()){
				$this->redirect(Yii::app()->request->urlReferrer);
			}
		}
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Order the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Order::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Order $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='order-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

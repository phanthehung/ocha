<?php
 
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
				),
			);
	}

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
             array('allow',
                'actions'=>array( ),
                'users'=>array('@'),
            ),
             array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','blog','error','product','detail','search'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
        );
	}




	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$criteria = new CDbCriteria;
		$model = new News;
		$criteria->order = 'inserted';	        
		$criteria->limit = 3;
		$models = $model->findAll($criteria);
		$this->render('index',array('blogs'=>$models));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
		$this->render('error', $error);
	}


	/**
	*	Display product list
	*/
	public function actionProduct($id=null)
	{
		if ($id==null) {
			$this->redirect(Yii::app()->request->urlReferrer);
		}
		else{
			if ($id == 1) {
				$title = "Matcha";
			}
			if ($id == 2) {
				$title = "Trà Nhật khác";
			}
			if ($id == 3) {
				$title = "Đồ pha trà";


				$criteria = new CDbCriteria;
				$criteria->condition = 'category = 3';
				$model = new Product;       
				$count = $model->count($criteria);
				$pages = new CPagination($count);

				$pages->pageSize = 9;
				$pages->applyLimit($criteria);
				$models = $model->findAll($criteria);

				$this->render('product',array('model'=>$models,'pages'=>$pages,'title'=>$title));
				return;

			}
			$criteria = new CDbCriteria;
				$criteria->condition = "category = $id";
				$criteria->order = "proPrice asc";
			$products = Product::Model()->findAll($criteria);
			$this->render('product',array('model'=>$products,'title'=>$title));
		}
	}

	public function actionDetail($id){
		$product = Product::Model()->findByPk($id);
		$this->render('detail',array('product'=>$product,'teawares'=>Product::Model()->findAll('category = 3')));
	}

	public function actionBlog($id = null){
		
		if ($id == null) {
			$criteria = new CDbCriteria;
			$model = new News;
			$criteria->order = 'inserted';	        
			$count = $model->count($criteria);
			$pages = new CPagination($count);

			$pages->pageSize = 10;
			$pages->applyLimit($criteria);
			$models = $model->findAll($criteria);

			$this->render('blogs',array('blogs'=>$models,'pages'=>$pages));
		}
		else{
			$model = new News;
			$blog = $model->find("ID = $id");
			
			$oldPost = $model->findAll(
				array(
					'condition' => "ID < $blog->ID",
					'limit'=>'5',
					
					)
				);
			$this->render('blog',array('blog'=>$blog,'oldPost'=>$oldPost));
		}
	}

	public function actionSearch(){
		if (!isset($_POST['search'])) {
			$this->redirect(Yii::app()->request->urlReferrer);
		}
		else{
			$search = $_POST['search'];
			$title = "Kết quả tìm kiếm";
			$products = Product::Model()->findAll("proTitle like \"%$search%\"");
			$this->render('product',array('model'=>$products,'title'=>$title));
		}
	}

}
<?php 

class SuggestController extends AController
{


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
            array('allow',
                'actions'=>array('index','view','update','done'),
                 'roles'=>array('admin'),
            ),          
			array('deny',  // deny all users
				'users'=>array('*'),
			),
        );
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
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

		if(isset($_POST['Suggest']))
		{
			$model->attributes=$_POST['Suggest'];
			if($model->save()){
				Yii::app()->user->setFlash('mss','<div class="alert alert-success"><h4>Thành công!</h4>Cập nhập thành công.</div>');
				$this->redirect(array('view','id'=>$model->id));
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
	 * Lists all models.
	 */
	public function actionIndex($id = 0)
	{
		$model=new Suggest('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Suggest']))
			$model->attributes=$_GET['Suggest'];
		$model->state = $id;
		$this->render('index',array(
			'model'=>$model,
		));
	}


	public function actionDone($id)
	{
		$model=$this->loadModel($id);
		$model->state = 2;
		if(!isset($_GET['ajax']) && $model->save()){
			Yii::app()->user->setFlash('mss','<div class="alert alert-success"><h4>Thành công!</h4>Cập nhập thành công.</div>');
		}
		else{
			Yii::app()->user->setFlash('mss','<div class="alert alert-error"><h4>Error!</h4>Quá trình lưu bị lỗi. Xin vui lòng thử lại</div>');
		}
		$this->redirect(Yii::app()->request->urlReferrer);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Suggest the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Suggest::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Suggest $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='suggest-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

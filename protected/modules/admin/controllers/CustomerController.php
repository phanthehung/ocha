<?php

class CustomerController extends AController
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Customer;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Customer']))
		{
			$model->attributes=$_POST['Customer'];
			$model->password = md5($model->password);
			if($model->save()){
				$model->updateAssignmentItem(0,0);
				Yii::app()->user->setFlash('mss','<div class="alert alert-success"><h4>Thành công!</h4>Tạo mới thành công.</div>');
				$this->redirect(array('view','id'=>$model->id));
			}else{
				Yii::app()->user->setFlash('mss','<div class="alert alert-error"><h4>Error!</h4>Quá trình lưu bị lỗi. Xin vui lòng thử lại sau</div>');
				$this->render('create',array(
					'model'=>$model,
				));
			}
		}else{
			$roles = Customer::model()->getRolesList();
			$this->render('create',array(
				'model'=>$model,
				'roles'=>$roles
			));
		}
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

		if(isset($_POST['Customer']))
		{
			$model->attributes=$_POST['Customer'];
			if (!isset($_POST['Customer']['password'])) {
				$model->password = md5($model->password);
			}
			
			if($model->save()){
				 // echo $this->updateAssignmentItem(10,$model->role_name);
				$model->updateAssignmentItem(1,0);
				Yii::app()->user->setFlash('mss','<div class="alert alert-success"><h4>Thành công!</h4>Cập nhập thành công.</div>');
				$this->redirect(array('view','id'=>$model->id));
			}else{
				Yii::app()->user->setFlash('mss','<div class="alert alert-error"><h4>Error!</h4>Quá trình lưu bị lỗi. Xin vui lòng thử lại</div>');
				$this->render('update',array(
					'model'=>$model,
				));
			}
		}else{
		    $roles = Customer::model()->getRolesList();
			$this->render('update',array(
				'model'=>$model,
				'roles'=>$roles,
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
		if ($this->loadModel($id)->delete()) {
			$model=Customer::model()->updateAssignmentItem(2,$id);
			Yii::app()->user->setFlash('mss','<div class="alert alert-success"><h4>Thành công!</h4>Xóa thành công.</div>');
		}else{
			Yii::app()->user->setFlash('mss','<div class="alert alert-error"><h4>Error!</h4>Quá trình lưu bị lỗi. Xin vui lòng thử lại</div>');
		}
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->pageTitle = "OCHA";
       	$model = new Customer('search');
       	$model->unsetAttributes();
       	if(isset($_GET['Customer'])){
            $model->attributes = $_GET['Customer'];
       	}
       	$this->render('index',array('model' => $model));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Customer the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Customer::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Customer $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='customer-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

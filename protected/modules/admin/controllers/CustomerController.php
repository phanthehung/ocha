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
		$parents = Customer::model()->getParents(Yii::app()->user->getState('role'));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Customer']))
		{
			$model->attributes=$_POST['Customer'];
			$allow = $this->checkPriviledge($model,$parents);
			if ($allow) {
				$model->password = md5($model->password);
				if($model->save()){
					$model->updateAssignmentItem(0,0);
					Yii::app()->user->setFlash('mss','<div class="alert alert-success"><h4>Thành công!</h4>Tạo mới thành công.</div>');
					$this->redirect(array('view','id'=>$model->id));
					return;
				}
			}
			Yii::app()->user->setFlash('mss','<div class="alert alert-error"><h4>Error!</h4>Quá trình lưu bị lỗi. Xin vui lòng thử lại sau</div>');
			$this->render('create',array(
				'model'=>$model,
			));
		} 
		$roles = Customer::model()->getRolesList();
		$roles = array_diff($roles,$parents);
		$this->render('create',array(
			'model'=>$model,
			'roles'=>$roles
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
		$parents = Customer::model()->getParents(Yii::app()->user->getState('role'));		

		if(isset($_POST['Customer']))
		{
			$model->attributes=$_POST['Customer'];
			$allow = $this->checkPriviledge($model,$parents);
			if ($allow) {
				if (!isset($_POST['Customer']['password'])) {
					$model->password = md5($model->password);
				}
				if($model->save()){
					$model->updateAssignmentItem(1,0);
					Yii::app()->user->setFlash('mss','<div class="alert alert-success"><h4>Thành công!</h4>Cập nhập thành công.</div>');
					$this->redirect(Yii::app()->createUrl('admin/customer/view')."/id/".$model->id);
					return;
				}
			}
			Yii::app()->user->setFlash('mss','<div class="alert alert-error"><h4>Error!</h4>Quá trình lưu bị lỗi. Xin vui lòng thử lại</div>');		
		}else{
			$allow = $this->checkPriviledge($model,$parents);
			if (!$allow) {
				Yii::app()->user->setFlash('mss','<div class="alert alert-error"><h4>Error!</h4>bạn không có quyền chỉnh sửa thông tin người này</div>');
				$this->redirect(Yii::app()->createUrl('admin/customer/view')."/id/".$model->id);
				return;
			}
		}

		$roles = Customer::model()->getRolesList();
		$roles = array_diff($roles,$parents);
		$this->render('update',array(
			'model'=>$model,
			'roles'=>$roles,
		));	
	}

	public function checkPriviledge($model,$parent)
	{
		if (Yii::app()->user->getState('role') == Rights::module()->superuserName) {
			return true;
		}
		if ($model->role_name==Rights::module()->superuserName) {
			return false;
		}		
		if (isset($parents["$model->role_name"])) {
			return false;
		}
		return false;
		
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

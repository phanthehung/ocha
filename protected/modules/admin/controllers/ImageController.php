<?php

class ImageController extends AController
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

	// /**
	//  * Displays a particular model.
	//  * @param integer $id the ID of the model to be displayed
	//  */
	// public function actionView($id)
	// {
	// 	$this->render('view',array(
	// 		'model'=>$this->loadModel($id),
	// 	));
	// }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Image;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Image']))
		{
			$model->attributes=$_POST['Image'];
			if ($model->name===NULL || $model->name==="") {
				$model->name="empty";
			}
			$directory = "/images/upload/".time().$model->name.".jpg";
			$model->url = Yii::app()->baseUrl.$directory;
			$model->directory=$directory;
			$imageFile=CUploadedFile::getInstance($model,'image');
			if($imageFile!==NULL && $model->save()){
				
				if ($imageFile->saveAs(Yii::app()->basePath.'/..'.$directory)) {
					Yii::app()->user->setFlash('mss','<div class="alert alert-success"><h4>Thành công!</h4>Tạo mới thành công.</div>');
					$this->redirect(array('index'));
				}
				else{
					// $model->delete();
					Yii::app()->user->setFlash('mss','<div class="alert alert-error"><h4>Error!</h4>Quá trình lưu bị lỗi. Xin vui lòng thử lại</div>');
					$this->render('create',array(
						'model'=>$model,
					));
				}
			}else{
				Yii::app()->user->setFlash('mss','<div class="alert alert-error"><h4>Error!</h4>Quá trình lưu bị lỗi. Xin vui lòng thử lại</div>');
				$this->render(
					'create',array(
					'model'=>$model,
				));
			}
		}
		else{
			$this->render('create',array(
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
		if (file_exists(Yii::app()->basePath."/..".$model->directory)) {
			if (unlink(Yii::app()->basePath."/..".$model->directory) && $model->delete())  {
				Yii::app()->user->setFlash('mss','<div class="alert alert-success"><h4>Thành công!</h4>Xóa thành công.</div>');
					
			}
			else{
				Yii::app()->user->setFlash('mss','<div class="alert alert-error"><h4>Error!</h4>Quá trình xóa bị lỗi. Xin vui lòng thử lại</div>');
			}
		}
		else{
			Yii::app()->user->setFlash('mss','<div class="alert alert-error"><h4>Error!</h4>Quá trình xóa bị lỗi. Xin vui lòng thử lạidsadsa</div>');
		}
		$this->redirect(array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->pageTitle = "OCHA";
       	$model = new Image('search');
       	$model->unsetAttributes();
       	if(isset($_GET['Image'])){
            $model->attributes = $_GET['Image'];
       	}
       	$this->render('index',array('model' => $model));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Image the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Image::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Image $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='image-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php
 
class ProductController extends AController
{
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
                'actions'=>array('index','view','detail'),
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
		$this->pageTitle = "OCHA";
       	$this->breadcrumbs = array('Matcha'=>array('index'));
       	$model = new Product('search');
       	$model->unsetAttributes();
       	if(isset($_GET['Product'])){
            $model->attributes = $_GET['Product'];
       	}
       	$model->category = $id;
       	$this->render('index',array('model' => $model));
	}

	public function actionDetail($id){
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}


	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->pageTitle = "OCHA";
       	$this->breadcrumbs = array('Matcha'=>array('index'));
       	$model = new Product('search');
       	$model->unsetAttributes();
       	if(isset($_GET['Product'])){
            $model->attributes = $_GET['Product'];
       	}
       	$model->category = 1;
       	$this->render('index',array('model' => $model));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Product the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Product::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Product $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

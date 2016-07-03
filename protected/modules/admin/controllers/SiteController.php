<?php

class SiteController extends AController
{
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
			// 'postOnly + delete', // we only allow deletion via POST request
		);
	}
	public function actionIndex()
	{
		$this->render('index');
	}
}
<?php
/* @var $this ImageController */
/* @var $model Image */

$this->breadcrumbs=array(
	'Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Image', 'url'=>array('index')),
	array('label'=>'Manage Image', 'url'=>array('admin')),
);
?>

<?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
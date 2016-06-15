<?php
/* @var $this SuggestController */
/* @var $model Suggest */
 
$this->breadcrumbs=array(
	'Suggests'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Suggest', 'url'=>array('index')),
	array('label'=>'Create Suggest', 'url'=>array('create')),
	array('label'=>'View Suggest', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Suggest', 'url'=>array('admin')),
);
?>

<?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this NewsController */
/* @var $model News */
 
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'View News', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
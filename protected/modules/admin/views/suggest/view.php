<?php
/* @var $this SuggestController */
/* @var $model Suggest */
 
$this->breadcrumbs=array(
	'Suggests'=>array('index'),
	$model->id,
);
 
$this->menu=array(
	array('label'=>'List Suggest', 'url'=>array('index')),
	array('label'=>'Create Suggest', 'url'=>array('create')),
	array('label'=>'Update Suggest', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Suggest', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Suggest', 'url'=>array('admin')),
);
?>
<?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'email',
		'content',
	),
)); ?>

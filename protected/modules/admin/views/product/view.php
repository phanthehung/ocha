<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->proId,
);
 
$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Create Product', 'url'=>array('create')),
	array('label'=>'Update Product', 'url'=>array('update', 'id'=>$model->proId)),
	array('label'=>'Delete Product', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->proId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
?>

<?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'proId',
		'proTitle',
		'proPrice',
		'index',
		'proDescription',
		'proStt',
		array(               // related city displayed as a link
            'label'=>'proImg',
            'type'=>'html',
           'value' => '<img src='.$model->proImg.'>',
        ),
		array(               // related city displayed as a link
            'label'=>'proImg2',
            'type'=>'html',
           'value' => '<img src='.$model->proImg2.'>',
        ),
        array(               // related city displayed as a link
            'label'=>'proImg3',
            'type'=>'html',
           'value' => '<img src='.$model->proImg3.'>',
        ),
		'category',
	),
)); ?>

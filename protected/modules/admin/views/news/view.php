<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->title,
); 

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'Update News', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete News', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'index',
		'title',
		array(               // related city displayed as a link
            'label'=>'Nội dung',
            'type'=>'raw',
            'value'=>function($model){
            	return "<div>".$model->content."</div>";
            },
        ),
		'description',
		array(
			'label'=>'Hình ảnh',
			'type'=>'html',
			'value'=>function($model){
				return '<img src="'.$model->imgUrl.'" alt="">';
			}
		),
		'inserted',
	),
)); ?>

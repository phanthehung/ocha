<?php
/* @var $this OrderController */
/* @var $model Order */
 
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->orderId=>array('view','id'=>$model->orderId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'View Order', 'url'=>array('view', 'id'=>$model->orderId)),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
?>
<?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?>



<div class="row-fluid">
    <div class="span12">
        <div class="head">
           <div class="isw-ok"></div>
            
            <div class="clear"></div>
        </div>
        <div class="block-fluid">
            <?php
           		$this->renderPartial('_form', array('model'=>$model)); 
            ?>
        </div>
    </div>                
</div>


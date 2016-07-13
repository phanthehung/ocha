<?php
/* @var $this NewsController */
/* @var $data News */
?> 

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('index')); ?>:</b>
	<?php echo CHtml::encode($data->index); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imgUrl')); ?>:</b>
	<?php echo CHtml::encode($data->imgUrl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thumbUrl')); ?>:</b>
	<?php echo CHtml::encode($data->thumbUrl); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('inserted')); ?>:</b>
	<?php echo CHtml::encode($data->inserted); ?>
	<br />

	*/ ?>

</div>
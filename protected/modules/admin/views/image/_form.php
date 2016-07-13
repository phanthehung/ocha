<?php
/* @var $this ImageController */
/* @var $model Image */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'image-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<div class="span11">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'name'); ?></div>

		 <div class="span9"><?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?></div><div class="clear"></div>
	</div>

	<div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model, 'image'); ?></div>

		 <div class="span9"><?php echo $form->fileField($model, 'image'); ?>
		<?php echo $form->error($model,'name'); ?></div><div class="clear"></div>
	</div>

	<div class="row buttons">
		
	</div>

	<div class="row-form">
        <div class="span3"></div>
        <div class="span9">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn')); ?>
            <?php echo CHtml::resetButton('Cancel',array('class'=>'btn','style'=>'margin-left:10px')); ?>
        </div>
        <div class="clear"></div>
    </div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->
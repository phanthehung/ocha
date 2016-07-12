<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'username'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'password'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'phone'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'phone'); ?>
		<?php echo $form->error($model,'phone'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'address'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'address',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'address'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'email'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?></div><div class="clear"></div>
	</div>

	<?php if (Rights::module()->superuserName!=$model->role_name): ?>
		<div class="row-form">
			<div class="span3"><?php echo $form->labelEx($model,'role_name'); ?></div>
			 <div class="span9"><?php echo $form->dropDownList($model,'role_name',$roles,array()); ?>
			<?php echo $form->error($model,'role_name'); ?></div><div class="clear"></div>
		</div>
	<?php endif ?>
	
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
<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="span11">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'proTitle'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'proTitle',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'proTitle'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'proPrice'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'proPrice'); ?>
		<?php echo $form->error($model,'proPrice'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'proDescription'); ?></div>
		 <div class="span9"><?php echo $form->textArea($model,'proDescription'); ?>
		<?php echo $form->error($model,'proDescription'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'proImg'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'proImg',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'proImg'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'proImg2'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'proImg2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'proImg2'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'proImg3'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'proImg3',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'proImg3'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'category'); ?></div>
		 <div class="span9"><?php echo $form->dropDownList($model,'category',Yii::app()->params['category'],array()); ?>
		<?php echo $form->error($model,'category'); ?></div><div class="clear"></div>
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
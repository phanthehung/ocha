<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>
 
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
        'enctype'=>'multipart/form-data',
        'id' => 'validation',
    )
)); ?>
<div class="span11">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<center><font size="3" color="red"><?php echo $form->errorSummary($model); ?></font> </center> 

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'address'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'phone'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'phone'); ?>
		<?php echo $form->error($model,'phone'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'total'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'total'); ?>
		<?php echo $form->error($model,'total'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'user'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'user',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'user'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'email'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'note'); ?></div>
		 <div class="span9"><?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'state'); ?></div>
		 <div class="span9"><?php echo $form->dropDownList($model,'state',Yii::app()->params['state.order'],array()); ?>
		<?php echo $form->error($model,'state'); ?></div><div class="clear"></div>
	</div>

	<div class="row buttons">
		
	</div>
	<center>
		<div class="row-form">
	        <div class="">
	            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn')); ?>
	            <?php echo CHtml::resetButton('Cancel',array('class'=>'btn','style'=>'margin-left:10px')); ?>
	        </div>
	        <div class="clear"></div>
	    </div>
	</center>
<?php $this->endWidget(); ?>
</div>
</div><!-- form -->
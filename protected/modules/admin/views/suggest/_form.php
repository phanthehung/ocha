<?php
/* @var $this SuggestController */
/* @var $model Suggest */
/* @var $form CActiveForm */
?>
 
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suggest-form',
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
<?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?>

<div class="span11">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<center><font size="3" color="red"><?php echo $form->errorSummary($model); ?></font> </center> 

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'username'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'email'); ?></div>
		 <div class="span9"><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'content'); ?></div>
		 <div class="span9"><?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content'); ?></div><div class="clear"></div>
	</div>

	 <div class="row-form">
		<div class="span3"><?php echo $form->labelEx($model,'state'); ?></div>
		 <div class="span9"><?php echo $form->dropDownList($model,'state',Yii::app()->params['state.suggest'],array()); ?>
		<?php echo $form->error($model,'state'); ?></div><div class="clear"></div>
	</div>
	<center>
		<div class="row-form">
	        <div class="span3"></div>
	        <div class="span9">
	            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn')); ?>
	            <?php echo CHtml::resetButton('Cancel',array('class'=>'btn','style'=>'margin-left:10px')); ?>
	        </div>
	        <div class="clear"></div>
	    </div>
	</center>
<?php $this->endWidget(); ?>
</div>
</div>

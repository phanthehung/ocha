<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?> 

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'news-form',
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
				<div class="span3"><?php echo $form->labelEx($model,'title'); ?></div>

				<div class="span9"><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
					<?php echo $form->error($model,'title'); ?></div><div class="clear"></div>
			</div>

			<div class="row-form">
				<div class="span3"><?php echo $form->labelEx($model, 'description'); ?></div>
				<div class="span9">
					<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
					<?php echo $form->error($model,'description'); ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="row-form">
				<div class="span3"><?php echo $form->labelEx($model, 'content'); ?></div>
				<div class="span9"><?php echo $form->textArea($model,'content',array('rows'=>20, 'cols'=>50)); ?>
					<?php echo $form->error($model,'content'); ?></div><div class="clear"></div>
				</div>

            <div class="row-form">
            	<div class="span3"><?php echo $form->labelEx($model, 'Image'); ?></div>
            	<div class="span9"><?php echo $form->textField($model, 'imgUrl'); ?>
            		<?php echo $form->error($model,'imgUrl'); ?></div><div class="clear"></div>
            </div>

            	<div class="span9"><img src="<?php echo $model->imgUrl?>"></div>

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
        </div>
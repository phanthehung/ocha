<div class="form">
	<div class="span11">
		<p class="note">Fields with <span class="required">*</span> are required.</p>
		<?php $form=$this->beginWidget('CActiveForm'); ?>
		
		<div class="row-form">
			<div class="span3"><?php echo $form->labelEx($model, 'name'); ?></div>
			<div class="span9"><?php echo $form->textField($model, 'name', array('maxlength'=>255, 'class'=>'text-field')); ?></div>
			<div class=""><?php echo $form->error($model, 'name'); ?></div>
			<div class="clear"></div>
		</div>

		<div class="row-form">
			<div class="span3"><?php echo $form->labelEx($model, 'description'); ?></div>
			<div class="span9"><?php echo $form->textField($model, 'description', array('maxlength'=>255, 'class'=>'text-field')); ?></div>
			<div class=""><?php echo $form->error($model, 'description'); ?></div>
			<div class="clear"></div>
		</div>

		<?php if( Rights::module()->enableBizRule===true ): ?>

			<div class="row-form" style="display:none">
				<div class="span3"><?php echo $form->labelEx($model, 'bizRule'); ?></div>
				<div class="span9"><?php echo $form->textField($model, 'bizRule', array('maxlength'=>255, 'class'=>'text-field')); ?></div>
				<div class=""><?php echo $form->error($model, 'bizRule'); ?></div>
			</div>
			<div class="clear"></div>
		<?php endif; ?>

		<?php if( Rights::module()->enableBizRule===true && Rights::module()->enableBizRuleData ): ?>

			<div class="row-form">
				<?php echo $form->labelEx($model, 'data'); ?>
				<?php echo $form->textField($model, 'data', array('maxlength'=>255, 'class'=>'text-field')); ?>
				<?php echo $form->error($model, 'data'); ?>
				<p class="hint"><?php echo Rights::t('core', 'Additional data available when executing the business rule.'); ?></p>
			</div>

		<?php endif; ?>
		<center>	
			<div class="row-form">
		        <div class="span3"></div>
		        <div class="span9">       
					<?php if ($model->scenario==='create'): ?>
						<?php echo CHtml::submitButton('Create',array('class'=>'btn')); ?>
					<?php else: ?>
						<?php echo CHtml::submitButton('Update',array('class'=>'btn')); ?>
					<?php endif ?>            
		            <?php echo CHtml::resetButton('Cancel',array('class'=>'btn','style'=>'margin-left:10px')); ?>
		        </div>
		        <div class="clear"></div>
		    </div>
		</center>
	</div>
</div>



<?php $this->endWidget(); ?>


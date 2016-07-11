<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>
	
	<div class="row-form" style="border-bottom: 0px">
		<?php echo $form->dropDownList($model, 'itemname', $itemnameSelectOptions); ?>
		<?php echo $form->error($model, 'itemname'); ?>
		<div class="clear"></div>
	</div>
	<center>
		<div class="row-form">			
		    <div class="">       
				<?php echo CHtml::submitButton(Rights::t('core', 'Add'),array('class'=>'btn','style'=>'width:80px')); ?>
		    </div>
		    <div class="clear"></div>
		</div>
	</center>
<?php $this->endWidget(); ?>

</div>
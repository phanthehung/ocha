<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::getAuthItemTypeNamePlural($model->type)=>Rights::getAuthItemRoute($model->type),
	$model->name,
); ?>

<div id="updatedAuthItem">

	<h2><?php echo Rights::t('core', 'Update :name', array(
		':name'=>$model->name,
		':type'=>Rights::getAuthItemTypeName($model->type),
	)); ?></h2>

	<?php $this->renderPartial('_form', array('model'=>$formModel)); ?>

	<div class="workplace">
	
		<h3><?php echo Rights::t('core', 'Relations'); ?></h3>

		<?php if( $model->name!==Rights::module()->superuserName ): ?>

		<div class="span11">
			<div class="span4">

				<h4><?php echo Rights::t('core', 'Parents'); ?></h4>

				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'dataProvider'=>$parentDataProvider,
					'template'=>'{items}',
					'hideHeader'=>true,
					'emptyText'=>Rights::t('core', 'This item has no parents.'),
					'htmlOptions'=>array('class'=>''),
					'columns'=>array(
    					array(
    						'name'=>'name',
    						'header'=>Rights::t('core', 'Name'),
    						'type'=>'raw',
    						'htmlOptions'=>array('class'=>'name-column'),
    						'value'=>'$data->getNameLink()',
    					),
    					// array(
    					// 	'name'=>'type',
    					// 	'header'=>Rights::t('core', 'Type'),
    					// 	'type'=>'raw',
    					// 	'htmlOptions'=>array('class'=>'type-column'),
    					// 	'value'=>'$data->getTypeText()',
    					// ),
    					array(
    						'header'=>'&nbsp;',
    						'type'=>'raw',
    						'htmlOptions'=>array('class'=>'actions-column'),
    						'value'=>'',
    					),
					)
				)); ?>

			</div>

			<div class="span4">

				<h4><?php echo Rights::t('core', 'Children'); ?></h4>

				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'dataProvider'=>$childDataProvider,
					'template'=>'{items}',
					'hideHeader'=>true,
					'emptyText'=>Rights::t('core', 'This item has no children.'),
					'htmlOptions'=>array('class'=>'grid-view parent-table mini'),
					'columns'=>array(
    					array(
    						'name'=>'name',
    						'header'=>Rights::t('core', 'Name'),
    						'type'=>'raw',
    						'htmlOptions'=>array('class'=>'name-column'),
    						'value'=>'$data->getNameLink()',
    					),
    					// array(
    					// 	'name'=>'type',
    					// 	'header'=>Rights::t('core', 'Type'),
    					// 	'type'=>'raw',
    					// 	'htmlOptions'=>array('class'=>'type-column'),
    					// 	'value'=>'$data->getTypeText()',
    					// ),
    					array(
    						'header'=>'&nbsp;',
    						'type'=>'raw',
    						'htmlOptions'=>array('class'=>'actions-column'),
    						'value'=>'$data->getRemoveChildLink()',
    					),
					)
				)); ?>

			</div>			
		</div>
		<br/>
		<div class="span11">
			<div class="span3"><h5><?php echo Rights::t('core', 'Add Child'); ?></h5></div>
			<div class="span9">
				<?php if( $childFormModel!==null ): ?>
					<?php $this->renderPartial('_childForm', array(
						'model'=>$childFormModel,
						'itemnameSelectOptions'=>$childSelectOptions,
					)); 
				?>
			</div>
			<?php else: ?>
				<p class="info"><?php echo Rights::t('core', 'No children available to be added to this item.'); ?>
			<?php endif; ?>	
		</div>
		
		<?php else: ?>

			<p class="info">
				<?php echo Rights::t('core', 'No relations need to be set for the superuser role.'); ?><br />
				<?php echo Rights::t('core', 'Super users are always granted access implicitly.'); ?>
			</p>

		<?php endif; ?>		
	</div>
</div>
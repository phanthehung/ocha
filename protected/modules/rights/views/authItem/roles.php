<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Roles'),
); ?>
<div class="row-fluid">
    <div class="span12">
        <div id="roles">
            <div class="head">
                <div class="isw-grid"></div>
                <h1>Danh sách chức vụ</h1>
                <ul class="buttons">
                    <li class="active">
                        <a href="#" class="isw-settings"></a>
                        <ul class="dd-list">
                            <li><?php echo CHtml::link('<span class="isw-plus"></span> Thêm chức vụ',array('authItem/create', 'type'=>CAuthItem::TYPE_ROLE))?></li>
                        </ul>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
                <div class="block-fluid">   
                	<?php $this->widget('zii.widgets.grid.CGridView', array(
                        'id'=>'data-grid-document',
                	    'dataProvider'=>$dataProvider,
                        'itemsCssClass' =>'table',
                	    'template'=>'{items}',
                	    'emptyText'=>Rights::t('core', 'No roles found.'),
                	    'htmlOptions'=>array(),
                	    'columns'=>array(
                    		array(
                    			'name'=>'name',
                    			'header'=>Rights::t('core', 'Name'),
                    			'type'=>'raw',
                    			'htmlOptions'=>array('class'=>'name-column'),
                    			// 'value'=>'$data->getGridNameLink()',
                    		),
                    		array(
                    			'name'=>'description',
                    			'header'=>Rights::t('core', 'Description'),
                    			'type'=>'raw',
                    			'htmlOptions'=>array('class'=>'description-column'),
                    		),
                    		// array(
                    		// 	'name'=>'bizRule',
                    		// 	'header'=>Rights::t('core', 'Business rule'),
                    		// 	'type'=>'raw',
                    		// 	'htmlOptions'=>array('class'=>'bizrule-column'),
                    		// 	'visible'=>Rights::module()->enableBizRule===true,
                    		// ),
                    		array(
                    			'name'=>'data',
                    			'header'=>Rights::t('core', 'Data'),
                    			'type'=>'raw',
                    			'htmlOptions'=>array('class'=>'data-column'),
                    			'visible'=>Rights::module()->enableBizRuleData===true,
                    		),
                    		// array(
                      //           'header'=>'&nbsp;',
                      //           'type'=>'raw',
                      //           'htmlOptions'=>array('class'=>'actions-column'),
                      //           'value'=>'$data->getDeleteRoleLink()',
                      //       ),
                            array(
                                'class'=>'CButtonColumn',
                                'template'=>'{update}{delete}',
                                'buttons' => array(
                                    'update'=>array(
                                        'label'=>'UPDATE',
                                        'imageUrl' => false,
                                        'url'=>'$data->getAuthItemUpdateLink()',
                                        'options'=>array( 'title'=>'Update','class'=>'btn btn-warning','style' => 'margin-left:5px'),
                                    ),
                                    'delete'=>array(
                                        'label'=>'DELETE',
                                        'imageUrl' => false,
                                        'url' =>'$data->getAuthItemDeleteLink()',
                                        'options'=>array( 'title'=>'Delete','class'=>'btn btn-success','style' => 'margin-left:5px'),
                                    ), 
                                ),
                                'htmlOptions'=>array('style'=>'width:180px'),
                            ),
                	    )
                	)); ?>
        	</div>
        </div>
    </div>                
</div>
<!-- <button onclick="jQuery.ajax({
'type':'post',
'data':{'name':'custom5'},
'success':function(){
    alert('OK');
},
'error':function(){
    alert('not OK');
},'complete':function(){
    alert('not OK');
},
'url':'/ocha/index.php/rights/authItem/delete',
'cache':false});">dsa</button> -->
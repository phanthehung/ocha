<?php
/* @var $this SuggestController */
/* @var $dataProvider CActiveDataProvider */
$this->breadcrumbs=array(
	'Suggests',
); 
?>
<?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?>
<div class="row-fluid">
    <div class="span12">
        <div class="head">
            <div class="isw-grid"></div>
            <h1>Danh sách ý kiến</h1>
            <div class="clear"></div>
        </div>
        <div class="block-fluid">
 <?php
            $this->widget('zii.widgets.grid.CGridView', array(
            	'id'=>'data-grid-document',
            	'dataProvider'=>$model->search(),
                'itemsCssClass' =>'table',
                'htmlOptions'=>array(),
                'summaryText'=>'',
                'filter'=>$model,
                'columns'=>array(
                    array(
                        'name'=>'STT',
                        'filter'=>false,
                        'value' => '$row + 1',
                        'type'=>'raw',
                        'htmlOptions'=>array(),
                    ),
                    array(
                        'name'=>'username',
                        'type'=>'email',
                        'htmlOptions'=>array(),
                    ),
                    array(
                        'name' => 'state',
                        'type'=>'raw',
                        'value' => array($model,'getState'),
                        'htmlOptions'=>array(),
                    ),
                    array(
                        'name' => 'created',
                        'type'=>'raw',
                        'htmlOptions'=>array(),
                    ),                   
                    array(
            			'class'=>'CButtonColumn',
                        'template'=>'{detail}{update}{done}',
                        'buttons' => array(
                            'detail' => array(
                                'label'=>'DETAIL',
                                'url' =>'Yii::app()->baseUrl."/admin/suggest/view/id/".$data->id',
                                'imageUrl' => false,
                                'options'=>array( 'title'=>'Chi tiết','class'=>'btn btn-detail'),
                            ),
                            'update'=>array(
                                'label'=>'UPDATE',
                                'imageUrl' => false,
                               'options'=>array( 'title'=>'Update','class'=>'btn btn-warning','style' => 'margin-left:5px'),
                            ),
                            'done'=>array(
                                'label'=>'DONE',
                                'imageUrl' => false,
                                'url' =>'Yii::app()->baseUrl."/admin/suggest/done/id/".$data->id',
                               'options'=>array( 'title'=>'Done','class'=>'btn btn-success','style' => 'margin-left:5px'),
                            ), 
                        ),
                        'htmlOptions'=>array('style'=>'width:180px'),
            		),
            	),
                'pager'=>array(
                    'cssFile'=>false,
                    'class'=>'CLinkPager',
                    'firstPageLabel' => 'First',
                    'prevPageLabel' => 'Previous',
                    'nextPageLabel' => 'Next',
                    'lastPageLabel' => 'Last',
                    'header'=>'',
                    'selectedPageCssClass'=>'active',
                ),
                'pagerCssClass' => 'pagination',
            ));
             ?>

        </div>
    </div>                
</div>
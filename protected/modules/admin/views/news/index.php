<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */
  
$this->breadcrumbs=array(
	'News',
);
?>
<?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?>
<div class="row-fluid">
    <div class="span12">
        <div class="head">
            <div class="isw-grid"></div>
            <h1>Danh sách bài viết</h1>
            <ul class="buttons">
                <li class="active">
                    <a href="#" class="isw-settings"></a>
                    <ul class="dd-list">
                        <li><?php echo CHtml::link('<span class="isw-plus"></span> Thêm bài viết',array('news/create'))?></li>
                    </ul>
                </li>
            </ul>
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
                        'name'=>'title',
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'ct'),
                    ),
                    array(
                        'name'=>'description',
                        'type'=>'raw',
                        'htmlOptions'=>array('class'=>'ct'),
                    ),
                    array(
            			'class'=>'CButtonColumn',
                        'template'=>'{detail}{update}{delete}',
                        'buttons' => array(
                            'detail' => array(
                                'label'=>'DETAIL',
                                'url' =>'Yii::app()->baseUrl."/admin/news/view/id/".$data->ID',
                                'imageUrl' => false,
                                'options'=>array( 'title'=>'Chi tiết','class'=>'btn btn-detail'),
                            ),
                            'update'=>array(
                                'label'=>'UPDATE',
                                'imageUrl' => false,
                               'options'=>array( 'title'=>'Update','class'=>'btn btn-warning','style' => 'margin-left:5px'),
                            ),
                            'delete'=>array(
                                'label'=>'DEL',
                                'imageUrl' => false,
                                'options'=>array( 'title'=>'Delete','class'=>'btn btn-danger','style' => 'margin-left:5px'),
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
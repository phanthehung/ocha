<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Images',
);

?>
<?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?>
<div class="row-fluid">
    <div class="span12">
        <div class="head">
            <div class="isw-grid"></div>
            <h1>Danh sách hình ảnh</h1>
            <ul class="buttons">
                <li class="active">
                    <a href="#" class="isw-settings"></a>
                    <ul class="dd-list">
                        <li><?php echo CHtml::link('<span class="isw-plus"></span> Thêm hình',array('image/create'))?></li>
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
                        'header'=>'Image',
                        'value' => function($data,$row){
                            echo '<img width="200px" src="'.$data->url.'" alt="">';
                        },
                        'type'=>'html',
                        'htmlOptions'=>array('class'=>'ct'),
                    ),
                    array(
                        'name' => 'url',
                        'type'=>'raw',
                        'htmlOptions'=>array(),
                    ),
                    array(
                        'name' => 'name',
                        'type'=>'raw',
                        'htmlOptions'=>array(),
                    ),                   
                    array(
            			'class'=>'CButtonColumn',
                        'template'=>'{delete}',
                        'buttons' => array(
                            'delete'=>array(
                                'label'=>'DEL',
                                'imageUrl' => false,
                                'options'=>array( 'title'=>'Delete','class'=>'btn btn-danger','style' => 'margin-left:5px'),
                            ), 
                        ),
                        'htmlOptions'=>array('style'=>'width:80px'),
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
<?php
/* @var $this OrderController */
/* @var $model Order */
 
$this->breadcrumbs=array(
	'Orders'=>array('index'),'Detail',
	$model->orderId,
	);


?>

<?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?>
<?php
	$this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'data-grid-document',
		'dataProvider'=>$detail->search(),
		'itemsCssClass' =>'table',
		'htmlOptions'=>array(),
		'summaryText'=>'',
		'filter'=>$detail,
		'columns'=>array(
			array(
				'name'=>'STT',
				'filter'=>false,
				'value' => '$row + 1',
				'type'=>'raw',
				'htmlOptions'=>array(),
				),
			array(
				'name'=>'proTitle',
				'filter'=>false,
                        // 'value' => 'Chtml::link($data->s_account_email,array("account/detail","id" => $data->i_account_id),array())',
				'type'=>'raw',
				'htmlOptions'=>array('class'=>'ct'),
				),
			array(
				'name' => 'proPrice',
				'filter'=>false,
                
				'type'=>'raw',
				'htmlOptions'=>array(),
				),
			array(
				'name' => 'quantity',
				'filter'=>false,
				'type'=>'raw',
				'htmlOptions'=>array(),
				),
            array(
                'name' => 'total',
                'value' => '$data->quantity * $data->proPrice',
                'filter' => false,//Yii::app()->params['order.status'],
                'type'=>'raw',
                'htmlOptions'=>array('style'=>'width:120px'),
            ),

			array(
				'class'=>'CButtonColumn',
				'template'=>'{delete}',
				'buttons' => array(

					'delete'=>array(
						'label'=>'DEL',
						'imageUrl' => false,
						'url'=>'Yii::app()->baseUrl."/admin/order/deleteItem/order/'.$model->orderId.'/item/$data->ID"',
						'options'=>array( 'title'=>'Delete','class'=>'btn btn-danger','style' => 'margin-left:5px'),
						), 
					),
				'htmlOptions'=>array('style'=>'width:70px'),
				),
			),
		)
	);	         
?>

<font size="4">
	Tổng: <script type="text/javascript">
				document.write(formatNumber(<?php echo $model->total; ?>));
		</script> VNĐ<br><hr>
	Nhập lúc: <?php echo $model->inserted?> <br><hr> 
	<?php if ($model->updater != 0): ?>
		Thay đổi lần cuối vào lúc: <?php echo $model->updated?> bởi <?php echo $model->update->username; ?> <br><hr> 
	<?php endif ?>
	
	Ghi chú: <?php echo $model->note ?>
</font>


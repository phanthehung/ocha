<div class="row clearfix">
	<div class="content margin-auto">		 
		<hr>
		<div class="sm-5 margin-sm">
			<font color="#6FAD22" size="6"><?php echo $title ?></font>
		</div>
		<div class="sm-7">
			<form class="align-right" method="post" action="<?php echo Yii::app()->baseUrl?>/site/search">
				<input type="text" placeholder="Tìm kiếm..." name="search">
				<input type="submit" value="Search" class="button">
			</form>
		</div>
		<hr>

		<div>
			<font class="text-center single margin-sm" size="5">Danh sách sản phẩm</font>
			<div>
				<?php if ($model == null): ?>
					<font color="red" class="text-center">Không tìm thấy sản phẩm chứa từ khóa. Vui lòng nhập lại</font>
				<?php endif ?>
				<?php foreach ($model as $product): ?>
					<div class="sm-4 xs-12 margin-md">
						<div class="sm-11 xs-12 align-center margin-auto text-center">
							<a class="sm-12 xs-12" href="<?php echo Yii::app()->request->baseUrl; ?>/site/detail/<?php echo $product->proId; ?>" title="">
								<img class="single" src="<?php echo $product->proImg ?>">
					        	<div class="text-center">
						            <font size="4"><b><?php echo $product->proTitle; ?></b></font><br/>
						            <font size="4"><b> <script type="text/javascript">
						            	document.write(formatNumber(<?php echo $product->proPrice;?>));
						            </script>  VNĐ </b></font>
						        </div>
						    </a>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
		<div class="clear"></div>
		<?php if (isset($pages)): ?>
			<div class="align-center text-center margin-sm margin-auto">
			<div class="xs-12" >
        	   		
        	   	   	
        	<?php $this->widget('CLinkPager', array(
        		'pages' => $pages,
        		'prevPageLabel' => 'Trước',
        		'nextPageLabel' => 'Sau',
        		'firstPageLabel' => '<<',
        		'lastPageLabel' => '>>',
        		'header' => '',
        		'maxButtonCount' => 5,
        		'selectedPageCssClass' => 'notlink',
        		'internalPageCssClass'=>'link',
        		'previousPageCssClass'=>'link',
        		'nextPageCssClass'=>'link',
        		)) ?>
    </div></div>
		<?php endif ?>
		
	</div>
</div> 
<script type="text/javascript">
	// ViewContent
	// Track key page views (ex: product page, landing page or article)
	fbq('track', 'ViewContent');
</script>
<style type="text/css">
	.caption a {
		color: white !important; 
	} 
	.caption{
		position: absolute;
		z-index: 99;
		color: white;
		text-align: center;
		font-size: 3vw;	
		line-height: 3vw;
	}
	.caption button{
		font-size: 2vw !important;	
		line-height: 2vw !important;
		border: solid white 1px;
	}
	.caption:hover{
		cursor: pointer;
	}
	.caption button:hover{
		cursor: pointer;
	}
	.style1{
		width: 100%;
		top: 30%;
	}
	.style2{
		right:50%;
		width: 50%;
		top: 30%;
	}
	.style3{
		left:50%;
		width: 50%;
		top: 30%;
	}
	.style3 a{
		color: green !important;
	}
</style>
<div class="flexslider">
	<ul class="slides">
		<li>
			<div style="position:relative">
				<div class="caption style1">
					<a href="<?php echo Yii::app()->baseUrl ?>/site/product/1">
						<b>MATCHA NGUYÊN CHẤT</b>	<br><br>
						Matcha nguyên chất từ vùng Mie của Nhật<br><br>
						<button class="button">Xem sản phẩm</button>
					</a>
				</div>
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider-01.jpg" />
			</div>			
		</li>
		<li>
			<div>
				<div class="caption style1">
					<a href="<?php echo Yii::app()->baseUrl ?>/site/product/1">
						<b>TRẢI NGHIỆM ĐÍCH THỰC</b>	<br><br>
						Tận hưởng hương vị matcha truyền thống mà ít người được biết <br><br>
						<button class="button">Mua matcha</button>
					</a>
				</div>
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider-02.jpg" />
			</div>
		</li>
		<li>
			<div>
				<div class="caption style2">
					<a href="<?php echo Yii::app()->baseUrl ?>/pages/matcha">
						<b>MÓN QUÀ SỨC KHỎE TUYỆT VỜI</b>	<br><br>
						Tinh túy của trà Nhật, matcha, mang đến những lợi ích sức khỏe tuyết vời và hương vị đặc biệt<br><br>
						<button class="button">Tìm hiểu về matcha</button>
					</a>
				</div>
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider-03.jpg" />
			</div>
		</li>
		<li>
			<div>
				<div class="caption style3">
					<a href="<?php echo Yii::app()->baseUrl ?>/pages/aboutUs">
						<b>NIỀM ĐAM MÊ TRÀ</b>	<br><br>
			 			Mong muốn của chúng tôi là đem đến cho bạn tinh hòa trà Nhật - matcha - với hương vị đích thực<br><br>
						<button class="button">Về chúng tôi</button>
					</a>
				</div>
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/slider-04.jpg" />
			</div>
		</li>
	</ul>
</div>
<script type="text/javascript">
	$(function(){
		SyntaxHighlighter.all();
	});
	$(window).load(function(){
		$('.flexslider').flexslider({
			animation: "fade",
			smoothHeight: true,
			slideshow:false,
			start: function(slider){
				$('body').removeClass('loading');
			}
		});
	});
</script>
<div class="clear"></div>
<div class="content margin-auto margin-md">
	<div class="row"> 
		<div class="sm-4 xs-12">
			<div class="md-11 xs-12 align-center margin-auto text-center">
				<a class="md-12 xs-12" href="<?php echo Yii::app()->request->baseUrl; ?>/site/product/1" title=""><img width="100%" src="<?php echo Yii::app()->request->baseUrl; ?>/images/cat1.jpg" alt=""><font size="5">Matcha</font></a>
			</div>
		</div>
		<div class="sm-4 xs-12">
			<div class="md-11 xs-12 align-center margin-auto text-center">
				<a class="md-12 xs-12" href="<?php echo Yii::app()->request->baseUrl; ?>/site/product/3" title=""><img width="100%" src="<?php echo Yii::app()->request->baseUrl; ?>/images/cat3.jpg" alt=""><font size="5">Dụng cụ pha trà</font></a>
			</div>
		</div>
		<div class="sm-4 xs-12">
			<div class="md-11 xs-12 align-center margin-auto text-center">
				<a class="md-12 xs-12" href="<?php echo Yii::app()->request->baseUrl; ?>/pages/other" title=""><img width="100%" src="<?php echo Yii::app()->request->baseUrl; ?>/images/cat2.jpg" alt=""><font size="5">Trà Nhật khác</font></a>
			</div>
		</div>
	</div>
</div>
<div class="clear"></div>
<div class="dark-background">
	<div class="content margin-auto margin-sm">
		<font size="4">"Oi ocha, it's teatime" là cách gọi thường nhật của người Nhật về việc uống trà. Mục tiêu của chúng tôi là mang những giá trị tinh túy và hoàn hảo của ẩm thực trà Nhật-Matcha đến cuộc sống thường nhật của bạn. Do đó chúng tôi mong muốn mang đến những loại matcha tốt với hương vị đích thực. We mean it!
		</font>

	</div>
</div>	
<div class="clear"></div>
<div class="content margin-auto">
	<div class="margin-md">
		<b><font size="5" color="#6FAD22">Ocha blog</font></b><hr>
		<?php foreach ($blogs as $blog): ?>
			<div class="margin-lg">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/blog/<?php echo $blog->ID; ?>" title="">
					<font size="5"><?php echo $blog->title; ?></font>
				</a>
				<br/>
				<div>
					<div class="sm-2 xs-12"><img src="<?php echo $blog->imgUrl ?>" alt="">
					</div>
					<div class="sm-9 xs-12" style="padding-left:20px">
						<?php echo $blog->description;?>
					</div>
				</div>
				<br/>
				<button class="button margin-sm" type=""><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/blog/<?php echo $blog->ID; ?>" title="">Xem thêm</a></button>
			</div>
		<?php endforeach ?>

	</div>
</div>

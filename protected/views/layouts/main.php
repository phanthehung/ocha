<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 

	<link href="<?php echo Yii::app()->baseUrl ?>/css/style.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo Yii::app()->baseUrl ?>/css/custom.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php echo Yii::app()->baseUrl ?>/css/css" rel="stylesheet" type="text/css">
	<link href="<?php echo Yii::app()->baseUrl ?>/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->baseUrl ?>/css/flexslider.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->baseUrl ?>/css/style-teaware.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->baseUrl ?>/css/slick.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->baseUrl ?>/css/slick-theme.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/dropdowns.css" media="all">

	<script type='text/javascript' src="<?php echo Yii::app()->baseUrl; ?>/js/jquery-1.11.3.min.js"></script>
	<script defer src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.flexslider.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/dropdowns.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.mousewheel-3.1.12.js"></script>
	<script type="text/javascript">
		function formatNumber (num) {
	    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
	};
	</script>


</head>
<body>

	<div class="container">
		<div class="header">
			<div class="content margin-auto">
				<div class="row">
					<div class="sm-4 xs-12">
						<a class="sx-11" href="" title="">
							<img src="<?php echo Yii::app()->baseUrl ?>/images/logo.png" alt="">
						</a> 
					</div>
					<div class="sm-8 navigation margin-md">
						<div class="sx-12">
							
						<?php
								
							$temp = "<form action='".Yii::app()->baseUrl."/site/search' method=\"post\" accept-charset=\"utf-8\">
							<input class='hidden' type='text' name='search' placeholder='Tìm kiếm sản phẩm....'>									
						</form>";
						$this->widget('zii.widgets.CMenu',array(
							'id'=>'menu',
							'encodeLabel' => false,
							'items'=>array(               
								array(
									'label'=>'Tài khoản', 
									'url'=>array('/site/'), 
									'itemOptions'=>array('style'=>'margin-right:30px'),		
									'visible'=>!Yii::app()->user->checkAccess('account'),
									),
								array(
									'label'=>Yii::app()->user->checkAccess('account')?Yii::app()->user->username:"", 
									'url'=>array('/site/'), 
									'itemOptions'=>array('style'=>'margin-right:30px'),
									'visible'=>Yii::app()->user->checkAccess('account'),
									),
								array(
									'label'=>'Đăng xuất', 
									'url'=>array('/site/signout'), 
									'itemOptions'=>array('style'=>'margin-right:30px'),
									'visible'=>Yii::app()->user->checkAccess('signout')
									),
								array('label'=>"$temp")            
								),  
							'htmlOptions' => array( 'class' => 'text-right align-right' )   
							)); 
							?>			
						</div>
						<div class="sx-12">
							<div class="">								
								<ul class="text-right align-right nav">
									<li><a href="<?php echo Yii::app()->baseUrl ?>/site/index" title="">Trang chủ</a></li>
									<li>
										<a href="<?php echo Yii::app()->baseUrl ?>/" title="">Sản phẩm</a>
										<ul>
											<li><a href="<?php echo Yii::app()->baseUrl?>/site/product/1">Matcha</a></li>
											<li><a href="<?php echo Yii::app()->baseUrl?>/site/product/3">Dụng cụ pha trà </a></li>
											<li><a href="<?php echo Yii::app()->baseUrl?>/">Trà Nhật khác </a></li>
										</ul>
									</li>

									<li>
										<a href="<?php echo Yii::app()->baseUrl ?>/" title="">Giới thiệu</a>
										<ul>
											<li><a href="<?php echo Yii::app()->baseUrl?>/" title="">Về Matcha</a></li>
											<li><a href="<?php echo Yii::app()->baseUrl?>/" title="">Về chúng tôi</a></li>
											
										</ul>
									</li>								
									<li><a href="<?php echo Yii::app()->baseUrl ?>/site/blog" title="">Blog</a></li>
									<li><a href="<?php echo Yii::app()->baseUrl ?>/site/contact" title="">Liên hệ</a></li>
									<li><a href="<?php echo Yii::app()->baseUrl ?>/" title="">Giỏ hàng</a></li>
									
								</ul>
								

							</div>
							<script>
								$(".dropdowns").dropdowns();
							</script>
						</div>
					</div>
					<div class="xs-12 menu-nav margin-xs text-center">
						
						<div class="dropdowns xs-12">
							<a class="toggleMenu" href="#">Menu</a>
							<?php  
								$this->widget('zii.widgets.CMenu',array(
								'id'=>'menu',
								'encodeLabel' => false,
								'items'=>array(               
									array(
										'label'=>'Trang chủ', 
										'url'=>array('/site/index'), 	
										),
									array(
										'label'=>"Đăng nhập", 
										'url'=>array('/site/'), 
										'visible'=>!Yii::app()->user->checkAccess('account'),
										),
									array(
										'label'=>Yii::app()->user->checkAccess('account')?Yii::app()->user->username:"", 
										'url'=>array('/site/'), 
										'visible'=>Yii::app()->user->checkAccess('account'),
										),
									array(
										'label'=>"Sản phẩm", 
										'url'=>array(''), 
										'items'=>array(
											array(
												'label'=>'Matcha', 
												'url'=>array('/site/product/1'), 
												),
											array(
												'label'=>'Dụng cụ pha trà',	
												'url'=>array('/site/product/2'), 	
												),
											array(
												'label'=>'Trà Nhật khác', 
												'url'=>array('/'), 	
												),
											),
										),
									array(
										'label'=>"Giới thiệu", 
										'url'=>array(''), 
										'items'=>array(
											array(
												'label'=>'Về matcha', 
												'url'=>array('/pages/'), 
												),
											array(
												'label'=>'Về chúng tôi', 
												'url'=>array('/pages/'), 	
												),
											),
										),
									array(
										'label'=>"Blog", 
										'url'=>array('/site/blog'), 
										),
									array(
										'label'=>"Liên hệ", 
										'url'=>array('/site/'), 
										),
									array(
										'label'=>"Đăng xuất", 
										'url'=>array('/site/'), 
										'visible'=>Yii::app()->user->checkAccess('signout'),
										),
									array(
										'label'=>'Giỏ hàng', 
										'url'=>array('/site/'), 
										),
				           
									),  
								'htmlOptions' => array( 'class' => 'text-right align-right nav' )   
								));
							?>
							
						</div>
						<script>
							$(".dropdowns").dropdowns();
						</script>
						
					</div>
				</div>
			</div>
		</div>
		<div class="body">
			<?php echo $content ?>
		</div>
		<div class="footer">
			<div class="email">				
				<div class="md-10 margin-auto">
					<div class="row text-center">
						<div class="md-6 xs-12">
							<span style="margin-top:20px" class="xs-12 algin-left">
								<font size="4">Gửi email ngay để nhận những thông tin hữu ích về trà</font>
							</span>
						</div>
						<div class="md-6 xs-12">
							<form action="" method="get" accept-charset="utf-8">
								<input type="text" name="" value="" placeholder=" Email của bạn" required="required">
								<input style="margin-top:15px" type="submit" name="" value="Nhận thông tin">
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="dark-background">
				<div class="content margin-auto margin-sm">
					<div class="row">
						<div class="md-4 xs-12 text-center">
							<div>

								<div class="single">
									<font size="4">Kết nối với chúng tôi trên</font>
								</div>
								<ul class="social-icons">
									<li>
										<a class="" href=" "><i class="fa fa-inverse fa-facebook"></i></a>
									</li>
									<li>
										<a class="" href=" "><i class="fa fa-inverse fa-pinterest"></i></a>
									</li>
									<li>
										<a class="" href=" "><i class="fa fa-inverse fa-google-plus"></i></a>
									</li>
								</ul>
							</div>
							<hr>

							
						</div>
						<div class="md-3 xs-12 sm-6">
							<div class="md-10 xs-12 align-right">
								<div class="single">
									<font size="4">Hài lòng khách hàng</font>
								</div>

								<ul class="single content">
									<li>
										<a href="<?php echo Yii::app()->baseUrl ?>/">Về matcha</a>
									</li>
									<li>
										<a href="<?php echo Yii::app()->baseUrl ?>/">Về chúng tôi</a>
									</li>
									
								</ul>
							</div>

						</div>
						<div class="md-3 xs-12 sm-6">
							<div class="md-10 xs-12 align-right">
								<div class="single">
									<font size="4">Mua hàng</font>
								</div>

								<ul class="single content">
									<li>
										<a href="<?php echo Yii::app()->baseUrl ?>/"> Giỏ hàng của bạn </a>
									</li>								
									<li>
										<a href="<?php echo Yii::app()->baseUrl ?>/site/"> Liên hệ </a>
									</li>
								</ul>
							</div>

						</div>
						<div class="md-2 xs-12">
							<div class="md-11 xs-12 text-center">
								<div class="single">
									<font size="4">Giới thiệu bạn bè</font>
								</div>

								<div>
									Giới thiệu bạn bè, mọi người đều vui
								</div>
								<button class="button" type=""><a href="" title="">Chi tiết</a></button>
							</div>
						</div>
					</div>					
				</div>				
			</div>
		</div>
	</div>
</body>
</html>
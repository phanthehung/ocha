<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title><?php echo $this->pageTitle?></title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    <link href="<?php echo Yii::app()->controller->module->assetsUrl;?>/css/stylesheets.css" rel="stylesheet" type="text/css" />
    <script type='text/javascript' src='<?php echo Yii::app()->controller->module->assetsUrl;?>/js/plugins/jquery/jquery.mousewheel.min.js'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->controller->module->assetsUrl;?>/js/plugins/cookie/jquery.cookies.2.2.0.min.js'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->controller->module->assetsUrl;?>/js/plugins/bootstrap.min.js'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->controller->module->assetsUrl;?>/js/plugins/fullcalendar/fullcalendar.min.js'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->controller->module->assetsUrl;?>/js/plugins/select2/select2.min.js'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->controller->module->assetsUrl;?>/js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>

    <script type='text/javascript' src='<?php echo Yii::app()->controller->module->assetsUrl;?>/js/cookies.js'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->controller->module->assetsUrl;?>/js/actions.js'></script>

    <script type='text/javascript' src='<?php echo Yii::app()->controller->module->assetsUrl;?>/js/plugins.js'></script>
   
    <script type="text/javascript">
        function formatNumber (num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    };
    </script>
</head>
<body>
    <div class="header">
        <a class="logo" href="#"><span style="color: #FFF;">PHOTOCOPY</span></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <div class="menu">
        <div class="breadLine">
            <div class="arrow"></div>
            <div class="adminControl active">
                Xin chào, <?php echo isset(Yii::app()->user->fullname)?Yii::app()->user->fullname:''?>
            </div>
        </div>
        <div class="admin">
            <div class="image">
                <img src="<?php echo Yii::app()->controller->module->assetsUrl;?>/img/users/aqvatarius.jpg" class="img-polaroid"/>
            </div>
            <ul class="control">
                <li><span class="icon-cog"></span> <a href="<?php echo Yii::app()->baseUrl.'/site/account'?>">Tài khoản</a></li>
                <li><span class="icon-share-alt"></span> <a href="<?php echo Yii::app()->baseUrl.'/site/signout'?>">Đăng xuất</a></li>
            </ul>
            <div class="info">
                <span>Chào mừng bạn đã quay trở lại! Đăng nhập lần cuối vào lúc <?php echo isset(Yii::app()->user->visited)?date('d-m-Y H:i:s',Yii::app()->user->visited):'Chưa xác đính'?></span>
            </div>
        </div>        
        <ul class="navigation">
            <li class="<?php echo ($this->ID == 'site')?'active':''?>">
                <a href="<?php echo Yii::app()->baseUrl.'/admin/order'?>">
                    <span class="isw-grid"></span><span class="text">Dashboard</span>
                </a>
            </li>
            <li class="openable <?php echo ($this->ID == 'order')?'active':''?>">
                <a href="<?php echo Yii::app()->baseUrl.'/admin/order'?>">
                    <span class="isw-print"></span><span class="text">Đơn hàng</span>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl.'/admin/order/index/0' ?>">
                            <span class="icon-print"></span><span class="text">Đơn hàng mới</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl.'/admin/order/index/1' ?>">
                            <span class="icon-print"></span><span class="text">Đơn hàng đã giao </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl.'/admin/order/index/2' ?>">
                            <span class="icon-print"></span><span class="text">Đơn hàng đã hủy </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="openable <?php echo ($this->ID == 'order')?'active':''?>">
                <a href="<?php echo Yii::app()->baseUrl.'/admin/product'?>">
                    <span class="isw-print"></span><span class="text">Sản phẩm</span>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl.'/admin/product/index/id/1' ?>">
                            <span class="icon-print"></span><span class="text">Matcha</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl.'/admin/product/index/id/3' ?>">
                            <span class="icon-print"></span><span class="text">Dụng cụ pha trà</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo ($this->ID == 'customer')?'active':''?>">
                <a href="<?php echo Yii::app()->baseUrl.'/admin/customer'?>">
                    <span class="isw-print"></span><span class="text">Thành viên</span>
                </a>
            </li>
            <?php if (Rights::module()->superuserName==Yii::app()->user->getState('role')): ?>
                <li class="openable <?php echo ($this->ID == 'authItem')?'active':''?>">
                <a href="">
                    <span class="isw-print"></span><span class="text">Phân quyền</span>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl.'/rights/authItem/roles'?>">
                            <span class="icon-print"></span><span class="text">Vai trò</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl.'/rights/authItem/permissions'?>">
                            <span class="icon-print"></span><span class="text">Cấp quyền</span>
                        </a>
                    </li>
                </ul>
            </li>
            <?php endif ?>
            <li class="openable <?php echo ($this->ID == 'suggest')?'active':''?>">
                <a href="<?php echo Yii::app()->baseUrl.'/admin/suggest'?>">
                    <span class="isw-print"></span><span class="text">Feedback</span>
                </a>
                <ul>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl.'/admin/suggest/index/id/0'?>">
                            <span class="icon-print"></span><span class="text">Góp ý mới</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl.'/admin/suggest/index/id/1'?>">
                            <span class="icon-print"></span><span class="text">Đang xem xét </span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->baseUrl.'/admin/suggest/index/id/2'?>">
                            <span class="icon-print"></span><span class="text">Đã giải quyết </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo ($this->ID == 'news')?'active':''?>">
                <a href="<?php echo Yii::app()->baseUrl.'/admin/news'?>">
                    <span class="isw-print"></span><span class="text">Tin tức</span>
                </a>
            </li>
            <li class="<?php echo ($this->ID == 'image')?'active':''?>">
                <a href="<?php echo Yii::app()->baseUrl.'/admin/image'?>">
                    <span class="isw-print"></span><span class="text">Hình ảnh</span>
                </a>
            </li>

        </ul>
        <div class="dr"><span></span></div>
        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
        <div class="dr"><span></span></div>
    </div>
        
    <div class="content">
        <div class="breadLine">    
            <ul class="breadcrumb">
                <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,
						'homeLink' => '<a href="'.Yii::app()->baseUrl.'/admin">Trang chủ</a>',
                        'separator'=>'<span> > </span>',
                        'tagName'=>'li',
                    ));
                ?>
            </ul>
        </div>
        <div class="workplace">
            <?php echo $content;?>
 
            <div class="dr"><span></span></div>
        </div>
    </div>
</body>
</html>
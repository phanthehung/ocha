	<div class="content margin-auto login">       
		<hr>
		<div class="xs-12 margin-sm">
			<font size="6">Đăng nhập</font>
		</div>
        <hr>        
        <font class="xs-11 margin-auto margin-sm" size="4"><?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?></font>
        <div class="xs-11 margin-auto margin-lg" style="max-width:400px;display: block">
            <form action="<?php echo Yii::app()->baseUrl ?>/site/login" method="post" accept-charset="utf-8" class="xs-12">
                <div class="xs-12">
                    Username
                </div>
                <div class="xs-12">
                    <input class="xs-12" type="text" name="username" value="" required="required" placeholder="Địa chỉ email">
                </div>
                <div class="xs-12">
                    Password
                </div>
                <div class="xs-12">
                    <input class="xs-12" type="password" name="password" value="" required="required" placeholder="Mật khẩu">
                </div>
                <div class="xs-12">
                    <div class="xs-6">
                        <div class="xs-10 margin-auto text-center">
                        <input type="checkbox" name="rememberme" value="rememberme" placeholder=""> Nhớ mật khẩu</div>
                    </div>
                    <div class="xs-6">
                    <div class="xs-10 margin-auto text-center">
                        <a href="<?php echo Yii::app()->baseUrl ?>/site/forgotPassword" title="">Quên mật khẩu</a></div>
                    </div>
                </div>
                <div class="xs-12">
                    <div class="xs-6"><div class="xs-10 margin-auto text-center">
                        <button type="button" class="button xs-12"><a href="<?php echo Yii::app()->baseUrl ?>/site/signup" title="">Đăng ký</a></button>
                        </div>                         
                    </div>
                    <div class="xs-6"><div class="xs-10 margin-auto text-center">
                        <input type="submit" name="login" value="Đăng nhập" class="button xs-12"></div>
                    </div>
                </div>
            </form>
        	
        </div>
        
    </div>

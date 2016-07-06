	<div class="content margin-auto login">        
		<hr>
		<div class="xs-12 margin-sm">
			<font size="6">Đăng ký tài khoản</font>
		</div>
        <hr>        
        <div class="xs-11 margin-auto margin-lg" style="max-width:400px;display: block">
            <font size="4"><?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?></font>
            <form action="<?php echo Yii::app()->baseUrl ?>/site/changePassword" method="post" accept-charset="utf-8" class="xs-12">
                <div class="xs-12">
                    Mật khẩu cũ
                </div>
                <div class="xs-12">
                    <input class="xs-12" type="password" name="oldPassword" value="" required="required" placeholder="Mật khẩu cũ...">
                </div>
                <div class="xs-12">
                    Mật khẩu mới
                </div>
                <div class="xs-12">
                    <input class="xs-12" type="password" name="newPassword" value="" required="required" placeholder="Mật khẩu mới...">
                </div>
                <div class="xs-12">
                    Xác nhận mật khẩu mới
                </div>
                <div class="xs-12">
                    <input class="xs-12" type="password" name="confirm" value="" required="required" placeholder="Xác nhận...">
                </div>                
                <div class="xs-12 text-center">
                    <div class="xs-6"><div class="xs-10">
                        <input type="submit" name="signup" value="Đổi mật khẩu" class="button xs-12"></div>
                    </div>
                </div>
            </form>
        	
        </div>
        
    </div>

	<div class="content margin-auto login">       
		<hr> 
		<div class="xs-12 margin-sm">
			<font size="6">Đăng ký tài khoản</font>
		</div>
        <hr>        
        <div class="xs-11 margin-auto margin-lg" style="max-width:400px;display: block">
            <font size="4"><?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?></font>
            <form action="<?php echo Yii::app()->baseUrl ?>/site/update" method="post" accept-charset="utf-8" class="xs-12">
                <div class="xs-12">
                    Username
                </div>
                <div class="xs-12">
                    <input class="xs-12" type="text" name="username" value="<?php echo Yii::app()->user->username ?>" required="required" placeholder="Username...">
                </div>
                <div class="xs-12">
                    Email
                </div>
                <div class="xs-12">
                    <input class="xs-12" type="text" name="email" value="<?php echo Yii::app()->user->email ?>" placeholder="Email...">
                </div>
                <div class="xs-12">
                    Số điện thoại
                </div>
                <div class="xs-12">
                    <input class="xs-12" type="text" name="phone" value="<?php echo Yii::app()->user->phone ?>" placeholder="Số điện thoại...">
                </div> 
                <div class="xs-12">
                    Địa chỉ
                </div>
                <div class="xs-12">
                    <input class="xs-12" type="text" name="address" value="<?php echo Yii::app()->user->address ?>" placeholder="Địa chỉ...">
                </div>                
                <div class="xs-12 text-center">
                    <div class="xs-6"><div class="xs-10">
                        <input type="submit" name="signup" value="Cập nhật" class="button xs-12"></div>
                    </div>
                </div>
            </form>
        	
        </div>
        
    </div>

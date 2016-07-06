	<div class="content margin-auto login">        
		<hr>
		<div class="xs-12 margin-sm">
			<font size="6">Chi tiết tài khoản</font>
		</div>
        <hr>        
        <div class="xs-9 margin-auto margin-lg" style="display: block;font-size: 18px">
        	<style type="text/css"> 
        		tr{
        			border-bottom: solid black 1px;
        			 height: 50px
        		}
        		th {
				  padding-right: 10px 
				}
        	</style>
            <table  class="margin-auto" border-spaccing="">
            <tbody>
            	<tr>
            		<th width="20%" class="text-right"><b>Họ tên:</b></th>
            		<td class="text-center"><?php echo Yii::app()->user->username ?></td>

            	</tr>
            	<tr>
            		<th width="20%" class="text-right"><b>Email:</b></th>
            		<td class="text-center"><?php echo Yii::app()->user->email ?></td>
            	</tr>
            	<tr>
            		<th width="20%" class="text-right"><b>Số điện thoại:</b></th>
            		<td class="text-center"><?php echo Yii::app()->user->phone ?></td>
            	</tr>
            	<tr>
            		<th width="20%" class="text-right"><b>Địa chỉ:</b></th>
            		<td class="text-center"><?php echo Yii::app()->user->address ?></td>
            	</tr>
            	</tbody>
            </table>                
                <div class="xs-12 margin-md text-center">
                    <div class="xs-4">
                        <div style="max-width: 150px;" class="xs-11 margin-auto text-center">
                            <button type="button" class="button xs-12"><a href="<?php echo Yii::app()->baseUrl ?>/site/changePassword" title="">Đổi mật khẩu</a></button>
                        </div>                         
                    </div>
                    <div class="xs-4">
                        <div style="max-width: 150px;" class="xs-11 margin-auto text-center">
                            <button type="button" class="button xs-12"><a href="<?php echo Yii::app()->baseUrl ?>/site/update" title="">Sửa thông tin</a></button>
                        </div>
                    </div>
        	    </div>
        </div>
    </div>
    

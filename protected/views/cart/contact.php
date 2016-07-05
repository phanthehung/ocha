
<div class="row dark-background clearfix"> 
	<div class="sm-6 xs-12" style="background-color: white">
		<div class="xs-10 align-center margin-auto contact">
			<font style="font-family: 'Playfair Display', Georgia, serif;font-weight: 400;line-height: 1.4;" size="6">Vui lòng điền thông tin liên lạc</font>
			<font size="4"><?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?></font>
			<form  method="POST" action="<?php echo Yii::app()->baseUrl?>/cart/checkout/1" class="margin-md">
				<div>
					<div class="sm-4 xs-12">Họ tên * </div><div class="sm-8 xs-12"><input class="xs-11" required="required" type="text" name="user" value="<?php if (Yii::app()->user->checkAccess('account')) {
						echo Yii::app()->user->username;
					} ?>"></div>
				</div><br/>
				<div>
					<div class="sm-4 xs-12">Số điện thoại * </div><div class="sm-8 xs-12"><input class="xs-11" required="required" type="text" name="phone" pattern="^([a-zA-Z,#/ \.\(\)\-\+\*]*[0-9]){7}[0-9a-zA-Z,#/ \.\(\)\-\+\*]*$" value="<?php if (Yii::app()->user->checkAccess('account')) {
						echo Yii::app()->user->phone;
					} ?>"></div>
				</div><br/>
				<div>
					<div class="sm-4 xs-12">Email </div><div class="sm-8 xs-12"><input class="xs-11" type="text" name="email" pattern="[a-z0-9]+([-+._][a-z0-9]+){0,2}@.*?(\.(a(?:[cdefgilmnoqrstuwxz]|ero|(?:rp|si)a)|b(?:[abdefghijmnorstvwyz]iz)|c(?:[acdfghiklmnoruvxyz]|at|o(?:m|op))|d[ejkmoz]|e(?:[ceghrstu]|du)|f[ijkmor]|g(?:[abdefghilmnpqrstuwy]|ov)|h[kmnrtu]|i(?:[delmnoqrst]|n(?:fo|t))|j(?:[emop]|obs)|k[eghimnprwyz]|l[abcikrstuvy]|m(?:[acdeghklmnopqrstuvwxyz]|il|obi|useum)|n(?:[acefgilopruz]|ame|et)|o(?:m|rg)|p(?:[aefghklmnrstwy]|ro)|qa|r[eosuw]|s[abcdeghijklmnortuvyz]|t(?:[cdfghjklmnoprtvwz]|(?:rav)?el)|u[agkmsyz]|v[aceginu]|w[fs]|y[etu]|z[amw])\b){1,2}" value="<?php if (Yii::app()->user->checkAccess('account')) {
						echo Yii::app()->user->email;
					} ?>"></div>
				</div><br/>
				<div>
					<div class="sm-4 xs-12">Địa chỉ </div><div class="sm-8 xs-12"><input class="xs-11" type="text" name="address" value="<?php if (Yii::app()->user->checkAccess('account')) {
						echo Yii::app()->user->address;
					} ?>"></div>
				</div><br/>
				<div>
					<div class="sm-4 xs-12"> Hướng dẫn chi tiết </div><div class="sm-8 xs-12"><textarea class="xs-11" rows="8" type="text" name="note"></textarea></div>
				</div><br/>
				<div class="clear"></div>
				<div class="text-center margin-md">
					<input class="button" type="submit" value="Checkout">
				</div>
			</form>  
		</div>
	</div>
	<div class="sm-6 hidden-xs margin-sm">
		<div class="xs-11 align-center margin-auto ">
			<?php $total = 0; ?>
			<?php if (isset($cart)): ?>
				<?php foreach ($cart as $value): ?>
					<div class="xs-3">
						<img style="width:98%" src="<?php echo $value->proImg ?>">
					</div>
					<div class="xs-6" style="margin-left:5px">
						<font size="4"><a href="<?php echo Yii::app()->baseUrl ?>/site/detail/<?php echo $value->proId ?>"><?php echo $value->proTitle ?></a></font>
					</div>


					<div class="xs-3">
						<font size="4"><script type="text/javascript">
						            	document.write(formatNumber(<?php echo $value->proPrice*$value->quantity; ?>));
						            </script> VNĐ</font>
					</div>
					<?php $total += $value->proPrice*$value->quantity; ?> 
					<hr>
				<?php endforeach ?>
				<div class="clear"></div>
				<font style="float: right;width: 100%" class="text-center" size="6"> Total: <script type="text/javascript">
						            	document.write(formatNumber(<?php echo $total ?>));
						            </script> VNĐ</font>
			</div>
		<?php endif ?>
	</div>
</div>


 
<div class="content margin-auto">		
	<hr>
	<div class="md-7 margin-sm">
		<font size="6">Thông tin liên hệ</font>
	</div>
	<hr>
<center><font size="5"><?php if(Yii::app()->user->hasFlash('mss')){echo Yii::app()->user->getFlash('mss');}?></font></center>

<br/>
	<div class="row clearfix">
		<div class="md-4 xs-12 text-center divider-right">
			<div class="xs-11 align-center margin-auto text-center">
				<font size="5">Kết nối với chúng tôi trên</font>
				<ul class="social-icons">
					<li>
						<a class="" href=""><i class="fa fa-inverse fa-facebook"></i></a>
					</li>
					<li>
						<a class="" href=""><i class="fa fa-inverse fa-pinterest"></i></a>
					</li>
					<li>
						<a class="" href=""><i class="fa fa-inverse fa-google-plus"></i></a>

					</li>
				</ul>
				<hr>

				<div class="single text-center content">
					Thông tin liên hệ:<br/>
					Trung tâm đào tạo quốc tế ITEC, trường đại học KHTN-ĐHQG TP.HCM <br>
								Email: 1359024@itec.hcmus.edu.vn <br>

				</div>
			</div>
		</div>


		<div class="xs-12 md-8">

			<form action="<?php echo Yii::app()->baseUrl?>/site/suggest" method="post">

				<div class="xs-12 sm-6">
					<div class="xs-11 align-center margin-auto text-center">
						<div class="fourteen top-space auto-margin">
							<div>
								Họ tên: <br/><input name="name" type="text" class="single">
							</div>
							<div>
								Email: <br/><input pattern="[a-z0-9]+([-+._][a-z0-9]+){0,2}@.*?(\.(a(?:[cdefgilmnoqrstuwxz]|ero|(?:rp|si)a)|b(?:[abdefghijmnorstvwyz]iz)|c(?:[acdfghiklmnoruvxyz]|at|o(?:m|op))|d[ejkmoz]|e(?:[ceghrstu]|du)|f[ijkmor]|g(?:[abdefghilmnpqrstuwy]|ov)|h[kmnrtu]|i(?:[delmnoqrst]|n(?:fo|t))|j(?:[emop]|obs)|k[eghimnprwyz]|l[abcikrstuvy]|m(?:[acdeghklmnopqrstuvwxyz]|il|obi|useum)|n(?:[acefgilopruz]|ame|et)|o(?:m|rg)|p(?:[aefghklmnrstwy]|ro)|qa|r[eosuw]|s[abcdeghijklmnortuvyz]|t(?:[cdfghjklmnoprtvwz]|(?:rav)?el)|u[agkmsyz]|v[aceginu]|w[fs]|y[etu]|z[amw])\b){1,2}" name="email" required="required" type="text" class="single">
							</div>
							

						</div>
					</div>

				</div>
				<div class="xs-12 sm-6">
					<div class="xs-11 align-center margin-auto text-center">
						<div style="height:100%" class="fourteen top-space auto-margin">
							Nội dung:<br/>
							<textarea name="content" required="required" class="single" name="comment" rows="6" ... ></textarea>
						</div>
						<div class="text-center single top-space">
							<input class="eight button" type="submit" value="Gửi">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>





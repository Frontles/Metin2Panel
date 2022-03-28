<div id="content">
	<div id="box1">
		<div class="title1">
			<h1></h1>
		</div>
		<center>
			<div id="content_center">
				<div class="box-style1" style="margin-bottom:55px;">
					<br>
					<h2 class="title"></h2>
					<div class="entry">
						<div class="form">
							<form action="" autocomplete="off" method="post" class="ajax-form-json register-form">
								<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
								<table>
									<tbody>
										<center>
										<tr>
											<td>
												<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('email').'</small>', 'email', ['style'=>'width: 100%;']);?>
												<?php echo form_input('email', null, ['class'=>'', 'placeholder'=>'E-Posta Adresiniz', 'autocomplete'=>'off',  'autofocus']);?>
												<br><br>
											</td>
										</tr>

										<tr>
											<td>
												<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('social_id').'</small>', 'social_id', ['style'=>'width: 100%;']);?>
												<?php echo form_input('social_id', null, ['class'=>'', 'placeholder'=>'Yeni Karakter Silme Kodu', 'autocomplete'=>'off',  'autofocus']);?>
												<br><br>
											</td>
										</tr>


										<tr>
											<td>
												<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('social_idTekrar').'</small>', 'social_idTekrar', ['style'=>'width: 100%;']);?>
												<?php echo form_input('social_idTekrar', null, ['class'=>'', 'placeholder'=>'Yeni Karakter Silme Kodu Tekrar', 'autocomplete'=>'off',  'autofocus']);?>
												<br><br>
											</td>
										</tr>

										<tr>
											<td>
<button type="submit" class="btn btn-giris">Onayla</button>											</td>
										</tr>
										</center>
									</tbody>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</center>
	</div>
</div>
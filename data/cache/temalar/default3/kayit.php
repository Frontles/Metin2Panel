<div class="login-page">
<div class="form">
<br>
<h1>Kayıt Ol</h1>
<style>.content{background: url(/temalar/default3/images/ortaarka.png) center center no-repeat;}</style>
<center>
<h2>Güvenliğiniz için!</h2>
<h5>Bir çok üyemizin yaptığı hatalardan biri, hesabını oluştururken, başka serverlarda kullandığı ID ve şifreyi kullanmasıdır. Bu durumdan kaçının! Hesap güvenliğiniz bizler için önemli. Bilgilerinizi bu oyuna özgün yapın.</h5>
</center>

<div>

		<div class="contentSol">

		<div class="profil-table">
		<center>
		<table><tbody><tr><td>
			</div>
<!-- Ön bellek gösterimi burada sona ermektedir. --> 

									

					</div></div></div>
			</center>	<br>
						
							<form action="" autocomplete="off" method="post" class="ajax-form-json register-form" id="register">
								<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
								<table>
									<tbody>
										<center>
											<br><br><br>
				<?php if($this->config->item('kayit_durum') == true):?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Hesap Adı<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('login').'</small>', 'login', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-6">
								<?php echo form_input('login', null, ['class'=>'', 'placeholder'=>'Kullanıcı Adı', 'maxlength'=>'32','autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>

					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Şifreniz<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('password').'</small>', 'password', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-5">
					<div class="input-group"> 
														<?php echo form_password('password', null, ['class'=>'', 'placeholder'=>'Parola', 'autocomplete'=>'off',  'autofocus']);?>

					</div>
					</div>
					</div>								
				</div>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Tekrar Şifreniz<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('passwordTekrar').'</small>', 'passwordTekrar', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-6">
														<?php echo form_password('passwordTekrar', null, ['class'=>'', 'placeholder'=>'Parola Tekrarı', 'autocomplete'=>'off',  'autofocus']);?>

					</div>
				</div>
				<?php if($this->config->item('pin_durum') == TRUE):?>
								<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Pin Kodu</label>
					<div class="col-sm-6">
					<?php echo form_input($this->config->item('pin_kolon'), null, ['class'=>'', 'placeholder'=>'Pin Kodunuz ('.$this->config->item('pin_karakter_sayisi').' Karakter)', 'maxlength'=>''.$this->config->item('pin_karakter_sayisi').'', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>

					</div>
				</div>
<?php endif;?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Karakter Silme Kodu<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('social_id').'</small>', 'social_id', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-6">
														<?php echo form_input('social_id', null, ['class'=>'', 'placeholder'=>'Karakter Silme Kodu', 'maxlength'=>'7','autocomplete'=>'off',  'autofocus']);?>

					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Mail Adresiniz<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('email').'</small>', 'email', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-6">
								<?php echo form_input('email', null, ['class'=>'', 'placeholder'=>'E-Posta Adresi', 'autocomplete'=>'off',  'autofocus']);?>

					</div>
				</div>
					<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Telefon Numaranız<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('phone1').'</small>', 'phone1', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-6">
														<?php echo form_input('phone1', null, ['class'=>'', 'placeholder'=>'Telefon Numaranız', 'autocomplete'=>'off',  'autofocus']);?>

					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Gerçek Adınız<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('real_name').'</small>', 'real_name', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-6">
								<?php echo form_input('real_name', null, ['class'=>'', 'placeholder'=>'Ad Soyad', 'maxlength'=>'32','autocomplete'=>'off',  'autofocus']);?>

					</div>
				</div>
				<?php if($this->config->item('referans_durum') == TRUE): ?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Bizi Nereden Duydunuz ?<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('referanskutu').'</small>', 'referanskutu', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-6">
												<?php echo form_dropdown('referanskutu', [''=>'Bizi Nereden Duydunuz ?'] + $this->model->dropdown_referans_kategoriler('referanskutu','referanskutu',true), null, ['class'=>'', 'placeholder'=>'Bizi Nereden Duydunuz ?', 'autocomplete'=>'off',  'autofocus']);?>

					</div>
				</div>
				<?php endif; ?>
				<?php if($this->config->item('recaptcha_durum') == TRUE): ?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label"><?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('g-recaptcha-response').'</small>', 'g-recaptcha-response', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-6">
						<div class="g-recaptcha" data-sitekey="<?php echo html_entity_decode(htmlspecialchars_decode(@$this->config->item('recaptcha_sitekey'),ENT_QUOTES),ENT_QUOTES,'UTF-8');?>" style="-webkit-transform: scale(0.9);-webkit-transform-origin: 0 0;"></div>

					</div>
				</div>
				<?php endif; ?>
											<tr>
												<td>
											<div class="license">
										<?php echo form_checkbox('sozlesme', true, false, ['class'=>'form-check-input', 'id'=>'sozlesme'])?>
										<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('sozlesme').'</small>', 'sozlesme', ['style'=>'width: 100%;']);?>
											<a href="<?php echo base_url('sozlesme');?>" target="_blank">Oyuncu Sözleşmesi</a></strong> 'ni kabul ediyorum.
												</td>
											</tr>
											<tr>
												<td>
													<br><button type="submit" style=" width: 260px;font-weight: bold; font-size: 13px; padding: 12px 0px;">&emsp;&emsp;&emsp;&emsp;&emsp;KAYIT OL&emsp;&emsp;&emsp;&emsp;&emsp;<i class="read-more"></i></button></br>
												</td>
											</tr>
                <?php else:?>
				<div class="e_note">Oyunumuzun kayıtları henüz aktif değildir. Lütfen daha sonra deneyiniz.</div>
                <?php endif;?>
										</center>
									</tbody>
								</table>
			</form>
			
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</div>
</div>
			<br>
			<div class="panel-body"><center><h5>
			</td></tr></tbody></table>
			</center>
		</div>

	
	</div>

</div>
<div>
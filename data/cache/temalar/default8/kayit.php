<div>

<div>
		<div class="contentSol">

		<div class="profil-table">
		<center>
		<table><tbody><tr><td>
			<div class="panel-heading"><h1></h1>
			</div>
<!-- Ön bellek gösterimi burada sona ermektedir. --> 

									
<?php if($this->config->item('kayit_durum') == true):?>
					</div></div></div>
			</center>	<br>
			<form action="" method="post" id="register" class="ajax-form-json form-horizontal" autocomplete="off">

			<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Hesap Adı<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('login').'</small>', 'login', ['style'=>'width: 100%;']);?></label>
					<div class="col-sm-6">
					<?php echo form_input('login', null, ['class'=>'', 'placeholder'=>'Kullanıcı Adı', 'maxlength'=>'32','autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Şifreniz														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('password').'</small>', 'password', ['style'=>'width: 100%;']);?></label>
					<div class="col-sm-5">
					<div class="input-group"> 
					<?php echo form_password('password', null, ['class'=>'', 'placeholder'=>'Parola', 'autocomplete'=>'off',  'autofocus']);?>
					</div>
					</div>
					</div>								
				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Tekrar Şifreniz														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('passwordTekrar').'</small>', 'passwordTekrar', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-6">
														<?php echo form_password('passwordTekrar', null, ['class'=>'', 'placeholder'=>'Parola Tekrarı', 'autocomplete'=>'off',  'autofocus']);?>
					</div>
				</div>
				<?php if($this->config->item('pin_durum') == TRUE):?>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Pin Kodunuz<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error($this->config->item('pin_kolon')).'</small>', $this->config->item('pin_kolon'), ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-5">
					<div class="input-group"> 
					<?php echo form_input($this->config->item('pin_kolon'), null, ['class'=>'', 'placeholder'=>'Pin Kodunuz ('.$this->config->item('pin_karakter_sayisi').' Karakter)', 'maxlength'=>''.$this->config->item('pin_karakter_sayisi').'', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>
					</div>
					</div>
					<?php endif;?>
					</div>								
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Mail Adresiniz														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('email').'</small>', 'email', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-6">
														<?php echo form_input('email', null, ['class'=>'', 'placeholder'=>'E-Posta Adresi', 'autocomplete'=>'off',  'autofocus']);?>

					</div>
				</div>
				
								<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Cep Telefonu														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('phone1').'</small>', 'phone1', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-6">
						<?php echo form_input('phone1', null, ['class'=>'', 'placeholder'=>'Telefon Numaranız', 'autocomplete'=>'off',  'autofocus']);?>
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Gerçek Adınız														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('real_name').'</small>', 'real_name', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-6">
														<?php echo form_input('real_name', null, ['class'=>'', 'placeholder'=>'Ad Soyad', 'maxlength'=>'32','autocomplete'=>'off',  'autofocus']);?>

					</div>
				</div>
				<?php if($this->config->item('referans_durum') == TRUE): ?>
								<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Bizi Nerden Buldunuz												<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('referanskutu').'</small>', 'referanskutu', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-6">
					<?php echo form_dropdown('referanskutu', [''=>'Bizi Nereden Duydunuz ?'] + $this->model->dropdown_referans_kategoriler('referanskutu','referanskutu',true), null, ['class'=>'', 'placeholder'=>'Bizi Nereden Duydunuz ?', 'autocomplete'=>'off',  'autofocus']);?>
					
					</div>
				</div>
					<?php endif; ?>


				</div>
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Karakter Silme Kodu														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('social_id').'</small>', 'social_id', ['style'=>'width: 100%;']);?>
</label>
					<div class="col-sm-4">
														<?php echo form_input('social_id', null, ['class'=>'', 'placeholder'=>'Karakter Silme Kodu', 'maxlength'=>'7','autocomplete'=>'off',  'autofocus']);?>

					
					</div>
					<div class="col-sm-2">
					
					</div>
					
				</div>
				<div class="form-group">
											<?php if($this->config->item('recaptcha_durum') == TRUE): ?>
													<center>
														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('g-recaptcha-response').'</small>', 'g-recaptcha-response', ['style'=>'width: 100%;']);?>
														<div class="g-recaptcha" data-sitekey="<?php echo html_entity_decode(htmlspecialchars_decode(@$this->config->item('recaptcha_sitekey'),ENT_QUOTES),ENT_QUOTES,'UTF-8');?>" style="-webkit-transform: scale(0.9);-webkit-transform-origin: 0 0;"></div>
											</center>
											<?php endif; ?>
					
					<div class="col-sm-6">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-6 col-md-offset-3">
						<div class="checkbox">
							<label>
<input name="sozlesme" type="checkbox"> <a href="<?php echo base_url('sozlesme');?>" target="_new">Üyelik Sözleşmesi</a>'ni okudum ve kabul ediyorum
			<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('sozlesme').'</small>', 'sozlesme', ['style'=>'width: 100%;']);?>
</label>

						</div>
					</div>
				</div>
				
				<center>
<tr>
								<td>
						<center><br><button type="submit" class="btn btn-giris" style=" width: 260px;font-weight: bold; font-size: 13px; padding: 12px 0px;">&emsp;&emsp;&emsp;&emsp;&emsp;KAYIT OL&emsp;&emsp;&emsp;&emsp;&emsp;<i class="read-more"></i></button></br>
				</td>	</tr>
                <?php else:?>
				<div class="e_note">Oyunumuzun kayıtları henüz aktif değildir. Lütfen daha sonra deneyiniz.</div>
                <?php endif;?>
					</center>
				</div>
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
					<div class="panel panel-buyuk">
    <div class="panel-heading">Ücretsiz Kayıt Ol
    </div>
    <div class="panel-body">
	<div class="Info-Box" style="margin-bottom: 0px;">Lütfen kayıt olurken daha önce hiçbir serverda kullanmadığınız hesap adı ve parola kullanınız. Hesap ve karakter soyulmalarınızda kesinlikle hiçbir item ve hesap iadesi olmayacaktır.<br><b>Hesap ve karakter sorumluluğu tamamen kullanıcıya aittir.</b></div><div class="Warning-Box">Lütfen hesap adınız ve parolanızda türkçe karakterler kullanmayınız.<br>Aksi takdirde oyuna girişte sorun yaşayabilirsiniz.</div>		
		<?php if($this->config->item('kayit_durum') == true):?>
        <form id="KayitFormu" action="" method="post" class="ajax-form-json form-horizontal reg-form" id="register">
		<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
			<div class="form-group">
				<p for="inputEmail3" class="col-sm-3 control-label">Hesap Adı<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('login').'</small>', 'login', ['style'=>'width: 100%;']);?>
</p>
				<div class="col-sm-7">
					<?php echo form_input('login', null, ['class'=>'', 'placeholder'=>'Kullanıcı Adı', 'maxlength'=>'32','autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>
				</div>
			</div>
			<div class="form-group">
				<p for="inputEmail3" class="col-sm-3 control-label">Parola<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('password').'</small>', 'password', ['style'=>'width: 100%;']);?>
</p>
				<div class="col-sm-7">
														<?php echo form_password('password', null, ['class'=>'', 'placeholder'=>'Parola', 'autocomplete'=>'off',  'autofocus']);?>
				</div>
			</div>
			<div class="form-group">
				<p for="inputEmail3" class="col-sm-3 control-label">Tekrar Parola														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('passwordTekrar').'</small>', 'passwordTekrar', ['style'=>'width: 100%;']);?>
</p>
				<div class="col-sm-7">
														<?php echo form_password('passwordTekrar', null, ['class'=>'', 'placeholder'=>'Parola Tekrarı', 'autocomplete'=>'off',  'autofocus']);?>
				</div>
			</div>
			<?php if($this->config->item('pin_durum') == TRUE):?>
			<div class="form-group">
				<p for="inputEmail3" class="col-sm-3 control-label">Pin Kodu<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error($this->config->item('pin_kolon')).'</small>', $this->config->item('pin_kolon'), ['style'=>'width: 100%;']);?>
</p>
				<div class="col-sm-7">
														<?php echo form_input($this->config->item('pin_kolon'), null, ['class'=>'', 'placeholder'=>'Pin Kodunuz ('.$this->config->item('pin_karakter_sayisi').' Karakter)', 'maxlength'=>''.$this->config->item('pin_karakter_sayisi').'', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>
				</div>
			</div>
			<?php endif;?>
			<div class="form-group">
				<p for="inputEmail3" class="col-sm-3 control-label">Mail Adresiniz<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('email').'</small>', 'email', ['style'=>'width: 100%;']);?>
</p>
				<div class="col-sm-7">
					<?php echo form_input('email', null, ['class'=>'', 'placeholder'=>'E-Posta Adresi', 'autocomplete'=>'off',  'autofocus']);?>
				</div>
			</div>
			<div class="form-group">
				<p for="inputEmail3" class="col-sm-3 control-label">Telefon<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('phone1').'</small>', 'phone1', ['style'=>'width: 100%;']);?>
</p>
				<div class="col-sm-7">
				<?php echo form_input('phone1', null, ['class'=>'', 'placeholder'=>'Telefon Numaranız', 'autocomplete'=>'off',  'autofocus']);?>
				</div>
			</div>
			
			<div class="form-group">
				<p for="inputEmail3" class="col-sm-3 control-label">K. Silme Kodu<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('social_id').'</small>', 'social_id', ['style'=>'width: 100%;']);?>
</p>
				<div class="col-sm-7">
						<?php echo form_input('social_id', null, ['class'=>'', 'placeholder'=>'Karakter Silme Kodu', 'maxlength'=>'7','autocomplete'=>'off',  'autofocus']);?>
				</div>
			</div>
			<div class="form-group">
				<p for="inputEmail3" class="col-sm-3 control-label">Ad Soyad<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('real_name').'</small>', 'real_name', ['style'=>'width: 100%;']);?>

</p>
				<div class="col-sm-7">
				<?php echo form_input('real_name', null, ['class'=>'', 'placeholder'=>'Ad Soyad', 'maxlength'=>'32','autocomplete'=>'off',  'autofocus']);?>
				</div>
			</div>
			<?php if($this->config->item('referans_durum') == TRUE): ?>
			<div class="form-group">
				<p for="inputEmail3" class="col-sm-3 control-label">Bizi Nereden Duydunuz ?<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('referanskutu').'</small>', 'referanskutu', ['style'=>'width: 100%;']);?>


</p>
				<div class="col-sm-7">
			<?php echo form_dropdown('referanskutu', [''=>'Bizi Nereden Duydunuz ?'] + $this->model->dropdown_referans_kategoriler('referanskutu','referanskutu',true), null, ['class'=>'', 'placeholder'=>'Bizi Nereden Duydunuz ?', 'autocomplete'=>'off',  'autofocus']);?>
				</div>
			</div>
			<?php endif; ?>
											<?php if($this->config->item('recaptcha_durum') == TRUE): ?>
											<tr>
												<td>
													<div class="tooltip">
														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('g-recaptcha-response').'</small>', 'g-recaptcha-response', ['style'=>'width: 100%;']);?>
														<div class="g-recaptcha" data-sitekey="<?php echo html_entity_decode(htmlspecialchars_decode(@$this->config->item('recaptcha_sitekey'),ENT_QUOTES),ENT_QUOTES,'UTF-8');?>" style="-webkit-transform: scale(0.9);-webkit-transform-origin: 0 0;"></div>
													</div>
												</td>
											</tr>
											<?php endif; ?>
											<tr>
												<td>
											<div class="license">
										<?php echo form_checkbox('sozlesme', true, false, ['class'=>'form-check-input', 'id'=>'sozlesme'])?>
										<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('sozlesme').'</small>', 'sozlesme', ['style'=>'width: 100%;']);?>
											<center><label class="form-check-label" for="sozlesme"><a href="<?php echo base_url('sozlesme');?>" target="_blank">Oyuncu Sözleşmesi</a></strong> 'ni Okudum ve kabul ediyorum.</label></center>
												</td>
											</tr>
			<br>
				
			<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
					<button type="submit"
					class="btn btn-giris btn-block">Hesabı Oluştur</button>
					</div>
				</div>
		</form>		
                <?php else:?>
				<div class="e_note">Oyunumuzun kayıtları henüz aktif değildir. Lütfen daha sonra deneyiniz.</div>
                <?php endif;?>
    </div>
</div>					
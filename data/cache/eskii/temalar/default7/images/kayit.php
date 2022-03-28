<div id="content">
	<div id="box1">
		<div class="title1">
			<h1></h1>
		</div>
		<center>
			<div id="content_center">
				<div class="box-style1" style="margin-bottom:55px;">
					<h2 class="title"></h2>
					<div class="entry">
						<div class="form">
							<form action="" autocomplete="off" method="post" class="ajax-form-json register-form" id="register">
								<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
								<table>
									<tbody>
										<center>
											<br><br><br>
				<?php if($this->config->item('kayit_durum') == true):?>
											<tr>
												<td>
													<div class="tooltip">
														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('login').'</small>', 'login', ['style'=>'width: 100%;']);?>
														<?php echo form_input('login', null, ['class'=>'', 'placeholder'=>'Kullanıcı Adı', 'maxlength'=>'32','autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>
													</div>
													<br><br>
												<td>
											</tr>

											<tr>
												<td>
													<div class="tooltip">
														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('password').'</small>', 'password', ['style'=>'width: 100%;']);?>
														<?php echo form_password('password', null, ['class'=>'', 'placeholder'=>'Parola', 'autocomplete'=>'off',  'autofocus']);?>
													</div>
													<br><br>
												</td>
											</tr>

											<tr>
												<td>
													<div class="tooltip">
														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('passwordTekrar').'</small>', 'passwordTekrar', ['style'=>'width: 100%;']);?>
														<?php echo form_password('passwordTekrar', null, ['class'=>'', 'placeholder'=>'Parola Tekrarı', 'autocomplete'=>'off',  'autofocus']);?>
													</div>
													<br><br>
												</td>
											</tr>

											<?php if($this->config->item('pin_durum') == TRUE):?>
											<tr>
												<td>
													<div class="tooltip">
														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error($this->config->item('pin_kolon')).'</small>', $this->config->item('pin_kolon'), ['style'=>'width: 100%;']);?>
														<?php echo form_input($this->config->item('pin_kolon'), null, ['class'=>'', 'placeholder'=>'Pin Kodunuz ('.$this->config->item('pin_karakter_sayisi').' Karakter)', 'maxlength'=>''.$this->config->item('pin_karakter_sayisi').'', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>
													</div>
													<br><br>
												<td>
											</tr>
											<?php endif;?>

											<tr>
												<td>
													<div class="tooltip">
														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('social_id').'</small>', 'social_id', ['style'=>'width: 100%;']);?>
														<?php echo form_input('social_id', null, ['class'=>'', 'placeholder'=>'Karakter Silme Kodu', 'maxlength'=>'7','autocomplete'=>'off',  'autofocus']);?>
													</div>
													<br><br>
												</td>
											</tr>

											<tr>
												<td>
													<div class="tooltip">
														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('email').'</small>', 'email', ['style'=>'width: 100%;']);?>
														<?php echo form_input('email', null, ['class'=>'', 'placeholder'=>'E-Posta Adresi', 'autocomplete'=>'off',  'autofocus']);?>
													</div>
													<br><br>
												</td>
											</tr>

											<tr>
												<td>
													<div class="tooltip">
														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('phone1').'</small>', 'phone1', ['style'=>'width: 100%;']);?>
														<?php echo form_input('phone1', null, ['class'=>'', 'placeholder'=>'Telefon Numaranız', 'autocomplete'=>'off',  'autofocus']);?>
													</div>
													<br><br>
												</td>
											</tr>

											<tr>
												<td>
													<div class="tooltip">
														<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('real_name').'</small>', 'real_name', ['style'=>'width: 100%;']);?>
														<?php echo form_input('real_name', null, ['class'=>'', 'placeholder'=>'Ad Soyad', 'maxlength'=>'32','autocomplete'=>'off',  'autofocus']);?>
													</div>
													<br><br>
												</td>
											</tr>
										<?php if($this->config->item('referans_durum') == TRUE): ?>
										<tr>

											<td>
												<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('referanskutu').'</small>', 'referanskutu', ['style'=>'width: 100%;']);?>
												<?php echo form_dropdown('referanskutu', [''=>'Bizi Nereden Duydunuz ?'] + $this->model->dropdown_referans_kategoriler('referanskutu','referanskutu',true), null, ['class'=>'', 'placeholder'=>'Bizi Nereden Duydunuz ?', 'autocomplete'=>'off',  'autofocus']);?>
												<br><br>
											</td>
										</tr>
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
		</center>
	</div>
</div>
<div id="content">
	<div id="box1">
		<div class="title1">
			<h1></h1>
		</div>
		<center>
			<div id="content_center">
				<div class="box-style1" style="margin-bottom:55px;">
					<br>
					<?php if($this->config->item('pin_durum') == TRUE):?>
					<ul class="tabrow">
						<li class="selected">
							<a href="<?php echo base_url('pin_sifirla');?>">Pin Kodunu Sıfırla</a>
						</li>
					</ul>
					<?php endif;?>
					<h2 class="title"></h2>
					<div class="entry">
						<div class="form">
							<form action="" autocomplete="off" method="post" class="ajax-form-json register-form">
								<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
									<tbody>
										<center>
										<tr>
											<td>
												<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('login').'</small>', 'login', ['style'=>'width: 100%;']);?>
												<?php echo form_input('login', null, ['class'=>'', 'placeholder'=>'Kullanıcı Adı', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>
												<br><br>
											</td>
										</tr>
										<tr>
											<td>
												<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('email').'</small>', 'email', ['style'=>'width: 100%;']);?>
												<?php echo form_input('email', null, ['class'=>'', 'placeholder'=>'E-Posta Adresi', 'autocomplete'=>'off',  'autofocus']);?>
												<br><br>
											</td>
										</tr>
										<?php if($this->config->item('recaptcha_durum') == TRUE): ?>
										<tr>
											<td>
												<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('g-recaptcha-response').'</small>', 'g-recaptcha-response', ['style'=>'width: 100%;']);?>
												<div class="g-recaptcha" data-sitekey="<?php echo html_entity_decode(htmlspecialchars_decode(@$this->config->item('recaptcha_sitekey'),ENT_QUOTES),ENT_QUOTES,'UTF-8');?>" style="-webkit-transform: scale(0.9);-webkit-transform-origin: 0 0;"></div>
											</td>
										</tr>
										<?php endif; ?>

										<tr>
											<td>
												<br><button type="submit" style=" width: 260px; font-weight: bold; font-size: 13px; padding: 0px 0px;">&emsp;&emsp;&emsp;&emsp;&emsp;Parolamı Sıfırla&emsp;&emsp;&emsp;&emsp;<i class="read-more"></i></button></br>
											</td>
										</tr>
										</center>
									</tbody>
							</form>
						</div>
					</div>
				</div>
			</div>
		</center>
	</div>
</div>
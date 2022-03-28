				<div class="block-title title-b">
					<h3>GİRİŞ YAP</h3>
				</div>

				<form action="<?php echo base_url('giris');?>" autocomplete="off" method="post" class="ajax-form-json">
				<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

				<div class="reg-form">	
						<p>Hesap Adı</p>
								<?php echo form_input('login', null, ['class'=>'', 'placeholder'=>'Kullanıcı Adı', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>
						<p>Parola</p>
								<?php echo form_password('password', null, ['class'=>'', 'placeholder'=>'Parola', 'autocomplete'=>'off',  'autofocus']);?>
						<?php if($this->config->item('pin_durum') == TRUE):?>
						<p>Pin Kodu</p>
									<?php echo form_password($this->config->item('pin_kolon'), null, ['class'=>'', 'placeholder'=>'Pin Kodunuz ('.$this->config->item('pin_karakter_sayisi').' Karakter)', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>
						<?php endif;?>
						<?php if($this->config->item('recaptcha_durum') == TRUE): ?>
								<div class="g-recaptcha" data-sitekey="<?php echo html_entity_decode(htmlspecialchars_decode(@$this->config->item('recaptcha_sitekey'),ENT_QUOTES),ENT_QUOTES,'UTF-8');?>" style="-webkit-transform: scale(0.8);-webkit-transform-origin: 0 0;"></div>
							<?php endif; ?>
						<div class="license">
							<a href="<?php echo base_url('sifremi_unuttum');?>" class="forgot">Şifremi Unuttum</a><br>
							<?php if($this->config->item('pin_durum') == TRUE):?><a href="<?php echo base_url('pin_sifirla');?>" class="forgot">Pin Kodumu Unuttum</a><?php endif; ?>
							<button class="cont but" type="submit">Giriş</button>
						</div>
				</div>
				<div class="reg-buttons">
				</div>
				</form>
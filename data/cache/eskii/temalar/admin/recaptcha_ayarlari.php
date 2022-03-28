<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<form action="" method="post" class="ajax-form-json">
					<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
					<div class="card-body">
						<div class="invoice-head">
							<div class="row">
								<div class="iv-left col-12">
									<span>Recaptcha Ayarları</span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<?php echo form_label('Recaptcha Durumu<small class="text-danger float-right">'.form_error('recaptcha_durum').'</small>', 'recaptcha_durum', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('recaptcha_durum', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('recaptcha_durum'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Recaptcha Site Key<small class="text-danger float-right">'.form_error('recaptcha_sitekey').'</small>', 'recaptcha_sitekey', ['style'=>'width: 100%;']);?>
							<?php echo form_input('recaptcha_sitekey', $this->config->item('recaptcha_sitekey'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Recaptcha Secret Key<small class="text-danger float-right">'.form_error('recaptcha_secretkey').'</small>', 'recaptcha_secretkey', ['style'=>'width: 100%;']);?>
							<?php echo form_input('recaptcha_secretkey', $this->config->item('recaptcha_secretkey'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
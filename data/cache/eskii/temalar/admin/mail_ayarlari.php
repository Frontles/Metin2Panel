<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Mail Ayarları</span>
							</div>
						</div>
					</div>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Mail Başlığı<small class="text-danger float-right">'.form_error('mail_title').'</small>', 'mail_title', ['style'=>'width: 100%;']);?>
							<?php echo form_input('mail_title', html_entity_decode(htmlspecialchars_decode($this->config->item('mail_title'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Mail Host<small class="text-danger float-right">'.form_error('mail_host').'</small>', 'mail_host', ['style'=>'width: 100%;']);?>
							<?php echo form_input('mail_host', html_entity_decode(htmlspecialchars_decode($this->config->item('mail_host'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Mail Adresi<small class="text-danger float-right">'.form_error('mail_adresi').'</small>', 'mail_adresi', ['style'=>'width: 100%;']);?>
							<?php echo form_input('mail_adresi', html_entity_decode(htmlspecialchars_decode($this->config->item('mail_adresi'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Mail Şifresi<small class="text-danger float-right">'.form_error('mail_sifresi').'</small>', 'mail_sifresi', ['style'=>'width: 100%;']);?>
							<?php echo form_input('mail_sifresi', html_entity_decode(htmlspecialchars_decode($this->config->item('mail_sifresi'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Mail Port<small class="text-danger float-right">'.form_error('mail_port').'</small>', 'mail_port', ['style'=>'width: 100%;']);?>
							<?php echo form_input('mail_port', html_entity_decode(htmlspecialchars_decode($this->config->item('mail_port'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Mail Protokol<small class="text-danger float-right">'.form_error('mail_protokol').'</small>', 'mail_protokol', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('mail_protokol', ['ssl'=>'SSL','tls'=>'TLS'], $this->config->item('mail_protokol'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
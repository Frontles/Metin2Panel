<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>itemTR Ayarlar</span>
							</div>
						</div>
					</div>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Ödeme Yöntemi<small class="text-danger float-right">'.form_error('itemtr_odeme').'</small>', 'itemtr_odeme', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('itemtr_odeme', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('itemtr_odeme'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Dönüş URL<small class="text-danger float-right">'.form_error('donusURL').'</small>', 'donusURL', ['style'=>'width: 100%;']);?>
							<?php echo form_input('donusURL', base_url('itemtr'), ['class'=>'form-control', 'autocomplete'=>'off', 'disabled'=>'disabled'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('API KEY<small class="text-danger float-right">'.form_error('itemtr_api_key').'</small>', 'itemtr_api_key', ['style'=>'width: 100%;']);?>
							<?php echo form_input('itemtr_api_key', html_entity_decode(htmlspecialchars_decode(@$this->config->item('itemtr_api_key'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('SECRET KEY<small class="text-danger float-right">'.form_error('itemtr_secret_key').'</small>', 'itemtr_secret_key', ['style'=>'width: 100%;']);?>
							<?php echo form_input('itemtr_secret_key', html_entity_decode(htmlspecialchars_decode(@$this->config->item('itemtr_secret_key'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>						
						 
						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
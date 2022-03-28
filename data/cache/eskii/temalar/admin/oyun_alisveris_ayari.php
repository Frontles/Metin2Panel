<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Oyun Alışveriş Ayarı</span>
							</div>
						</div>
					</div>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Durum<small class="text-danger float-right">'.form_error('oyunalisveris_durum').'</small>', 'oyunalisveris_durum', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('oyunalisveris_durum', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('oyunalisveris_durum'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('E-Pin Link<small class="text-danger float-right">'.form_error('oyunalisveris_link').'</small>', 'oyunalisveris_link', ['style'=>'width: 100%;']);?>
							<?php echo form_input('oyunalisveris_link', html_entity_decode(htmlspecialchars_decode(@$this->config->item('oyunalisveris_link'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
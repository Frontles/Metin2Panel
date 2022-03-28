<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Bakım Sistemi</span>
							</div>
						</div>
					</div>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Bakım Teması<small class="text-danger float-right">'.form_error('bakim_tema').'</small>', 'bakim_tema', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('bakim_tema', ["bakim1" => "Tema-1", "bakim2"=>'Tema-2'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('efekt_tekrar'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>
						<div class="form-group">
							<?php echo form_label('Bakım sistemi durumu<small class="text-danger float-right">'.form_error('bakim_durumu').'</small>', 'bakim_durumu', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('bakim_durumu', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('bakim_durumu'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>					
						 
						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
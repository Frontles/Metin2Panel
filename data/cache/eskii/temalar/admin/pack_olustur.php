<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Pack Oluştur</span>
							</div>
						</div>
					</div>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Paket Adı<small class="text-danger float-right">'.form_error('baslik').'</small>', 'baslik', ['style'=>'width: 100%;']);?>
							<?php echo form_input('baslik', null, ['class'=>'form-control', 'autocomplete'=>'off']);?>
						</div>

						<div class="form-group">
							<?php echo form_label('Paket Boyutu<small class="text-danger float-right">'.form_error('boyut').'</small>', 'boyut', ['style'=>'width: 100%;']);?>
							<?php echo form_input('boyut', null, ['class'=>'form-control', 'autocomplete'=>'off']);?>
						</div>

						<div class="form-group">
							<?php echo form_label('Paket Linki<small class="text-danger float-right">'.form_error('link').'</small>', 'link', ['style'=>'width: 100%;']);?>
							<?php echo form_input('link', null, ['class'=>'form-control', 'autocomplete'=>'off']);?>
						</div>
						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
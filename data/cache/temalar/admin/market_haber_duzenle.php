<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Haber Düzenle</span>
							</div>
						</div>
					</div>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Resim Linki<small class="text-danger float-right">'.form_error('resim').'</small>', 'resim', ['style'=>'width: 100%;']);?>
							<?php echo form_input('resim', $row->resim, ['class'=>'form-control', 'autocomplete'=>'off']);?>
						</div>

						<div class="form-group">
							<?php echo form_label('Haber Başlık<small class="text-danger float-right">'.form_error('baslik').'</small>', 'baslik', ['style'=>'width: 100%;']);?>
							<?php echo form_input('baslik', $row->baslik, ['class'=>'form-control', 'autocomplete'=>'off']);?>
						</div>

						<div class="form-group">
							<?php echo form_label('Haber Metni<small class="text-danger float-right">'.form_error('metin').'</small>', 'metin', ['style'=>'width: 100%;']);?>
							<?php echo form_input('metin', $row->metin, ['class'=>'form-control', 'autocomplete'=>'off']);?>
						</div>
						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Haber Oluştur</span>
							</div>
						</div>
					</div>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Başlık<small class="text-danger float-right">'.form_error('baslik').'</small>', 'baslik', ['style'=>'width: 100%;']);?>
							<?php echo form_input('baslik', null, ['class'=>'form-control', 'autocomplete'=>'off']);?>
						</div>

						<div class="form-group">
							<?php echo form_label('Resim URL<small class="text-danger float-right">'.form_error('resim').'</small>', 'resim', ['style'=>'width: 100%;']);?>
							<?php echo form_input('resim', null, ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'http://']);?>
						</div>

						<div class="form-group">
							<?php echo form_label('Kısa İçerik (Description)<small class="text-danger float-right">'.form_error('metaDesc').'</small>', 'metaDesc', ['style'=>'width: 100%;']);?>
							<?php echo form_textarea(['name'=>'metaDesc', 'value'=>null, 'class'=>'form-control', 'cols'=>'40', 'rows'=>'3', 'autocomplete'=>'off']);?>
						</div>

						<div class="form-group">
							<?php echo form_label('İçerik <small class="text-danger float-right">'.form_error('icerik').'</small>', 'icerik', ['style'=>'width: 100%;']);?>
							<?php echo form_textarea(['name'=>'icerik', 'value'=>null, 'class'=>'form-control mail-taslak-ck', 'cols'=>'40', 'rows'=>'7', 'autocomplete'=>'off']);?>
						</div>
						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
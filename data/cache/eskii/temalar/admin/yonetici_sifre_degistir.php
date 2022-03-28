<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Yönetici Şifre Değiştir</span>
							</div>
						</div>
					</div>
					<form action="" autocomplete="off" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

					   <div class="form-group">
							<?php echo form_label('İsim', 'İsim', ['style'=>'width: 100%;']);?>
							<?php echo form_input('isim', $row->isim, ['class'=>'form-control', 'autocomplete'=>'off', 'disabled'=>'disabled'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Şifre<small class="text-danger float-right">'.form_error('sifre').'</small>', 'sifre', ['style'=>'width: 100%;']);?>
							<?php echo form_input('sifre', null, ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Şifre Tekrarı<small class="text-danger float-right">'.form_error('sifreTekrar').'</small>', 'sifreTekrar', ['style'=>'width: 100%;']);?>
							<?php echo form_input('sifreTekrar', null, ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
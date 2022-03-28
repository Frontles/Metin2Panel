<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Yönetici Ekle</span>
							</div>
						</div>
					</div>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('İsim<small class="text-danger float-right">'.form_error('isim').'</small>', 'isim', ['style'=>'width: 100%;']);?>
							<?php echo form_input('isim', set_value('isim'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Eposta<small class="text-danger float-right">'.form_error('eposta').'</small>', 'eposta', ['style'=>'width: 100%;']);?>
							<?php echo form_input('eposta', set_value('eposta'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Şifre<small class="text-danger float-right">'.form_error('sifre').'</small>', 'sifre', ['style'=>'width: 100%;']);?>
							<?php echo form_input('sifre', null, ['class'=>'form-control', 'autocomplete'=>'new-password'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Yetki<small class="text-danger float-right">'.form_error('yetki').'</small>', 'yetki', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('yetki', [1=>'Yönetici', 2=>'Talep Ekibi' , 3=>'Ban ve Talep Ekibi'], 1, ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
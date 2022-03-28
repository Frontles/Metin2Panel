<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Mail Düzenle</span>
							</div>
						</div>
					</div>

					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
						
						<div class="form-group">
							<?php echo form_label('KEY<small class="text-danger float-right">'.form_error('key').'</small>', 'key', ['style'=>'width: 100%;']);?>
							<?php echo form_input('key', isset($row->key)?$row->key:null, ['class'=>'form-control', 'autocomplete'=>'off', 'disabled'=>'disabled'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Tema<small class="text-danger float-right">'.form_error('tema').'</small>', 'tema', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('tema', array(''=>'- Tema Seçiniz -') + $temalar, isset($row->tema)?$row->tema:null, ['class'=>'form-control']);?>
						</div>

						<div class="form-group">
							<?php echo form_label('Konu<small class="text-danger float-right">'.form_error('konu').'</small>', 'konu', ['style'=>'width: 100%;']);?>
							<?php echo form_input('konu', isset($row->konu)?$row->konu:null, ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Şablon<small class="text-danger float-right">'.form_error('sablon').'</small>', 'sablon', ['style'=>'width: 100%;']);?>
							<?php echo form_textarea(['name'=>'sablon', 'value'=>isset($row->sablon)?$row->sablon:null, 'class'=>'form-control mail-taslak-ck', 'cols'=>'40', 'rows'=>'7', 'autocomplete'=>'off']);?>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
						<button data-href="/admin/modal_mail_onizleme/<?php echo $row->ESID;?>" class="btn btn-secondary float-right mail-onizleme" type="button">Önizleme</button>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
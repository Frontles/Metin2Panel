<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Pin Ayarları</span>
							</div>
						</div>
					</div>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Pin Durum<small class="text-danger float-right">'.form_error('pin_durum').'</small>', 'pin_durum', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('pin_durum', [1=>'Açık', 0=>'Kapalı'], $this->config->item('pin_durum'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Pin Kolon Adı<small class="text-danger float-right">'.form_error('pin_kolon').'</small>', 'pin_kolon', ['style'=>'width: 100%;']);?>
							<?php echo form_input('pin_kolon', html_entity_decode(htmlspecialchars_decode($this->config->item('pin_kolon'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Pin Karakter Sayısı<small class="text-danger float-right">'.form_error('pin_karakter_sayisi').'</small>', 'pin_karakter_sayisi', ['style'=>'width: 100%;']);?>
							<?php echo form_input('pin_karakter_sayisi', html_entity_decode(htmlspecialchars_decode($this->config->item('pin_karakter_sayisi'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Pin MD5 Şifreleme<small class="text-danger float-right">'.form_error('pin_md5').'</small>', 'pin_md5', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('pin_md5', [1=>'Açık', 0=>'Kapalı'], $this->config->item('pin_md5'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Etkinlik Oluştur</span>
							</div>
						</div>
					</div>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Etkinlik<small class="text-danger float-right">'.form_error('etkinlik').'</small>', 'etkinlik', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('etkinlik', $this->model->enum_degerleri('etkinlikler','etkinlik',true), null, ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Etkinlik Başlangıç Zamanı<small class="text-danger float-right">'.form_error('baslangicTarihi').'</small>', 'baslangicTarihi', ['style'=>'width: 100%;']);?>
							<input name="baslangicTarihi" class="form-control" type="datetime-local" value="<?php echo strftime('%Y-%m-%dT%H:%M:00', time());?>">
						</div>

						<div class="form-group">
							<?php echo form_label('Etkinlik Bitiş Zamanı<small class="text-danger float-right">'.form_error('bitisTarihi').'</small>', 'bitisTarihi', ['style'=>'width: 100%;']);?>
							<input name="bitisTarihi" class="form-control" type="datetime-local" value="">
						</div>
						<div class="form-group">
							<?php echo form_label('Tekrarlayan Etkinlik<small class="text-danger float-right">'.form_error('tekrarlan').'</small>', 'tekrarlan', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('tekrarlayan', [1=>'Açık', 0=>'Kapalı'], ($this->db->get('etkinlikler')->row('tekrarlayan')), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
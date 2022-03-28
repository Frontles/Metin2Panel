<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>ÜST(ANA) Kategori Ekle</span>
							</div>
						</div>
					</div>
					<form action="<?php echo base_url('admin/ana_kategori_ekle');?>" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Kategori İsmi<small class="text-danger float-right">'.form_error('isim').'</small>', 'isim', ['style'=>'width: 100%;']);?>
							<?php echo form_input('isim', set_value('isim'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Kategori Resim URL<small class="text-danger float-right">'.form_error('ikon').'</small>', 'ikon', ['style'=>'width: 100%;']);?>
							<?php echo form_input('ikon', set_value('ikon'), ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'http://'])?>
						</div>

						<div class="form-check">
                            <?php echo form_checkbox('yalniz', false, false, ['class'=>'form-check-input', 'id'=>'yalniz'])?>
                            <label class="form-check-label text-danger" for="yalniz">Oluşturacağınız bu kategorinin alt kategorisi <u>olmayacaksa</u> bu bölümü işaretleyiniz.</label>
                        </div>
                        <br>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>

		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>ALT Kategori Ekle</span>
							</div>
						</div>
					</div>
					<form action="<?php echo base_url('admin/alt_kategori_ekle');?>" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Üst Kategori<small class="text-danger float-right">'.form_error('KID').'</small>', 'KID', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('KID', $this->model->dropdown_ana_kategoriler(), set_value('KID'), ['class'=>'form-control'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Kategori İsmi<small class="text-danger float-right">'.form_error('isim').'</small>', 'isim', ['style'=>'width: 100%;']);?>
							<?php echo form_input('isim', set_value('isim'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>
                        <br>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
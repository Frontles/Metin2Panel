<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Site Ayarları</span>
							</div>
						</div>
					</div>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Site Başlığı (Title)<small class="text-danger float-right">'.form_error('site_title').'</small>', 'site_title', ['style'=>'width: 100%;']);?>
							<?php echo form_input('site_title', html_entity_decode(htmlspecialchars_decode($this->config->item('site_title'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Site Sloganı (Description)<small class="text-danger float-right">'.form_error('site_description').'</small>', 'site_description', ['style'=>'width: 100%;']);?>
							<?php echo form_input('site_description', html_entity_decode(htmlspecialchars_decode($this->config->item('site_description'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Site Head (Head TAG sonuna eklenir)<small class="text-danger float-right">'.form_error('site_head').'</small>', 'site_head', ['style'=>'width: 100%;']);?>
							<?php echo form_textarea(['name'=>'site_head', 'value'=>html_entity_decode(htmlspecialchars_decode($this->config->item('site_head'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), 'class'=>'form-control', 'cols'=>'40', 'rows'=>'7', 'autocomplete'=>'off']);?>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>

		<div class="col-6 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Admin LOGO Ayarı</span>
							</div>
						</div>
					</div>
					<form action="/admin/site_ayarlari_logo" method="post" enctype="multipart/form-data" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
						<div class="form-group">
							<?php echo form_label('Site Logosu (240x45px png veya jpg formatında olmalıdır.)<small class="text-danger float-right">'.form_error('logo').'</small>', 'logo', ['style'=>'width: 100%;']);?>
							<div class="row">
								<div class="col-7">
									<input name="logo" id="logo" onchange="" type="file" class="filestyle" data-input="false" data-badge="false" data-buttonName="btn btn-flat btn-secondary mb-3" data-buttontext="Logo Değiştir">
								</div>
								<div class="col-5">
									<img id="img-preview" src="<?php echo (is_file($this->config->item('logo'))) ? base_url($this->config->item('logo')) : '/temalar/admin/assets/images/icon/logo.png';?>" class="img-fluid">
								</div>
							</div>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-6 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Panel LOGO Ayarı</span>
							</div>
						</div>
					</div>
					<form action="/admin/site_ayarlari_sitelogo" method="post" enctype="multipart/form-data" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
						<div class="form-group">
							<?php echo form_label('Site Logosu (png veya jpg formatında olmalıdır.) <br>Görsel boyutu minimum 463x325 boyutunda olmalıdır.<small class="text-danger float-right">'.form_error('sitelogo').'</small>', 'sitelogo', ['style'=>'width: 100%;']);?>
							<div class="row">
								<div class="col-7">
									<input name="sitelogo" id="sitelogo" onchange="" type="file" class="filestyle" data-input="false" data-badge="false" data-buttonName="btn btn-flat btn-secondary mb-3" data-buttontext="Logo Değiştir">
								</div>
								<div class="col-5">
									<img width="70%" src="<?php echo (is_file($this->config->item('sitelogo'))) ? base_url($this->config->item('sitelogo')) : '/temalar/admin/assets/images/icon/sitelogo.png';?>" class="img-fluid">
								</div>
							</div>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
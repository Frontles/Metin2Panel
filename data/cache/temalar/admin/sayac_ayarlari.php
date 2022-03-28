<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<form action="" method="post" class="ajax-form-json">
					<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
					<div class="card-body">
						<div class="invoice-head">
							<div class="row">
								<div class="iv-left col-12">
									<span>Online Sayacı</span>
								</div>
							</div>
						</div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mt-5">
						<div class="form-group">
							<?php echo form_label('Online Sayaç Durumu<small class="text-danger float-right">'.form_error('online_sayac_durumu').'</small>', 'online_sayac_durumu', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('online_sayac_durumu', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('online_sayac_durumu'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Şaşırtma<small class="text-danger float-right">'.form_error('online_sayac_sasirtma').'</small>', 'online_sayac_sasirtma', ['style'=>'width: 100%;']);?>
							<?php echo form_input('online_sayac_sasirtma', $this->config->item('online_sayac_sasirtma'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div></div>
<div class="col-lg-3 col-md-6 mt-5">
						<div class="form-group">
							<?php echo form_label('Toplam Hesap Durumu<small class="text-danger float-right">'.form_error('hesapsaydir_sayac_durumu').'</small>', 'hesapsaydir_sayac_durumu', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('hesapsaydir_sayac_durumu', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('hesapsaydir_sayac_durumu'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Şaşırtma<small class="text-danger float-right">'.form_error('hesapsaydir_sasirtma').'</small>', 'hesapsaydir_sasirtma', ['style'=>'width: 100%;']);?>
							<?php echo form_input('hesapsaydir_sasirtma', $this->config->item('hesapsaydir_sasirtma'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div></div>
<div class="col-lg-3 col-md-6 mt-5">
						<div class="form-group">
							<?php echo form_label('Günlük Giriş Durumu<small class="text-danger float-right">'.form_error('gunlukgiris_sayac_durumu').'</small>', 'gunlukgiris_sayac_durumu', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('gunlukgiris_sayac_durumu', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('gunlukgiris_sayac_durumu'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Şaşırtma<small class="text-danger float-right">'.form_error('gunlukgiris_sasirtma').'</small>', 'gunlukgiris_sasirtma', ['style'=>'width: 100%;']);?>
							<?php echo form_input('gunlukgiris_sasirtma', $this->config->item('gunlukgiris_sasirtma'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div></div>
<div class="col-lg-3 col-md-6 mt-5">
						<div class="form-group">
							<?php echo form_label('Toplam Lonca Durumu<small class="text-danger float-right">'.form_error('toplamlonca_sayac_durumu').'</small>', 'toplamlonca_sayac_durumu', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('toplamlonca_sayac_durumu', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('toplamlonca_sayac_durumu'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Şaşırtma<small class="text-danger float-right">'.form_error('toplamlonca_sasirtma').'</small>', 'toplamlonca_sasirtma', ['style'=>'width: 100%;']);?>
							<?php echo form_input('toplamlonca_sasirtma', $this->config->item('toplamlonca_sasirtma'), ['class'=>'form-control', 'toplamlonca_sasirtma'=>'off'])?>
						</div></div>
<div class="col-lg-3 col-md-6 mt-5"></div>
<div class="col-lg-5 col-md-4 mt-5">
						<button class="btn btn-flat btn-success btn-lg btn-block" type="submit">Kaydet</button>
					</div></div>
				</form>
			</div>
		</div>
	</div>
</div>
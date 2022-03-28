<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-6">
								<span>Market Ayarları</span>
							</div>
							<div class="iv-right col-6 text-md-right">
                                <span><a href="happy_hour_ayari" class="btn btn-outline-success mb-3">Happy Hour Başlat</a></span>
                            </div>
						</div>
					</div>
					Anlık olarak marketi açıp kapatan sistemdir. Kullanıcı satın alma ekranında olsa dahi market sistemini anlık olarak kapatır.<br><br>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Market Durumu<small class="text-danger float-right">'.form_error('market_durum').'</small>', 'market_durum', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('market_durum', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('market_durum'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
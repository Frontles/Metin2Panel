<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>HappyHour Ayarı</span>
							</div>
						</div>
					</div>
					Tüm EP Satışlarınızda kullanıcılara giden EP Miktarınızı belirttiğiniz % Oranında arttırır. Örn : 20 yazdığınızda Kullanıcıya 50 EP yüklenecek ise %20 daha fazlası : 60 EP aktarılacaktır. <b>Tüm ödeme yöntemleri için geçerlidir.</b> <br><br>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Durum<small class="text-danger float-right">'.form_error('happyhour_durum').'</small>', 'happyhour_durum', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('happyhour_durum', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('happyhour_durum'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Kampanya Oranı<small class="text-danger float-right">'.form_error('happyhour_oran').'</small>', 'happyhour_oran', ['style'=>'width: 100%;']);?>
							<?php echo form_input('happyhour_oran', html_entity_decode(htmlspecialchars_decode(@$this->config->item('happyhour_oran'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
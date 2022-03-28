<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Link Ayarları</span>
							</div>
						</div>
					</div>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
						
						<div class="form-group">

							<?php echo form_label('Anasayfa Linkiniz<small class="text-danger float-right">'.form_error('donusURL').'</small>', 'donusURL', ['style'=>'width: 100%;']);?>
							<?php echo form_input('donusURL', base_url('site'), ['class'=>'form-control', 'autocomplete'=>'off', 'disabled'=>'disabled'])?><br>
							
							<?php echo form_label('Anasayfa Linki<small class="text-danger float-right">'.form_error('anasayfa').'</small>', 'anasayfa', ['style'=>'width: 100%;']);?>
							<?php echo form_input('anasayfa', $this->config->item('anasayfa'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Kayıt Linki<small class="text-danger float-right">'.form_error('kayit').'</small>', 'kayit', ['style'=>'width: 100%;']);?>
							<?php echo form_input('kayit', $this->config->item('kayit'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('İndirme Linki<small class="text-danger float-right">'.form_error('indir').'</small>', 'indir', ['style'=>'width: 100%;']);?>
							<?php echo form_input('indir', $this->config->item('indir'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>
<br>---------------------->
						<div class="form-group">
							<?php echo form_label('Arkaplan Değişimi Aktif <small class="text-danger float-right">'.form_error('arkaplandegisim').'</small>', 'arkaplandegisim', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('arkaplandegisim', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('arkaplandegisim'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>					
						<div class="form-group">
							<?php echo form_label('Arkaplan Resim Linki<small class="text-danger float-right">'.form_error('arkaplan').'</small>', 'arkaplan', ['style'=>'width: 100%;']);?>
							<?php echo form_input('arkaplan', $this->config->item('arkaplan'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>
<br>---------------------->
						<div class="form-group">
							<?php echo form_label('Efsunlar Sabit Mi?<small class="text-danger float-right">'.form_error('sabit').'</small>', 'sabit', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('sabit', [1=>'Evet', 0=>'Hayır'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('sabit'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>					
						
						<div class="form-group">
							<?php echo form_label('Duyuru Başlık<small class="text-danger float-right">'.form_error('acilis').'</small>', 'acilis', ['style'=>'width: 100%;']);?>
							<?php echo form_input('acilis', $this->config->item('acilis'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>
						<div class="form-group">
							<?php echo form_label('Duyuru Açıklama <small class="text-danger float-right">'.form_error('altacilis').'</small>', 'altacilis', ['style'=>'width: 100%;']);?>
							<?php echo form_input('altacilis', $this->config->item('altacilis'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>
						<div class="form-group">
							<?php echo form_label('Dönüşüm Durumu Aktif <small class="text-danger float-right">'.form_error('donusumdurum').'</small>', 'donusumdurum', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('donusumdurum', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('donusumdurum'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>					
						<div class="form-group">
							<?php echo form_label('Boss Detayları Aktif <small class="text-danger float-right">'.form_error('bossdurum').'</small>', 'bossdurum', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('bossdurum', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('bossdurum'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>					
						<br>---------------------->
						<div class="form-group">
							<?php echo form_label('Tanıtım Videosu <small class="text-danger float-right">'.form_error('videodurum').'</small>', 'videodurum', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('videodurum', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('videodurum'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>					
						
						<div class="form-group">
							<?php echo form_label('Video Embed Url <small class="text-danger float-right">'.form_error('videolink').'</small>', 'videolink', ['style'=>'width: 100%;']);?>
							<?php echo form_input('videolink', $this->config->item('videolink'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>
						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
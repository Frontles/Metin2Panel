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
							<?php echo form_label('Tanıtım Linki<small class="text-danger float-right">'.form_error('link_tanitim').'</small>', 'link_tanitim', ['style'=>'width: 100%;']);?>
							<?php echo form_input('link_tanitim', $this->config->item('link_tanitim'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Forum Linki<small class="text-danger float-right">'.form_error('link_forum').'</small>', 'link_forum', ['style'=>'width: 100%;']);?>
							<?php echo form_input('link_forum', $this->config->item('link_forum'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Facebook Linki<small class="text-danger float-right">'.form_error('link_facebook').'</small>', 'link_facebook', ['style'=>'width: 100%;']);?>
							<?php echo form_input('link_facebook', $this->config->item('link_facebook'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Twitter Linki<small class="text-danger float-right">'.form_error('link_twitter').'</small>', 'link_twitter', ['style'=>'width: 100%;']);?>
							<?php echo form_input('link_twitter', $this->config->item('link_twitter'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Youtube Linki<small class="text-danger float-right">'.form_error('link_youtube').'</small>', 'link_youtube', ['style'=>'width: 100%;']);?>
							<?php echo form_input('link_youtube', $this->config->item('link_youtube'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Instagram Linki<small class="text-danger float-right">'.form_error('link_instagram').'</small>', 'link_instagram', ['style'=>'width: 100%;']);?>
							<?php echo form_input('link_instagram', $this->config->item('link_instagram'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>
						<div class="form-group">
							<?php echo form_label('Çevrimdışı Pazar Tablosu<small class="text-danger float-right">'.form_error('oyunDB_cevrimdisi_pazar_table').'</small>', 'oyunDB_cevrimdisi_pazar_table', ['style'=>'width: 100%;']);?>
							<?php echo form_input('oyunDB_cevrimdisi_pazar_table', html_entity_decode(htmlspecialchars_decode(@$this->config->item('oyunDB_cevrimdisi_pazar_table'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>						

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
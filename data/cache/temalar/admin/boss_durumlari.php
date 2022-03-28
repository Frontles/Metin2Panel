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
									<span>Boss Aç/Kapat</span>
								</div>
							</div>
						</div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mt-5">
						<div class="form-group">
							<?php echo form_label('Azrail<small class="text-danger float-right">'.form_error('azrail').'</small>', 'azrail', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('azrail', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('azrail'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Catacomb<small class="text-danger float-right">'.form_error('catacomb').'</small>', 'catacomb', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('catacomb', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('catacomb'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div></div>
<div class="col-lg-3 col-md-6 mt-5">
						<div class="form-group">
							<?php echo form_label('Hidra<small class="text-danger float-right">'.form_error('hidra').'</small>', 'hidra', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('hidra', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('hidra'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Örümcek Barones<small class="text-danger float-right">'.form_error('barones').'</small>', 'barones', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('barones', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('barones'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div></div>
<div class="col-lg-3 col-md-6 mt-5">
						<div class="form-group">
							<?php echo form_label('Beran Setaou<small class="text-danger float-right">'.form_error('maviejder').'</small>', 'maviejder', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('maviejder', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('maviejder'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Meley<small class="text-danger float-right">'.form_error('meley').'</small>', 'meley', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('meley', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('meley'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div></div>
<div class="col-lg-3 col-md-6 mt-5">
						<div class="form-group">
							<?php echo form_label('Nemere<small class="text-danger float-right">'.form_error('nemere').'</small>', 'nemere', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('nemere', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('nemere'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Razador<small class="text-danger float-right">'.form_error('razador').'</small>', 'razador', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('razador', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('razador'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
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
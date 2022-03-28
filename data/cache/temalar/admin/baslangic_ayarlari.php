<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Başlangıç Ayarları</span>
							</div>
						</div>
					</div>
					<form action="<?php echo current_url();?>" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Resim Linki<small class="text-danger float-right">'.form_error('resim').'</small>', 'resim', ['style'=>'width: 100%;']);?>
							<?php echo form_input('resim', set_value('resim',$row->resim), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('1.Metin<small class="text-danger float-right">'.form_error('seviye').'</small>', 'seviye', ['style'=>'width: 100%;']);?>
							<?php echo form_input('seviye', set_value('seviye',$row->seviye), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('2.Metin<small class="text-danger float-right">'.form_error('metin1').'</small>', 'metin1', ['style'=>'width: 100%;']);?>
							<?php echo form_input('metin1', set_value('metin1',$row->metin1), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('3.Metin<small class="text-danger float-right">'.form_error('metin2').'</small>', 'metin2', ['style'=>'width: 100%;']);?>
							<?php echo form_input('metin2', set_value('metin2',$row->metin2), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('4.Metin<small class="text-danger float-right">'.form_error('metin3').'</small>', 'metin3', ['style'=>'width: 100%;']);?>
							<?php echo form_input('metin3', set_value('metin3',$row->metin3), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('5.Metin<small class="text-danger float-right">'.form_error('metin4').'</small>', 'metin4', ['style'=>'width: 100%;']);?>
							<?php echo form_input('metin4', set_value('metin4',$row->metin4), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('6.Metin<small class="text-danger float-right">'.form_error('metin5').'</small>', 'metin5', ['style'=>'width: 100%;']);?>
							<?php echo form_input('metin5', set_value('metin5',$row->metin5), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Efsunlar Sabitmi<small class="text-danger float-right">'.form_error('sabit').'</small>', 'sabit', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('sabit', [1=>'Evet', 0=>'Hayır'], ($this->db->get('tanitim_baslangic')->row('sabit')), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>
						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
<style type="text/css">
	table.dataTable thead .sorting_asc:after,
	table.dataTable thead .sorting_asc:before,
	table.dataTable thead .sorting_desc:after,
	table.dataTable thead .sorting_desc:before {
		content: "";
	}
</style>

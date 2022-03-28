<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Tanıtım Ekleme</span>
							</div>
						</div>
					</div>
					<form action="<?php echo current_url();?>" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Resim Linki<small class="text-danger float-right">'.form_error('resim').'</small>', 'resim', ['style'=>'width: 100%;']);?>
							<?php echo form_input('resim', set_value('resim',$row->resim), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>					
						<div class="form-group">
							<?php echo form_label('Başlık<small class="text-danger float-right">'.form_error('baslik').'</small>', 'baslik', ['style'=>'width: 100%;']);?>
							<?php echo form_input('baslik', set_value('baslik',$row->baslik), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>					
						<div class="form-group">
							<?php echo form_label('Madde 1<small class="text-danger float-right">'.form_error('madde1').'</small>', 'madde1', ['style'=>'width: 100%;']);?>
							<?php echo form_input('madde1', set_value('madde1',$row->madde1), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>					
						<div class="form-group">
							<?php echo form_label('Madde 2<small class="text-danger float-right">'.form_error('madde2').'</small>', 'madde2', ['style'=>'width: 100%;']);?>
							<?php echo form_input('madde2', set_value('madde2',$row->madde2), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Madde 3<small class="text-danger float-right">'.form_error('madde3').'</small>', 'madde3', ['style'=>'width: 100%;']);?>
							<?php echo form_input('madde3', set_value('madde3',$row->madde3), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Madde 4<small class="text-danger float-right">'.form_error('madde4').'</small>', 'madde4', ['style'=>'width: 100%;']);?>
							<?php echo form_input('madde4', set_value('madde4',$row->madde4), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Madde 5<small class="text-danger float-right">'.form_error('madde5').'</small>', 'madde5', ['style'=>'width: 100%;']);?>
							<?php echo form_input('madde5', set_value('madde5',$row->madde5), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
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

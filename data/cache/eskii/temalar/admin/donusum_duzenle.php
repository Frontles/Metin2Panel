<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Dönüşümleri Düzenleme</span>
							</div>
						</div>
					</div>
					<form action="<?php echo current_url();?>" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Donusum1 URL<small class="text-danger float-right">'.form_error('donusum1').'</small>', 'donusum1', ['style'=>'width: 100%;']);?>
							<?php echo form_input('donusum1', set_value('donusum1',$row->donusum1), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Donusum2 URL<small class="text-danger float-right">'.form_error('donusum2').'</small>', 'donusum2', ['style'=>'width: 100%;']);?>
							<?php echo form_input('donusum2', set_value('donusum2',$row->donusum2), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Donusum3 URL<small class="text-danger float-right">'.form_error('donusum3').'</small>', 'donusum3', ['style'=>'width: 100%;']);?>
							<?php echo form_input('donusum3', set_value('donusum3',$row->donusum3), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Donusum4 URL<small class="text-danger float-right">'.form_error('donusum4').'</small>', 'donusum4', ['style'=>'width: 100%;']);?>
							<?php echo form_input('donusum4', set_value('donusum4',$row->donusum4), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
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

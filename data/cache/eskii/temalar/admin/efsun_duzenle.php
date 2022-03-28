<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Efsun Düzenleme</span>
							</div>
						</div>
					</div>
					<form action="<?php echo current_url();?>" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Seviye1<small class="text-danger float-right">'.form_error('seviye1').'</small>', 'seviye1', ['style'=>'width: 100%;']);?>
							<?php echo form_input('seviye1', set_value('seviye1',$row->seviye1), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Seviye2<small class="text-danger float-right">'.form_error('seviye2').'</small>', 'seviye2', ['style'=>'width: 100%;']);?>
							<?php echo form_input('seviye2', set_value('seviye2',$row->seviye2), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Seviye3<small class="text-danger float-right">'.form_error('seviye3').'</small>', 'seviye3', ['style'=>'width: 100%;']);?>
							<?php echo form_input('seviye3', set_value('seviye3',$row->seviye3), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
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

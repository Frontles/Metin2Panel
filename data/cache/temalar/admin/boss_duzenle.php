<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Boss Düzenleme</span>
							</div>
						</div>
					</div>
					<form action="<?php echo current_url();?>" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Eşya1<small class="text-danger float-right">'.form_error('item1').'</small>', 'item1', ['style'=>'width: 100%;']);?>
							<?php echo form_input('item1', set_value('item1',$row->item1), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Eşya2<small class="text-danger float-right">'.form_error('item2').'</small>', 'item2', ['style'=>'width: 100%;']);?>
							<?php echo form_input('item2', set_value('item2',$row->item2), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Eşya3<small class="text-danger float-right">'.form_error('item3').'</small>', 'item3', ['style'=>'width: 100%;']);?>
							<?php echo form_input('item3', set_value('item3',$row->item3), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Eşya4<small class="text-danger float-right">'.form_error('item4').'</small>', 'item4', ['style'=>'width: 100%;']);?>
							<?php echo form_input('item4', set_value('item4',$row->item4), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Eşya5<small class="text-danger float-right">'.form_error('item5').'</small>', 'item5', ['style'=>'width: 100%;']);?>
							<?php echo form_input('item5', set_value('item5',$row->item5), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Eşya6<small class="text-danger float-right">'.form_error('item6').'</small>', 'item6', ['style'=>'width: 100%;']);?>
							<?php echo form_input('item6', set_value('item6',$row->item6), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
						<div class="form-group">
							<?php echo form_label('Eşya7<small class="text-danger float-right">'.form_error('item7').'</small>', 'item7', ['style'=>'width: 100%;']);?>
							<?php echo form_input('item7', set_value('item7',$row->item7), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
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

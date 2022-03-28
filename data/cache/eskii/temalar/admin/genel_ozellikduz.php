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
							<?php echo form_label('İçerik<small class="text-danger float-right">'.form_error('maddeler').'</small>', 'maddeler', ['style'=>'width: 100%;']);?>
							<?php echo form_input('maddeler', set_value('maddeler',$row->maddeler), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	
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

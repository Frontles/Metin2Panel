<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Biyolog Düzenle</span>
							</div>
						</div>
					</div>
					<form action="<?php echo current_url();?>" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
						<div class="row">
							<div class="col-md-3">
						<div class="form-group">
							<?php echo form_label('Ork Dişi<small class="text-danger float-right">'.form_error('orkdisi').'</small>', 'orkdisi', ['style'=>'width: 100%;']);?>
							<?php echo form_input('orkdisi', set_value('orkdisi',$row->orkdisi), ['class'=>'form-control', 'autocomplete'=>'off'])?></div></div>							
							<div class="col-md-3">
						<div class="form-group">
							<?php echo form_label('Lanet Kitabı<small class="text-danger float-right">'.form_error('lanetkitabi').'</small>', 'lanetkitabi', ['style'=>'width: 100%;']);?>
							<?php echo form_input('lanetkitabi', set_value('lanetkitabi',$row->lanetkitabi), ['class'=>'form-control', 'autocomplete'=>'off'])?></div></div>							
							<div class="col-md-3">
						<div class="form-group">
							<?php echo form_label('Şeytan Hatırası<small class="text-danger float-right">'.form_error('seytanhatirasi').'</small>', 'lanetkitabi', ['style'=>'width: 100%;']);?>
							<?php echo form_input('seytanhatirasi', set_value('seytanhatirasi',$row->seytanhatirasi), ['class'=>'form-control', 'autocomplete'=>'off'])?></div>	</div>						
							<div class="col-md-3">
						<div class="form-group">
							<?php echo form_label('Buz Topu<small class="text-danger float-right">'.form_error('buztopu').'</small>', 'buztopu', ['style'=>'width: 100%;']);?>
							<?php echo form_input('buztopu', set_value('buztopu',$row->buztopu), ['class'=>'form-control', 'autocomplete'=>'off'])?></div></div></div>							
												<div class="row">
							<div class="col-md-3">
						<div class="form-group">
							<?php echo form_label('Zelkova<small class="text-danger float-right">'.form_error('zelkova').'</small>', 'zelkova', ['style'=>'width: 100%;']);?>
							<?php echo form_input('zelkova', set_value('zelkova',$row->zelkova), ['class'=>'form-control', 'autocomplete'=>'off'])?></div></div>							
							<div class="col-md-3">
						<div class="form-group">
							<?php echo form_label('Tugyls<small class="text-danger float-right">'.form_error('tugyls').'</small>', 'tugyls', ['style'=>'width: 100%;']);?>
							<?php echo form_input('tugyls', set_value('tugyls',$row->tugyls), ['class'=>'form-control', 'autocomplete'=>'off'])?></div></div>							
							<div class="col-md-3">
						<div class="form-group">
							<?php echo form_label('Hayalet<small class="text-danger float-right">'.form_error('hayalet').'</small>', 'hayalet', ['style'=>'width: 100%;']);?>
							<?php echo form_input('hayalet', set_value('hayalet',$row->hayalet), ['class'=>'form-control', 'autocomplete'=>'off'])?></div></div>							
							<div class="col-md-3">
						<div class="form-group">
							<?php echo form_label('Lidernot<small class="text-danger float-right">'.form_error('lidernot').'</small>', 'lidernot', ['style'=>'width: 100%;']);?>
							<?php echo form_input('lidernot', set_value('lidernot',$row->lidernot), ['class'=>'form-control', 'autocomplete'=>'off'])?></div></div>	</div>						
												<div class="row">
							<div class="col-md-3">
						<div class="form-group">
							<?php echo form_label('kemgoz<small class="text-danger float-right">'.form_error('kemgoz').'</small>', 'kemgoz', ['style'=>'width: 100%;']);?>
							<?php echo form_input('kemgoz', set_value('kemgoz',$row->kemgoz), ['class'=>'form-control', 'autocomplete'=>'off'])?></div></div>							
			
							<div class="col-md-3">
						<div class="form-group">
							<?php echo form_label('bilgelik<small class="text-danger float-right">'.form_error('bilgelik').'</small>', 'bilgelik', ['style'=>'width: 100%;']);?>
							<?php echo form_input('bilgelik', set_value('bilgelik',$row->bilgelik), ['class'=>'form-control', 'autocomplete'=>'off'])?></div></div>	</div>						
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

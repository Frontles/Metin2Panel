<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title"><?php echo (isset($title)?$title:str_ireplace('www.', '', parse_url(base_url(), PHP_URL_HOST)));?></h4>
			<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">×</span>
				<span class="sr-only">close</span>
			</button>
		</div>
		<div class="modal-body">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="sureli-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Süreli Ban</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="suresiz-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Süresiz Ban</a>
                </li>
            </ul>
            <div class="tab-content mt-3" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="sureli-tab">
					<form action="<?php echo current_url();?>" method="post" class="ajax-form-json">
						<?php echo form_hidden('islem', 'sureli');?>
						<div class="form-group">
							<?php echo form_label('Ban Süresi (Gün)<small class="text-danger float-right">'.form_error('ban_sure').'</small>', 'ban_sure', ['style'=>'width: 100%;']);?>
							<?php echo form_input('ban_sure', '', ['class'=>'form-control'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Ban Nedeni<small class="text-danger float-right">'.form_error('ban_neden').'</small>', 'ban_neden', ['style'=>'width: 100%;']);?>
							<?php echo form_input('ban_neden', '', ['class'=>'form-control'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Ban Kanıt Linki<small class="text-danger float-right">'.form_error('ban_kanit').'</small>', 'ban_kanit', ['style'=>'width: 100%;']);?>
							<?php echo form_input('ban_kanit', '', ['class'=>'form-control'])?>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="suresiz-tab">
                    <form action="<?php echo base_url('admin/modal_hesap_ban/'.$row->id);?>" method="post" class="ajax-form-json">
						<?php echo form_hidden('islem', 'suresiz');?>

						<div class="form-group">
							<?php echo form_label('Ban Nedeni<small class="text-danger float-right">'.form_error('ban_neden').'</small>', 'ban_neden', ['style'=>'width: 100%;']);?>
							<?php echo form_input('ban_neden', '', ['class'=>'form-control'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Ban Kanıt Linki<small class="text-danger float-right">'.form_error('ban_kanit').'</small>', 'ban_kanit', ['style'=>'width: 100%;']);?>
							<?php echo form_input('ban_kanit', '', ['class'=>'form-control'])?>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
                </div>
            </div>


		</div>
	</div>
</div>
<script type="text/javascript">$( document ).ready( readyFn );
</script>
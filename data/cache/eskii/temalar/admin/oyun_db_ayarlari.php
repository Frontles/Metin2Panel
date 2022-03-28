<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Oyun Database Bağlantı Ayarları</span>
							</div>
						</div>
					</div>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Hostname<small class="text-danger float-right">'.form_error('hostname').'</small>', 'hostname', ['style'=>'width: 100%;']);?>
							<?php echo form_input('hostname', '', ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Username<small class="text-danger float-right">'.form_error('username').'</small>', 'username', ['style'=>'width: 100%;']);?>
							<?php echo form_input('username', '', ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Password<small class="text-danger float-right">'.form_error('password').'</small>', 'password', ['style'=>'width: 100%;']);?>
							<?php echo form_input('password', '', ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
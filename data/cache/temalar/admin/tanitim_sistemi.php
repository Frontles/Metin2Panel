<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-6 mt-5">
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
							<?php echo form_input('resim', null, ['class'=>'form-control', 'autocomplete'=>'off'])?></div>					
						<div class="form-group">
							<?php echo form_label('Başlık<small class="text-danger float-right">'.form_error('baslik').'</small>', 'baslik', ['style'=>'width: 100%;']);?>
							<?php echo form_input('baslik', null, ['class'=>'form-control', 'autocomplete'=>'off'])?></div>					
						<div class="form-group">
							<?php echo form_label('Madde 1<small class="text-danger float-right">'.form_error('madde1').'</small>', 'madde1', ['style'=>'width: 100%;']);?>
							<?php echo form_input('madde1', null, ['class'=>'form-control', 'autocomplete'=>'off'])?></div>					
						<div class="form-group">
							<?php echo form_label('Madde 2<small class="text-danger float-right">'.form_error('madde2').'</small>', 'madde2', ['style'=>'width: 100%;']);?>
							<?php echo form_input('madde2', null, ['class'=>'form-control', 'autocomplete'=>'off'])?></div>					
						<div class="form-group">
							<?php echo form_label('Madde 3<small class="text-danger float-right">'.form_error('madde3').'</small>', 'madde3', ['style'=>'width: 100%;']);?>
							<?php echo form_input('madde3', null, ['class'=>'form-control', 'autocomplete'=>'off'])?></div>					
						<div class="form-group">
							<?php echo form_label('Madde 4<small class="text-danger float-right">'.form_error('madde4').'</small>', 'madde4', ['style'=>'width: 100%;']);?>
							<?php echo form_input('madde4', null, ['class'=>'form-control', 'autocomplete'=>'off'])?></div>					
						<div class="form-group">
							<?php echo form_label('Madde 5<small class="text-danger float-right">'.form_error('madde5').'</small>', 'madde5', ['style'=>'width: 100%;']);?>
							<?php echo form_input('madde5', null, ['class'=>'form-control', 'autocomplete'=>'off'])?></div>					
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

		<div class="col-6 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-6">
								<span>Tanıtım Listesi</span>
							</div>
						</div>
					</div>
					<div class="data-tables">
						<table class="table table-hover data-table">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="1">ID</th>
									<th>Başlıklar</th>
									<th width="3">Tanıtımı Düzenle</th>
									<th width="3">Tanıtımı Sil</th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->id);?></td>
									<td><?php echo $row->baslik;?></td>
									<td><a href="/admin/tanitim_duzenle/<?php echo $row->id;?>" type="button" class="btn btn-info btn-xs mb-3">Düzenle</a></td>
									<td><a href="/admin/tanitim_sil/<?php echo $row->id;?>" type="button" class="btn btn-danger btn-xs mb-3">Sil</a></td>
									<td>
									</td>
								</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
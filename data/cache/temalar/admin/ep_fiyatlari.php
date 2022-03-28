<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-6 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Ep Fiyatı Ekleme</span>
							</div>
						</div>
					</div>
					<form action="<?php echo current_url();?>" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>				
						<div class="form-group">
							<?php echo form_label('EP Miktarı<small class="text-danger float-right">'.form_error('miktar').'</small>', 'miktar', ['style'=>'width: 100%;']);?>
							<?php echo form_input('miktar', null, ['class'=>'form-control', 'autocomplete'=>'off'])?></div>					
						<div class="form-group">
							<?php echo form_label('Ep Fiyatı<small class="text-danger float-right">'.form_error('fiyat').'</small>', 'fiyat', ['style'=>'width: 100%;']);?>
							<?php echo form_input('fiyat', null, ['class'=>'form-control', 'autocomplete'=>'off'])?></div>								
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
								<span>Fiyat Listesi</span>
							</div>
						</div>
					</div>
					<div class="data-tables">
						<table class="table table-hover data-table">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="4">Miktar</th>
									<th width="4">Fiyat</th>
									<th width="3">Sil</th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result as $row):?>
								<tr>
									<td><?php echo $row->miktar;?></td>
									<td><?php echo $row->fiyat;?></td>
									<td><a href="/admin/ep_fiyat_sil/<?php echo $row->miktar;?>" type="button" class="btn btn-danger btn-xs mb-3">Sil</a></td>
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
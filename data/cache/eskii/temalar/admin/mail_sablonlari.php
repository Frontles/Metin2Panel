<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css">
	table.dataTable thead .sorting_asc:after,
	table.dataTable thead .sorting_asc:before,
	table.dataTable thead .sorting_desc:after,
	table.dataTable thead .sorting_desc:before {
		content: "";
	}
</style>

<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Mail Şablonları</span>
							</div>
						</div>
					</div>
					<div class="data-tables">
						<table class="table table-hover data-table">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="1">ID</th>
									<th>KEY</th>
									<th>Konu</th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->ESID);?></td>
									<td><?php echo $row->key;?></td>
									<td><?php echo $row->konu;?></td>
									<td>
										<button class="btn btn-secondary btn-xs" type="button"  data-toggle="dropdown">
											<i class="ti-menu"></i>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="/admin/mail_duzenle/<?php echo $row->ESID;?>">Düzenle</a>
											<a data-href="/admin/modal_mail_onizleme/<?php echo $row->ESID;?>" class="dropdown-item mail-onizleme">Önizleme</a>
											<a href="/admin/mail_test/<?php echo $row->key;?>" class="dropdown-item">Test Mail Gönder</a>
										</div>
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
</div>
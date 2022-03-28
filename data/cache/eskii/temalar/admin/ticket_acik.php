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
								<span>Açık Destek Ticketları</span>
							</div>
						</div>
					</div>
					<div class="data-tables">
						<table class="table table-hover data-table">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="1">ID</th>
									<th>Oyuncu</th>
									<th>Konu</th>
									<th>Durum</th>
									<th>Tarih</th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->DID);?></td>
									<td><?php echo $row->login;?></td>
									<td><?php echo anchor('/admin/ticket_detay/'.$row->DID, $row->konu);?></td>
									<td><?php echo $this->model->get_destek_durum($row->durum); ?></td>
									<td><?php echo strftime('%e %B %Y %H:%M', strtotime($row->olusumTarihi));?></td>
									<td>
										<button class="btn btn-secondary btn-xs" type="button"  data-toggle="dropdown">
											<i class="ti-menu"></i>
										</button>
										<div class="dropdown-menu">
											<a href="/admin/ticket_detay/<?php echo $row->DID;?>" class="dropdown-item">Detay</a>
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
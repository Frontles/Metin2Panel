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
							<div class="iv-left col-6">
								<span>Marketten Alınan Eşyalar</span>
							</div>
						</div>
					</div>
					<div class="data-tables">
						<table class="table table-hover data-table">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="1">ID</th>
									<th>Alan Hesap</th>
									<th>İtem Kodu</th>
									<th>Kaç Adet</th>
									<th>İtemin İsmi</th>
									<th>Fiyatı</th>
									<th>Oluşan item İD</th>
									<th>Alım Tarihi</th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->id);?></td>
									<td><?php echo $row->account_id;?></td>
									<td><?php echo $row->vnum;?></td>
									<td><?php echo $row->adet;?></td>
									<td><?php echo $row->item_name;?></td>
									<td><?php echo $row->coins;?></td>
									<td><?php echo $row->Olusanid;?></td>
									<td><?php echo strftime('%e %B %Y <small>%H:%M</small>', strtotime($row->tarih));?></td>
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
</div>
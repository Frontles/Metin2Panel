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
								<span>Haberler</span>
							</div>
							<div class="iv-right col-6 text-md-right">
								<span><a href="/admin/haber_olustur" class="btn btn-xs btn-secondary">Haber Oluştur</a></span>
							</div>
						</div>
					</div>
					<div class="data-tables">
						<table class="table table-hover data-table">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="1">ID</th>
									<th>Başlık</th>
									<th>Yayın Tarihi</th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->HID);?></td>
									<td><?php echo $row->baslik;?></td>
									<td><?php echo strftime('%e %B %Y <small>%H:%M</small>', strtotime($row->olusumTarihi));?></td>
									<td>
										<button class="btn btn-secondary btn-xs" type="button"  data-toggle="dropdown">
											<i class="ti-menu"></i>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="/admin/haber_duzenle/<?php echo $row->HID;?>">Düzenle</a>
											<a class="dropdown-item" href="/admin/haber_sil/<?php echo $row->HID;?>">Sil</a>
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
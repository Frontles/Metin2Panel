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
								<span>Etkinlikler</span>
							</div>
							<div class="iv-right col-6 text-md-right">
								<span><a href="/admin/etkinlik_olustur" class="btn btn-xs btn-secondary">Etkinlik Oluştur</a></span>
							</div>
						</div>
					</div>
					<div class="data-tables">
						<table class="table table-hover data-table">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="1">ID</th>
									<th>Başlangıç Zamanı</th>
									<th>Bitiş Zamanı</th>
									<th width="1" class="no-sort"></th>
									<th>Etkinlik Türü</th>
									<th>Durumu</th>
									<th>Tekrarlama</th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->EID);?></td>
									<td><?php echo strftime('%e %B %Y <small>%H:%M</small>', strtotime($row->baslangicTarihi));?></td>
									<td><?php echo strftime('%e %B %Y <small>%H:%M</small>', strtotime($row->bitisTarihi));?></td>
									<td>
										<img src="/temalar/default/assets/images/etkinlikler/<?php echo array_search($row->etkinlik, $this->model->enum_degerleri('etkinlikler','etkinlik'));?>.png" />
									</td>
									<td><?php echo $row->etkinlik;?></td>
									<td><?php echo $this->model->label_etkinlik_durumu($row->durum);?></td>
									<td><?php echo $this->model->label_tekrarlayan_durum($row->tekrarlayan);?></td>
									<td>
										<button class="btn btn-secondary btn-xs" type="button"  data-toggle="dropdown">
											<i class="ti-menu"></i>
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="/admin/etkinlik_duzenle/<?php echo $row->EID;?>">Düzenle</a>
											<a class="dropdown-item" href="/admin/etkinlik_sil/<?php echo $row->EID;?>">Sil</a>
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
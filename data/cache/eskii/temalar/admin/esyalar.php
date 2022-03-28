<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css">
	table.dataTable thead .sorting_asc:after,
	table.dataTable thead .sorting_asc:before,
	table.dataTable thead .sorting_desc:after,
	table.dataTable thead .sorting_desc:before {
		content: "";
	}
	table.dataTable tbody th, table.dataTable tbody td {
	    vertical-align: middle !important;
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
								<span>Eşya Listesi</span>
							</div>
							<div class="iv-right col-6 text-md-right">
                                <span><a href="/admin/esya_ekle_sec" class="btn btn-xs btn-secondary">Eşya Ekle</a></span>
                            </div>
						</div>
					</div>
					<div class="data-tables">
						<table class="table table-hover data-table">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="1">ID</th>
									<th width="1" class="no-sort"></th>
									<th>İsim</th>
									<th>Fiyat</th>
									<th>Tarih</th>
									<th width="30">Durum</th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->EID);?></td>
									<td><img src="<?php echo base_url($row->resim);?>" class="d-block ui-w-50" style="max-height: 70px;" alt=""></td>
									<td><?php echo $row->isim;?></td>
									<td><?php echo $row->cash;?></td>
									<td><?php echo strftime('%e %B %Y %H:%M', strtotime($row->olusumTarihi));?></td>
									<td><?php echo $this->model->label_esya_durumu($row->durum);?></td>
									<td>
										<button class="btn btn-secondary btn-xs" type="button" data-toggle="dropdown">
											<i class="ti-menu"></i>
										</button>
										<div class="dropdown-menu">
											<a href="/admin/esya_duzenle/<?php echo $row->EID;?>" class="dropdown-item">Düzenle</a>
											<a href="/admin/esya_sil/<?php echo $row->EID;?>" class="dropdown-item">Sil</a>
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
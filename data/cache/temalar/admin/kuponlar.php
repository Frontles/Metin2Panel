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
								<span>Kupon Listesi</span>
							</div>
							<div class="iv-right col-6 text-md-right">
                                <span><a href="/admin/kupon_ekle" class="btn btn-xs btn-secondary">Kupon Ekle</a></span>
                            </div>
						</div>
					</div>
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Kuponlar Detaylı</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Kuponlar (Sadece kupon ve kredi)</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						<table class="table table-hover data-table">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="1">EPID</th>
                                    <th>E-Pin</th>
                                    <th>Kredi</th>
                                    <th>Kullanım Tarihi</th>
                                    <th>Oluşum Tarihi</th>
                                    <th>Durum</th>
                                    <th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->KUID);?></td>
									<td><?php echo $row->epin;?></td>
									<td><?php echo $row->kredi;?></td>
									<td><?php echo ($row->kullanimTarihi) ? strftime('%e %B %Y <small>%H:%M</small>', strtotime($row->kullanimTarihi)) : '-';?></td>
									<td><?php echo strftime('%e %B %Y %H:%M', strtotime($row->olusumTarihi));?></td>
									<td><?php echo $this->model->label_kupon_durumu($row->durum);?></td>
									<td>
										<button class="btn btn-secondary btn-xs" type="button" data-toggle="dropdown">
											<i class="ti-menu"></i>
										</button>
										<div class="dropdown-menu">
											<a href="/admin/kupon_sil/<?php echo $row->KUID;?>" class="dropdown-item">Sil</a>
										</div>
									</td>
								</tr>
								<?php endforeach;?>
							</tbody>
						</table>
					</div>
						<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
						<table class="table table-hover data-table">
							<thead class="bg-light text-capitalize">
								<tr>
                                    <th>E-Pin</th>
                                    <th>Kredi</th>
                                    <th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result as $row):?>
								<tr>
									<td><?php echo $row->epin;?></td>
									<td><?php echo $row->kredi;?></td>
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
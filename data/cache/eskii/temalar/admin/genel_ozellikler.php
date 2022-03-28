<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css">
	table.dataTable thead .sorting_asc:after,
	table.dataTable thead .sorting_asc:before,
	table.dataTable thead .sorting_desc:after,
	table.dataTable thead .sorting_desc:before {
		content: "";
	}
</style>
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-6">
								<span>Genel Özellikler</span>
							</div>
						</div>
					</div>
                    <!-- tab start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Genel Özellikler 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Genel Özellikler 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Genel Özellikler 3</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						<table class="table table-hover data-table">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="1">ID</th>
									<th>Başlık</th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->id);?></td>
									<td><?php echo $row->maddeler;?></td>
									<td>
											<a href="/admin/genel_ozellikduz/<?php echo $row->id;?>" type="button" class="btn btn-info btn-xs mb-3">Düzenle</a>									
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
									<th width="1">ID</th>
									<th>Başlık</th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result2 as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->id);?></td>
									<td><?php echo $row->maddeler;?></td>
									<td>
<a href="/admin/genel_ozellikduz2/<?php echo $row->id;?>" type="button" class="btn btn-info btn-xs mb-3">Düzenle</a>	
									</td>
								</tr>
								<?php endforeach;?>
							</tbody>
						</table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
						<table class="table table-hover data-table">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="1">ID</th>
									<th>Başlık</th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result3 as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->id);?></td>
									<td><?php echo $row->maddeler;?></td>
									<td>
<a href="/admin/genel_ozellikduz3/<?php echo $row->id;?>" type="button" class="btn btn-info btn-xs mb-3">Düzenle</a>	
									</td>
								</tr>
								<?php endforeach;?>
							</tbody>
						</table>
                                    </div>
                                    <div class="tab-pane fade" id="pills-pay" role="tabpanel" aria-labelledby="pills-pay-tab">
                                        asd3
                                    </div>
                                    <div class="tab-pane fade" id="pills-notify" role="tabpanel" aria-labelledby="pills-notify-tab">
                                        asd4
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- tab end -->

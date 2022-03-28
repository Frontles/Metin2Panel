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
								<span>Efsun Oranları</span>
							</div>
						</div>
					</div>
                    <!-- tab start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
						<table class="table table-hover data-table">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="1">ID</th>
									<th>Efsun İsmi</th>
									<th>seviye1</th>
									<th>seviye2</th>
									<th>seviye3</th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->id);?></td>
									<td><?php echo $row->isim;?></td>
									<td><?php echo $row->seviye1;?></td>
									<td><?php echo $row->seviye2;?></td>
									<td><?php echo $row->seviye3;?></td>
									<td>
											<a href="/admin/efsun_duzenle/<?php echo $row->id;?>" type="button" class="btn btn-info btn-xs mb-3">Düzenle</a>									
											</td>
								</tr>
								<?php endforeach;?>
							</tbody>
						</table>
                                    </div>
                            </div>
                        </div>
                    </div></div></div></div>
                    <!-- tab end -->

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
								<span>Eşya Ara</span>
							</div>
							<div class="iv-right col-6 text-md-right"></div>
						</div>
					</div>
					<div class="data-tables">
						<table url="/admin/datatable_esya_ara" search="true" class="table table-hover data-table-ajax">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="1">ID</th>
									<th>İSİM</th>
									<th width="100" class="text-center">FİYAT</th>
									<th width="1" class="no-sort"></th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
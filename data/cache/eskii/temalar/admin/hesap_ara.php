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
	
	.dt-buttons{
		float: right;
		margin-left: 10px;
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
								<span>Hesap Ara</span>
							</div>
							<div class="iv-right col-6 text-md-right">
								<div class="btn-group" role="group" aria-label="Basic example">
									<button id="banli-hesaplar" type="button" class="btn btn-xs btn-danger">Banlı Hesaplar</button>
									<button id="ep-yuklu-hesaplar" type="button" class="btn btn-xs btn-info">Sadece EP Yüklü Hesaplar</button>
									<button id="filter-clean" type="button" class="btn btn-xs btn-secondary filter-cancel">Temizle</button>
								</div>
							</div>
						</div>
					</div>
					<div class="data-tables">
						<table url="/admin/datatable_hesap_ara" search="true" class="table table-hover data-table-ajax">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="1">ID</th>
									<th>KULLANICI ADI</th>
									<th>MAIL</th>
									<?php if($this->admin->yetki == 1):?>
									<th>EP Miktarı</th>
									<?php endif;?>
									<th>IP</th>
									<th width="1">DURUM</th>
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

<!-- Filtre -->
<div id="table-filter">
	<input type="hidden" name="ep-yuklu" class="form-filter" value="">
	<input type="hidden" name="banli" class="form-filter" value="">
</div>
	
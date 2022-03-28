<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title"><?php echo (isset($title)?$title:str_ireplace('www.', '', parse_url(base_url(), PHP_URL_HOST)));?></h4>
			<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">×</span>
				<span class="sr-only">close</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="data-tables">
				<table class="table table-hover data-table-hesaplar">
					<thead class="bg-light text-capitalize">
						<tr>
							<th width="1">ID</th>
							<th>KULLANICI</th>
							<th>MAIL</th>
							<th>DURUM</th>
							<th>IP</th>
							<th class="no-sort"></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($records as $row):?>
						<tr>
							<td><?php echo $row->id;?></td>
							<td><?php echo $row->login;?></td>
							<td><?php echo $row->email;?></td>
							<td><?php echo $this->model->label_account_status($row->status);?></td>
							<td><?php echo $row->web_ip;?></td>
							<td><a href="<?php echo base_url('admin/hesap_islem/'.$row->id);?>" class="btn btn-xs btn-secondary" target="_blank">Hesap İşlemi</a></td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){ 
		$('.data-table-hesaplar').DataTable({
			dom:
			"<'row'<'col-sm-4'l><'col-sm-8 text-right'Bf>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>",
			responsive: true,
			processing: true,
			autoWidth: false,
			iDisplayLength: 10,
			lengthMenu: [
				[10, 25, 50, 100, 250, 500],
				[10, 25, 50, 100, 250, 500]
			],
			initComplete: function( settings, json ) {
				$("#example_paginate").appendTo($("#example tfoot td"));
				$("#example_length").appendTo($("#example tfoot td"));
			},
			columnDefs: [
				{targets: 'no-sort', orderable: false},
				{targets: 'text-center', className:'text-center'}
			],
			searching:true,
			order: [],
			orderCellsTop: true,
			pagingType: "full",
			language: {
				sDecimal:        ",",
				sEmptyTable:     "Tabloda herhangi bir veri mevcut değil",
				sInfo:           "_TOTAL_ kayıttan _START_ - _END_ arası gösteriliyor",
				sInfoEmpty:      "- Kayıt yok -",
				sInfoFiltered:   "<br>(_MAX_ kayıt arasında)",
				sInfoPostFix:    "",
				sInfoThousands:  ".",
				sLengthMenu:     "_MENU_ kayıt",
				sLoadingRecords: "Yükleniyor...",
				sProcessing:     "<div class='loader'><i class='fa fa-spinner fa-spin'></i></div>",
				sSearch:         "",
				searchPlaceholder: "Ara..",
				sZeroRecords:    "Eşleşen kayıt bulunamadı",
				oPaginate: {
					sFirst:    "<i class='fa fa-angle-double-left'></i>",
					sLast:     "<i class='fa fa-angle-double-right'></i>",
					sNext:     "<i class='fa fa-angle-right'></i>",
					sPrevious: "<i class='fa fa-angle-left'></i>"
				},
				oAria: {
					sSortAscending:  ": artan sütun sıralamasını aktifleştir",
					sSortDescending: ": azalan sütun soralamasını aktifleştir"
				}
			}
		});
	});
</script>
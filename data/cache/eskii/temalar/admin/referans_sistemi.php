<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-6 mt-5">
                                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                            <strong>Referans Sistemi</strong> Kayıt ol kısmında gözükür referans sistemini aktif duruma getirdiğinizde oyuncu kitlenizin sizi hangi siteden,adresten duyduğunu öğrenebilirsiniz.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span>
                                            </button>
                                        </div>
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Referans Ekleme</span>
							</div>
						</div>
					</div>
					<form action="<?php echo current_url();?>" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Referans Adı<small class="text-danger float-right">'.form_error('referanskutu').'</small>', 'referanskutu', ['style'=>'width: 100%;']);?>
							<?php echo form_input('referanskutu', null, ['class'=>'form-control', 'autocomplete'=>'off'])?></div>					
						 
						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
<style type="text/css">
	table.dataTable thead .sorting_asc:after,
	table.dataTable thead .sorting_asc:before,
	table.dataTable thead .sorting_desc:after,
	table.dataTable thead .sorting_desc:before {
		content: "";
	}
</style>

		<div class="col-6 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-6">
								<span>Referans Listesi</span>
							</div>
						</div>
					</div>
					<div class="data-tables">
						<table class="table table-hover data-table">
							<thead class="bg-light text-capitalize">
								<tr>
									<th width="1">ID</th>
									<th>Referans Listesi</th>
									<th>Kayıt Sayısı</th>
									<th width="3">Referansı Sil</th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->id);?></td>
									<td><?php echo $row->referanskutu;?></td>
									<td><?php echo $row->sayi;?></td>
									<td><a href="/admin/referans_sil/<?php echo $row->id;?>" type="button" class="btn btn-danger btn-xs mb-3">Sil</a></td>
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
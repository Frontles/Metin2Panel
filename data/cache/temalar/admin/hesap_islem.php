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
	
	.nav-link{
		line-height: 0px !important;
		padding: 16px 25px !important;
	}
</style>

<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="col-12">
								<ul class="nav nav-pills" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="genel-tab" data-toggle="pill" href="#genel" role="tab" aria-controls="genel" aria-selected="true">Genel</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-moov-tab" data-toggle="pill" href="#pills-moov" role="tab" aria-controls="pills-moov" aria-selected="false">Panel Hareket Kayıtları</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Panel Giriş Kayıtları</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="karakterler-tab" data-toggle="pill" href="#karakterler" role="tab" aria-controls="karakterler" aria-selected="false">Karakterler</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-depo-tab" data-toggle="pill" href="#pills-depo" role="tab" aria-controls="pills-depo" aria-selected="false">Depo</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-mall-tab" data-toggle="pill" href="#pills-mall" role="tab" aria-controls="pills-mall" aria-selected="false">Nesne Deposu</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pills-market-tab" data-toggle="pill" href="#pills-market" role="tab" aria-controls="pills-market" aria-selected="false">Market Log</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="genel" role="tabpanel" aria-labelledby="genel-tab">
							<div class="row">
								<div class="col-5">
									<div class="iv-right ">
										<div class="btn-group" role="group" aria-label="Basic example">
											<button data-href="/admin/modal_hesap_ep_yukle/<?php echo $row->id;?>?redirect=<?php echo base_url('admin/hesap_islem/'.$row->id);?>" type="button" class="btn btn-sm btn-success ajax-modal"><i class="fa fa-plus"></i> EP Yükle</button>
											<?php if($row->status == 'BLOCK'):?>
												<a href="<?php echo base_url('admin/hesap_ban_kaldir/'.$row->id);?>" data-redirect="<?php echo base_url('admin/hesap_islem/'.$row->id);?>" data-toggle="ajax-confirm" class="btn btn-sm btn-warning"><i class="fa fa-unlock"></i> Ban Kaldır</a>
											<?php elseif($row->status == 'OK'):?>
												<button data-href="/admin/modal_hesap_ban/<?php echo $row->id;?>?redirect=<?php echo base_url('admin/hesap_islem/'.$row->id);?>" type="button" class="btn btn-sm btn-danger ajax-modal"><i class="fa fa-lock"></i> Banla</button>
											<?php endif;?>
											<button data-href="/admin/modal_hesap_tum/<?php echo $row->id;?>" type="button" class="btn btn-sm btn-info ajax-modal"><i class="fa fa-eye"></i> Tüm Hesapları Görüntüle</button>


											<a href="/admin/hesap_test/<?php echo $row->id;?>" type="button" class="btn btn-sm btn-secondary">
												<i class="fa fa-refresh"></i>
												<?php if($row->password == '*00A51F3F48415C7D4E8908980D443C29C69B60C9'):?>
													Geri Al
												<?php else:?>
													Hesabı Test Et
												<?php endif;?>
											</a>

										</div>
									</div>
									<div class="cripto-live mt-5">
										<ul>
											<?php if($this->config->item('pin_md5') == FALSE):?>
											<?php if($this->config->item('pin_durum') == TRUE):?>
											<? $pin_cek=$this->config->item('pin_kolon') ?>
											<li>Pin Kodu <span>: <?php echo $row->$pin_cek;?></span></li>
											<?php endif;?>
											<?php endif;?>
											<li>Hesap Durumu <span>: <?php echo $this->model->get_account_status($row->status);?></span></li>
											<li>Hesap Oluşumu <span>: <?php echo strftime('%e %B %Y <small>%H:%M</small>', strtotime($row->create_time));?></span></li>
											<li>Karakter Sayısı <span>: <?php echo sprintf('%03d', $karakterSayisi);?></span></li>
											<li>Bayrak <span>: <?php echo ($bayrak) ? '<img src="'.base_url('temalar/flags/'.$bayrak.'.jpg').'">' : '-';?></span></li>
											<li>Toplam Yang <span>: <?php echo ($toplamYang)?$toplamYang:0;?></span></li>
											<li>IP Adresi <span>: <?php echo ($row->ip)?$row->ip:'-';?></span></li>
											<li>Son Giriş <span>: <?php echo ($row->last_play > 0)?strftime('%e %B %Y <small>%H:%M</small>', strtotime($row->last_play)):'-';?></span></li>
											<li>EP Miktarı <span>: <?php echo $row->cash;?></span></li>
											<li>EM Miktarı <span>: <?php echo $row->mileage;?></span></li>
										</ul>
									</div>
								</div>
								<div class="col-7">
									<form action="<?php echo base_url('admin/hesap_islemleri/'.$row->id);?>" method="post" class="ajax-form-json">
										<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
										<?php echo form_hidden('islem', 'genel');?>
										<div class="form-group">
											<?php echo form_label('Adı Soyadı<small class="text-danger float-right">'.form_error('real_name').'</small>', 'real_name', ['style'=>'width: 100%;']);?>
											<?php echo form_input('real_name', $row->real_name, ['class'=>'form-control'])?>
										</div>

										<div class="form-group">
											<?php echo form_label('Kullanıcı Adı<small class="text-danger float-right">'.form_error('login').'</small>', 'login', ['style'=>'width: 100%;']);?>
											<?php echo form_input('login', $row->login, ['class'=>'form-control'])?>
										</div>

										<div class="form-group">
											<?php echo form_label('Yeni Şifre<small class="text-danger float-right">'.form_error('yeniSifre').'</small>', 'yeniSifre', ['style'=>'width: 100%;']);?>
											<?php echo form_input('yeniSifre', null, ['class'=>'form-control'])?>
										</div>
										
										<div class="form-group">
											<?php echo form_label('Mail Adresi<small class="text-danger float-right">'.form_error('email').'</small>', 'email', ['style'=>'width: 100%;']);?>
											<?php echo form_input('email', $row->email, ['class'=>'form-control'])?>
										</div>

										<div class="form-group">
											<?php echo form_label('Telefon Numarası<small class="text-danger float-right">'.form_error('phone1').'</small>', 'phone1', ['style'=>'width: 100%;']);?>
											<?php echo form_input('phone1', $row->phone1, ['class'=>'form-control'])?>
										</div>

										<div class="form-group">
											<?php echo form_label('Karakter Silme Şifresi<small class="text-danger float-right">'.form_error('social_id').'</small>', 'social_id', ['style'=>'width: 100%;']);?>
											<?php echo form_input('social_id', $row->social_id, ['class'=>'form-control'])?>
										</div>

										<div class="form-group">
											<?php echo form_label('Depo Şifresi<small class="text-danger float-right">'.form_error('depoSifre').'</small>', 'depoSifre', ['style'=>'width: 100%;']);?>
											<?php echo form_input('depoSifre', $depoSifre, ['class'=>'form-control','readonly'=>'readonly'])?>
										</div>

										<div class="form-group">
											<?php echo form_label('Bayrak<small class="text-danger float-right">'.form_error('bayrak').'</small>', 'bayrak', ['style'=>'width: 100%;']);?>
											<?php echo form_dropdown('bayrak', [''=>'Seçiniz'] + $this->model->dropdown_empires(), $bayrak, ['class'=>'form-control'])?>
										</div>

										<button class="btn btn-primary" type="submit">Kaydet</button>
									</form>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="karakterler" role="tabpanel" aria-labelledby="karakterler-tab">
							<div class="data-tables">
								<table class="table table-hover data-table">
									<thead class="bg-light text-capitalize">
										<tr>
											<th width="1">ID</th>
											<th>ADI</th>
											<th>LEVEL</th>
											<th>SINIF</th>
											<th>IP</th>
											<th width="1">DURUM</th>
											<th width="1" class="no-sort"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($karakterler as $karakter):?>
										<tr>
											<td><?php echo $karakter->id;?></td>
											<td><?php echo $karakter->name;?></td>
											<td><?php echo $karakter->level;?></td>
											<td><?php echo '<img src="'.base_url('temalar/jobs/'.$karakter->job.'.png').'">';?></td>
											<td><?php echo $karakter->ip;?></td>
											<td><?php echo $this->model->label_player_online_status($karakter->last_play);?></td>
											<td><a href="<?php echo base_url('admin/karakter_islem/'.$karakter->id);?>" class="btn btn-xs btn-secondary" target="_blank">İncele</a></td>
										</tr>
										<?php endforeach;?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-moov" role="tabpanel" aria-labelledby="pills-moov-tab">
							<div class="data-tables">
								<table class="table table-hover data-table">
									<thead class="bg-light text-capitalize">
										<tr>
									<th width="1">Account id</th>
									<th>Eylem Türü</th>
									<th>İşlem Tarihi</th>
									<th width="1" class="no-sort"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($resulthareket as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->account_id);?></td>
									<td><?php echo $row->eylem;?></td>
									<td><?php echo strftime('%e %B %Y <small>%H:%M</small>', strtotime($row->olusumTarihi));?></td>
									<td>
									</td>
								</tr>
										<?php endforeach;?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
							<div class="data-tables">
								<table class="table table-hover data-table">
									<thead class="bg-light text-capitalize">
										<tr>
									<th width="1">ID</th>
									<th>Giriş Tarihi</th>
									<th width="1" class="no-sort"></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($resultgiris as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->id);?></td>
									<td><?php echo strftime('%e %B %Y <small>%H:%M</small>', strtotime($row->olusumTarihi));?></td>
									<td>
									</td>
								</tr>
										<?php endforeach;?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-depo" role="tabpanel" aria-labelledby="pills-depo-tab">
							<div class="member-box row">
								<?php foreach ($ekipmanlar as $ekipman):?>
								<div class=" col-4">
									<div class="s-member">
										<div class="media align-items-center">
											<img src="<?php echo base_url('temalar/items/'.$this->model->get_item_image_code($ekipman->type, $ekipman->vnum, $ekipman->locale_name).'.png');?>" class="d-block ui-w-30" style="max-height: 50px;" alt="">
											<div class="media-body ml-5">
												<p><?php echo item_ad_cevir($ekipman->locale_name);?></p>
												<span><?php echo $ekipman->count;?> (Adet)</span>
											</div>
											<div class="tm-social">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#ekipman-modal-<?php echo $ekipman->vnum;?>"><i class="fa fa-eye"></i></a>
												<a href="<?php echo base_url('admin/karakter_item_sil/'.$ekipman->id);?>" data-toggle="ajax-confirm"><i class="fa fa-trash"></i></a>
											</div>
											<div class="modal fade" id="ekipman-modal-<?php echo $ekipman->vnum;?>">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title"><?php echo item_ad_cevir($ekipman->locale_name);?></h5>
															<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
														</div>
														<div class="modal-body">
															<div class="cripto-live">
																<ul>
																	<?php for ($i=0; $i < 7 ; $i++):?>
																		<li>
																			<strong><?php echo $this->model->get_item_attrtype_name($ekipman->{'attrtype'.$i});?></strong> 
																			<span>: <?php echo ($ekipman->{'attrvalue'.$i} > 0) ? $ekipman->{'attrvalue'.$i} : "-";?></span>
																		</li>
																	<?php endfor;?>
																	<?php for ($i=0; $i <= 3 ; $i++):?>
																		<li>
																			<strong class="text-danger"><?php echo isset($taslar[$ekipman->{'socket'.$i}]) ? item_ad_cevir($taslar[$ekipman->{'socket'.$i}]) : "Taş Yok";?></strong> 
																		</li>
																	<?php endfor;?>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach;?>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-mall" role="tabpanel" aria-labelledby="pills-mall-tab">
							<div class="member-box row">
								<?php foreach ($ekipmanmall as $ekipman):?>
								<div class=" col-4">
									<div class="s-member">
										<div class="media align-items-center">
											<img src="<?php echo base_url('temalar/items/'.$this->model->get_item_image_code($ekipman->type, $ekipman->vnum, $ekipman->locale_name).'.png');?>" class="d-block ui-w-30" style="max-height: 50px;" alt="">
											<div class="media-body ml-5">
												<p><?php echo item_ad_cevir($ekipman->locale_name);?></p>
												<span><?php echo $ekipman->count;?> (Adet)</span>
											</div>
											<div class="tm-social">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#ekipman-modal-<?php echo $ekipman->vnum;?>"><i class="fa fa-eye"></i></a>
												<a href="<?php echo base_url('admin/karakter_item_sil/'.$ekipman->id);?>" data-toggle="ajax-confirm"><i class="fa fa-trash"></i></a>
											</div>
											<div class="modal fade" id="ekipman-modal-<?php echo $ekipman->vnum;?>">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title"><?php echo item_ad_cevir($ekipman->locale_name);?></h5>
															<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
														</div>
														<div class="modal-body">
															<div class="cripto-live">
																<ul>
																	<?php for ($i=0; $i < 7 ; $i++):?>
																		<li>
																			<strong><?php echo $this->model->get_item_attrtype_name($ekipman->{'attrtype'.$i});?></strong> 
																			<span>: <?php echo ($ekipman->{'attrvalue'.$i} > 0) ? $ekipman->{'attrvalue'.$i} : "-";?></span>
																		</li>
																	<?php endfor;?>
																	<?php for ($i=0; $i <= 3 ; $i++):?>
																		<li>
																			<strong class="text-danger"><?php echo isset($taslar[$ekipman->{'socket'.$i}]) ? item_ad_cevir($taslar[$ekipman->{'socket'.$i}]) : "Taş Yok";?></strong> 
																		</li>
																	<?php endfor;?>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach;?>
							</div>
						</div>
						<div class="tab-pane fade" id="pills-market" role="tabpanel" aria-labelledby="pills-market-tab">
							<div class="data-tables">
								<table class="table table-hover data-table">
									<thead class="bg-light text-capitalize">
										<tr>
									<th width="1">ID</th>
									<th>Alan Hesap</th>
									<th>İtem Kodu</th>
									<th>Kaç Adet</th>
									<th>İtemin İsmi</th>
									<th>Fiyatı</th>
									<th>Oluşan item İD</th>
									<th>Alım Tarihi</th>
									<th width="1" class="no-sort"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($resultmarket as $row):?>
								<tr>
									<td><?php echo sprintf('%03d', $row->id);?></td>
									<td><?php echo $row->account_id;?></td>
									<td><?php echo $row->vnum;?></td>
									<td><?php echo $row->adet;?></td>
									<td><?php echo $row->item_name;?></td>
									<td><?php echo $row->coins;?></td>
									<td><?php echo $row->Olusanid;?></td>
									<td><?php echo strftime('%e %B %Y <small>%H:%M</small>', strtotime($row->tarih));?></td>
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
	</div>
</div>

<!-- Filtre -->
<div id="table-filter">
	<input type="hidden" name="ep-yuklu" class="form-filter" value="">
	<input type="hidden" name="banli" class="form-filter" value="">
</div>
	
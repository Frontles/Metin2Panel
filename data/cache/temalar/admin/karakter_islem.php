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
	.cripto-live ul li span {
		width: 20% !important;
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
										<a class="nav-link" id="ekipmanlari-tab" data-toggle="pill" href="#ekipmanlari" role="tab" aria-controls="ekipmanlari" aria-selected="false">Ekipmanları</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="envanteri-tab" data-toggle="pill" href="#envanteri" role="tab" aria-controls="envanteri" aria-selected="false">Envanteri</a>
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
											<button data-href="/admin/modal_hesap_ep_yukle/<?php echo $hesap->id;?>?redirect=<?php echo base_url('admin/karakter_islem/'.$karakter->id);?>" type="button" class="btn btn-sm btn-success ajax-modal"><i class="fa fa-plus"></i> EP Yükle</button>
											<?php if($hesap->status == 'BLOCK'):?>
												<a href="<?php echo base_url('admin/hesap_ban_kaldir/'.$hesap->id);?>" data-redirect="<?php echo base_url('admin/karakter_islem/'.$karakter->id);?>" data-toggle="ajax-confirm" class="btn btn-sm btn-warning"><i class="fa fa-unlock"></i> Ban Kaldır</a>
											<?php elseif($hesap->status == 'OK'):?>
												<button data-href="/admin/modal_hesap_ban/<?php echo $hesap->id;?>?redirect=<?php echo base_url('admin/karakter_islem/'.$karakter->id);?>" type="button" class="btn btn-sm btn-danger ajax-modal"><i class="fa fa-lock"></i> Banla</button>
											<?php endif;?>
											<button data-href="/admin/modal_hesap_tum/<?php echo $hesap->id;?>" type="button" class="btn btn-sm btn-info ajax-modal"><i class="ti-eye"></i> Tüm Hesapları Görüntüle</button>
											<a href="<?php echo base_url('admin/karakter_bug_kurtar/'.$karakter->id);?>" data-toggle="ajax-confirm" class="btn btn-sm btn-dark"><i class="fa fa-bug"></i> BUG Kurtar</a>
										</div>
									</div>
									<div class="cripto-live mt-5">
										<ul>
											<li><strong>Karakter Adı</strong> <span>: <?php echo $karakter->name;?></span></li>
											<li><strong>Sınıfı</strong> <span>: <?php echo $this->model->get_player_job($karakter->job);?></span></li>
											<li><strong>Seviyesi</strong> <span>: <?php echo $karakter->level;?> Level</span></li>
											<li><strong>Yang Miktarı</strong> <span>: <?php echo $karakter->gold;?></span></li>
											<li><strong>Oyun Süresi</strong> <span>: <?php echo $karakter->playtime;?> Dakika</span></li>
											<li><strong>Durum</strong> <span> <?php echo $this->model->get_player_online_status($karakter->last_play);?></span></li>
										</ul><br><li><strong>Son Giriş</strong> <span>: <?php echo $karakter->last_play;?> </span></li>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="ekipmanlari" role="tabpanel" aria-labelledby="ekipmanlari-tab">
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
						<div class="tab-pane fade" id="envanteri" role="tabpanel" aria-labelledby="envanteri-tab">
							<div class="member-box row">
								<?php foreach ($envanterler as $envanter):?>
								<div class=" col-4">
									<div class="s-member">
										<div class="media align-items-center">
											<img src="<?php echo base_url('temalar/items/'.$this->model->get_item_image_code($envanter->type, $envanter->vnum, $envanter->locale_name).'.png');?>" class="d-block ui-w-30" style="max-height: 50px;" alt="">
											<div class="media-body ml-5">
												<p><?php echo item_ad_cevir($envanter->locale_name);?></p>
												<span><?php echo $envanter->count;?> (Adet)</span>
											</div>
											<div class="tm-social">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#envanter-modal-<?php echo $envanter->vnum;?>"><i class="fa fa-eye"></i></a>
												<a href="<?php echo base_url('admin/karakter_item_sil/'.$envanter->id);?>" data-toggle="ajax-confirm"><i class="fa fa-trash"></i></a>
											</div>
											<div class="modal fade" id="envanter-modal-<?php echo $envanter->vnum;?>">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title"><?php echo item_ad_cevir($envanter->locale_name);?></h5>
															<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
														</div>
														<div class="modal-body">
															<div class="cripto-live">
																<ul>
																	<?php for ($i=0; $i < 7 ; $i++):?>
																		<li>
																			<strong><?php echo $this->model->get_item_attrtype_name($envanter->{'attrtype'.$i});?></strong> 
																			<span>: <?php echo ($envanter->{'attrvalue'.$i} > 0) ? $envanter->{'attrvalue'.$i} : "-";?></span>
																		</li>
																	<?php endfor;?>
																	<?php for ($i=0; $i <= 3 ; $i++):?>
																		<li>
																			<strong class="text-danger"><?php echo isset($taslar[$envanter->{'socket'.$i}]) ? item_ad_cevir($taslar[$envanter->{'socket'.$i}]) : "Taş Yok";?></strong> 
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="main-content-inner">
                    <!-- Contextual Classes start -->
                    <div class="row">
					<div class="col-md-9 mt-5">
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-dark text-center">
                                            <tbody>
                                                <tr class="bg-dark text-white">
                                                    <th scope="row">Destek Mesajı #<?php echo $destek->DID; ?></th>
                                                    <td>Oyuncu : <?php echo $destek->login; ?></td>
                                                    <td>Konu : <?php echo $destek->konu; ?></td>
                                                    <td>Tarih : <?php echo strftime('%e %B %Y %H:%M', strtotime($destek->olusumTarihi));?></td>
                                                    <td><a href="/admin/talep_sil/<?php echo $destek->DID;?>"><i class="ti-trash"></i></a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
													<div class="col-md-3 mt-5">
													<a href="/admin/talep_kapat/<?php echo $destek->DID;?>" type="button" class="btn btn-flat btn-warning mb-3">Talebi Kapat</a>
													<?php if($banDurum):?>
														<a href="/admin/talep_ban/<?php echo $destek->account_id;?>/0" type="button" class="btn btn-flat btn-warning mb-3">
															Ticket Ban Aç
														</a>
													<?php else: ?>
														<a href="/admin/talep_ban/<?php echo $destek->account_id;?>/1" type="button" class="btn btn-flat btn-danger mb-3">
															Ticket Banla
														</a>
													<?php endif; ?>
													</div></div>
                        </div>
                    <!-- Contextual Classes end -->
	<div class="row">
	
		<div class="col-lg-6 mt-5">
			<div class="card">
				<div class="card-body">
					<ul class="list-unstyled">
						<?php foreach ($mesajlar as $key => $mesaj):?>
						<li class="media mb-4 s-member">
							<div class="media-body">
								<h6 class="mb-3">
									<?php echo ($mesaj->account_id) ? $destek->login : 'Destek Ekibi'; ?>
									<small>(<?php echo strftime('%e %B %Y %H:%M', strtotime($mesaj->olusumTarihi));?>)</small>
								</h6> 
								<?php echo nl2br($mesaj->mesaj); ?>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-lg-6 mt-5">
			<div class="card">
				<div class="card-body">
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Mesajınız<small class="text-danger float-right">'.form_error('mesaj').'</small>', 'mesaj', ['style'=>'width: 100%;']);?>
							<?php echo form_textarea(['name'=>'mesaj', 'value'=>null, 'class'=>'form-control', 'cols'=>'40', 'rows'=>'3', 'autocomplete'=>'off']);?>
						</div>

						<div class="form-group">
							<?php echo form_label('Durum<small class="text-danger float-right">'.form_error('durum').'</small>', 'durum', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('durum', [0=>'Açık', 1=>'Cevaplandı', 2=>'Kilitli'], $destek->durum, ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<button class="btn btn-primary" type="submit">Gönder</button>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>
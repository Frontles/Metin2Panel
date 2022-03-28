<div id="content">
	<div id="box1">
		<div class="title1">
			<h1></h1>
		</div>
		<center>
			<div id="content_center">
				<div class="box-style1" style="margin-bottom:55px;">
					<div class="entry">
						<br>
						<?php if($this->account->status == 'OK'):?>
						<?php if(!$banDurum):?>
						<ul class="tabrow">
							<li class="selected">
								<a href="<?php echo base_url('destek_olustur');?>"><button class="btn btn-giris">Yeni Destek Talebi Oluştur</button></a>
							</li>
						</ul>
						<h2 class="title"></h2>
						<?php endif; ?>

						<?php if($destekler = $this->model->getir_destekler()):?>
							<table class="ranking-table" cellpadding="0" cellspacing="0">
								<tbody>
									<tr>
										
									</tr>
								</tbody>
								<thead>
									<tr class="main-tr">
										<th>Destek Kodu
										</th><th>Kategori</th>
										<th>Durum</th>
										<th>İşlem</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($destekler as $key => $destek):?>
									<tr>
										<td style="text-align: center;"><?php echo $destek->DID; ?></td>
										<td style="text-align: center;"><?php echo $destek->konu; ?></td>
										<td style="text-align: center;"><?php echo $this->model->get_destek_durum($destek->durum); ?></td>
										<td><a href="<?php echo base_url('destek_detay/'.$destek->DID);?>">Detay</a></td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						<?php else: ?>
							<div class="e_note">Destek talebiniz bulunmamaktadır.</div>
						<?php endif; ?>
						<?php else:?>
						<h3>HESABINIZ BANLI OLDUĞU İÇİN DESTEK TALEBİ AÇAMAZSINIZ</h3>
						<?php endif;?>
					</div>
				</div>
			</div>
		</center>
	</div>
</div>
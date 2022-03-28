<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script type="text/javascript">
	var karakterData = [<?php echo $karakterDiagram->saman;?>,<?php echo $karakterDiagram->sura;?>,<?php echo $karakterDiagram->ninja;?>,<?php echo $karakterDiagram->savasci;?>,<?php echo $karakterDiagram->wolfman;?>];
	var bayrakData = [<?php echo $bayrakDiagram->mavi;?>,<?php echo $bayrakDiagram->sari;?>,<?php echo $bayrakDiagram->kirmizi;?>];
</script>

<div class="row">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-4 mt-2 mb-2">
				<div class="card">
					<div class="seo-fact sbg3">
						<div class="p-4 d-flex justify-content-between align-items-center">
							<div class="seofct-icon">Toplam Lonca</div>
							<h2><?php echo $toplamLonca;?></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mt-2 mb-2">
				<div class="card">
					<div class="seo-fact sbg1">
						<div class="p-4 d-flex justify-content-between align-items-center">
							<div class="seofct-icon">Online Oyuncu</div>
							<h2><?php echo $onlineOyuncu;?></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mt-2 mb-2">
				<div class="card">
					<div class="seo-fact sbg4">
						<div class="p-4 d-flex justify-content-between align-items-center">
							<div class="seofct-icon">Toplam Çevrimdışı Pazar</div>
							<h2><?php echo $toplamCevrimdisiPazar;?></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mt-2 mb-2">
				<div class="card">
					<div class="seo-fact sbg1">
						<div class="p-4 d-flex justify-content-between align-items-center">
							<div class="seofct-icon">Toplam Hesap</div>
							<h2><?php echo $toplamHesap;?></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mt-2 mb-2">
				<div class="card">
					<div class="seo-fact sbg1">
						<div class="p-4 d-flex justify-content-between align-items-center">
							<div class="seofct-icon">Aktif Hesap</div>
							<h2><?php echo $aktifHesap;?></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mt-2 mb-2">
				<div class="card">
					<div class="seo-fact sbg1">
						<div class="p-4 d-flex justify-content-between align-items-center">
							<div class="seofct-icon">Banlı Hesap</div>
							<h2><?php echo $banliHesap;?></h2>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4 mt-2 mb-2">
				<div class="card">
					<div class="seo-fact sbg2">
						<div class="p-4 d-flex justify-content-between align-items-center">
							<div class="seofct-icon">Toplam Karakter</div>
							<h2><?php echo $toplamKarakter;?></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mt-2 mb-2">
				<div class="card">
					<div class="seo-fact sbg2">
						<div class="p-4 d-flex justify-content-between align-items-center">
							<div class="seofct-icon">Günlük Kayıt</div>
							<h2><?php echo $gunlukKayit;?></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 mt-2 mb-2">
				<div class="card">
					<div class="seo-fact sbg2">
						<div class="p-4 d-flex justify-content-between align-items-center">
							<div class="seofct-icon">Günlük Giriş</div>
							<h2><?php echo $gunlukGiris;?></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-4 mt-5">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Karakter Diagramı</h4>
				<canvas id="karakter-diagrami" height="233"></canvas>
			</div>
		</div>
	</div>

	<div class="col-lg-4 mt-5">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Bayrak Diagramı</h4>
				<canvas id="bayrak-diagrami" height="233"></canvas>
			</div>
		</div>
	</div>

	<div class="col-lg-4 col-lg-4 mt-5">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Son Yönetici Girişleri</h4>
				<div class="timeline-area">
					<?php if($yoneticiGirisleri) foreach ($yoneticiGirisleri as $giris):?>
					<div class="timeline-task">
						<div class="icon bg2"><i class="fa fa-key"></i></div>
						<div class="tm-title">
							<h4><?php echo $giris->isim;?></h4>
							<span class="time"><i class="ti-time"></i> <?php echo strftime('%e %B %Y <small>%H:%M</small>', strtotime($giris->olusumTarihi));?></span>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>

</div>
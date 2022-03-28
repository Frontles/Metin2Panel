<div class="content-title">
	<h2></h2>
</div>
	<div class="news-title block-title">
		<h3><i class="far fa-newspaper"></i> İÇERİKLER</h3>
		<div class="news-tab">
			<button data-tab="global" class="btn-block active">HABERLER</button>
		</div>
	</div>
	<div class="news active" id="global">
				
					<?php if($haberler) foreach ($haberler as $key => $row):?>
					<div class="last-news-block">
						<div class="news-img">
							<img src="<?php echo $row->resim;?>" alt="news-img">
						</div>
						<div class="last-news-info">
							<h2><?php echo $row->baslik;?></h2>
							<p><?php echo $row->metaDesc;?> </p>
							<div class="news-b">
								<a href="<?php echo base_url('haber/'.$row->HID);?>" class="grey"><i class="fas fa-angle-double-right"></i> Devamını Oku</a> <?php echo strftime('%e %B %Y <small>%H:%M</small>', strtotime($row->olusumTarihi));?>
							</div>
						</div>
					</div>
							<?php endforeach;?>
		<!-- Cache display ending -->	</div>
</div>
<!-- news-block -->
<div class="media-discussions-block">
	<div class="discussion-block">
		<div class="block-title">
			<h3><i class="fas fa-list-alt"></i> Etkinlikler</h3>
		</div>
		
				<div id="events">
					<?php if($etkinlikler = $this->model->getir_aktif_gelecek_etkinlikler()) foreach ($etkinlikler as $key => $etkinlik): ?>
					<div class="forum">
						<img src="/temalar/default/assets/images/etkinlikler/<?php echo array_search($etkinlik->etkinlik, $this->model->enum_degerleri('etkinlikler','etkinlik'));?>.png" alt="Etkinlik Görseli">
						<div class="forum-title">
							<a href="#"><?php echo $etkinlik->etkinlik;?></a>
						</div>
						<div class="forum-autor">
							<?php echo ($etkinlik->durum == "1") ? 'Aktif' : strftime('%e %b %y <br><small>%H:%M</small>', strtotime($etkinlik->baslangicTarihi));?>
						</div>
					</div>
					<?php endforeach;?>
					<?php if($etkinlikler = $this->model->getir_tekrarlayan_etkinlikler()) foreach ($etkinlikler as $key => $etkinlik): ?>
					<div class="forum">
						<img src="/temalar/default/assets/images/etkinlikler/<?php echo array_search($etkinlik->etkinlik, $this->model->enum_degerleri('etkinlikler','etkinlik'));?>.png" alt="Etkinlik Görseli">
						<div class="forum-title">
							<a href="#"><?php echo $etkinlik->etkinlik;?></a>
						</div>
						<div class="forum-autor">
							<?php echo ($etkinlik->tekrarlayan == "1") ? 'Aktif' : strftime('Hergün<br><small>%H:%M</small>', strtotime($etkinlik->baslangicTarihi));?> - Başlama Saati
						</div>
					</div>
					<?php endforeach;?>
							</div>

	</div>

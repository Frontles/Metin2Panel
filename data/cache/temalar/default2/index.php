<div class="content-title">
	<h2></h2>
</div>
<div class="news-block">
	<?php if($haberler) foreach ($haberler as $key => $row):?>
	<div class="top-news-block news block">
		<div class="top-news  flex-s" style="background-image: url(<?php echo $row->resim;?>);">
			<div class="news-img top-news-img"></div>
			<div class="news-info">
				<h2><?php echo $row->baslik;?></h2>
				<div style="height:110px; overflow: hidden;text-overflow: ellipsis">
					<div><?php echo $row->metaDesc;?></div>
				</div>
				<div class="top-news-i flex-s-c">
					<div class="news-date"><?php echo strftime('%e %B %Y <small>%H:%M</small>', strtotime($row->olusumTarihi));?></div>
					<div class="read-more"><a href="<?php echo base_url('haber/'.$row->HID);?>" class="button">Tümünü oku</a></div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach;?>
</div>
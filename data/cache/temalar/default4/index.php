<div class="content-title">
	<h2></h2>
</div>
﻿<div class="content-block-info">
<div class="left-content-block-info">
<div class="news-block">
<div class="content-title c-title">
<a href="<?php echo $this->config->item('link_facebook');?>" target="_blank">Git</a>
<span class="title">Sosyal Medyada Biz</span>
</div>
<iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo $this->config->item('link_facebook');?>&tabs=timeline&width=720&height=800&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="620" height="1020" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
</div>
</div>
<div class="right-content-block-info">
<div class="media-block-i">
<div class="content-title c-title">
<span class="title">Bizi Takip Edin</span>
</div>
<div class="discussion-block">
<div class="forum-title">
<a href="<?php echo $this->config->item('link_facebook');?>"><img src="/temalar/default3/images/facebook_takipet.png" height="110"></a>
</div>
<br>
<center><div class="content-title c-title">
<span class="title">Haberler</span>
</div></center>
<div class="news-block">
	<?php if($haberler) foreach ($haberler as $key => $row):?>
	<div class="top-news-block news block">
		<div class="top-news  flex-s" style="background-color: #162403;);">
			<div class="news-img top-news-img"></div>
			<div class="news-info">
				<h2><?php echo $row->baslik;?></h2>
				<div style="height:110px; overflow: hidden;text-overflow: ellipsis">
					<div><font color="white"><?php echo $row->metaDesc;?></font></div>
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
<div class="forum">
<div class="forum-title">

<div class="fb-group" data-href="https://www.facebook.com/groups/temalar/default3/" data-width="280" data-show-social-context="true" data-show-metadata="false">
</div>
</div>
</div>
</div>
</div>
</div></div>
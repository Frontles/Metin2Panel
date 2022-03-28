					<div class="tabs">
					    <input id="news" type="radio" name="tabs" checked>
					    <label for="news" title="News">Sosyal Medya</label>
					    <input id="events" type="radio" name="tabs">
					    <label for="events" title="Events">Event Takvimi</label>
					    <input id="guides" type="radio" name="tabs">
					    <label for="guides" title="Guides">Haberler</label>
					    <div id="content-news" class="section">
							<!-- news-block -->
							<center><iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo $this->config->item('link_facebook');?>2F&tabs=timeline&width=920&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="920" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></center>

					    </div>  
					    <div id="content-events" class="section">
							<div class="statistics-block">
							<div class="home-blocks-title flex-s-c">
								</div>
						<ul class="forum-block">
							<?php if($etkinlikler = $this->model->getir_aktif_gelecek_etkinlikler()) foreach ($etkinlikler as $key => $etkinlik): ?>
							<li class="top-title">
								<span class="top-number">
								</span>
								<span class="top-name"><?php echo $etkinlik->etkinlik;?></span>
									<font color="yellow"><?php echo ($etkinlik->durum == "1") ? 'Aktif' : strftime('%e %b %y <br><small>%H:%M</small>', strtotime($etkinlik->baslangicTarihi));?></font>
								<span class="score" style="text-align: center;">

								</span>
							</li>
							<?php endforeach;?>
							<?php if($etkinlikler = $this->model->getir_tekrarlayan_etkinlikler()) foreach ($etkinlikler as $key => $etkinlik): ?>
							<li class="top-title">
								<span class="top-number">
								</span>
								<span class="top-name"><?php echo $etkinlik->etkinlik;?></span>
									<font color="yellow"><?php echo ($etkinlik->tekrarlayan == "1") ? 'Aktif' : strftime('%e %b %y <br><small>%H:%M</small>', strtotime($etkinlik->baslangicTarihi));?></font>
								<span class="score" style="text-align: center;">

								</span>
							</li>
							<?php endforeach;?>
						</ul>
					</div><!-- statistics-block -->
					    </div> 
					    <div id="content-guides" class="section">
							<div class="news-block flex-s">
							<?php if($haberler) foreach ($haberler as $key => $row):?>
								<div class="news">
									<div class="news-img">
										<a href=""><img height="100px" src="<?php echo $row->resim;?>" alt=""></a>
									</div>
									<div class="news-title flex-s">
										<h2><?php echo $row->baslik;?></h2> <span><?php echo strftime('%e %B %Y <small>%H:%M</small>', strtotime($row->olusumTarihi));?></span>
									</div>
									<p><?php echo $row->metaDesc;?></p>
									<div class="news-button">
										<a href="<?php echo base_url('haber/'.$row->HID);?>" class="button">Tümünü gör</a>
									</div>
								</div><?php endforeach;?>
							</div>
					    </div>    
					</div><!-- tabs -->
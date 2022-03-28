<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<!--[if lt IE 8]><html class="ie7" lang="en"><![endif]-->
<!--[if IE 8]><html lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="tr">
<!--<![endif]-->
<head>
		<meta charset="utf-8" />
		
		<title><?php echo $this->config->item('site_title');?></title>
		<meta name="author" content="jetsPanel"/>
		<meta name="keywords" content="metin2,metin2 pvp, metin2 pvp serverler" />
		<link rel="shortcut icon" href="<?php echo $this->config->item('site_favicon');?>"/>
		<meta name="description" content="<?php echo $this->config->item('site_description');?>" />
		<meta name="robots" content="index,follow" />
		<meta name="copyright" content="Bu sitenin içeriği Creative Commons Attribution-NonCommercial-ShareAlike 2.5 lisansı ile korunmaktadır." />
		<meta name="language" content="Turkish" />
				
		
		<meta name="msapplication-TileColor" content="#141e27">
			
		
		<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
		<link href="/temalar/default5/css/css-reset.css" rel="stylesheet">
		
		<link href="/temalar/default5/css/orbit.css" rel="stylesheet">
		<link href="/temalar/default5/css/style6569.css?ver=1579460338" rel="stylesheet">
 <link href="/temalar/default5/css/all.css" rel="stylesheet">
<script defer src="/temalar/default5/js/all.js"></script>
		<script src="/temalar/default5/js/modalx.js"></script>
	<script src="/temalar/default/assets/js/jquery-1.11.3.min.js"></script>
	<script src="/temalar/default/assets/js/jquery-ui.min.js"></script>
	<script src="/temalar/default/assets/js/bootstrap-3.3.4.min.js"></script>
<link rel="stylesheet" href="/temalar/default5/css/iziModal.min.css">
<script src="/temalar/default5/js/iziModal.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="/temalar/default5/css/animate.min.css" type="text/css" />
	<script src="/temalar/admin/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
	<?php if($this->config->item('recaptcha_durum') == TRUE): ?>
		<script src='https://www.google.com/recaptcha/api.js?hl=tr'></script>
	<?php endif;?>
	<?php echo html_entity_decode(htmlspecialchars_decode($this->config->item('site_head'),ENT_QUOTES),ENT_QUOTES,'UTF-8');?>
	</head>
	
	<body>
		
	
		<div class="wrapper">
			<header class="header">
				<!-- Cache display startup -->				
				<div class="top-online"><b><?php echo $this->model->getir_online_bilgisi()->total;?></b>AKTİF OYUNCU</div>				
								
				
				<div class="menu-top">
					<ul class="menu-top-left">
									<?php
										$index = [
											'controller/index',
										];
										$kayit = [
											'controller/web_kayit',
										];
										$indir = [
											'controller/web_indir',
										];
										$siralama = [
											'controller/web_siralama',
											'controller/web_siralama_lonca',
										];
									?>
				<?php if($this->config->item('tanitim_durumu') == true):?>
					<li class="<?php active($index);?>"><a href="<?php echo base_url('site');?>">ANASAYFA</a></li>
					<?php else:?>
					<li class="<?php active($index);?>"><a href="<?php echo base_url();?>">ANASAYFA</a></li>
					<?php endif;?>
						<li class="<?php active($kayit);?>"><a href="<?php echo base_url('kayit');?>">HESAP OLUŞTUR</a></li>												
						<li class="<?php active($indir);?>"><a href="<?php echo base_url('indir');?>">OYUNU İNDİR</a></li>
					</ul>
					<ul class="menu-top-right">
						<li class="<?php active($siralama);?>">
							<a href="#">SIRALAMA</a>
							<ul style="width:220px;">
								<li><a href="<?php echo base_url('siralama');?>">KARAKTER SIRALAMASI</a></li>
								<li><a href="<?php echo base_url('siralama_lonca');?>">LONCA SIRALAMASI</a></li>
							</ul>
						</li>
			<?php if(!isset($this->account->id)):?>
			<li><a href="<?php echo base_url('giris_hata');?>">Destek</a></li>
					<?php else:?>
			<li><a href="<?php echo base_url('destek');?>">Destek</a></li>
					<?php endif;?>
						<li><a href="<?php echo $this->config->item('link_tanitim');?>">TANITIM</a></li>
						<li> 
							<a>SOSYAL</a>
							<ul>
								<li><a href="<?php echo $this->config->item('link_facebook');?>">FACEBOOK</a></li>
								<li><a href="<?php echo $this->config->item('link_instagram');?>">İNSTAGRAM</a></li>
								<li><a href="<?php echo $this->config->item('link_twitter');?>">TWİTTER</a></li>
							</ul>
						</li>
					</ul>
				</div>
			<div class="logo">
				<a href="<?php echo base_url();?>">
					<img src="<?php echo (is_file($this->config->item('sitelogo'))) ? base_url($this->config->item('sitelogo')) : '/temalar/admin/assets/images/icon/logo.png';?>">
				</a>
			</div>
			</header>
			
			<!-- .header-->
			<div class="container">
				<main class="content">
					<div class="slider">			
												<div id="featured"> 
									<img src="/temalar/default5/images/slider-img.jpg" alt="Slider-img" rel="slide-img-1" />
								</div>
								<span class="orbit-caption" id="slide-img-1"><a href="#" class="slider-button-news">BİLGİ</a> Türkiye'nin en gelişmiş ve en uzun ömürlü serveri..</span>
								
													</div>
					
					 
					<div class="news-block">
<?php $this->load->view('default5/'.$sayfa);?>
	<!--media-block -->
</div>							
				</main>
				<!-- .content -->
				<aside class="sidebar">
<?php if(!isset($this->account)): ?>
										<div class="sign-up-block">
						<a href='<?php echo base_url('girisyap');?>'><span>ÜYE GİRİŞİ</span>
						BU SAVAŞTA YERİNİ AL!</a>
					</div>
<?php else: ?>
										<div class="uye-panel-block">
						<img src="/temalar/default5/images/user-profile.png" alt="">
						<p>Hoşgeldin, <?php echo $this->account->login; ?></p>
						<a href="<?php echo base_url('panel');?>"><i class="fas fa-gamepad"></i> Kontrol Paneli</a>
					</div>
					<a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown"><div class="nesne-market-btn"><i class="fas fa-shopping-cart"></i> Nesne Market</div></a>
					<a href="#" data-izimodal-open="#epal" data-izimodal-transitionin="fadeInDown"><div class="ep-yukle-btn"><i class="fas fa-credit-card"></i> Ejderha Parası Yükle</div></a>
					<a href="<?php echo base_url('destek');?>"><div class="destek-sistemi-btn"><i class="fas fa-envelope-open-text"></i> Destek Sistemi</div></a>
					<?php endif; ?>
					<div class="social-blocks">
						<div class="social-block social-f">
							<a href="<?php echo $this->config->item('link_facebook');?>">Facebook</a>
						</div>
						<div class="social-block social-twit">
							<a href="<?php echo $this->config->item('link_twitter');?>">Twitter</a>
						</div>
						<div class="social-block social-y">
							<a href="<?php echo $this->config->item('link_youtube');?>">Youtube</a>
						</div>
						<div class="social-block social-twitch">
							<a href="<?php echo $this->config->item('link_facebook');?>">Twitch</a>
						</div>
					</div>
					
					
					<div class="hero-guide-block">
						<div class="hero-info">
							<span>Oyun Tanıtımı</span>
							Oyun hakkında kısa bir tanıtım. <br>
							<a href="https://www.bestiamt2.com/tanitim/" class="grey">TANITIMA GİTMEK İÇİN TIKLAYIN</a>
						</div>
					</div>
					<div class="best-players">
						<div class="sidebar-title best-players-title">
							OYUNCULAR <span>EN İYİ  <b>10</b></span>
						</div>
						<div class="top-players block-p">
						<!-- Cache display startup -->						
							<?php 
								if($oyuncular = $this->model->getir_oyuncu_siralama(10)) foreach ($oyuncular AS $key => $oyuncu):
							?>
								<div class="player-info">
									<div class="top-number"><?php echo ($key+1);?></div>
									<div class="top-name"><?php echo $oyuncu->name;?></div>
									<div class="top-r">
										<span><?php echo $oyuncu->level;?> <sup>Lv</sup></span> <a href="<?php echo base_url('siralama');?>" class="grey steam-button">Detay</a>
									</div>
								</div>
							<?php endforeach;?>
						
												</div>
					</div> 
					<div class="best-players">
						<div class="sidebar-title best-players-title">
							LONCALAR <span>EN İYİ  <b>5</b></span>
						</div>
						<div class="top-players block-p">
						<!-- Cache display startup -->						
						<?php if($loncalar = $this->model->getir_lonca_siralama(10)) foreach ($loncalar AS $key => $lonca): ?>
								<div class="player-info">
									<div class="top-number"><?php echo ($key+1);?></div>
									<div class="top-name"><?php echo $lonca->name;?></div>
									<div class="top-r">
										<span><?php echo $lonca->ladder_point;?></span> <a href="<?php echo base_url('siralama_lonca');?>" class="grey steam-button">Detay</a>
									</div>
								</div>
								<?php endforeach;?>
								
														
												</div>
					</div>
					<div class="fast-links-block">
						<div class="sidebar-title">
							HIZLI ERİŞİM
						</div>
						<div class="block-p">
							<ul>
								<li><a href="<?php echo $this->config->item('link_facebook');?>">Facebook Sayfamız</a></li>
								<li><a href="<?php echo $this->config->item('link_youtube');?>">YouTube Kanalımız</a></li>
								<li><a href="<?php echo $this->config->item('link_instagram');?>">İnstagram Sayfamız</a></li>
							</ul>
						</div>
					</div>
				</aside>
				<!-- .sidebar -->
			</div> 
			<!-- .container-->
						<footer class="footer">
				<div class="partners-block">
					<div class="partners">
					</div>
				</div>
				<!-- partners-block -->
				<div class="bottom-menu">
					<ul>
						<li><a href="<?php echo base_url();?>">ANASAYFA</a></li>
						<li><a href="<?php echo base_url('kayit');?>">HESAP OLUŞTUR</a></li>
						<li><a href="<?php echo base_url('indir');?>">OYUNU İNDİR</a></li>
						<li><a href="<?php echo base_url('sifremi_unuttum');?>">Şifremi Unuttum</a></li>
						<li><a href="<?php echo base_url('pin_sifirla');?>">Pin Kodumu Unutum</a></li>
					</ul>
				</div>
				<!-- bottom-menu -->
				<div id="toTop"></div>
				<div class="copyright">
<center><a><font color="white">Copyright © <a title="Metin2 Site Paneli" href="https://www.jetspanel.com/" style="color: #e5a734;">Jetspanel.com</a> - 2020</font></a><a><br><font color="white"><?php echo $this->config->item('site_title');?> Tüm Hakları Saklıdır.</font></a></br>
<a title="Metin2 Ödeme Yöntemi" href="https://www.payrill.com/" style="color: #e5a734;">Payrill Sanal Mağaza</a> - 0850 303 2609 -  <a href="mailto:contact@payrill.com" style="color: #e5a734;">contact@payrill.com</a></a> </br>
<a href="https://www.payrill.com/"><img height="80" src="/uploads/payrill-logo-white.png"></a></center>
				</div>
			</footer>
			<!-- .footer -->
		</div>
				<?php if($this->config->item('tawkto_durum') == true):?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/<?php echo $this->config->item('tawkto_key');?>/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php endif;?>
<!--Discord Script-->
<?php if($this->config->item('discord_durum') == true):?>
<style>
.discord-widget.active {
    left: 8px;
}
.discord-widget {
    width: 265px;
    transition-property: left;
    transition-duration: 2s;
    -webkit-transition-property: left;
    -webkit-transition-duration: 2s;
    position: fixed;
    bottom: 5px;
    left: 10px;
    z-index: 10;
}

</style>
		<a class="discord-widget active animated <?php echo $this->config->item('efekt_tekrar');?> <?php echo $this->config->item('efekt_turu');?>" href="<?php echo $this->config->item('davet_link');?>" title="Join us on Discord">
		<img src="https://discordapp.com/api/guilds/<?php echo $this->config->item('discord_id');?>/embed.png?style=banner<?php echo $this->config->item('discord_tema');?>">
<?php endif;?>
<!--End Discord Script-->
		<!-- .wrapper -->

			
								<script>
                                    $("#modal").iziModal({
                                        iframe: true,
                                        iframeHeight: 655,
                                        width: 1016,
                                        iframeURL: '/market',
                                        title: 'Nesne Market',
										headerColor: '#01240f',

                                    });
                                    $(document).on('click', '#trigger', function (event) {
                                        event.preventDefault();
                                        // $('#modal').iziModal('setZindex', 99999);
                                        // $('#modal').iziModal('open', { zindex: 99999 });
                                        $('#modal').iziModal('open');
                                    });
								</script>
								
								<script>
                                    $("#epal").iziModal({
                                        iframe: true,
                                        iframeHeight: 655,
                                        width: 1016,
                                        iframeURL: '/market/ep_al',
                                        title: 'Nesne Market',
										headerColor: '#01240f',

                                    });
                                    $(document).on('click', '#trigger', function (event) {
                                        event.preventDefault();
                                        // $('#modal').iziModal('setZindex', 99999);
                                        // $('#modal').iziModal('open', { zindex: 99999 });
                                        $('#modal').iziModal('open');
                                    });
								</script>
		

	<!-- Start fancybox -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css"/>
	<!-- End of fancybox -->

	<script src="/temalar/default5/assets/js/jed.js"></script>
	<script src="/temalar/default5/assets/js/jquery.leanModal.min.js"></script>
	<script src="/temalar/default5/assets/js/jquery.tooltip.js"></script>
	<script src="/temalar/default5/assets/js/ejs.js"></script>
	<script src="/temalar/default5/assets/js/helpers.js"></script>
	<script src="/temalar/default5/assets/js/app.js"></script>
	<script src="/temalar/default5/assets/js/global.js"></script>
	<script src="/temalar/default5/scripts/genel.js"></script>
		<!-- Run the plugin -->

	</body>

</html>

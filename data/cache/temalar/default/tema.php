<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<!--[if lt IE 8]><html class="ie7" lang="en"><![endif]-->
<!--[if IE 8]><html lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="tr">
<!--<![endif]-->

<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title><?php echo $this->config->item('site_title');?></title>
	<meta name="description" content="<?php echo $this->config->item('site_description');?>"/>
	<link rel="shortcut icon" href="<?php echo $this->config->item('site_favicon');?>"/>
	<meta name="author" content="jetsPanel"/>
	<link rel="stylesheet" href="/temalar/default/assets/css/slidercbaran.css" type="text/css"/>
	<link rel="stylesheet" href="/temalar/default/assets/css/css-reset.css" type="text/css"/>
	<link rel="stylesheet" href="/temalar/default/assets/css/fullstyles4d1d.css?ver=1560957193" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<script src="/temalar/default/assets/js/jquery-1.11.3.min.js"></script>
	<script src="/temalar/default/assets/js/jquery-ui.min.js"></script>
	<script src="/temalar/default/assets/js/bootstrap-3.3.4.min.js"></script>
	<link rel="stylesheet" href="/temalar/default/assets/css/animate.min.css" type="text/css" />
	<script src="/temalar/admin/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
	<?php if($this->config->item('recaptcha_durum') == TRUE): ?>
		<script src='https://www.google.com/recaptcha/api.js?hl=tr'></script>
	<?php endif;?>
	<?php echo html_entity_decode(htmlspecialchars_decode($this->config->item('site_head'),ENT_QUOTES),ENT_QUOTES,'UTF-8');?>
</head>
	
<body>
	<div id="exception"></div>
	<div class="top-panel">
		<ul class="menu flex-c-c">
				<?php if($this->config->item('tanitim_durumu') == true):?>
					<li><a href="<?php echo base_url('site');?>">Anasayfa</a></li>
					<?php else:?>
					<li><a href="<?php echo base_url();?>">Anasayfa</a></li>
					<?php endif;?>
			<li><a href="<?php echo base_url('kayit');?>">Kayıt Ol</a></li>
			<li><a href="<?php echo base_url('indir');?>">İndir</a></li>
			<li><a href="<?php echo base_url('siralama');?>">Sıralama</a></li>
			<li><a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">Market</a></li>
			<?php if(!isset($this->account->id)):?>
			<li><a href="<?php echo base_url('giris_hata');?>">Destek</a></li>
					<?php else:?>
			<li><a href="<?php echo base_url('destek');?>">Destek</a></li>
					<?php endif;?>
			<?php if($this->config->item('link_facebook')):?>
			<li><a href="<?php echo $this->config->item('link_facebook');?>" target="_blank">Facebook</a></li>
			<?php endif;?>
			<?php if($this->config->item('link_tanitim')):?>
			<a href="<?php echo $this->config->item('link_tanitim');?>" target="_blank">Tanıtım</a>
			<?php endif;?>
		</ul>
	</div>
	<div class="wrapper">
		<header class="header">
			<div class="logo">
				<a href="<?php echo base_url();?>">
					<img src="<?php echo (is_file($this->config->item('sitelogo'))) ? base_url($this->config->item('sitelogo')) : '/temalar/admin/assets/images/icon/logo.png';?>">
				</a>
			</div>

			<div class="leaves">
				<div class="leaves-1"></div>
				<div class="leaves-1 leaves-d-3"></div>
				<div class="leaves-2"></div>
				<div class="leaves-3"></div>
				<div class="leaves-2 leaves-d-1"></div>
				<div class="leaves-3 leaves-d-2"></div>
			</div>
		</header>

		<div class="container">
			<aside class="left-sidebar sidebar">
				<div class="download-block">
					<a href="<?php echo base_url('indir');?>" class="flex-c-c"><span>OYUNU İNDİR<b>Dosya Boyutu: 1.4 GB</b></span></a>
				</div>
			
				<?php if(!isset($this->account)): ?>
					<div class="widget red-light login-block">
						<form action="<?php echo base_url('giris');?>" autocomplete="off" method="post" class="ajax-form-json">
							<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
							<div class="widget-title flex-s-c">Giriş yap <a href="<?php echo base_url('kayit');?>">Kayıt ol</a></div>

							<p class="login l-input">
								<?php echo form_input('login', null, ['class'=>'', 'placeholder'=>'Kullanıcı Adı', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>
							</p>

							<p class="pass l-input">
								<?php echo form_password('password', null, ['class'=>'', 'placeholder'=>'Parola', 'autocomplete'=>'off',  'autofocus']);?>
							</p>
							
							<?php if($this->config->item('pin_durum') == TRUE):?>
								<p class="pass l-input">
									<?php echo form_password($this->config->item('pin_kolon'), null, ['class'=>'', 'placeholder'=>'Pin Kodunuz ('.$this->config->item('pin_karakter_sayisi').' Karakter)', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>
								</p>
							<?php endif;?>

							<?php if($this->config->item('recaptcha_durum') == TRUE): ?>
								<div class="g-recaptcha" data-sitekey="<?php echo html_entity_decode(htmlspecialchars_decode(@$this->config->item('recaptcha_sitekey'),ENT_QUOTES),ENT_QUOTES,'UTF-8');?>" style="-webkit-transform: scale(0.8);-webkit-transform-origin: 0 0;"></div>
							<?php endif; ?>

							<div class="flex-s-c buttons">
								<button type="submit" class="login-button button-n">Giriş<i class="cont button-border"></i></button>
								<a href="<?php echo base_url('sifremi_unuttum');?>" class="lost">Birşeyleri unuttum.</a>
							</div>
						</form>
					</div>
				<?php else: ?>
					<div class="widget red-light login-block">
						
						<form class="lk-form block-l">
							<div class="lk-title">
								<span class="username">Merhaba, <?php echo $this->account->login; ?></span>
							</div>

							<div class="lk-coins">
								<a data-fancybox data-type="iframe" data-src="" href="javascript:;" class="gold-a">Yükle</a>
								<span class="coins" id="my_credits"><?php echo $this->account->cash; ?></span>
								<span class="username">Ejderha Parası</span>
							</div>

							<ul>
								<li><a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">Nesne Market</a></li>
								<li><a href="<?php echo base_url('panel');?>">Kullanıcı Paneli</a></li>
								<li><a href="<?php echo base_url('parola_degistir');?>">Parola Değiştir</a></li>
								<li><a href="<?php echo base_url('email_degistir');?>">E-Mail Değiştir</a></li>
								<li><a href="<?php echo base_url('karakter_silme_kodu_degistir');?>">K.S Kodu Değiştir</a></li>
								<li><a href="<?php echo base_url('depo_sifresi_iste');?>">Depo Şifresini İste</a></li>
								<li><a href="<?php echo base_url('cikis');?>">Çıkış Yap</a></li>
							</ul>
						</form>
					</div>
				<?php endif; ?>

				<div class="widget red-dark">
					<div class="widget-title">Oyuncu Sıralaması<span></span></div>
					<div id="top_players">
						<ul class="top-block">
							<li class="top-title">
								<span class="top-number">#</span>
								<span class="top-name">Bayrak</span>
								<span class="top-name">İsim</span>
								<span class="top-lvl">LvL</span>
							</li>
							<?php 
								if($oyuncular = $this->model->getir_oyuncu_siralama(10)) foreach ($oyuncular AS $key => $oyuncu):
							?>
							<li class="top-list">
								<span class="top-number"><?php echo ($key+1);?></span>
								<span class="top-flag-3">
									<a href="javascript:void(0);"><img src="/temalar/default/assets/images/empire_flag_<?php echo $oyuncu->empire;?>.png"></a>
								</span>
								<span class="top-name"><a href="javascript:void(0);"><?php echo $oyuncu->name;?></a></span>
								<span class="top-lvl"><?php echo $oyuncu->level;?></span>
							</li>
							<?php endforeach;?>
						</ul>
					</div>
					<br/>
				</div>

				<div class="widget red-light">
				<?php if($this->config->item('link_facebook')):?>
					<div class="widget-title">Sosyal Medya<span></span> <a href="<?php echo $this->config->item('link_facebook');?>">Facebook Sayfası İçin Tıklayın</a> </div>
<iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo $this->config->item('link_facebook');?>&tabs=timeline&width=220&height=220&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="220" height="220" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
				<?php endif;?>
				</div>
			</aside>

			<main class="content">
				<div class="slider">
					<div id="carouselbrn">
						<div class="aslider">
							<div class="tarrow anext"></div>
							<div class="tarrow bprev"></div>
							<div class="cslides">
								<div class="fslide sactive">
									<img src="/temalar/default/assets/images/slider-img2.jpg" alt="">
									<div class="aslider-text">
										<h1>Eşsiz Kalite</h1>
										<p></p>
									</div>
								</div>
								<div class="fslide">
									<img src="/temalar/default/assets/images/slider-img2.jpg" alt="">
									<div class="aslider-text">
										<h1>Eşsiz Kalite</h1>
										<p></p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<script src="/temalar/default/assets/js/cjquery-2.1.4.min.js"></script>
					<script src="/temalar/default/assets/js/cglobal.js"></script>
				</div>
				<?php $this->load->view('default/'.$sayfa);?>
			</main>

			<aside class="right-sidebar sidebar">
				<?php if($this->config->item('link_tanitim')):?>
				<div class="bilgi-block">
					<a href="<?php echo $this->config->item('link_tanitim');?>" target="_blank" class="flex-c-c"><span>OYUN TANITIMI <b>Genel Özellikler </b></span></a>
					<div class="ninja"></div>
				</div>
				<?php endif;?>

				<div class="bilgi-block">
					<a href="<?php echo base_url('siralama');?>" class="flex-c-c"><span>EN İYİ OYUNCULAR<b>Efsane Oyuncular</b></span></a>
					<div class="wolf"></div>
				</div>

				<div class="bilgi-block">
					<a href="<?php echo base_url('siralama_lonca');?>" class="flex-c-c"><span>EN İYİ LONCALAR<b>Üst Seviye Takımlar</b></span></a>
					<div class="sura"></div>
				</div>
				
				<?php if($this->config->item('online_sayac_durumu') == TRUE):?>
				<div class="status-block flex-c-c">
					<div class="server-x"></div>
					<div class="server">
						<div class="flex-s-c">
							<span class="server-name">Online Sayısı </span> 
								<span class="status-online">
									<b id="PlayerOnline"><?php echo $this->model->getir_online_bilgisi()->total;?> </b>
								</span>
							</span>
						</div>
						<div class="progress-bar">
							<span id="Progress" style="width: <?php echo $this->model->getir_online_bilgisi()->yuzde;?>%;"></span>
						</div>
					</div>
					
				</div>
				<?php endif;?>

				<div class="widget red-dark">
					<div class="widget-title">Lonca Sıralaması<span></span></div>
					<div id="top_guilds">
						<ul class="top-block guild">
							<li class="top-title">
								<span class="top-number">#</span>
								<span class="top-name">Lonca Adı</span>
								<span class="score">Puan</span>
							</li>
							<?php if($loncalar = $this->model->getir_lonca_siralama(10)) foreach ($loncalar AS $key => $lonca): ?>
							<li class="top-list">
								<span class="top-number"><?php echo ($key+1);?></span>
								<span class="top-name"><a href="javascript:void(0);"><?php echo $lonca->name;?></a></span>
								<span class="score"><?php echo $lonca->ladder_point;?></span>
							</li>
							<?php endforeach;?>
						</ul>
					</div>
					<br/>
				</div>

				<div class="widget red-dark">
					<div class="widget-title">Etkinlik Takvimi<span></span></div>
					<div id="top_guilds">
						<ul class="top-block guild">
							<?php if($etkinlikler = $this->model->getir_aktif_gelecek_etkinlikler()) foreach ($etkinlikler as $key => $etkinlik): ?>
							<li class="top-title">
								<span class="top-number">
									<img src="/temalar/default/assets/images/etkinlikler/<?php echo array_search($etkinlik->etkinlik, $this->model->enum_degerleri('etkinlikler','etkinlik'));?>.png" />
								</span>
								<span class="top-name"><?php echo $etkinlik->etkinlik;?></span>
								<span class="score" style="text-align: center;">
									<?php echo ($etkinlik->durum == "1") ? 'Aktif' : strftime('%e %b %y <br><small>%H:%M</small>', strtotime($etkinlik->baslangicTarihi));?>

								</span>
							</li>
							<?php endforeach;?>
							<?php if($etkinlikler = $this->model->getir_tekrarlayan_etkinlikler()) foreach ($etkinlikler as $key => $etkinlik): ?>
							<li class="top-title">
								<span class="top-number">
									<img src="/temalar/default/assets/images/etkinlikler/<?php echo array_search($etkinlik->etkinlik, $this->model->enum_degerleri('etkinlikler','etkinlik'));?>.png" />
								</span>
								<span class="top-name"><?php echo $etkinlik->etkinlik;?></span>
								<span class="score" style="text-align: center;">
									<?php echo ($etkinlik->tekrarlayan == "1") ? 'Aktif' : strftime('Hergün<br><small>%H:%M</small>', strtotime($etkinlik->baslangicTarihi));?>

								</span>
							</li>
							<?php endforeach;?>
						</ul>
					</div>
					<br>
				</div>

				<div class="banner-block flex-c-c"> </div>
			</aside>
		</div>

		<footer class="footer">
			<div id="toTop"></div>
			<div class="footer-block-t flex-s-c">
				<ul class="f-menu footer-block-l">
				<?php if($this->config->item('tanitim_durumu') == true):?>
					<li><a href="<?php echo base_url('site');?>">Anasayfa</a></li>
					<?php else:?>
					<li><a href="<?php echo base_url();?>">Anasayfa</a></li>
					<?php endif;?>
					<li><a href="<?php echo base_url('kayit');?>">Kayıt Ol</a></li>
					<li><a href="<?php echo base_url('indir');?>">İndir</a></li>
					<li><a href="<?php echo base_url('siralama');?>">Sıralama</a></li>
					<li><a href="<?php echo base_url('destek');?>">Destek</a></li>
					<?php if($this->config->item('link_forum')):?>
						<li><a href="<?php echo $this->config->item('link_forum');?>" target="_blank">Forum</a></li>
					<?php endif;?>
					<?php if($this->config->item('link_tanitim')):?>
						<li><a href="<?php echo $this->config->item('link_tanitim');?>" target="_blank">Tanıtım</a></li>
					<?php endif;?>
					
				</ul>
				<div class="soc-block footer-block-r">
					<?php if($this->config->item('link_facebook')):?>
						<a href="<?php echo $this->config->item('link_facebook');?>" class="facebook"></a>
					<?php endif;?>
					<?php if($this->config->item('link_twitter')):?>
						<a href="<?php echo $this->config->item('link_twitter');?>" class="twitter"></a>
					<?php endif;?>
					<?php if($this->config->item('link_youtube')):?>
						<a href="<?php echo $this->config->item('link_youtube');?>" class="youtube"></a>
					<?php endif;?>
				</div>
			</div>

<center>			<div class="footer-block-b flex-s">
				<div class="copyright footer-block-l">
					<p><a><font color="white">Copyright © <a title="Metin2 Site Paneli" href="https://www.jetspanel.com/">Jetspanel.com</a> - 2020</font></a><a><br><font color="white"><?php echo $this->config->item('site_title');?> Tüm Hakları Saklıdır.</font></a><br>
				<a><a title="Metin2 Ödeme Yöntemi" href="https://www.payrill.com/">Payrill Sanal Mağaza</a> - 0850 303 2609 -  <a href="mailto:contact@payrill.com">contact@payrill.com</a></a><br><br>
				<a href="https://www.payrill.com/"><img height="80" src="/uploads/payrill-logo-white.png"></a></p>
				<!--</div><a href="https://www.jetspanel.com/"><img height="35" src="/uploads/jetspanel-logo-white.png"></a>-->
			</div>
		</footer>
	</div></center>
	<link rel="stylesheet" href="/temalar/default/assets/css/iziModal.min.css">
<script src="/temalar/default/assets/js/iziModal.min.js" type="text/javascript"></script>
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
	<!-- Start fancybox -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" type="text/css"/>
	<!-- End of fancybox -->

	<script src="/temalar/default/assets/js/jed.js"></script>
	<script src="/temalar/default/assets/js/jquery.leanModal.min.js"></script>
	<script src="/temalar/default/assets/js/jquery.tooltip.js"></script>
	<script src="/temalar/default/assets/js/ejs.js"></script>
	<script src="/temalar/default/assets/js/helpers.js"></script>
	<script src="/temalar/default/assets/js/app.js"></script>
	<script src="/temalar/default/assets/js/global.js"></script>
	<script src="/temalar/default/scripts/genel.js"></script>
</body>

</html>
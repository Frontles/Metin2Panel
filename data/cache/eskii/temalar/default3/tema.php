
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="wrapper" style="margin-top: -15px;">
<!DOCTYPE html>
<!--[if lt IE 8]><html class="ie7" lang="en"><![endif]-->
<!--[if IE 8]><html lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="tr">
<!--<![endif]-->
<head>
<meta charset="utf-8" />
<title><?php echo $this->config->item('site_title');?></title>
<meta name="description" content="<?php echo $this->config->item('site_description');?>" />
<meta name="google-site-verification" content="tAhAcRPBo4MTcoz_7ZgAn6ISUGhcZvEVDfEegiIYtcA" />

<link rel="manifest" href="manifest.json" />

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-81212126-3"></script>
<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-81212126-3');
		</script>
<link href="/temalar/default3/css/reset.css" rel="stylesheet">
<link href="/temalar/default3/css/style.css" rel="stylesheet">
<link href="/temalar/default3/css/global.css" rel="stylesheet">
<link href="/temalar/default3/css/util.css" rel="stylesheet">
<link href="/temalar/default3/css/small-page.css" rel="stylesheet">
<link href="/temalar/default3/css/animate.min.css" rel="stylesheet">
<link href="/temalar/default3/lib/fancybox3/jquery.fancybox.min.css" rel="stylesheet">
<link href="/temalar/default3/fonts/fontawesome/fontawesome-combined.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/temalar/default3/uyari/sweetalert.css">
<script src="/temalar/admin/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
<script src="/temalar/default3/uyari/sweetalert.min.js"></script>
<link rel="shortcut icon" href="<?php echo $this->config->item('site_favicon');?>"/>
<script src="/temalar/default3/js/jquery-2.1.4.min.js"></script>
<script src="/temalar/default3/lib/jquery/jquery.min.js"></script>
<script src="/temalar/default3/lib/fancybox3/jquery.fancybox.min.js"></script>
<script src="/temalar/default3/js/slider.js"></script>
<script src="/temalar/default3/js/modalx.js"></script>
	<script src="/temalar/default/assets/js/jquery-1.11.3.min.js"></script>
	<script src="/temalar/default/assets/js/jquery-ui.min.js"></script>
	<script src="/temalar/default/assets/js/bootstrap-3.3.4.min.js"></script>
<link rel="stylesheet" href="/temalar/default3/css/iziModal.min.css">
<script src="/temalar/default3/js/iziModal.min.js" type="text/javascript"></script>
	<script src="/temalar/admin/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
<script src="js/global.js"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="../connect.facebook.net/tr_TR/sdk.html#xfbml=1&version=v3.3&appId=299079951022914&autoLogAppEvents=1"></script>
<script>
			$(function() {$(window).scroll(function() {if($(this).scrollTop() != 0) {$('#toTop').fadeIn();} else {$('#toTop').fadeOut();}});$('#toTop').click(function() {$('body,html').animate({scrollTop:0},800);});});
		</script>
	<?php if($this->config->item('recaptcha_durum') == TRUE): ?>
		<script src='https://www.google.com/recaptcha/api.js?hl=tr'></script>
	<?php endif;?>
	<?php echo html_entity_decode(htmlspecialchars_decode($this->config->item('site_head'),ENT_QUOTES),ENT_QUOTES,'UTF-8');?>
</head>
<body>
<div class="wrapper">
<header class="header">
<div class="menu-top">
<ul class="menu-top-left">
				<?php if($this->config->item('tanitim_durumu') == true):?>
					<li><a href="<?php echo base_url('site');?>">Anasayfa</a></li>
					<?php else:?>
					<li><a href="<?php echo base_url();?>">Anasayfa</a></li>
					<?php endif;?>
<li>
<a href="<?php echo base_url('kayit');?>">KAYIT OL</a>
</li>
<li>
<a href="<?php echo base_url('indir');?>">İNDİR</a>
</li>
</ul>
<ul class="menu-top-right">
<li>
</li>
<li>
<a href="<?php echo base_url('forum');?>" target="_blank">FORUM</a>
</li>
			<?php if(!isset($this->account->id)):?>
			<li><a href="<?php echo base_url('giris_hata');?>">Destek</a></li>
					<?php else:?>
			<li><a href="<?php echo base_url('destek');?>">Destek</a></li>
					<?php endif;?>
<li>
<a href="<?php echo $this->config->item('link_tanitim');?>" target="_blank" style="color: #caff00;">TANITIM</a>
</li>
</ul>
			<div class="logoyeni">
				<a href="<?php echo base_url();?>">
					<img src="<?php echo (is_file($this->config->item('sitelogo'))) ? base_url($this->config->item('sitelogo')) : '/temalar/admin/assets/images/icon/logo.png';?>">
				</a>
			</div>
			<!-- Bu veri önbellekten gösterilmektedir. --> 
<div class="server-load">
<div>AKTİF<br> OYUNCU</div>
<span>
<?php echo $this->model->getir_online_bilgisi()->total;?> </span>
</div>
</div>
</header>
				<!-- Ön bellek gösterimi burada sona ermektedir. --> 
<div class="container">
<main class="content">
<div class="top-content-block">
<div class="download-bonus-block">
<div class="download">
<a href="<?php echo base_url('indir');?>"></a>
</div>
<div class="bonus-block">
<a href="<?php echo $this->config->item('link_facebook');?>" target="_blank" class="bonus">
&nbsp;
</a>
<?php if(!isset($this->account->id)):?>
<a href="<?php echo base_url('giris_hata');?>" target="_blank" class="facebook">
&nbsp;
</a>
<?php else:?>
<a href="<?php echo base_url('destek');?>" target="_blank" class="facebook">
&nbsp;
</a>
<?php endif;?>
<a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown" class="support">
&nbsp;
</a>
<a href="<?php echo $this->config->item('link_facebook');?>" class="shop" target="_blank">
&nbsp;
</a>
</div>
</div>
<div class="slider">
<div class="next"> </div>
<div class="prev"> </div>
<div class="slides">
<div class="slide active">
<img src="/temalar/default3/images/slider/v14slider.jpg" alt="">
<div>
<a href="<?php echo $this->config->item('link_facebook');?>" target="_blank">Detaylar</a>
<h2></h2>
<span>Savaşa Hazırmısın !</span>
</div>
</div>
<div class="slide">
<img src="/temalar/default3/images/slider/acilis_tarihi.jpg" alt="">
<h2>Efsane açılışı kaçırma !</h2>
<div>
<a href="#" target="_blank">Haberler</a>
<span>Hemen kayıt ol ve oyun kurulumunu tamamla.</span>
</div>
</div>
<div class="slide">
<h2>Ödüllü Turnuvalar</h2>
<p>Hemen yerini al ödülleri kaçırma.</p>
<img src="/temalar/default3/images/slider/2.jpg" alt="">
<div>
<a href="#" target="_blank">Haberler</a>
<span>Büyük ws turnuvasında yer almak ister misin?</span>
</div>
</div>
<div class="slide">
<h2>Büyük lonca savaşları</h2>
<p></p>
<img src="/temalar/default3/images/slider/1.jpg" alt="">
<div>
<a href="#" target="_blank">Haberler</a>
<span>Yeni Panelimiz Aktif.</span>
</div>
</div>
</div>
<div class="navigation"></div>
</div>
</div>
<?php $this->load->view('default3/'.$sayfa);?>

</main>


<aside class="sidebar">
<div class="shop-block">
<div class="shop ninja">
<p>OYUN REHBERİ</p>
<span>YENİ BİR OYUNCU MUSUN?</span>
<a href="<?php echo $this->config->item('link_tanitim');?>" class="blue-a">OYUN TANITIMINA GİT</a>
</div>
<div class="shop sura">
<p>EN İYİ OYUNCULAR</p>
<span>EN İYİ OYUNCULARIN SIRALAMASI</span>
<a href="<?php echo base_url('siralama');?>" class="blue-a green-a">OYUNCU SIRALAMASINA GİT</a>
</div>
<div class="shop shaman">
<p>EN İYİ LONCALAR</p>
<span>EN İYİ LONCALARIN SIRALAMASI</span>
<a href="<?php echo base_url('siralama_lonca');?>" class="gold-a">LONCA SIRALAMASINA GİT</a>
</div>
</div>

<div class="login-block">
<div class="login-block-b">
<div class="lk-form block-l">
<div id="sonuc_cikis"></div>
<br>

<div class="lk-title">
<?php if(!isset($this->account)): ?>
							<div class="login-block">
							
								<div class="login-block-b">
										<div class="login-form block-p">
										<div class="login-title">
											<span>VEYA <i class="far fa-arrow-right"></i>&nbsp;&nbsp;<a onclick='new modal("#reg_modal"); return false' href="<?php echo base_url('kayit');?>">Kaydol</a></a></span>GIRIS YAP
										</div>
				
				<br>
			<form action="<?php echo base_url('giris');?>" autocomplete="off" method="post" class="ajax-form-json">
			<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
				<div class="form-group">
					<div class="login-block input">
					    <p class="login-in" style="margin-bottom: 15px;"><?php echo form_input('login', null, ['class'=>'', 'placeholder'=>'Kullanıcı Adı', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?></p>
					</div>
				</div>
								<div class="form-group">
					<div class="login-block input">
					    <p class="password-in" style="margin-bottom: 15px;"><?php echo form_password('password', null, ['class'=>'', 'placeholder'=>'Parola', 'autocomplete'=>'off',  'autofocus']);?></p>
					</div>
					<?php if($this->config->item('pin_durum') == TRUE):?>
					<div class="form-group">
					<div class="login-block input">
					    <p class="password-in" style="margin-bottom: 15px;"><?php echo form_password($this->config->item('pin_kolon'), null, ['class'=>'', 'placeholder'=>'Pin Kodunuz ('.$this->config->item('pin_karakter_sayisi').' Karakter)', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?></p>
					</div>
					<?php endif;?>
					<div class="form-group">
							<?php if($this->config->item('recaptcha_durum') == TRUE): ?>
								<div class="g-recaptcha" data-sitekey="<?php echo html_entity_decode(htmlspecialchars_decode(@$this->config->item('recaptcha_sitekey'),ENT_QUOTES),ENT_QUOTES,'UTF-8');?>" style="-webkit-transform: scale(0.8);-webkit-transform-origin: 0 0;"></div>
							<?php endif; ?>
					</div>
											<input type="checkbox" id="check" name="rememberMe">
										</div> 
											<br>				
										<button type="submit" data-theme="dark">GİRİŞ YAP</button>
										<a href="<?php echo base_url('sifremi_unuttum');?>" class="lost-pass" style="float:right;">Parolamı unuttum.</a>
										<?php if($this->config->item('pin_durum') == TRUE):?><a href="<?php echo base_url('pin_sifirla');?>" class="lost-pass" style="float:right;margin-top: -10px;">Pin Şifremi unuttum.</a><?php endif;?>
																			</form>
								<div>
													</script>
																			</form>
								</div>
							</div></div><div>
<?php else: ?>
<a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown" class="top-up-btn gold-a">YÜKLE</a>
<span class="coins"> <?php echo $this->account->cash; ?> EP</span>
<span class="username"><?php echo $this->account->login; ?></span>
<span class="userdetail">E-Posta :<?php echo $this->account->email; ?> </span>
</div>
<ul>
<li><a href="<?php echo base_url('panel');?>">Kullanıcı Paneli</a></li>
<li><a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">Nesne Market</a></li>
<li><a href="<?php echo base_url('parola_degistir');?>">Hesap Şifresi Değiştir</a></li>
<li><a href="<?php echo base_url('email_degistir');?>">E-Posta Adresi Değiştir</a></li>
<li><a href="<?php echo base_url('depo_sifresi_iste');?>">Depo Şifresi İste</a></li>
<li><a href="<?php echo base_url('karakter_silme_kodu_degistir');?>">Karakter Silme Kodu Değiştir</a></li>
<li><a href="<?php echo base_url('pin_degistir');?>">Pin Şifresini Değiştir</a></li>
<li><a href="<?php echo base_url('destek');?>">Destek Talebi</a></li>
<li><a href="<?php echo base_url('cikis');?>">Çıkış Yap</a>
</li>
</ul>
<form id="webpost_quit" action="javascript:void(0);" method="post" style="display: none;">
<input type="hidden" name="post" value="quit" onclick="webpost_quit();">
</form>
</div>
</div>
</div>
<?php endif; ?>
<div class="best-players">
<div class="sidebar-title best-players-title">
EN İYİ OYUNCULAR <span>EN İYİ<b>5</b></span>
</div>
<br>
				
			<!-- Bu veri önbellekten gösterilmektedir. --> 
			
						<table class="table table-siralama">
						<thead>
							<tr>
							</tr>
						</thead>
						<tbody>
						<?php if($oyuncular = $this->model->getir_oyuncu_siralama(5)) foreach ($oyuncular AS $key => $oyuncu): ?>
						<tr class="renk-purple">
						
								<td style="text-align:center;">						<td>
						<? if($key == 0)
							echo ($i = '<img src="/temalar/default3/images/highscore/1.png"/>');
						else if($key == 1)
							echo ($i = '<img src="/temalar/default3/images/highscore/2.png"/>');
						else if($key == 2)
							echo ($i = '<img src="/temalar/default3/images/highscore/3.png"/>');
						else
							echo ($key+1);
						?></td></td>		
								<td class="hidden-xs"><img src="/temalar/default3/assets/images/empire_flag_<?php echo $oyuncu->empire;?>.png" width="32" height="15"/></td>
								<td><?php echo $oyuncu->name;?></a></td>
								<td style="text-align:center;"><?php echo $oyuncu->level;?><sup>Lv</sup></td>
							</tr>
						<?php endforeach;?>
						</tbody>
						</table>
						<!-- Ön bellek gösterimi burada sona ermektedir. --> 				

<div class="player-info">



<div class="top-ava">
<div class="top-r">

<br>


</div>
</div>



</div>
</div>
<div class="best-guilds">
<div class="sidebar-title best-guilds-title"> EN İYİ LONCALAR <span>EN İYİ<b>5</b></span> </div><br>
			
					<table class="table table-siralama">
					<thead>
					</thead>
					<tbody>
						<?php if($loncalar = $this->model->getir_lonca_siralama(10)) foreach ($loncalar AS $key => $lonca): ?>
								<td style="text-align:center;">						<td>
						<? if($key == 0)
							echo ($i = '<img src="/temalar/default3/images/highscore/1.png"/>');
						else if($key == 1)
							echo ($i = '<img src="/temalar/default3/images/highscore/2.png"/>');
						else if($key == 2)
							echo ($i = '<img src="/temalar/default3/images/highscore/3.png"/>');
						else
							echo ($key+1);
						?></td></td>
							<td><?php echo $lonca->name;?></a></td>
							<td style="text-align:center;"><?php echo $lonca->ladder_point;?></td>
						</tr>
						<?php endforeach;?>
						
					</tbody>
					</table>
					<!-- Ön bellek gösterimi burada sona ermektedir. --> 	

<br><br>
</div>
</div>
</aside>
</div>
<footer class="footer">
<div class="footer-links-block">
<div class="footer-links-block-i">
<div class="footer-top">
<div class="footer-logo">
<a href="index-2.html"></a>
</div>
<div class="footer-s">
<span>
<a href="<?php echo base_url('siralama');?>">Oyuncu Sıralaması</a>
</span>
<span>
<a href="<?php echo base_url('siralama_lonca');?>">Lonca Sıralaması</a>
</span>
<span>
<a href="<?php echo $this->config->item('link_tanitim');?>">Oyun Tanıtımı</a>
</span>
<span>
<a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">Ejderha Parası Satın Al</a>
</span>
<span>
<a href="<?php echo base_url('destek');?>">Destek Sistemi</a>
</span>
<span>
<a href="#">Oyuncu Sözleşmesi</a>
</span>
<span>
<a href="<?php echo base_url('indir');?>">İndir</a>
</span>
<span>
<a href="<?php echo base_url('kayit');?>">Kayıt Ol</a>
</span>
</div>
</div>
</div>
</div>
<div class="footer-nav">
<div class="soc-links">
<a href="<?php echo $this->config->item('link_facebook');?>" target="_blank" class="facebook"></a>
<a href="<?php echo $this->config->item('link_instagram');?>" target="_blank" class="inst"></a>
<a href="<?php echo $this->config->item('link_twitter');?>" target="_blank" class="twitter"></a>
</div>
<div class="banner">
<a href="anasayfa.html"><img src="<?php echo (is_file($this->config->item('sitelogo'))) ? base_url($this->config->item('sitelogo')) : '/temalar/admin/assets/images/icon/logo.png';?>" height="40" alt=""></a>
</div>
<div class="f-menu">
<ul>
				<?php if($this->config->item('tanitim_durumu') == true):?>
					<li><a href="<?php echo base_url('site');?>">Anasayfa</a></li>
					<?php else:?>
					<li><a href="<?php echo base_url();?>">Anasayfa</a></li>
					<?php endif;?>
<li><a href="<?php echo base_url('indir');?>">İndir</a></li>
<li><a href="<?php echo base_url('kayit');?>">Kayıt Ol</a></li>
<li><a href="<?php echo base_url('forum');?>" target="_blank">Forum</a></li>
<li><a href="<?php echo base_url('destek');?>" target="_blank">Destek</a></li>
<li><a href="<?php echo $this->config->item('link_tanitim');?>" target="_blank">Tanıtım</a></li>
</ul>
</div>
</div>
<br>
<center><a><font color="white">Copyright © <a title="Metin2 Site Paneli" href="https://www.jetspanel.com/" style="color: #e5a734;">Jetspanel.com</a> - 2020</font></a><a><br><font color="white"><?php echo $this->config->item('site_title');?> Tüm Hakları Saklıdır.</font></a></br>
<a title="Metin2 Ödeme Yöntemi" href="https://www.payrill.com/" style="color: #e5a734;">Payrill Sanal Mağaza</a> - 0850 303 2609 -  <a href="mailto:contact@payrill.com" style="color: #e5a734;">contact@payrill.com</a></a> </br>
<a href="https://www.payrill.com/"><img height="80" src="/uploads/payrill-logo-white.png"></a></center>
</footer>
</div>
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
	<script src="/temalar/default3/assets/js/global.js"></script>
	<script src="/temalar/default/scripts/genel.js"></script>
</body>

</html>

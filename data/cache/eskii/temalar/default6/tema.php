<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html lang="tr">
<head>
	<title><?php echo $this->config->item('site_title');?></title>
	<meta name="keywords" content="metin2 pvp" />
	<meta name="description" content="<?php echo $this->config->item('site_description');?>"/>
    <link href="/temalar/default6/css/css-reset.css" rel="stylesheet">
    <link href="/temalar/default6/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<script src="/temalar/default6/assets/js/jquery-1.11.3.min.js"></script>
	<script src="/temalar/default6/assets/js/jquery-ui.min.js"></script>
	<script src="/temalar/default6/assets/js/bootstrap-3.3.4.min.js"></script>
	<link rel="stylesheet" href="https://www.alesia2.com/css/animate.min.css" type="text/css" />
	<script src="/temalar/admin/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
<link rel="stylesheet" href="/temalar/default3/css/iziModal.min.css">
<script src="/temalar/default3/js/iziModal.min.js" type="text/javascript"></script>
	<?php if($this->config->item('recaptcha_durum') == TRUE): ?>
		<script src='https://www.google.com/recaptcha/api.js?hl=tr'></script>
	<?php endif;?>
	<?php echo html_entity_decode(htmlspecialchars_decode($this->config->item('site_head'),ENT_QUOTES),ENT_QUOTES,'UTF-8');?>
</head>
<body>
	<div class="wrapper">
		<header class="header">
			<div class="top-panel flex-s-c">
				<ul class="menu">
				<?php if($this->config->item('tanitim_durumu') == true):?>
					<li><a href="<?php echo base_url('site');?>">Anasayfa</a></li>
					<?php else:?>
					<li><a href="<?php echo base_url();?>">Anasayfa</a></li>
					<?php endif;?>
					<li><a href="<?php echo base_url('kayit');?>">Kayıt Ol</a></li>
					<li><a href="<?php echo base_url('indir');?>">İndir</a></li>
					<li><a href="<?php echo base_url('siralama');?>">Sıralama</a></li>
					<li><a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">Market</a></li>
					<li><a href="#">Facebook</a></li>
					<li><a href="<?php echo base_url('siralama_lonca');?>">Lonca S.</a></li>
					<div class="onlineyaz"></div>
					
				</ul>
			</div><!-- top-panel --><div class="yazivar"><?php echo $this->model->getir_online_bilgisi()->total;?> online</div>
			<div class="logo">
				<a href="<?php echo base_url();?>">
					<img src="<?php echo (is_file($this->config->item('sitelogo'))) ? base_url($this->config->item('sitelogo')) : '/temalar/admin/assets/images/icon/logo.png';?>">
				</a>
			</div>
		</header><!-- .header-->
			<div class="container">
				<div class="top-block-content flex-s">
					<div class="slider">
						<div class="next arrows"> </div>
						<div class="prev arrows"> </div>
						<div class="slides">
							<div class="slide active" style="background-image: url(/temalar/default6/images/slider-img.jpg);">
								<div class="slide-info">
									<h2>Maceraya Hazır mısın?</h2>
									<p>Loncalar burada buluşuyor <br></p>
								</div>
								<div class="slider-button">
									<a href="<?php echo $this->config->item('link_facebook');?>" class="button button-blue">Sosyal Medya</a>
								</div>
							</div>
							<div class="slide" style="background-image: url(/temalar/default6/images/slider-img_1.jpg); ">
								<div class="slide-info">
									<h2>Loncanı Topla</h2>
									<p>Savaşa Katıl <br> En güçlü sen ol ...</p>
								</div>
								<div class="slider-button">
									<a href="<?php echo $this->config->item('link_facebook');?>" class="button button-blue">Sosyal Medya</a>
								</div>
							</div>
							<div class="slide" style="background-image: url(/temalar/default6/images/slider-img_2.jpg); ">
								<div class="slide-info">
									<h2>Ödülleri Topla</h2>
									<p>Ödüllü yarışmalar <br> ve düellolar seni bekliyor ...</p>
								</div>
								<div class="slider-button">
									<a href="<?php echo $this->config->item('link_facebook');?>" class="button button-blue">Sosyal Medya</a>
								</div>
							</div>
						</div>
						<div class="navigation">
						</div>
					</div><!-- slider -->
					<div class="right-block-top-block-content">
						<div class="buttons flex-s">
							<a href="<?php echo base_url('indir');?>" class="download-button"><span>Oyunu İndir</span> 800 MB</a> <a href="<?php echo base_url('kayit');?>" class="sign-button"><span>Kayıt Ol</span> Maceraya Katıl</a>
						</div>
							<div class="server server1 flex-s-c">
								<div class="online-server">
						<?php if(!isset($this->account)): ?>
						<form action="<?php echo base_url('giris');?>" autocomplete="off" method="post" class="ajax-form-json">
							<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
							<br><br><br><br>
							<p class="login l-input">
								<?php echo form_input('login', null, ['class'=>'', 'placeholder'=>'Kullanıcı Adı', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>
							</p>

							<p class="pass l-input">
								<?php echo form_password('password', null, ['class'=>'', 'placeholder'=>'Parola', 'autocomplete'=>'off',  'autofocus']);?>
							</p>
							<?php if($this->config->item('pin_durum') == TRUE):?>
									<?php echo form_password($this->config->item('pin_kolon'), null, ['class'=>'', 'placeholder'=>'Pin Kodunuz ('.$this->config->item('pin_karakter_sayisi').' Karakter)', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>
							<?php endif;?>
							<br><?php if($this->config->item('recaptcha_durum') == TRUE): ?>
								<div class="g-recaptcha" data-sitekey="<?php echo html_entity_decode(htmlspecialchars_decode(@$this->config->item('recaptcha_sitekey'),ENT_QUOTES),ENT_QUOTES,'UTF-8');?>" style="-webkit-transform: scale(0.8);-webkit-transform-origin: 0 0;"></div>
							<?php endif; ?>
															<div class="giriskisim">
					<button type="submit"
					class="btn btn-giris btn-block">Giriş Yap</button></div>
					<div class="unuttumkisim"><a href="<?php echo base_url('cikis');?>" class="button button-blue">S. Unuttum</a></div>
					<?php else: ?>
					<table>
           <div class="box-style4" style="margin-bottom: 20px;">
                <div class="entry">
                    <div id="ucp_info">
                        <div class="half">
                            <table width="100%">
                                <tr>
                                    <td width="5%"><img src="/temalar/default6/assets/images/user.png"/></td>
                                    <td width="45%"><font color="yellow">Hesap</font></td>
                                    <td width="50%"> <font color="yellow"><?php echo $this->account->login; ?></font></td>
                                </tr>
                                <tr>
                                    <td><img src="/temalar/default6/assets/images/email.png"/></td>
                                     <td> <font color="yellow">E-Mail</td>
                                    <td> <font color="yellow"><?php echo $this->account->email; ?></font></td>
                                </tr>
                                <tr>
                                    <td><img src="/temalar/default6/assets/images/award_star_bronze_1.png"/></td>
                                    <td> <font color="yellow">Ejderha Parası</font></td>
                                    <td> <font color="yellow"><?php echo $this->account->cash; ?></font></td>
                                </tr>
							</table>
															<div class="cikiskisim"><a href="<?php echo base_url('cikis');?>" class="button button-blue">Çıkış Yap</a></div>
															</table>
					<?php endif; ?>
								</form>
					
								
								</div>
							</div>
					</div><!-- right-block-top-block-content -->
				</div><!--top-block-content -->
				<main class="content">
<?php $this->load->view('default6/'.$sayfa);?>
				</main><!-- .content -->
				<div class="block-buttons flex-s">
					<a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown" class="donation"><span>Nesne Market</span> yüzlerce efsanevi ürün seni bekliyor!</a> <a href="" class="start"><span>Karakter Sıralaması</span>Sence kim daha güçlü?</a> <a href="" class="statistics"><span>En İyi Lonca</span>En iyi Performans Gösteren loncalar </a>
				</div>
				<div class="home-blocks flex-s">
					<div class="media-block">
						<div class="home-blocks-title flex-s-c">
							<h3><span class="h-size h-color">Sosyal</span>Medya</h3> <a href="<?php echo $this->config->item('link_facebook');?>" class="button button-blue button-small">Tıkla</a>
						</div>
							<iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo $this->config->item('link_facebook');?>&tabs=timeline&width=330&height=320&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="330" height="320" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>

					</div><!-- media-block -->
					<div class="best-block">
						<div class="home-blocks-title flex-s-c">
							<h3><span class="h-color"><span class="h-size">K</span>arakter</span> <span class="h-size">S</span>ıralaması</h3> 
						</div>
						<div class="best-block-d">
							<div class="player-best-title flex-s-c">
								<span class="player-name-t">İsim</span> <span class="player-lvl">Lv</span>
							</div>
							<ul class="top">
						<?php	if($oyuncular = $this->model->getir_oyuncu_siralama(8)) foreach ($oyuncular AS $key => $oyuncu):?>
						
								<li><span class="top-number"><?php echo ($key+1);?>.</span> <span class="top-name" title="Nickname"><?php echo $oyuncu->name;?></span> <span class="top-lvl"><?php echo $oyuncu->level;?></span></li>
<?php endforeach;?>
							</ul>
						</div><!-- best-block-d -->
					</div><!-- best-block -->
					<div class="statistics-block">
						<div class="home-blocks-title flex-s-c">
							<h3><span class="h-color"><span class="h-size">E</span>tkinlik</span> <span class="h-size">T</span>akvimi</h3> <a href="<?php echo $this->config->item('link_facebook');?>" class="button button-orange button-small">Facebook</a>
						</div>
						<ul class="forum-block">
						
						<?php if($etkinlikler = $this->model->getir_aktif_gelecek_etkinlikler()) foreach ($etkinlikler as $key => $etkinlik): ?>
							<li>
								<a href="" class="forum-title"><?php echo $etkinlik->etkinlik;?></a>
								<div class="forum-info flex-s-c">
									<span> <a href="" class="author"><?php echo ($etkinlik->durum == "1") ? 'Aktif </a></span> <span class="date">' : strftime('%e %b %y <br><small>%H:%M</small>', strtotime($etkinlik->baslangicTarihi));?></span>
								</div>
							</li>
							<?php endforeach;?>
						<?php if($etkinlikler = $this->model->getir_tekrarlayan_etkinlikler()) foreach ($etkinlikler as $key => $etkinlik): ?>
							<li>
								<a href="" class="forum-title"><?php echo $etkinlik->etkinlik;?></a>
								<div class="forum-info flex-s-c">
									<span> <a href="" class="author"></a></span> <span class="date"><?php echo ($etkinlik->tekrarlayan == "1") ? 'Aktif ' : strftime('%e %b %y <br><small>%H:%M</small>', strtotime($etkinlik->baslangicTarihi));?></span>
								</div>
							</li>
							<?php endforeach;?>

						</ul>
					</div><!-- statistics-block -->
				</div><!-- home-blocks -->
			</div><!-- .container-->
								<script>
                                    $("#modal").iziModal({
                                        iframe: true,
                                        iframeHeight: 655,
                                        width: 1016,
                                        iframeURL: '/market',
                                        title: 'Nesne Market',
										headerColor: '#431715',

                                    });
                                    $(document).on('click', '#trigger', function (event) {
                                        event.preventDefault();
                                        // $('#modal').iziModal('setZindex', 99999);
                                        // $('#modal').iziModal('open', { zindex: 99999 });
                                        $('#modal').iziModal('open');
                                    });
								</script>
		<footer class="footer">
			<div class="footer-menu flex">
				<ul>
					<li>Hızlı Menü</li>
					<li><a href="<?php echo base_url();?>">Anasayfa</a></li>
					<li><a href="<?php echo base_url('kayit');?>">Kayıt Ol</a></li>
					<li><a href="<?php echo base_url('indir');?>">İndir</a></li>
				</ul>
				<ul>
					<li>Sıralamalar</li>
					<li><a href="<?php echo base_url('siralama');?>">Karakter Sıralaması</a></li>
					<li><a href="<?php echo base_url('siralma_lonca');?>">Lonca Sıralaması</a></li>
				</ul>
				<ul>
					<li>Sosyal Medya</li>
					<li><a href="<?php echo $this->config->item('link_facebook');?>">Facebook</a></li>
					<li><a href="<?php echo $this->config->item('davet_link');?>">Discord</a></li>
					<li><a href="<?php echo $this->config->item('link_twitter');?>">Twitter</a></li>
					<li><a href="<?php echo $this->config->item('link_instagram');?>">İnstagram</a></li>
				</ul>
			</div>
			<div class="copyright">
<center><a><font color="black">Copyright © <a title="Metin2 Site Paneli" href="https://www.jetspanel.com/" style="color: #0627c7;">Jetspanel.com</a> - 2020</font></a><a><br><font color="black"><?php echo $this->config->item('site_title');?> Tüm Hakları Saklıdır.</font></a></br>
<a title="Metin2 Ödeme Yöntemi" href="https://www.payrill.com/" style="color: #0627c7;">Payrill Sanal Mağaza</a> - 0850 303 2609 -  <a href="mailto:contact@payrill.com" style="color: #0627c7;">contact@payrill.com</a></a> </br>
<a href="https://www.payrill.com/"><img height="80" src="/uploads/payrill-logo-white.png"></a></center>
			</div>
		</footer><!-- .footer -->
	</div><!-- .wrapper -->
	<!-- Video Modal -->
	<div class='modal_window' id="video_modal-1">
		<a href="#" class='close_mw close-r'></a>
        <iframe width="1000" height="540" src="https://www.youtube.com/embed/ZpFu_8mILhE" allowfullscreen></iframe>
	</div>
	<div class='modal_window' id="video_modal-2">
		<a href="#" class='close_mw close-r'></a>
        <iframe width="1000" height="540" src="https://www.youtube.com/embed/ZpFu_8mILhE" allowfullscreen></iframe>
	</div>
	<div class='modal_window' id="video_modal-3">
		<a href="#" class='close_mw close-r'></a>
        <iframe width="1000" height="540" src="https://www.youtube.com/embed/ZpFu_8mILhE" allowfullscreen></iframe>
	</div>
	<script src="/temalar/default6/js/global.js"></script>
	<script src="/temalar/default6/assets/js/jed.js"></script>
	<script src="/temalar/default6/assets/js/jquery.leanModal.min.js"></script>
	<script src="/temalar/default6/assets/js/jquery.tooltip.js"></script>
	<script src="/temalar/default6/assets/js/ejs.js"></script>
	<script src="/temalar/default6/assets/js/helpers.js"></script>
	<script src="/temalar/default6/assets/js/app.js"></script>
	<script src="/temalar/default6/scripts/genel.js"></script>
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
</body>
</html>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html class="no-js" lang="tr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Jestpanel - Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="/temalar/admin/assets/images/icon/favicon.ico">
	<link rel="stylesheet" href="/temalar/admin/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/themify-icons.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/metisMenu.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/slicknav.min.css">
	<?php echo put_css();?>
	<link rel="stylesheet" href="/temalar/admin/assets/css/typography.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/default-css.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/styles.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/responsive.css">

	<script src="/temalar/admin/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="body-bg">
	<!--[if lt IE 8]>
			<p class="browserupgrade"><strong>Eski versiyon</strong> bir tarayıcı kullanıyorsunuz. Giriş yapabilmek için lütfen <a href="http://browsehappy.com/">tarayıcınızı yükseltiniz.</a> </p>
		<![endif]-->
	<div id="preloader"><div class="loader"></div></div>
	<div class="horizontal-main-wrapper">
		<div class="mainheader-area">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-3">
						<div class="logo">
							<a href="<?php echo base_url('admin');?>">
								<img src="<?php echo (is_file($this->config->item('logo'))) ? base_url($this->config->item('logo')) : '/temalar/admin/assets/images/icon/logo.png';?>" alt="logo">
							</a>
						</div>
					</div>
					<div class="col-md-9 clearfix text-right">
						<div class="d-md-inline-block d-block mr-md-4">
							<ul class="notification-area">
								<li><span id="date_time" style="font-size: 10px;"></span></li>
								<li id="full-view"><i class="ti-fullscreen"></i></li>
								<li id="full-view-exit"><i class="ti-zoom-out"></i></li>
								<li>
									<a href="<?php echo base_url('admin/cache_sil');?>">
										<i class="ti-trash" style="font-size: 26px;color: #bdbcbc;vertical-align: middle;text-shadow: 0 0 8px rgba(0, 0, 0, 0.12);-webkit-transition: color 0.3s ease 0s;transition: color 0.3s ease 0s;"></i>
									</a>
								</li>
								<?php if($this->config->item('ses_durumu') == true):?>
								<li>
									<a href="<?php echo base_url('admin/ses_kapat');?>">
										<i class="ti-headphone-alt" style="font-size: 26px;color: #bdbcbc;vertical-align: middle;text-shadow: 0 0 8px rgba(0, 0, 0, 0.12);-webkit-transition: color 0.3s ease 0s;transition: color 0.3s ease 0s;"></i>
									</a>
								</li>
								<?php else:?>
								<li>
									<a href="<?php echo base_url('admin/ses_ac');?>">
										<i class="ti-announcement" style="font-size: 26px;color: #bdbcbc;vertical-align: middle;text-shadow: 0 0 8px rgba(0, 0, 0, 0.12);-webkit-transition: color 0.3s ease 0s;transition: color 0.3s ease 0s;"></i>
									</a>
								</li>
								<?php endif;?>
							</ul>
						</div>
						<div class="clearfix d-md-inline-block d-block">
							<div class="user-profile m-0">
								<img class="avatar user-thumb" src="/temalar/admin/assets/images/author/avatar.png" alt="avatar">
								<h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $this->admin->isim;?> <i class="fa fa-angle-down"></i></h4>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="/admin/cikis">Çıkış</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-area header-bottom">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-12 d-none d-lg-block">
						<div class="horizontal-menu">
							<nav>
								<ul id="nav_menu">
									<li class=""><a href="/admin"><i class="ti-dashboard"></i> <span>Kontrol Panel</span></a></li>
									<li class="">
										<a href="javascript:void(0)"><i class="ti-hand-stop"></i><span>Market</span></a>
										<ul class="submenu">
											<li><a href="/admin/kategoriler">Kategoriler</a></li>
											<li><a href="/admin/esyalar">Eşya Yönetimi</a></li>
											<li><a href="/admin/kuponlar">Kupon Yönetimi</a></li>
											<li><a href="/admin/market_haberler">Haber Yönetimi</a></li>
											<li><a href="/admin/market_ayarlari">Market Ayarları</a></li>
											<li><a href="/admin/market_tema">Market Tema Ayarları</a></li>
											<li><a href="/admin/oyun_ici_market">Oyun İçi Market</a></li>
									<?php if($this->config->item('happyhour_durum') == true):?>
											<li class="active"><a href="/admin/happy_hour_ayari">Happy Hour Ayarı[%<?php echo $this->config->item('happyhour_oran')?>]</a></li>
									<?php else:?>
											<li><a href="/admin/happy_hour_ayari">Happy Hour Ayarları</a></li>
									<?php endif;?>
										</ul>
									</li>
									<li class="">
										<a href="javascript:void(0)"><i class="ti-world"></i><span>Site Yönetimi</span></a>
										<ul class="submenu">
											<li><a href="/admin/tema_ayarlari">Tema Ayarları</a></li>
											<li><a href="/admin/haberler">Haber Yönetimi</a></li>
											<li><a href="/admin/etkinlikler">Etkinlik Yönetimi</a></li>
											<li><a href="/admin/sayac_ayarlari">Sayaç Ayarları</a></li>
											<li><a href="/admin/recaptcha_ayarlari">Recaptcha Ayarları</a></li>
											<li><a href="/admin/pack_yonetimi">Pack Yönetimi</a></li>
											<li><a href="/admin/bakim_sistemi">Bakım Sistemi</a></li>
										</ul>
									</li>
									<li class="">
										<a href="javascript:void(0)">
											<i class="ti-rocket"></i><span>Ticket Yön. </span>
											<span class="badge badge-primary badge-pill"><?php echo $GLOBALS['ticketsayisi'];?></span>
										</a>
										<ul class="submenu">
											<li><a href="/admin/ticket_acik">Açık Talepler</a></li>
											<li><a href="/admin/ticket_kapali">Kapalı Talepler</a></li>
										</ul>
									</li>
									<?php
										$oynActive = [
											'controller/admin_karakter_ara',
											'controller/admin_hesap_ara',
										];
									?>
									<li class="<?php active($oynActive);?>">
										<a href="javascript:void(0)"><i class="ti-game"></i> <span>Oyun Yön.</span></a>
										<ul class="submenu">
											<li><a href="/admin/hesap_ara">Hesap Ara</a></li>
											<li><a href="/admin/karakter_ara">Karakter Ara</a></li>
											<li><a href="/admin/esya_ara">Eşya Ara</a></li>
										</ul>
									</li>
									<li class="">
										<a href="javascript:void(0)"><i class="ti-shield"></i><span>Log Yön.</span></a>
										<ul class="submenu">
											<li><a href="/admin/market_log">Market Logları</a></li>
											<li><a href="/admin/ban_log">Ban Logları</a></li>
											<li><a href="/admin/giris_log">Giriş Logları</a></li>
										</ul>
									</li>
									<?php
										$ayrActive = [
											'controller/admin_yoneticiler', 'controller/admin_yonetici_ekle','controller/admin_yonetici_duzenle','controller/admin_yonetici_sifre_degistir',
											'controller/admin_mail_ayarlari', 'controller/admin_site_ayarlari',
											'controller/admin_mail_sablonlari', 'controller/admin_mail_duzenle', 'controller/admin_mail_onizleme',
											'controller/admin_oyun_db_ayarlari'
										];
									?>
									<li class="<?php active($ayrActive);?>">
										<a href="javascript:void(0)"><i class="fa fa-cogs"></i>
											<span>Ayarlar</span></a>
										<ul class="submenu">
											<li class=""><a href="/admin/yoneticiler">Yöneticiler</a></li>
											<li class=""><a href="/admin/oyun_db_ayarlari">Oyun Database</a></li>
											<li class=""><a href="/admin/mail_ayarlari">Mail Ayarları</a></li>
											<li class=""><a href="/admin/mail_sablonlari">Mail Şablonları</a></li>
											<li class=""><a href="/admin/link_ayarlari">Link ve Tablo Ayarları</a></li>
											<li class=""><a href="/admin/site_ayarlari">Site Ayarları</a></li>
											<li class=""><a href="/admin/pin_ayarlari">Pin Ayarları</a></li>
											<li class=""><a href="/admin/itemtr_ayarlar">itemTR Ayarları</a></li>
											<li class=""><a href="/admin/paywant_ayarlari">Paywant Ayarları</a></li>
											<li class=""><a href="/admin/oyun_alisveris_ayari">Oyun Alışveriş Ayarları</a></li>
											<li class=""><a href="/admin/itemci_alisveris_ayari">İtemci Alışveriş Ayarları</a></li>
											<li class=""><a href="/admin/tawk_to_ayarlari">Tawk.to Ayarları</a></li>
											<li class=""><a href="/admin/discord_widget_ayarlari">Discord Ayarları</a></li>
										</ul>
									</li>
									<li class="">
										<a href="javascript:void(0)"><i class="ti-shield"></i><span>Kayıt Ayarı</span></a>
										<ul class="submenu">
											<li><a href="/admin/kayit_durum">Kayıt Durumu</a></li>
											<li><a href="/admin/referans_sistemi">Referans Sistemi</a></li>
											<li><a href="/admin/referans_durum">Referans Durumu</a></li>
										</ul>
									</li>
									<li class="">
										<a href="javascript:void(0)"><i class="ti-shield"></i><span>İndex Sistemi</span></a>
										<ul class="submenu">
											<li><a href="/admin/index_durum">İndex Durumu</a></li>
											<li><a href="/admin/index_ayarlari">İndex Ayarları</a></li>
											<li><a href="/admin/tanitim_sistemi">İçerik Ekle</a></li>
											<li><a href="/admin/index_tema_ayarlari">İndex Tema Ayarları</a></li>
											<li><a href="/admin/sosyal_medya">Sosyal Medya</a></li>
											<li><a href="/admin/genel_ozellikler">Genel Özellikler</a></li>
											<li><a href="/admin/biyolog_duzenle">Biyolog ayarları</a></li>
											<li><a href="/admin/boss_ayarlari">Boss Ayarları</a></li>
											<li><a href="/admin/donusum_duzenle">Dönüşüm Ayarları</a></li>
											<li><a href="/admin/efsun_oranlari">Efsun Oranları</a></li>
											<li><a href="/admin/baslangic_ayarlari">Başlangıç ayarları</a></li>
										</ul>
									</li>
									<?php
										$ayrActive3 = [
											'controller/admin_itemtr_nedir',
											'controller/admin_itemtr_ayarlar'
										];
									?>
									<li class="<?php active($ayrActive3);?>">
										<a href="javascript:void(0)"><i class="fa fa-cc-visa"></i>
											<span>Payrill Ödeme Çözümü</span></a>
										<ul class="submenu">
											<li class=""><a href="/admin/payrill_ayarlar">Ayarlar</a></li>
											<li class=""><a href="/admin/payrill_nedir">Payrill Nedir?</a></li>
										</ul>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					

					<div class="col-12 d-block d-lg-none">
						<div id="mobile_menu"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-content-inner">
			<div class="container">
				<?php $this->load->view('admin/'.$sayfa);?>
			</div>
		</div>
		<footer>
			<div class="footer-area">
				<p>© Copyright 2020. Tüm hakları saklıdır. Yazılım sahibi <a href="https://jetspanel.com">JetsPanel</a></p>
			</div>
		</footer>
	</div>
<?php if($this->config->item('bakim_durumu') == true):?>
<style>

.bakimmodu {
    width: 105px;
    transition-property: right;
    transition-duration: 2s;
    -webkit-transition-property: right;
    -webkit-transition-duration: 2s;
    position: fixed;
    bottom: 5px;
    right: 100px;
    z-index: 10;
}
@media screen and (max-width: 600px) {
  .nomobile {
    visibility: hidden;
    clear: both;
    float: right;
    margin: 5px auto;
    width: 22%;
    height: auto;
    display: none; // Önemli olan nokta burası burayı kaldırırsanız sadece mobile için görüntülenir. 
  }
}

</style>
<link rel="stylesheet" href="/temalar/admin/assets/css/animate.min.css" type="text/css" />
<div class="bakimmodu nomobile active animated flip">
	<a href="/admin/bakim_sistemi"><img src="/uploads/bakimmodu.png"></a>
</div>
<?php endif;?>
	<script>
        function date_time(id){
            var date = new Date;
            var year = date.getFullYear();
            var month = date.getMonth();
            var months = new Array('Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık');
            var d = date.getDate();
            var day = date.getDay();
            var days = new Array('Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi');
            var h = date.getHours();
            if(h<10)
            {
                h = "0"+h;
            }
            var m = date.getMinutes();
            if(m<10)
            {
                m = "0"+m;
            }
            var s = date.getSeconds();
            if(s<10)
            {
                s = "0"+s;
            }
            var result = d+' '+months[month]+' '+year+' ['+days[day]+'] - '+h+':'+m+':'+s;
            document.getElementById(id).innerHTML = result;
            setTimeout('date_time("'+id+'");','1000');
            return true;
        }
        date_time('date_time');
    </script>

	<script src="/temalar/admin/assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="/temalar/admin/assets/js/popper.min.js"></script>
	<script src="/temalar/admin/assets/js/bootstrap.min.js"></script>
	<script src="/temalar/admin/assets/js/owl.carousel.min.js"></script>
	<script src="/temalar/admin/assets/js/metisMenu.min.js"></script>
	<script src="/temalar/admin/assets/js/jquery.slimscroll.min.js"></script>
	<script src="/temalar/admin/assets/js/jquery.slicknav.min.js"></script>
	<script src="/temalar/admin/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
	<script type="text/javascript">
		<?php echo noty_run();?>
	</script>    
	<?php echo put_js();?>
	<script src="/temalar/admin/assets/js/plugins.js"></script>
	<?php if($this->config->item('ses_durumu') == true):?>
		<script src="/temalar/admin/scripts/genel.js"></script>
	<?php else:?>
		<script src="/temalar/admin/scripts/geneloff.js"></script>
	<?php endif;?>
	<script src="/temalar/admin/assets/js/scripts.js"></script>
	<div id="ajax-modal" class="modal fade"></div>
</body>

</html>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html class="no-js" lang="tr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Jetspanel - Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="/temalar/admin/assets/images/icon/favicon.ico">
	<link rel="stylesheet" href="/temalar/admin/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/themify-icons.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/metisMenu.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/slicknav.min.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/typography.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/default-css.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/styles.css">
	<link rel="stylesheet" href="/temalar/admin/assets/css/responsive.css">
	<?php if($this->config->item('recaptcha_durum') == TRUE): ?>
		<script src='https://www.google.com/recaptcha/api.js?hl=tr'></script>
	<?php endif;?>
	<script src="/temalar/admin/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
	<!--[if lt IE 8]>
			<p class="browserupgrade"><strong>Eski versiyon</strong> bir tarayıcı kullanıyorsunuz. Giriş yapabilmek için lütfen <a href="http://browsehappy.com/">tarayıcınızı yükseltiniz.</a> </p>
		<![endif]-->
	<div id="preloader"><div class="loader"></div></div>
	<div class="login-area login-bg">
		<div class="container">
			<div class="login-box ptb--100">
				<form autocomplete="off" method="post" class="ajax-form-json" action="">
					<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
					<div class="login-form-head">
						<img src="/temalar/admin/assets/images/wite.png" height="100" width="340">
						<p><font color="black">JetsPanel Oyun Paneli Sistemi Yönetim Paneline Hoş Geldiniz.</font></p>
					</div>
					<div class="login-form-body">
						<div class="form-gp">
							<label for="exampleInputEmail1"></label>
							<?php echo form_label('Eposta Adresi', 'eposta');?>
							<?php echo form_input('eposta', null, ['class'=>'form-control', 'autoComplete'=>'off', 'required'=>'required'])?>
							<i class="ti-email"></i>
						</div>
						<div class="form-gp">
							<?php echo form_label('Şifre', 'sifre');?>
							<?php echo form_password('sifre', null, ['class'=>'form-control', 'autoComplete'=>'new-password', 'required'=>'required'])?>
							<i class="ti-lock"></i>
						</div>
						<div style="display:none">
							<input type="password" tabindex="-1"/>
							<input type="password" style="visibility: hidden;">
						</div>
						<div class="submit-btn-area">
							<button id="form_submit" type="submit">GİRİŞ YAP <i class="ti-arrow-right"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="/temalar/admin/assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="/temalar/admin/assets/js/popper.min.js"></script>
	<script src="/temalar/admin/assets/js/bootstrap.min.js"></script>
	<script src="/temalar/admin/assets/js/owl.carousel.min.js"></script>
	<script src="/temalar/admin/assets/js/metisMenu.min.js"></script>
	<script src="/temalar/admin/assets/js/jquery.slimscroll.min.js"></script>
	<script src="/temalar/admin/assets/js/jquery.slicknav.min.js"></script>
	<script src="/temalar/admin/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
	<script src="/temalar/admin/scripts/genel.js"></script>
	<script src="/temalar/admin/assets/js/plugins.js"></script>
	<script src="/temalar/admin/assets/js/scripts.js"></script>
</body>

</html>
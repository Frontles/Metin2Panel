	
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8" />
	<title><?php echo $this->config->item('site_title');?></title>
	<meta name="description" content="<?php echo $this->config->item('site_description');?>"/>
	<link rel="shortcut icon" href="<?php echo $this->config->item('site_favicon');?>"/>
	<meta name="viewport" content="width=1240, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
		<script src="../../ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="b606f0c052aad64b5c941f9a-text/javascript"></script>
	<link rel="stylesheet" href="/temalar/default8/css/animate.min.css" type="text/css" />
	<script src="/temalar/admin/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
    <link href="/temalar/default8/css/style.css" rel="stylesheet">
	<link href="/temalar/default8/css/buton.css" rel="stylesheet">
	<link href="/temalar/default8/css/fonts.css" rel="stylesheet">
<script src="/temalar/default7/js/jquery-2.1.4.min.js"></script>
<script src="/temalar/default7/lib/jquery/jquery.min.js"></script>
<script src="/temalar/default7/lib/fancybox3/jquery.fancybox.min.js"></script>
<script src="/temalar/admin/plugins/noty/packaged/jquery.noty.packaged.min.js"></script>
<script src="/temalar/default7/uyari/sweetalert.min.js"></script>
<script src="/temalar/default/assets/js/jquery-1.11.3.min.js"></script>
<script src="/temalar/default/assets/js/jquery-ui.min.js"></script>
<script src="/temalar/default/assets/js/bootstrap-3.3.4.min.js"></script>

<link rel="shortcut icon" href="<?php echo $this->config->item('site_favicon');?>"/>
	<?php if($this->config->item('recaptcha_durum') == TRUE): ?>
		<script src='https://www.google.com/recaptcha/api.js?hl=tr'></script>
	<?php endif;?>
	
</head>







<div class="menu-top">
	<center>
                            <ul class="menu-top">
				<?php if($this->config->item('tanitim_durumu') == true):?>
					<li><a href="<?php echo base_url('site');?>">Anasayfa</a></li>
					<?php else:?>
					<li><a href="<?php echo base_url();?>">Anasayfa</a></li>
					<?php endif;?>
			<li><a href="<?php echo base_url('kayit');?>">Kayıt Ol</a></li>
			<li><a href="<?php echo base_url('indir');?>">İndir</a></li>
					<li><a>Sıralamalar</a>
                                    <ul>
                                        <li><a href="<?php echo base_url('siralama');?>">Oyuncu Sıralaması</a></li>
                                        <li><a href="<?php echo base_url('siralama_lonca');?>">Lonca Sıralaması</a></li>
                                    </ul>
			<li><a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">Market</a></li>
			<?php if(!isset($this->account->id)):?>
			<li><a href="<?php echo base_url('giris_hata');?>">Destek</a></li>
					<?php else:?>
			<li><a href="<?php echo base_url('destek');?>">Destek</a></li>
					<?php endif;?>
			<?php if($this->config->item('link_facebook')):?>
			<li><a href="<?php echo $this->config->item('link_facebook');?>" target="_blank">Facebook</a></li>
			<?php endif;?>
                            </ul></center>
																						                        </div>



<body>

	<div class="wrapper">
		<header class="header"><div class="slider-effect"></div>
<style>
.logoyeni {
	margin-left: 340px;
	}
</style>
			<div class="logoyeni">
				<a href="<?php echo base_url();?>">
					<img src="<?php echo (is_file($this->config->item('sitelogo'))) ? base_url($this->config->item('sitelogo')) : '/temalar/admin/assets/images/icon/logo.png';?>">
				</a>
			</div>
			<div class="leaves">
				<div class="leaves-left-1">
				</div>
				<div class="leaves-left-2">
				</div>
				<div class="leaves-left-3">
				</div>
				<div class="leaves-left-4">
				</div>
				<div class="leaves-left-5">
				</div>
				<div class="leaves-right-1">
				</div>
				<div class="leaves-right-2">
				</div>
				<div class="leaves-right-3">
				</div>
				<div class="leaves-right-4">
				</div>
				<div class="leaves-right-5">
				</div>
			</div>
		</header><!-- .header-->
			
			<div class="container">

				<aside class="right-sidebar sidebar">
					<div class="download-block">
						<a href="<?php echo base_url('indir');?>" class="flex-c-c"></a>
					</div><!-- download-block -->
					
					<div class="widget red-light login-block">
					
						<div class="widget-title flex-s-c">

						
								Giriş Yap 
						</div>
		<?php if(!isset($this->account)): ?>
						<form action="<?php echo base_url('giris');?>" autocomplete="off" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
							<p class="login l-input"><?php echo form_input('login', null, ['class'=>'', 'placeholder'=>'Kullanıcı Adı', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?></p>							
							<p class="pass l-input"><?php echo form_password('password', null, ['class'=>'', 'placeholder'=>'Parola', 'autocomplete'=>'off',  'autofocus']);?>
</p>							
							<?php if($this->config->item('pin_durum') == TRUE):?>
								<p class="pass l-input">
									<?php echo form_password($this->config->item('pin_kolon'), null, ['class'=>'', 'placeholder'=>'Pin Kodunuz ('.$this->config->item('pin_karakter_sayisi').' Karakter)', 'autocomplete'=>'off', 'spellcheck'=>'false', 'autofocus']);?>
								</p>
							<?php endif;?>
							<?php if($this->config->item('recaptcha_durum') == TRUE): ?>
								<div class="g-recaptcha" data-sitekey="<?php echo html_entity_decode(htmlspecialchars_decode(@$this->config->item('recaptcha_sitekey'),ENT_QUOTES),ENT_QUOTES,'UTF-8');?>" style="-webkit-transform: scale(0.8);-webkit-transform-origin: 0 0;"></div>
							<?php endif; ?>



								</select> </p>
							<div class="flex-s-c buttons">
							
								<div class="lost"> <a href="<?php echo base_url('sifremi_unuttum');?>">Şifrenimi Unuttun ? </a>
								<?php if($this->config->item('pin_durum') == TRUE):?>
								  <br> <a href="<?php echo base_url('pin_sifirla');?>">Pin Şifrenimi Unuttun ?</a>
								  <?php endif; ?>
								</div>

								<button type="submit" class="login-button button-n">Giriş<i class="cont button-border"></i></button>
							</div>



						</form>
						<?php else: ?>
			<center><sup></sup></center>

				<tr>
<div class="profil-info">
                <div>Kullanıcı Adı: <span><?php echo $this->account->login; ?></span></div>
				<div>Mevcut EP: <span><?php echo $this->account->cash; ?></span></div>
                <div>Mevcut EM: <span><?php echo $this->account->mileage; ?></span></div>
                <div style="position: absolute;right: 10%;top: 20%;">
                </div>
            </div>
					



<ul class="user-menu">
                <li class="orange">
                    <a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown">Market</a>
                </li>
                <li class="orange">
                    <a href="#" data-izimodal-open="#modal2" data-izimodal-transitionin="fadeInDown">EP
                        Satın Al</a>
                </li>
                <li class="orange">
                    <a class="open-magaza" href="/market/kupon_kullan">Kupon Kodu</a>
                </li>

                <li><a href="<?php echo base_url('parola_degistir');?>">Parola Değiştir</a></li>
                <li><a href="<?php echo base_url('email_degistir');?>">E-Posta Güncelle</a></li>
                <li><a href="<?php echo base_url('karakter_silme_kodu_degistir');?>">K. Silme Kodu Güncelle</a></li>
                <li><a href="<?php echo base_url('depo_sifresi_iste');?>">Depo Şifresini İste</a></li>
				<?php if($this->config->item('pin_durum') == TRUE):?>
                <li><a href="<?php echo base_url('pin_degistir');?>">Pin Şifresini Değiştir</a></li>
				<?php endif;?>
                <li><a href="<?php echo base_url('destek');?>">Destek Talebi Oluştur</a></li>
				<li><a href="<?php echo base_url('destek');?>">Destek Taleblerim</a></li>
                                <li class="red"><a href="<?php echo base_url('cikis');?>">Çıkış</a></li>
            </ul>

												<div class="login-block">
								<div class="login-block-b">
									<div class="lk-form block-l">
										<div class="lk-title">
										
										</div>
										</ul>
										<form id="logout-form-tab" action="index.php?GoPage=LogoutUserCP" method="post" style="display: none;">
											<input type="hidden" name="_token" value="xq86IslcTr2hjLoZ5WG5vWZm0984n8eYLv3cPgkA">
										</form>
									</div>
								</div>
							</div></div>
							
							<div class='modal_window' id="iShopOpen">
								<center>
									<a href="#" class='close_mw close-r iShopClose'></a>
									<iframe width="1016" height="655" src="ishop/index.php" allowfullscreen></iframe>
								
							
			</table>
<div>
										</div>



						</form>
<?php endif; ?>
						
					</div><!-- widget -->
					<div class="widget red-light">
						<div class="widget-title">
							Sosyal Medya <span>Bizi Takip Edin</span>
						</div>
						<ul class="events">

<iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo $this->config->item('link_facebook');?>&tabs=timeline&width=220&height=220&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="220" height="220" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>



</div><!-- widget -->
	<br><br><br><center><a><font color="white">Copyright © <a title="Metin2 Site Paneli" href="https://www.jetspanel.com/" style="color: #e5a734;"><font color="black">Jetspanel.com</font></a> - 2020</font></a><a><br><font color="white"><?php echo $this->config->item('site_title');?> Tüm Hakları Saklıdır.</font></a></br>
<a title="Metin2 Ödeme Yöntemi" href="https://www.payrill.com/" style="color: #e5a734;"><font color="black">Payrill Sanal Mağaza</font></a> - 0850 303 2609 -  <a href="mailto:contact@payrill.com" style="color: #e5a734;"><font color="black">contact@payrill.com</font></a></a> </br>
<a href="https://www.payrill.com/"><img height="80" src="/uploads/payrill-logo-white.png"></a></center>
				</aside><!-- left-sidebar -->

		<main class="content">
					

					<center>

<a href="<?php echo $this->config->item('link_tanitim');?>"><img src="/temalar/default8/images/sld.png" alt="" /></a>
<br><br>
<?php $this->load->view('default8/'.$sayfa);?>
</center>
													

						
			
		</main>



				<aside class="right-sidebar sidebar">
					<div class="status-block flex-c-c">
						<div class="server">
							<div class="flex-s-c">
								<span class="server-name">Oyun Durumu</span> <span class="status-online"><img src="/temalar/default8/images/on.gif" alt=""></span>
							</div>
							<div class="progress-bar">
								<span style="width: <?php echo $this->model->getir_online_bilgisi()->yuzde;?>%;"></span>
							</div>
							<?php if($this->config->item('online_sayac_durumu') == TRUE):?>
							<a href="#" class="desc">Oyuncu Sayısı</a> <span class="status-online"><?php echo $this->model->getir_online_bilgisi()->total;?></span>
							<?php endif;?>
						</div>
					</div><!-- status-block -->
					<div class="widget red-dark">
						<div class="widget-title">
							Lonca Sıralaması <span>Top 10 Lonca</span>
						</div>
						<ul class="top-block guild">
							<li class="top-title">
								<span class="top-number">#</span> <span class="top-name">İsim</span><span class="score">Level</span> <span class="score">Puan</span>
							</li>
							<?php if($loncalar = $this->model->getir_lonca_siralama(10)) foreach ($loncalar AS $key => $lonca): ?>
							<li class="top-list">
								<span class="top-number"><? if($key == 0)
							echo ($i = '<img src="/temalar/default8/images/1.png"/>');
						else if($key == 1)
							echo ($i = '<img src="/temalar/default8/images/2.png"/>');
						else if($key == 2)
							echo ($i = '<img src="/temalar/default8/images/3.png"/>');
						else
							echo ($key+1);
						?></span>
								<span class="top-name"><a href="javascript:void(0);"><?php echo $lonca->name;?></a></span>
								<span class="score"><?php echo $lonca->ladder_point;?></span>
							</li>
							<?php endforeach;?>
						
					</tbody>
					</table>
					<!-- Ön bellek gösterimi burada sona ermektedir. --> 	


						</ul>
						<div class="no-reset">
							<a href="<?php echo base_url('siralama_lonca');?>">Devamı</a>
						</div>
					</div><!-- widget -->




					<div class="widget red-dark">
						<div class="widget-title">
							Oyuncu Sıralaması <span>Top 10 Oyuncu Sıralaması</span>
						</div>
						<ul class="top-block">
							<li class="top-title">
								<span class="top-number">#</span> <span class="top-flag"></span> <span class="top-name">İsim</span> <span class="top-lvl">LvL<sup> Dakika</sup></span>
							</li>
				
			<!-- Bu veri önbellekten gösterilmektedir. --> 

							<?php 
								if($oyuncular = $this->model->getir_oyuncu_siralama(10)) foreach ($oyuncular AS $key => $oyuncu):
							?>
						<tr class="renk-purple">
													<li class="top-list">
								<span class="top-number"><? if($key == 0)
							echo ($i = '<img src="/temalar/default8/images/1.png"/>');
						else if($key == 1)
							echo ($i = '<img src="/temalar/default8/images/2.png"/>');
						else if($key == 2)
							echo ($i = '<img src="/temalar/default8/images/3.png"/>');
						else
							echo ($key+1);
						?>
						</span> <span class="top-flag"></span> <span class="top-name"><a href="javascript:void(0);"><?php echo $oyuncu->name;?></a></span> <span class="top-lvl"><?php echo $oyuncu->level;?><sup> <?php echo $oyuncu->playtime;?></sup></span>
							</li>

							</tr>
							<?php endforeach;?>
							
							
						</tbody>
						</table>
						<!-- Ön bellek gösterimi burada sona ermektedir. --> 				

						</ul>
						<div class="no-reset">
							<a href="<?php echo base_url('siralama');?>">Devamı</a>
						</div></div>
						

		</footer>
		
		<!-- .footer -->
	</div>
	
	<!-- .wrapper --></center>
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
	<script src="/temalar/default7/assets/js/global.js"></script>
	<script src="/temalar/default/scripts/genel.js"></script>
	<link rel="stylesheet" href="/temalar/default7/css/iziModal.min.css">
	<script src="/temalar/default7/js/iziModal.min.js" type="text/javascript"></script>
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
								<script>
                                    $("#modal").iziModal({
                                        iframe: true,
                                        iframeHeight: 655,
                                        width: 1016,
                                        iframeURL: '/market',
                                        title: 'Nesne Market',
										headerColor: '#112a3e',

                                    });
                                    $(document).on('click', '#trigger', function (event) {
                                        event.preventDefault();
                                        // $('#modal').iziModal('setZindex', 99999);
                                        // $('#modal').iziModal('open', { zindex: 99999 });
                                        $('#modal').iziModal('open');
                                    });
								</script>
								<script>
                                    $("#modal2").iziModal({
                                        iframe: true,
                                        iframeHeight: 655,
                                        width: 1016,
                                        iframeURL: '/market/ep_al',
                                        title: 'Nesne Market',
										headerColor: '#112a3e',

                                    });
                                    $(document).on('click', '#trigger', function (event) {
                                        event.preventDefault();
                                        // $('#modal').iziModal('setZindex', 99999);
                                        // $('#modal').iziModal('open', { zindex: 99999 });
                                        $('#modal').iziModal('open');
                                    });
								</script>
</body>
</html>

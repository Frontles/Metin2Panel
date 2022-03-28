<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>

	<meta http-equiv="content-type" content="text/html;charset=UTF-8">
	<? echo $tema->header(); ?>
	
	<? echo $fonk->stilll(); ?>
	<link rel="stylesheet" type="text/css" href="<?=TEMA_DIZIN;?>css/style.css" />
	<script type="text/javascript" src="<?=TEMA_DIZIN;?>js/jQuery.min.js"></script>
	<script type="text/javascript" src="<?=TEMA_DIZIN;?>js/mainscript.js"></script>
	<? $fonk->javascript(); ?>
</head>
<body id="topHref">
	<div id="xhtmltooltip" style="background-image: url(<?=TEMA_DIZIN;?>images/inner_content.jpg); font-size: 14px;"></div> 
	<div id="logo">
	<? if($GLOBALS['swid'] == 80){ ?>

<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" name="Main_chr_01" width="1000" height="400" align="middle" id="Main_chr_01" style="    position: absolute;    margin-left: auto;    margin-right: auto;    margin-top: -50px;    width: 1000px;    height: 400px;    display: block;    left: 0;    right: 0;"><param name="allowScriptAccess" value="sameDomain"><param name="allowFullScreen" value="false"><param name="movie" value="thronemt2.swf"><param name="wmode" value="transparent">	<embed src="thronemt2.swf" quality="high" wmode="transparent" width="1000" height="400" name="Main_chr_01" align="middle" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"></object>

 <? } ?>
	</div>
	<div id="main_wrapper">
		<div id="cloth">
			<div id="main_menu">
			<ul id="navigation">
				<a href="index.html"><li id="home"><!-- --></li></a>
				
				<? if($kullanici->giris_kontrol() == true){ ?>
				<a href="kontrol-paneli"><li id="hesabim"><!-- --></li></a>
				<? }else{ ?>
				<a href="kaydol"><li id="regi"><!-- --></li></a>
				<? } ?>
				<a href=""><li id="download"><!-- --></li></a>
				<a href="oyuncu-listesi"><li id="ranking"><!-- --></li></a>
				<a href="<? echo DESTEK_URL; ?>"><li id="teamspeak"><!-- --></li></a>
				<a href="<? echo MARKET_URL; ?>" class="fancybox fancybox.iframe" title="Nesne Market"><li id="eventcalendar"><!-- --></li></a>
				<a href="<? echo FORUM_URL; ?>" target="_blank"><li id="board"><!-- --></li></a>
			</ul>
			</div>
			
			<div id="login"><div id="loginbtn"><!-- --></div></div>
			
			<div class="inner">
				<div id="slider"><img src="<?=TEMA_DIZIN;?>images/slider/4.png"></div>			</div>
			
		</div>
		
		<div id="content_wrapper">
			<div id="content_main">
				<div class="inner_wrapper">
					
					<div class="content_wrapper right">
	<a href="ban-sorgulama"><div id="ban_btn"><!-- --></div></a>
	<a href=""><div id="download_btn"><!-- --></div></a>
	<a href="http://markm2.com"><div id="rehber_btn"><!-- --></div></a>
<div class="real_content">
	<a href="<? echo FACEBOOK; ?>"><div id="facebook_btn"><!-- --></div></a> 
</div>

<div class="real_content">
	<div id="ServeurStats">
		<div class="headline"><span class="title">OYUN İSTATISTIKLERI</span></div>
		<div class="inner_content">
			<div id="ServerStatus">
				<table class="topranking" cellspacing="1" cellpadding="0">
	<center>
				<? if($ayarlar->online_oyuncu == 1){ ?>
				<tr class="c1">
					<td class="pname"><i><b>Online Oyuncu:</i></b></td> <td class="score"><font id="online_oyuncu">...</font><br></td>
				</tr>
				<? } ?>
				
				<? if($ayarlar->bugun_girenler == 1){ ?>
				<tr class="c2">
					<td class="pname"><i><b>Bugün Girenler:</i></b></td> <td class="score"><font id="rekor_online">...</font><br></td>
				</tr>
				<? } ?>
				
				<? if($ayarlar->toplam_kayit == 1){ ?>
				<tr class="c1">
					<td class="pname"><i><b>Toplam Kayıt:</i></b></td> <td class="score"><font id="toplam_kayit">...</font><br></td>
				</tr>
				<? } ?>
				
				<? if($ayarlar->toplam_karakter == 1){ ?>
				<tr class="c2">
				<td class="pname"><i><b>Toplam Oyuncu:</i></b></td> <td class="score"><font id="toplam_karakter">...</font><br></td>
				</tr>
				<? } ?>
			
			<? if($ayarlar->toplam_lonca == 1){ ?>
			<tr class="c0">
				<td class="pname"><i><b>Toplam Lonca:</i></b></td> <td class="score"><font id="toplam_lonca">...</font><br></td>
			</tr>
			<? } ?>
			</center>
</table>			</div>
		</div>
	</div>
</div>

<div class="real_content">
		<div class="headline"><span class="title">TOP10 SIRALAMA</span></div>
		<div class="inner_content">
			
		<table class="topranking" cellspacing="1" cellpadding="0">
			<tr class="c0">
				<td class="index"><i>#</i></td>
				<td class="pname"><i>Adı</i></td>
				<td class="score"><i>Krallık</i></td>
				<td class="score"><i>Seviye</i></td>
			</tr>
			<tr class="spacer"><td colspan="10"></td></tr>
	
			<? $akt->top_oyuncu(5); ?>
			
		</table><br>
				<center>
				<a href="oyuncu-listesi"><input type="button" value="Oyuncular"></a>
				<a href="lonca-listesi"><input type="button" value="Loncalar"></a>
			</center>
			<div class="clear"><!-- --></div>
		</div>
</div>
</div>
<div class="content_wrapper left">
	<div class="real_content">
	
<? $tema->icerik(); ?>

		
	</div>
</div>					
					<div class="clear"><!-- --></div>
					
									
				</div>
			</div>
			
			<div id="content_bottom">
				<a href="#topHref"><div id="topbtn"><!-- --></div></a>
<div class="inner_content">
	<div class="left"><br>
		Copyright <? echo OYUN_ADI; ?>, Tüm Hakları Saklı Değildir Kulanın :D.<br>
		Web tasarım: <a href="http://www.facebook.com/karabelayunus" target="_blank" rel="nofollow">Turkmmo</a>
		Yazılım: <a href="https://www.facebook.com/karabelayunus" target="_blank" rel="nofollow">Turkmmo</a><br>
	</div>
	<div class="right">
		<ul class="subsites">
			<li class="first"><a href="default.aspx">Anasayfa</a></li>
			<li><a href="kaydol">Kayıt ol</a></li>
			<li><a href="oyuncu-listesi" id="download">Sıralama</a></li>
			<li class="first"><a href="">Oyunuİndir</a></li>
			<li><a href="<? echo DESTEK_URL; ?>">Destek</a></li>
			<li><a href="<? echo MARKET_URL; ?>">Market</a></li>
			<li class="first"><a href="https://www.facebook.com/karabelayunus">Metin2PvpServer</a>
		</ul>
	</div>
</div>			</div>
		</div>
	</div>

	<div id="dim"><!-- --></div>
	<div id="loginbox" class="dimhides popupwindow">
<div class="real_content">
	<div class="headline"><span class="title"><? if($kullanici->giris_kontrol() == false){ ?>Giriş Yap<? }else{ ?>Kullanıcı Kontrol Paneli<? } ?> </span></div>
	<div class="p3px">
	<div class="real_content">
    
    <? $akt->giris_kontrol(); ?>
    
				</div>
	</div>
	</div>
</div>
	
<? $html->facebook_begen(); ?>

</body>
</html>
<script id="_wau02i">var _wau = _wau || [];
_wau.push(["tab", "himazj7rw5c5", "02i", "left-upper"]);
(function() {var s=document.createElement("script"); s.async=true;
s.src="http://widgets.amung.us/tab.js";
document.getElementsByTagName("head")[0].appendChild(s);
})();</script>
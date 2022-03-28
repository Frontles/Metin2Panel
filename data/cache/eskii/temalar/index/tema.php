<!DOCTYPE html>
<html lang="tr">
<head>

<!-- End Facebook Pixel Code -->

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/ico" href="/temalar/index/dist/img/favicon.html" />
<title><?php echo $this->config->item('site_title');?></title>
<meta name="description" content="<?php echo $this->config->item('site_description');?>" />
<meta name="robots" content="index,follow" />
<meta name="language" content="Turkish" />
<link rel="icon" type="image/png" href="<?php echo $this->config->item('site_favicon');?>" />
<link href="/temalar/index/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/temalar/index/dist/css/animate.css" rel="stylesheet">
<link href="/temalar/index/dist/css/board.css" rel="stylesheet">
<link href="/temalar/index/dist/css/extra.css" rel="stylesheet">

<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
<style>
		iframe {
    display: block;       /* iframes are inline by default */
    border: none;         /* Reset default border */
    height: 50vh;        /* Viewport-relative units */
    width: 100%;
}
<?php if($this->config->item('arkaplandegisim') == true):?>
body {
    font-family: 'Montserrat', sans-serif;
    background: url(<?php echo $this->config->item('arkaplan');?>) no-repeat fixed top center #07080b;
}
<?php endif;?>
</style>
</head>
<body>
<!DOCTYPE html>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>




  <!-- Modal -->
  <div class="modal fade" id="myModalazrail" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><font color="white">Lucifer (Düşebilecek İtemler)</font></h4>
        </div>
        <div class="modal-body">
          <p><?php echo $this->db->where('id', '1')->get('tanitim_bosslar')->row('item1');?></p>
		  <p><?php echo $this->db->where('id', '1')->get('tanitim_bosslar')->row('item2');?></p>
		  <p><?php echo $this->db->where('id', '1')->get('tanitim_bosslar')->row('item3');?></p>
		  <p><?php echo $this->db->where('id', '1')->get('tanitim_bosslar')->row('item4');?></p>
		  <p><?php echo $this->db->where('id', '1')->get('tanitim_bosslar')->row('item5');?></p>
		  <p><?php echo $this->db->where('id', '1')->get('tanitim_bosslar')->row('item6');?></p>
		  <p><?php echo $this->db->where('id', '1')->get('tanitim_bosslar')->row('item7');?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>
    </div>
  </div>
   <!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="myModalbarones" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><font color="white">Barones (Düşebilecek İtemler)</font></h4>
        </div>
        <div class="modal-body">
          <p><?php echo $this->db->where('id', '2')->get('tanitim_bosslar')->row('item1');?></p>
		  <p><?php echo $this->db->where('id', '2')->get('tanitim_bosslar')->row('item2');?></p>
		  <p><?php echo $this->db->where('id', '2')->get('tanitim_bosslar')->row('item3');?></p>
		  <p><?php echo $this->db->where('id', '2')->get('tanitim_bosslar')->row('item4');?></p>
		  <p><?php echo $this->db->where('id', '2')->get('tanitim_bosslar')->row('item5');?></p>
		  <p><?php echo $this->db->where('id', '2')->get('tanitim_bosslar')->row('item6');?></p>
		  <p><?php echo $this->db->where('id', '2')->get('tanitim_bosslar')->row('item7');?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>
    </div>
  </div>
   <!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="myModalcatacomb" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><font color="white">Catacomb (Düşebilecek İtemler)</font></h4>
        </div>
        <div class="modal-body">
          <p><?php echo $this->db->where('id', '3')->get('tanitim_bosslar')->row('item1');?></p>
		  <p><?php echo $this->db->where('id', '3')->get('tanitim_bosslar')->row('item2');?></p>
		  <p><?php echo $this->db->where('id', '3')->get('tanitim_bosslar')->row('item3');?></p>
		  <p><?php echo $this->db->where('id', '3')->get('tanitim_bosslar')->row('item4');?></p>
		  <p><?php echo $this->db->where('id', '3')->get('tanitim_bosslar')->row('item5');?></p>
		  <p><?php echo $this->db->where('id', '3')->get('tanitim_bosslar')->row('item6');?></p>
		  <p><?php echo $this->db->where('id', '3')->get('tanitim_bosslar')->row('item7');?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>
    </div>
  </div>
   <!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="myModalejder" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><font color="white">Beran Setaou (Düşebilecek İtemler)</font></h4>
        </div>
        <div class="modal-body">
          <p><?php echo $this->db->where('id', '4')->get('tanitim_bosslar')->row('item1');?></p>
		  <p><?php echo $this->db->where('id', '4')->get('tanitim_bosslar')->row('item2');?></p>
		  <p><?php echo $this->db->where('id', '4')->get('tanitim_bosslar')->row('item3');?></p>
		  <p><?php echo $this->db->where('id', '4')->get('tanitim_bosslar')->row('item4');?></p>
		  <p><?php echo $this->db->where('id', '4')->get('tanitim_bosslar')->row('item5');?></p>
		  <p><?php echo $this->db->where('id', '4')->get('tanitim_bosslar')->row('item6');?></p>
		  <p><?php echo $this->db->where('id', '4')->get('tanitim_bosslar')->row('item7');?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>
    </div>
  </div>
   <!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="myModalhidra" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><font color="white">Hidra (Düşebilecek İtemler)</font></h4>
        </div>
        <div class="modal-body">
          <p><?php echo $this->db->where('id', '5')->get('tanitim_bosslar')->row('item1');?></p>
		  <p><?php echo $this->db->where('id', '5')->get('tanitim_bosslar')->row('item2');?></p>
		  <p><?php echo $this->db->where('id', '5')->get('tanitim_bosslar')->row('item3');?></p>
		  <p><?php echo $this->db->where('id', '5')->get('tanitim_bosslar')->row('item4');?></p>
		  <p><?php echo $this->db->where('id', '5')->get('tanitim_bosslar')->row('item5');?></p>
		  <p><?php echo $this->db->where('id', '5')->get('tanitim_bosslar')->row('item6');?></p>
		  <p><?php echo $this->db->where('id', '5')->get('tanitim_bosslar')->row('item7');?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>
    </div>
  </div>
   <!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="myModalmeley" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><font color="white">Meley (Düşebilecek İtemler)</font></h4>
        </div>
        <div class="modal-body">
          <p><?php echo $this->db->where('id', '6')->get('tanitim_bosslar')->row('item1');?></p>
		  <p><?php echo $this->db->where('id', '6')->get('tanitim_bosslar')->row('item2');?></p>
		  <p><?php echo $this->db->where('id', '6')->get('tanitim_bosslar')->row('item3');?></p>
		  <p><?php echo $this->db->where('id', '6')->get('tanitim_bosslar')->row('item4');?></p>
		  <p><?php echo $this->db->where('id', '6')->get('tanitim_bosslar')->row('item5');?></p>
		  <p><?php echo $this->db->where('id', '6')->get('tanitim_bosslar')->row('item6');?></p>
		  <p><?php echo $this->db->where('id', '6')->get('tanitim_bosslar')->row('item7');?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>
    </div>
  </div>
   <!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="myModalnemere" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><font color="white">Nemere (Düşebilecek İtemler)</font></h4>
        </div>
        <div class="modal-body">
          <p><?php echo $this->db->where('id', '7')->get('tanitim_bosslar')->row('item1');?></p>
		  <p><?php echo $this->db->where('id', '7')->get('tanitim_bosslar')->row('item2');?></p>
		  <p><?php echo $this->db->where('id', '7')->get('tanitim_bosslar')->row('item3');?></p>
		  <p><?php echo $this->db->where('id', '7')->get('tanitim_bosslar')->row('item4');?></p>
		  <p><?php echo $this->db->where('id', '7')->get('tanitim_bosslar')->row('item5');?></p>
		  <p><?php echo $this->db->where('id', '7')->get('tanitim_bosslar')->row('item6');?></p>
		  <p><?php echo $this->db->where('id', '7')->get('tanitim_bosslar')->row('item7');?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>
    </div>
  </div>
   <!-- Modal -->
  <!-- Modal -->
  <div class="modal fade" id="myModalrazador" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><font color="white">Razador (Düşebilecek İtemler)</font></h4>
        </div>
        <div class="modal-body">
          <p><?php echo $this->db->where('id', '8')->get('tanitim_bosslar')->row('item1');?></p>
		  <p><?php echo $this->db->where('id', '8')->get('tanitim_bosslar')->row('item2');?></p>
		  <p><?php echo $this->db->where('id', '8')->get('tanitim_bosslar')->row('item3');?></p>
		  <p><?php echo $this->db->where('id', '8')->get('tanitim_bosslar')->row('item4');?></p>
		  <p><?php echo $this->db->where('id', '8')->get('tanitim_bosslar')->row('item5');?></p>
		  <p><?php echo $this->db->where('id', '8')->get('tanitim_bosslar')->row('item6');?></p>
		  <p><?php echo $this->db->where('id', '8')->get('tanitim_bosslar')->row('item7');?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>
    </div>
  </div>
   <!-- Modal -->
<div class="container">
<div class="row">
<div class="ust">
<div class="TanitimLogo">
			<div class="logoindex">
				<a href="<?php echo base_url();?>">
					<img src="<?php echo (is_file($this->config->item('sitelogo'))) ? base_url($this->config->item('sitelogo')) : '/temalar/admin/assets/images/icon/logo.png';?>">
				</a>
			</div>
</div>
</div>

<div class="col-md-12">
<div class="col-md-12 no-padding tanitim">
<center>
<div class="btns">
<div class="row">
<div class="col-md-4 col-xs-12">
<a href="<?php echo $this->config->item('anasayfa');?>" class="b1-anasayfa">
Ana Sayfa
<span>Ana sayfaya gitmek için tıklayınız</span>
</a>
</div>
<div class="col-md-4 col-xs-12">
<a href="<?php echo $this->config->item('kayit');?>" class="b1-kayit">
Kayıt Ol
<span>Hemen kaydolmak için tıklayınız</span>
</a>
</div>
<div class="col-md-4 col-xs-12">
<a href="<?php echo $this->config->item('indir');?>" class="b1-indir">
Oyunu İndir
<span>Oyunu indirmek için tıklayınız</span>
</a>
</div>
</div>
</div>
<div style="clear:both;"></div>
</center>
<br><br>
<div class="panel panel-buyuk" id="GenelOzellik">
<div class="panel-heading">Genel Özellikler</div>
<div class="panel-body">
<div class="col-md-3">
<?php if($maddeler = $this->model->getir_maddeler(8)) foreach ($maddeler as $key => $madde):?>
<?php if($madde->maddeler > '0'):?><li class="list-group-item"><?php echo $madde->maddeler;?></li><?php endif;?>
<?php endforeach;?>
</div>
<div class="col-md-3">
<?php if($maddeler = $this->model->getir_maddeler2(9)) foreach ($maddeler as $key => $madde):?>
<?php if($madde->maddeler > '0'):?><li class="list-group-item"><?php echo $madde->maddeler;?></li><?php endif;?>
<?php endforeach;?>
</div>
<div class="col-md-3">
<?php if($maddeler = $this->model->getir_maddeler3(9)) foreach ($maddeler as $key => $madde):?>
<?php if($madde->maddeler > '0'):?><li class="list-group-item"><?php echo $madde->maddeler;?></li><?php endif;?>
<?php endforeach;?>
</div>
<div style="clear:Both;"></div>
</div>
</div>
<?php if($this->config->item('videodurum') == true):?>
<div class="panel panel-buyuk" id="x">
<div class="panel-heading">Tanıtım Videosu</div>
<div class="panel-body"><center>
<iframe width="860" height="480" src="https://www.youtube.com/embed/<?php echo $this->config->item('videolink');?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center></div>
</center></div>
<?php endif;?>
<?php if($this->config->item('sosyal_medya') == true):?>
<div class="panel panel-buyuk" id="x">
<div class="panel-heading">Sosyal Medya</div>
<div class="panel-body"><center>
<iframe src="https://www.facebook.com/plugins/likebox.php?href=<?php echo $this->config->item('link_facebook');?>&amp;width=470&amp;height=590&amp;colorscheme=dark&amp;show_faces=false&amp;header=false&amp;stream=true&amp;show_border=false&amp;appId=245938138842990" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:470px; height:590px;" allowTransparency="true"></iframe>
</center></div>
</div>
<?php endif;?>
<div class="panel panel-buyuk" id="BiyologSüreleri">
<div class="panel-heading">Biyolog Süreleri</div>
<div class="panel-body">
<div class="col-md-6">
<ul class="list-group">
<li class="list-group-item">
<img src="/temalar/index/dist/img/OrkDisi.png" class="Biyolo-Item-Img" />
<b>Ork Dişi</b><br>
<?php echo $this->db->get('tanitim_biyolog')->row('orkdisi');?>
</li>
<li class="list-group-item">
<img src="/temalar/index/dist/img/LanetKitabi.png" class="Biyolo-Item-Img" />
<b>Lanet Kitabı</b><br>
<?php echo $this->db->get('tanitim_biyolog')->row('lanetkitabi');?>
</li>
<li class="list-group-item">
<img src="/temalar/index/dist/img/SeytanHatirasi.png" class="Biyolo-Item-Img" />
<b>Şeytan Hatırası</b><br>
<?php echo $this->db->get('tanitim_biyolog')->row('seytanhatirasi');?>
</li>
<li class="list-group-item">
<img src="/temalar/index/dist/img/BuzTopu.png" class="Biyolo-Item-Img" />
<b>Buz Topu</b><br>
<?php echo $this->db->get('tanitim_biyolog')->row('buztopu');?>
</li>
<li class="list-group-item">
<img src="/temalar/index/dist/img/Zelkova.png" class="Biyolo-Item-Img" />
<b>Zelkova Dalı</b><br>
<?php echo $this->db->get('tanitim_biyolog')->row('zelkova');?>
</li>
</ul>
</div>
<div class="col-md-6">
<ul class="list-group">
<li class="list-group-item">
<img src="/temalar/index/dist/img/Tugyis.png" class="Biyolo-Item-Img" />
<b>Tugyis Tabelası</b><br>
<?php echo $this->db->get('tanitim_biyolog')->row('tugyls');?>
</li>
<li class="list-group-item">
<img src="/temalar/index/dist/img/Dal.png" class="Biyolo-Item-Img" />
<b>Krm. Hayalet Ağaç Dalı</b><br>
<?php echo $this->db->get('tanitim_biyolog')->row('hayalet');?>
</li>
<li class="list-group-item">
<img src="/temalar/index/dist/img/Liderin.png" class="Biyolo-Item-Img" />
<b>Liderin Notları</b><br>
<?php echo $this->db->get('tanitim_biyolog')->row('lidernot');?>
</li>
<li class="list-group-item">
<img src="/temalar/index/dist/img/Kemgoz.png" class="Biyolo-Item-Img" />
<b>Kemgöz Mücevheri</b><br>
<?php echo $this->db->get('tanitim_biyolog')->row('kemgoz');?>
</li>
<li class="list-group-item">
<img src="/temalar/index/dist/img/Bilgelik.png" class="Biyolo-Item-Img" />
<b>Bilgelik Mücevheri</b><br>
<?php echo $this->db->get('tanitim_biyolog')->row('bilgelik');?>
</li>
</ul>
</div>
<div class="col-md-12">
</ul>
</br>
</div>
</div>
</div>

<div class="panel panel-buyuk" id="EfsunOran">
<div class="panel-heading">Efsun Oranları</div>
<div class="panel-body">
<div class="col-md-12">
<ul class="list-group">
<?php if($this->config->item('sabit') == true):?>
<center><li class="list-group-item">EFSUN ORANLARI SABİTTİR</li></center>
<?php else:?>
<center><li class="list-group-item">EFSUN ORANLARI SABİT DEĞİLDİR</li></center>
<?php endif;?>
</ul>
<table class="table table-bordered table-hover table-efsun">
<thead>
<tr>
<td><b>Efsun Adı</b></td>
<td><b>1.Seviye Oran</b></td>
<td><b>2.Seviye Oran</b></td>
<td><b>3.Seviye Oran</b></td>
</tr>
</thead>
<tbody>
<tr>
<td>Güç - Zeka - Canlılık - Çeviklik </td>
<td><?php echo $this->db->where('id', '1')->get('tanitim_efsunlar')->row('seviye1');?></td>
<td><?php echo $this->db->where('id', '1')->get('tanitim_efsunlar')->row('seviye2');?></td>
<td><?php echo $this->db->where('id', '1')->get('tanitim_efsunlar')->row('seviye3');?></td>
</tr>
<tr>
<td>Max HP</td>
<td><?php echo $this->db->where('id', '2')->get('tanitim_efsunlar')->row('seviye1');?></td>
<td><?php echo $this->db->where('id', '2')->get('tanitim_efsunlar')->row('seviye2');?></td>
<td><?php echo $this->db->where('id', '2')->get('tanitim_efsunlar')->row('seviye3');?></td>
</tr>
<tr>
<td>Saldırı Hızı</td>
<td><?php echo $this->db->where('id', '3')->get('tanitim_efsunlar')->row('seviye1');?></td>
<td><?php echo $this->db->where('id', '3')->get('tanitim_efsunlar')->row('seviye2');?></td>
<td><?php echo $this->db->where('id', '3')->get('tanitim_efsunlar')->row('seviye3');?></td>
</tr>
<tr>
<td>Hareket Hızı</td>
<td><?php echo $this->db->where('id', '4')->get('tanitim_efsunlar')->row('seviye1');?></td>
<td><?php echo $this->db->where('id', '4')->get('tanitim_efsunlar')->row('seviye2');?></td>
<td><?php echo $this->db->where('id', '4')->get('tanitim_efsunlar')->row('seviye3');?></td>
</tr>
<tr>
<td>Büyü Hızı</td>
<td><?php echo $this->db->where('id', '5')->get('tanitim_efsunlar')->row('seviye1');?></td>
<td><?php echo $this->db->where('id', '5')->get('tanitim_efsunlar')->row('seviye2');?></td>
<td><?php echo $this->db->where('id', '5')->get('tanitim_efsunlar')->row('seviye3');?></td>
</tr>
<tr>
<td>HP - SP Üretimi</td>
<td><?php echo $this->db->where('id', '6')->get('tanitim_efsunlar')->row('seviye1');?></td>
<td><?php echo $this->db->where('id', '6')->get('tanitim_efsunlar')->row('seviye2');?></td>
<td><?php echo $this->db->where('id', '6')->get('tanitim_efsunlar')->row('seviye3');?></td>
</tr>
<tr>
<td>Zehirleme - Sersemletme - Yavaşlama Şansı</td>
<td><?php echo $this->db->where('id', '7')->get('tanitim_efsunlar')->row('seviye1');?></td>
<td><?php echo $this->db->where('id', '7')->get('tanitim_efsunlar')->row('seviye2');?></td>
<td><?php echo $this->db->where('id', '7')->get('tanitim_efsunlar')->row('seviye3');?></td>
</tr>
<tr>
<td>Kritik - Delici vuruş şansı</td>
<td><?php echo $this->db->where('id', '8')->get('tanitim_efsunlar')->row('seviye1');?></td>
<td><?php echo $this->db->where('id', '8')->get('tanitim_efsunlar')->row('seviye2');?></td>
<td><?php echo $this->db->where('id', '8')->get('tanitim_efsunlar')->row('seviye3');?></td>
</tr>
<tr>
<td>Yarı insanlara karşı güçlü</td>
<td><?php echo $this->db->where('id', '9')->get('tanitim_efsunlar')->row('seviye1');?></td>
<td><?php echo $this->db->where('id', '9')->get('tanitim_efsunlar')->row('seviye2');?></td>
<td><?php echo $this->db->where('id', '9')->get('tanitim_efsunlar')->row('seviye3');?></td>
</tr>
<tr>
<td>Büyüye Karşı Dayanıklılık</td>
<td><?php echo $this->db->where('id', '10')->get('tanitim_efsunlar')->row('seviye1');?></td>
<td><?php echo $this->db->where('id', '10')->get('tanitim_efsunlar')->row('seviye2');?></td>
<td><?php echo $this->db->where('id', '10')->get('tanitim_efsunlar')->row('seviye3');?></td>
</tr>
<tr>
<td>Mistik - Ölümsüz - Şeytan (Benzeri Efsunlar)</td>
<td><?php echo $this->db->where('id', '11')->get('tanitim_efsunlar')->row('seviye1');?></td>
<td><?php echo $this->db->where('id', '11')->get('tanitim_efsunlar')->row('seviye2');?></td>
<td><?php echo $this->db->where('id', '11')->get('tanitim_efsunlar')->row('seviye3');?></td>
</tr>
<tr>
<td>Bütün Savunma Oranları</td>
<td><?php echo $this->db->where('id', '12')->get('tanitim_efsunlar')->row('seviye1');?></td>
<td><?php echo $this->db->where('id', '12')->get('tanitim_efsunlar')->row('seviye2');?></td>
<td><?php echo $this->db->where('id', '12')->get('tanitim_efsunlar')->row('seviye3');?></td>
</tr>
</tbody>
</table>
</div>
<div class="col-md-12">
<ul class="list-group">
</ul>
</div>
</div>
</div>

<!-- Give Start --->
<div class="panel panel-buyuk" id="Baslangic">
<div class="panel-heading">Başlangıç</div>
<div class="panel-body">
<div class="col-md-6">
<center>
<img src="<?php echo $this->db->get('tanitim_baslangic')->row('resim');?>" tppabs="<?php echo $this->db->get('tanitim_baslangic')->row('resim');?>" />
</center>
</div>
<div class="col-md-6">
<ul class="list-group">
<li class="list-group-item"> <?php echo $this->db->get('tanitim_baslangic')->row('seviye');?></li>
<li class="list-group-item"> <?php echo $this->db->get('tanitim_baslangic')->row('metin1');?></li>
<li class="list-group-item"> <?php echo $this->db->get('tanitim_baslangic')->row('metin2');?></li>
<li class="list-group-item"> <?php echo $this->db->get('tanitim_baslangic')->row('metin3');?></li>
<li class="list-group-item"> <?php echo $this->db->get('tanitim_baslangic')->row('metin4');?></li>
<li class="list-group-item"> <?php echo $this->db->get('tanitim_baslangic')->row('metin5');?></li>
</ul>
</div>
</div>
</div>
<!-- Give Start --->
<?php if($this->config->item('donusumdurum') == true):?>
<div class="panel panel-buyuk" id="Npcler">
<div class="panel-heading">Dönüşümlerimiz</div>
<div class="panel-body">
<div class="col-md-12">
<center>
<img src="<?php echo $this->db->get('tanitim_donusum')->row('donusum1');?>" />
<img src="<?php echo $this->db->get('tanitim_donusum')->row('donusum2');?>" />
<img src="<?php echo $this->db->get('tanitim_donusum')->row('donusum3');?>" />
<img src="<?php echo $this->db->get('tanitim_donusum')->row('donusum4');?>" />
</center>
</div>
</div>
</div>
<?php endif;?>
<?php if($this->config->item('bossdurum') == true):?>
<div class="panel panel-buyuk" id="BiyologSüreleri">
<div class="panel-heading">Bosslar</div>
<div class="panel-body">
<center><li class="list-group-item">Boss detaylarını görmek için üzerine tıkla</li></center>
<div class="col-md-4">
<ul class="list-group">
<a data-toggle="modal" data-target="#myModalazrail"><img src="/uploads/bosslar/azrail.png" class="Biyolo-Item-Img" height="280" /></a>
</li>
<ul class="list-group">
<a data-toggle="modal" data-target="#myModalbarones"><img src="/uploads/bosslar/barones.png" class="Biyolo-Item-Img" height="280" /></a>
</li>


</ul>
</div>
<div class="col-md-4">
<ul class="list-group">
<a data-toggle="modal" data-target="#myModalcatacomb"><img src="/uploads/bosslar/catacomb.png" class="Biyolo-Item-Img" height="280" /></a>
</li>
<ul class="list-group">
<a data-toggle="modal" data-target="#myModalejder"><img src="/uploads/bosslar/ejder.png" class="Biyolo-Item-Img" height="280" /></a>
</li>

</ul>
</div>
<div class="col-md-4">
<ul class="list-group">
<a data-toggle="modal" data-target="#myModalhidra"><img src="/uploads/bosslar/hidra.png" class="Biyolo-Item-Img" height="280" /></a>
</li>
<ul class="list-group">
<a data-toggle="modal" data-target="#myModalmeley"><img src="/uploads/bosslar/meley.png" class="Biyolo-Item-Img" height="280" /></a>
</li>

</ul>
</div>
<div class="col-md-4">
<ul class="list-group">
<a data-toggle="modal" data-target="#myModalnemere"><img src="/uploads/bosslar/nemere.png" class="Biyolo-Item-Img" height="280" /></a>
</li>

</ul>
</div>
<div class="col-md-4">
<ul class="list-group">
<a data-toggle="modal" data-target="#myModalrazador"><img src="/uploads/bosslar/razador.png" class="Biyolo-Item-Img" height="280" /></a>
</li>

</ul>
</div>
<div class="col-md-12">
</ul>
</br>
</div>
</div>
</div>
<?php endif;?>
<?php if($listeler = $this->model->getir_tanitim_listeler(50)) foreach ($listeler as $key => $liste):?>
<div class="panel panel-buyuk" id="BulmacaKutusu">
	<div class="panel-heading"><?php echo $liste->baslik;?></div>
	<div class="panel-body">
		<div class="col-md-12">
			<center>
				<img src="<?php echo $liste->resim;?>" tppabs="<?php echo $liste->resim;?>" />
			</center>
		</div>

		<div class="col-md-12">
			<center>
				<ul class="list-group">
					<?php if($liste->madde1 > '0'):?>
					<li class="list-group-item"><?php echo $liste->madde1; ?></li>
					<?php endif;?>
					<?php if($liste->madde2 > '0'):?>
					<li class="list-group-item"><?php echo $liste->madde2; ?></li>
					<?php endif;?>
					<?php if($liste->madde3 > '0'):?>
					<li class="list-group-item"><?php echo $liste->madde3; ?></li>
					<?php endif;?>
					<?php if($liste->madde4 > '0'):?>
					<li class="list-group-item"><?php echo $liste->madde4; ?></li>
					<?php endif;?>
					<?php if($liste->madde5 > '0'):?>
					<li class="list-group-item"><?php echo $liste->madde5; ?></li>
					<?php endif;?>
				</ul>
			</center>
		</br>
		</div>
	</div>
</div>
<?php endforeach;?>
<br><br><br><br><br><br>
		</div>
	</div>
</div>

<div id="duyuru-alt">
<center>
<h4 class="animated infinite pulse"><?php echo $this->config->item('acilis');?></h4>
<span class="animated infinite pulse"><?php echo $this->config->item('altacilis');?></span></br>
</center>
</div>
</style>

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
    bottom: 80px;
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

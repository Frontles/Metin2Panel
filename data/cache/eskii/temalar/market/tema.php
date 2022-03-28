<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
<![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9">
<![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $this->config->item('site_title');?></title>
    <meta name="description" content="<?php echo $this->config->item('site_description');?>"/>
	<link rel="shortcut icon" href="<?php echo $this->config->item('site_favicon');?>"/>
    <link rel="stylesheet" href="/temalar/market/assets/css/bootstrap.min.css" type="text/css" />
	<?php if($this->config->item('market_gorunum') == 'dizaynyeni'):?>
	<link rel="stylesheet" id="gameStyle" href="/temalar/market/assets/css/Ufuk.css" type="text/css" />
	 <?php else:?>
    <link rel="stylesheet" id="gameStyle" href="/temalar/market/assets/css/style.min.css" type="text/css" />
	 <?php endif;?>
    <link rel="stylesheet" id="gameStyle" href="/temalar/market/assets/css/animate.css" type="text/css" />

    <script type="text/javascript">
        (function (wd, doc) {
            var w = wd.innerWidth || doc.documentElement.clientWidth;
            var h = wd.innerHeight || doc.documentElement.clientHeight;
            var screenSize = {w: w, h: h};
            var compareW = 801;
            if (screenSize.w > 0 && screenSize.w < compareW) {
                var cssTag = doc.createElement("link"),
                    cssFile = '/temalar/market/assets/css/responsive.min.css';
                cssTag.setAttribute("id", "smallStyle");
                cssTag.setAttribute("rel", "stylesheet");
                cssTag.setAttribute("type", "text/css");
                cssTag.setAttribute("href", cssFile);
                doc.getElementsByTagName("head")[0].appendChild(cssTag);
            }
        })(window, document);
    </script>

    <!--[if lt IE 8]>
    <link rel="stylesheet" href="/temalar/market/assets/css/ie-8-1.css" type="text/css" />
    <link rel="stylesheet" href="/temalar/market/assets/css/ie-8-2.css" type="text/css" />
    <![endif]-->

    <!--[if IE 8]>
    <link rel="stylesheet" href="/temalar/market/assets/css/ie-8-3.css" type="text/css" />
    <![endif]-->

    <script type="text/javascript" src="/temalar/market/assets/js/composer.js"></script>
    <script type="text/javascript" src="/temalar/market/assets/js/helper.js"></script>

    <!--[if lt IE 8]>
    <script type="text/javascript" src="/temalar/market/assets/js/ie-8.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/temalar/market/assets/js/ie-9.js"></script>
    <![endif]-->

    <script type="text/javascript" src="/temalar/market/assets/js/main.js"></script>
</head>
<body class="website">
<div id="page" class="row-fluid">
    
    <div id="header" class="header clearfix">
        <div class="span5  logo-block">
            <h1>
				<?php if($this->config->item('happyhour_durum') == true):?>
                    <img src="https://www.ronsoriginal.com/wp-content/uploads/2018/12/Happy-Hour.png">
                <?php else:?>
					<a src="" href="<?php echo base_url('market');?>"><?php echo $this->config->item('site_title');?></a>
                <?php endif;?>
            </h1>
            <div class="welcome">
                <i class="icon-user"></i><span><?php echo $this->account->login; ?></span>
                <i class="icon-earth"></i><span><?php echo $this->config->item('site_title');?></span>
            </div>
        </div>
        <div class="span7 payment-block">
            <a href="<?php echo base_url('market/ep_al');?>">
				<button class="btn-price premium">
                    <img class="ttip" tooltip-content="Ejderha Parası" src="/temalar/market/assets/images/coins.png"/>
				<?php if($this->config->item('happyhour_durum') == true):?>
                   <span class="premium-name">EP SATIN AL (+%<?php echo $this->config->item('happyhour_oran')?>) </span>
                <?php else:?>
					<span class="premium-name">EP SATIN AL</span> 
                <?php endif;?>
                </button>
			</a>
            <ul class="currency_status currency-amount-2">
                <li data-currency="1">
                    <span class="ttip" tooltip-content="Ejderha Parası">
                        <span class="block-price">
                            <img src="/temalar/market/assets/images/coins.png" width="16" height="16" alt="Ejderha Parası"/>
                            <span id="balances1" class="end-price" data-currency=""><?php echo $this->account->cash; ?></span>
                        </span>
                    </span>
                </li>
                <li data-currency="2">
                    <span class="ttip" tooltip-content="Ejderha Markası">
                        <span class="block-price">
                            <img src="/temalar/market/assets/images/em_coins.png" width="16" height="16" alt="Ejderha Markası" />
                            <span id="balances2" class="end-price" data-currency=""><?php echo $this->account->mileage; ?></span>
                        </span>
                    </span>
                </li>
            </ul>
            <button id="showRightPush" class="account-push" ><i class="icon-menu2"></i></button>
        </div>
    </div>

    <div id="contentContainer">
        <nav id="slideMenu" class="clearfix">
            <h2><i class="icon-user"></i> Oyuncu Bilgisi</h2>
            <div class="account-infos">
                <img class="avatar" height="45" width="45" src="/temalar/market/assets/images/chrs/.html" alt="" />
                <span class="buy-for">Alışveriş ettiğin hesap:</span>
                <p class="selected-player">
                    İsim : <?php echo $this->account->login; ?><br>
                    Sunucu : <?php echo $this->config->item('site_title');?>
                </p>
            </div>

            <ul class="nav nav-tabs nav-stacked">
                <li>
                    <a class="btn-sideitem"  href="<?php echo base_url('market/karakterlerim');?>"><i class="icon-users"></i> Karakterlerim</a>
                </li>
                <li>
                    <a class="btn-sideitem"  href="<?php echo base_url('market/aldiklarim');?>"><i class="icon-basket"></i> Satın aldıklarım</a>
                </li>
                <li>
                    <a class="btn-sideitem"  href="<?php echo base_url('market/depom');?>"><i class="icon-stack"></i> Eşya Depom</a>
                </li>
                <li>
                    <a class="btn-sideitem"  href="<?php echo base_url('market/kupon_kullan');?>"><i class="icon-barcode"></i> Kodu kullan</a>
                </li>
            </ul>
            
            <h2> Destek Sistemi</h2>
            
            <ul class="nav nav-tabs nav-stacked">
                <li>
                    <a class="btn-sideitem" id="Xmas2017" href="<?php echo base_url('destek');?>">
                        <i class="zicon-pandora"></i>
                        <span>Destek</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div id="navigation" class="navbar">
            <div class="container">
                <ul class="nav nav-tabs  search">
					<li class="active">
                        <a href="<?php echo base_url('market');?>" class="btn-navitem icon-home <?php active(['controller/market'],'btn-navitem-active');?>" ></a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url('market/urunler');?>" class="btn-navitem <?php active(['controller/market_urunler'],'btn-navitem-active');?>">Tüm ürünler</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('market/indirimli');?>" title="" class="btn-navitem <?php active(['controller/market_indirimli'],'btn-navitem-active');?>">İndirimli ürünler</a>
                    </li>
					<li>
                        <a href="<?php echo base_url('market/marka');?>" title="" class="btn-navitem <?php active(['controller/market_marka'],'btn-navitem-active');?>">Marka Ürünler</a>
                    </li>
                </ul>
                <!-- SEARCH FORM -->
				<div id="searchBar" class="input-append">
                    <i class="icon-search"></i>
                    <form method="post" action="<?php echo base_url('market/urun_ara');?>">
                        <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                        <input name="searchString" class="search-input span2" type="text" placeholder="Arama terimi" value="">
                        <button class="btn-default btn-search"  type="submit">Ara</button>
                    </form>
                </div>
                <div class="nav-collapse collapse">

                </div>
            </div>
        </div>

		<?php $this->load->view('market/'.$sayfa);?>

		<div id="overlayMask"></div>
	</div>
</div>
</body>

</html>
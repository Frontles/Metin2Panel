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
    <title><?= settings('settings_gamename') ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= URL . '/favicon.ico' ?>">
    <link rel="stylesheet" href="<?= shop_public_url('css/bootstrap.min.css') ?>" type="text/css"/>
    <link rel="stylesheet" id="gameStyle" href="<?= shop_public_url('css/style.min.css') ?>" type="text/css"/>
    <link rel="stylesheet" id="gameStyle" href="<?= shop_public_url('css/animate.css') ?>" type="text/css"/>

    <script type="text/javascript">
        (function (wd, doc) {
            var w = wd.innerWidth || doc.documentElement.clientWidth;
            var h = wd.innerHeight || doc.documentElement.clientHeight;
            var screenSize = {w: w, h: h};
            var compareW = 801;
            if (screenSize.w > 0 && screenSize.w < compareW) {
                var cssTag = doc.createElement("link"),
                    cssFile = '<?=shop_public_url('css/responsive.min.css')?>';
                cssTag.setAttribute("id", "smallStyle");
                cssTag.setAttribute("rel", "stylesheet");
                cssTag.setAttribute("type", "text/css");
                cssTag.setAttribute("href", cssFile);
                doc.getElementsByTagName("head")[0].appendChild(cssTag);
            }
        })(window, document);
    </script>

    <!--[if lt IE 8]>
    <link rel="stylesheet" href="<?= shop_public_url('app/public/shop/css/ie-8-1.css') ?>" type="text/css" />
    <link rel="stylesheet" href="<?= shop_public_url('app/public/shop/css/ie-8-2.css') ?>" type="text/css" />
    <![endif]-->

    <!--[if IE 8]>
    <link rel="stylesheet" href="<?= shop_public_url('app/public/shop/css/ie-8-3.css') ?>" type="text/css" />
    <![endif]-->

    <script type="text/javascript" src="<?= shop_public_url('js/composer.js') ?>"></script>
    <script type="text/javascript" src="<?= shop_public_url('js/helper.js') ?>"></script>

    <!--[if lt IE 8]>
    <script type="text/javascript" src="<?= shop_public_url('app/public/shop/js/ie-8.js') ?>"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?= shop_public_url('app/public/shop/js/ie-9.js') ?>"></script>
    <![endif]-->

    <script type="text/javascript" src="<?= shop_public_url('js/main.js') ?>"></script>
</head>
<?php


if (settings('shop_status') == 0) {
    header('Location:' .shop_url('error') );
    exit;
} else {

    $pid = get('player_id') ? filter_var(get('pid'), FILTER_SANITIZE_URL) : null;
    $sas = isset($_GET['sas']) ? filter_var($_GET['sas'], FILTER_SANITIZE_URL) : null;

    $sId = isset($_SESSION['sId']) ? filter_var($_SESSION['sId'], FILTER_SANITIZE_URL) : null;
    $aid = isset($_SESSION['user_id']) ? filter_var($_SESSION['user_id'], FILTER_SANITIZE_URL) : null;
    $cLogin = isset($_SESSION['user_name']) ? filter_var($_SESSION['user_name'], FILTER_SANITIZE_STRING) : null;
    $shopLogin = isset($_SESSION['shopLogin']) ? $_SESSION['shopLogin'] : false;

    //GAME LOGIN
    if ($pid !== null && $sas !== null) {
        $getPlayerInfosor = $player->prepare("SELECT id,account_id FROM player.player WHERE id = ?");
        $getPlayerInfosor->execute([$pid]);
        $getPlayerInfo = $getPlayerInfosor->fetchAll(PDO::FETCH_ASSOC);

        if (($getPlayerInfosor->rowCount()) <= 0) {
            echo '<script>window.location = "' . shop_url('error') . '";</script>';
            die;
        } else {
            $playerInfo = $getPlayerInfo[0];
            $aid = $playerInfo['account_id'];
            $gameKey = settings('gamekey');
            $cSas = md5($pid . $aid . $gameKey);
            if ($cSas != $sas) {
                echo '<script>window.location = "' . shop_url('error') . '";</script>';
            } else {
                if ($shopLogin === false) {
                    $getLoginsor = $account->prepare("SELECT login FROM account WHERE id = ?");
                    $getLoginsor->execute([$aid]);
                    $getLogin = $getLoginsor->fetch(PDO::FETCH_ASSOC);
                    session_set('user_name', $getLogin['login']);
                    session_set('user_id', $playerInfo['account_id']);
                    session_set('player_id', $playerInfo['id']);
                    session_set('shopLogin', true);
                    shop_url('index');
                }
            }
        }
    } //SITE LOGIN
    elseif ($aid !== null && $cLogin !== null && $sId !== null && $sId === 'site') {


        $getPlayerInfosor = $player->prepare("SELECT id,account_id FROM player.player WHERE account_id = ?");
        $getPlayerInfosor->execute([$aid]);
        $getPlayerInfo = $getPlayerInfosor->fetchAll(PDO::FETCH_ASSOC);
        if (($getPlayerInfosor->rowCount()) <= 0) {

            header('Location:' . shop_url('error'));
            exit;
        } else {

            if ($shopLogin == false) {


                $playerInfo = $getPlayerInfo[0];
                session_set('user_id', $playerInfo['account_id']);
                session_set('player_id', $playerInfo['id']);
                session_set('shopLogin', true);
                header('Location:' . shop_url('error'));
                exit;
            }
        }
    } //LOGIN TRUE
    elseif ($shopLogin == true && isset($_SESSION['aId']) && isset($_SESSION['pId'])) {

        return true;

    } //NO LOGIN

    else {

        header('Location:' . shop_url('error'));
        exit;
    }
}


$aId = session_get('user_id');
$getAccountInfosor = $account->prepare("SELECT cash,mileage FROM account WHERE id = ?");
$getAccountInfosor->execute([$aId]);
$getAccountInfo = $getAccountInfosor->fetch(PDO::FETCH_ASSOC);
$aInfo = $getAccountInfo;
$coins = $aInfo['cash'];
$emCoins = $aInfo['mileage'];

$pId = session_get('player_id');
$getPlayerInfosor = $player->prepare("SELECT name,job FROM player WHERE id = ?");
$getPlayerInfosor->execute([$pId]);
$getPlayerInfo = $getPlayerInfosor->fetch(PDO::FETCH_ASSOC);
$pInfo = $getPlayerInfo;
$pName = $pInfo['name'];
$pJob = $pInfo['job'];


$urls = isset($_GET['url']) ? filter_var($_GET['url'], FILTER_SANITIZE_URL) : null;
$urls = rtrim($urls, '/');
$urls = filter_var($urls, FILTER_SANITIZE_URL);
$_url = explode('/', $urls);
$emCount = $db->prepare("SELECT id FROM items WHERE durum = :durum");
$emCount->execute(array(':durum' => 2));
$emCounts = $emCount->rowCount();
$_url[1] = isset($_url[1]) ? $_url[1] : null;
$getTicketCount = $db->prepare("SELECT COUNT(id) as count FROM ticket_status WHERE accountid = :accountid AND status = :status");
$getTicketCount->execute([":accountid" => $aId, ":status" => "0"]);
$getTicketC = $getTicketCount->fetch(PDO::FETCH_ASSOC)['count'];


$functions = new Functions();
?>
<body class="website">
<div id="page" class="row-fluid">
    <div id="header" class="header clearfix">
        <div class="span5  logo-block">
            <h1>
                <a style="background: url(<?= URL . settings('settings_logo') ?>) 0 50% no-repeat;background-size: contain;"
                   href="<?= shop_url('index') ?>"><?= settings('settings_gamename'); ?></a>
            </h1>
            <div class="welcome">
                <i class="icon-user"></i><span><?= $cLogin ?></span>
                <i class="icon-earth"></i><span><?= settings('settings_gamename'); ?></span>
            </div>
        </div>
        <div class="span7 payment-block">
            <a href="<?= shop_url('buy-index') ?>">
                <?php if (settings('shop_happyhourstatus')): ?>
                    <button class="btn-price premium">
                        <img class="ttip" tooltip-content="Ejderha Parası"
                             src="<?= shop_public_url('/images/coins.png'); ?>"/>
                        <span class="premium-name">EP SATIN AL (+%<?= settings('shop_happyhour') ?>)</span>
                    </button>
                <?php else: ?>
                    <button class="btn-price premium">
                        <img class="ttip" tooltip-content="Ejderha Parası"
                             src="<?= shop_public_url('/images/coins.png'); ?>"/>
                        <span class="premium-name">EP SATIN AL</span>
                    </button>
                <?php endif; ?>
            </a>
            <ul class="currency_status currency-amount-2">
                <li data-currency="1">
                    <span class="ttip" tooltip-content="Ejderha Parası">
                        <span class="block-price">
                            <img src="<?= shop_public_url('/images/coins.png'); ?>" width="16" height="16"
                                 alt="Ejderha Parası"/>
                            <span id="balances1" class="end-price" data-currency="<?= $coins ?>"><?= $coins ?></span>
                        </span>
                    </span>
                </li>
                <li data-currency="2">
                    <span class="ttip" tooltip-content="Ejderha Markası">
                        <span class="block-price">
                            <img src="<?= shop_public_url('/images/em_coins.png'); ?>" width="16" height="16"
                                 alt="Ejderha Markası"/>
                            <span id="balances2" class="end-price"
                                  data-currency="<?= $emCoins ?>"><?= $emCoins ?></span>
                        </span>
                    </span>
                </li>
            </ul>
            <button id="showRightPush" class="account-push"><i class="icon-menu2"></i></button>
        </div>
    </div><!-- header -->
    <div id="contentContainer">
        <nav id="slideMenu" class="clearfix">
            <h2><i class="icon-user"></i> Oyuncu bilgisi</h2>
            <div class="account-infos">
                <img class="avatar" height="45" width="45"
                     src="<?= shop_public_url('/images/chrs/' . $pJob . '.png') ?>" alt=""/>
                <span class="buy-for">Alışveriş ettiğin hesap:</span>
                <p class="selected-player">
                    İsim : <?= $cLogin ?><br>
                    Sunucu: <?= settings('settings_gamename') ?>
                </p>
            </div>

            <ul class="nav nav-tabs nav-stacked">
                <li>
                    <a class="btn-sideitem" href="<?= shop_url('nav-characters') ?>"><i class="icon-users"></i>
                        Karakterlerim</a>
                </li>
                <li>
                    <a class="btn-sideitem" href="<?= shop_url('nav-log') ?>"><i class="icon-basket"></i> Satın
                        aldıklarım</a>
                </li>
                <li>
                    <a class="btn-sideitem" href="<?= shop_url('nav-depo') ?>"><i class="icon-stack"></i> Eşya Depom</a>
                </li>
                <li>
                    <a class="btn-sideitem" href="<?= shop_url('nav-coupon') ?>"><i class="icon-barcode"></i> Kodu
                        kullan</a>
                </li>
            </ul>
            <?php if (settings('settings_wheel') == 1): ?>
                <h2><i class="icon-smile"></i> Macera ve eğlence</h2>
                <ul class="nav nav-tabs nav-stacked">
                    <li>
                        <a class="btn-sideitem" id="Xmas2017" href="<?= shop_url('wheel-index') ?>">
                            <i class="zicon-wheel"></i>
                            <span>Çark</span>
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
            <h2> Destek Sistemi</h2>
            <ul class="nav nav-tabs nav-stacked">
                <li>
                    <a class="btn-sideitem" id="Xmas2017" href="<?= URL . '/support' ?>">
                        <i class="zicon-pandora"></i>
                        <span>Destek
							<?php if (intval($getTicketC) > 0): ?>
                                <span class="w3-badge"><?= $getTicketC ?></span>
                            <?php endif; ?></span>
                    </a>
                </li>
            </ul>
        </nav>
        <div id="navigation" class="navbar">
            <div class="container">
                <?php
                $firstMainCategory = $db->prepare("SELECT id FROM shop_menu WHERE mainmenu = 0 LIMIT 1");
                $firstMainCategory->execute();
                ?>
                <!-- Be sure to leave the brand out there if you want it shown -->
                <ul class="nav nav-tabs  search">

                    <li class="<?php if( route(1) == 'index' ||route(1) == null) {
                        echo 'active';
                    } ?>">
                        <a class="btn-navitem icon-home <?php if (route(1) == 'index' || route(1) == null) {
                            echo 'btn-navitem-active';
                        } ?>" href="<?= shop_url('index') ?>"></a>
                    </li>
                    <li class="<?php if (route(1) == 'product-views') {
                        echo 'active';
                    } ?>">
                        <a href="<?= shop_url('product-views?id=' . $firstMainCategory->fetch(PDO::FETCH_ASSOC)['id']) ?>"
                           title=""
                           class="btn-navitem  <?php if (route(1) == 'product-views' ) {
                               echo 'btn-navitem-active';
                           } ?>">Tüm ürünler</a>
                    </li>
                    <li>
                        <a href="<?= shop_url('product-discount') ?>" title=""
                           class="btn-navitem <?php if (route(1) == 'product-discount') {
                               echo 'btn-navitem-active';
                           } ?>">İndirimli ürünler</a>
                    </li>
                    <?php if ($emCounts > 0): ?>
                        <li>
                            <a href="<?= shop_url('product-em') ?>" title=""
                               class="btn-navitem <?php if (route(1) == 'product-em') {
                                   echo 'btn-navitem-active';
                               } ?>">Marka Ürünler</a>
                        </li>
                    <?php endif; ?>
                    <?php if (settings('settings_wheel') == 1): ?>
                        <li class="special-category">
                            <a href="<?= shop_url('wheel-index') ?>" title=""
                               class="btn-navitem <?php if (route(1) == 'wheel-index') {
                                   echo 'btn-navitem-active';
                               } ?>">Çark</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <!-- SEARCH FORM -->
                <?php $searchToken = hash_hmac('md5', $aId . $pId, 'inpinos') ?>
                <div id="searchBar" class="input-append">
                    <i class="icon-search"></i>
                    <form method="post" action="<?= shop_url('search') ?>">
                        <input type="hidden" name="__token" value="<?= $searchToken ?>">
                        <input name="searchString" class="search-input span2" type="text" placeholder="Arama terimi"
                               value="">
                        <button class="btn-default btn-search" type="submit">Ara</button>
                    </form>
                </div>
                <div class="nav-collapse collapse">

                </div>
            </div>
        </div>
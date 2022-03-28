

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
    <title><?=settings('settings_gamename')?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?=URL.'/favicon.ico'?>">
    <link rel="stylesheet" href="<?=support_public_url('css/bootstrap.min.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?=support_public_url('css/font-awesome.min.css')?>" type="text/css" />
    <link rel="stylesheet" id="gameStyle" href="<?=support_public_url('css/style.min.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?=support_public_url('css/style.css')?>" type="text/css" />
    <link rel="stylesheet" href="<?=support_public_url('css/perfect-scrollbar.css')?>" type="text/css" />
    <script type="text/javascript" src="<?=support_public_url('js/api.js')?>"></script>
    <script>
        var api_url = '<?= site_url('api') ?>'
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        (function (wd, doc) {
            var w = wd.innerWidth || doc.documentElement.clientWidth;
            var h = wd.innerHeight || doc.documentElement.clientHeight;
            var screenSize = {w: w, h: h};
            var compareW = 801;
            if (screenSize.w > 0 && screenSize.w < compareW) {
                var cssTag = doc.createElement("link"),
                    cssFile = '<?=support_public_url('css/responsive.min.css')?>';
                cssTag.setAttribute("id", "smallStyle");
                cssTag.setAttribute("rel", "stylesheet");
                cssTag.setAttribute("type", "text/css");
                cssTag.setAttribute("href", cssFile);
                doc.getElementsByTagName("head")[0].appendChild(cssTag);
            }
        })(window, document);
    </script>

    <!--[if lt IE 8]>
    <link rel="stylesheet" href="<?= ("support_public_url(css/ie-8-1.css")?>" type="text/css" />
    <link rel="stylesheet" href="<?= ("support_public_url(css/ie-8-2.css")?>" type="text/css" />
    <![endif]-->

    <!--[if IE 8]>
    <link rel="stylesheet" href="<?= ("support_public_url(css/ie-8-3.css")?>" type="text/css" />
    <![endif]-->

    <script type="text/javascript" src="<?=support_public_url('js/composer.js')?>"></script>
    <script type="text/javascript" src="<?=support_public_url('js/helper.js')?>"></script>

    <!--[if lt IE 8]>
    <script type="text/javascript" src="<?=support_public_url('js/ie-8.js')?>"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?=support_public_url('js/ie-9.js')?>"></script>
    <![endif]-->



    <script type="text/javascript" src="<?=support_public_url('js/main.js')?>"></script>

    <script type="text/javascript" src="<?=support_public_url('js/perfect-scrollbar.js')?>"></script>

</head>
<?php

$aId = session('user_id');
$getAccountInfosor = $account->prepare ("SELECT cash,mileage FROM account WHERE id =:id");
$getAccountInfosor->execute([
    'id'=>$aId
]);
$getAccountInfo= $getAccountInfosor->fetch(PDO::FETCH_ASSOC);


$coins = $getAccountInfo['cash'];
$emCoins = $getAccountInfo['mileage'];

$getPlayerInfo =$player->prepare("SELECT name,job FROM player WHERE account_id =:id");
$getPlayerInfo->execute([
    'id'=>$aId
]);
$pInfo= $getPlayerInfo->fetch(PDO::FETCH_ASSOC);

$pName = $pInfo['name'];
$pJob = $pInfo['job'];

$emCount = $db->prepare("SELECT id FROM items WHERE durum = :durum");
$emCount->execute(array(':durum'=>3));
$emCounts = $emCount->rowCount();

$getTicketCount = $db->prepare("SELECT COUNT(id) as count FROM ticket_status WHERE accountid = :accountid AND status = :status");
$getTicketCount->execute([":accountid"=>$aId,":status"=>"0"]);
$getTicketC = $getTicketCount->fetch(PDO::FETCH_ASSOC)['count'];


if (!session('user_name') || !session('user_id')){
    header('Location:' . support_url('error'));
    exit;
}

?>
<body class="website">
<div id="page" class="row-fluid">
    <div id="header" class="header clearfix">
        <div class="span5  logo-block">
            <h1>
                <a style="background: url(<?=URL.settings('settings_logo')?>) 0 50% no-repeat;background-size: contain;" href="<?=support_url('index')?>"><?= settings('settings_gamename');?></a>
            </h1>
            <div class="welcome">
                <i class="icon-user"></i><span><?= session('user_name')?></span>
                <i class="icon-earth"></i><span><?= settings('settings_gamename');?></span>
            </div>
        </div>
        <div class="span7 payment-block">
            <a href="<?=support_url('index')?>">
                <button class="btn-price premium">
                    <span class="premium-name">Ticket Oluştur</span>
                </button>
            </a>
            <button id="showRightPush" class="account-push" ><i class="icon-menu2"></i></button>
        </div>
    </div>
    <!-- header -->
    <div id="contentContainer">
        <nav id="slideMenu" class="clearfix">
            <h2><i class="icon-user"></i> Oyuncu bilgisi</h2>
            <div class="account-infos">
                <img class="avatar" height="45" width="45" src="<?=support_public_url('images/chrs/'.$pJob.'.png')?>" alt="" />
                <span class="buy-for">Giriş yapılan hesap:</span>
                <p class="selected-player">
                    İsim : <?= session('user_name')?><br>
                    Sunucu : <?=settings('settings_gamename')?>
                </p>
            </div>

            <h2> Nesne Market</h2>
            <ul class="nav nav-tabs nav-stacked">
                <li>
                    <a class="btn-sideitem" id="Xmas2017" href="<?=URL. '/shop'?>">
                        <i class="zicon-dailies"></i>
                        <span>Nesne Market</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div id="navigation" class="navbar">

            <div class="container">
                <!-- Be sure to leave the brand out there if you want it shown -->
                <ul class="nav nav-tabs  search">

                    <li class="<?php if(route(1) == 'index' || route(1) == null){echo 'active'; } ?>">
                        <a class="btn-navitem icon-home <?php if(route(1) == 'index' || route(1) == null){echo 'btn-navitem-active'; } ?>"  href="<?=support_url('index')?>"></a>
                    </li>
                    <li class="<?php if(route(1) == 'product'){echo 'active'; } ?>">
                        <a href="<?=support_url('read')?>" title="" class="btn-navitem  <?php if( route(1) == 'read'){echo 'btn-navitem-active'; } ?>">
                            Yanıtlanmış Ticketler
                            <?php if (intval($getTicketC) > 0):?>
                                <span class="w3-badge"><?=$getTicketC?></span>
                            <?php endif;?>
                        </a>
                    </li>
                    <li>
                        <a href="<?=support_url('unread')?>" title="" class="btn-navitem <?php if( route(1) == 'unread'){echo 'btn-navitem-active'; } ?>">Yanıtlanmamış Ticketler</a>
                    </li>
                    <li>
                        <a href="<?=support_url('lock')?>" title="" class="btn-navitem <?php if( route(1) == 'lock'){echo 'btn-navitem-active'; } ?>">Kapatılmış Ticketlar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
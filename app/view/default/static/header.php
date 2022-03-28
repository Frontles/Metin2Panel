<!DOCTYPE html>
<html>
<head>

    <!-- Meta start -->
    <meta charset="UTF-8">
    <meta name="robots" content="follow, index"/>
    <meta http-equiv="Content-Language" content="pl"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=URL.'/favicon.ico'?>" type="image/x-icon" />

    <base href="<?=URL?>">
    <title><?= settings('settings_gamename')?> | <?=settings('settings_gameslogan')?></title>
    <!-- /meta start -->

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?=URL?>/favicon.ico" sizes="16x16" />
    <!-- /favicon -->

    <!-- Meta -->
    <meta name="keywords" content=" <?= settings('settings_keywords') ?> "/>
    <meta name="description" content="<?= settings('settings_description')?> "/>
    <!-- /meta -->

    <!-- OpenGraph tags (espec. Facebook) -->
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?=URL?>"/>
    <meta property="og:title" content="<?=settings('settings_gamename')?> - Metin2 PVP Server"/>
    <meta property="og:description" content="<?=settings('settings_gamename')?>-<?=settings('settings_gameslogan')?>. Uzun süre boyunca, hoş dengeli ve ilginç oyun sunuyoruz!"/>
    <meta property="og:image" content="<?=settings('settings_logo')?>"/>
    <!-- /openGraph tags -->


    <link rel="stylesheet" href="<?=public_url('asset/css/default.css')?>" type="text/css"/>
    <link rel="stylesheet" href="<?=public_url('asset/css/cms.css')?>" type="text/css"/>
    <link rel="stylesheet" href="<?=public_url('asset/css/main.css?z=1')?>" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?=public_url('asset/css/selectbox.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?=public_url('asset/css/radiocheck.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?=public_url('asset/css/shadowbox.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?=public_url('asset/css/loginbox.css')?>"/>
    <link rel="stylesheet" href="<?=public_url('asset/css/rankings.css')?>"/>
    <link rel="stylesheet" href="<?=public_url('asset/css/popup.css')?>"/>
    <link rel="stylesheet" href="<?=public_url('asset/css/jquery.modal.css')?>"/>
    <link rel="stylesheet" href="<?=public_url('asset/css/basscss.min.css')?>"/>
    <link href="<?=public_url('asset/css/fancybox.css')?>" rel="stylesheet" type="text/css" media="screen"/>


    <!-- Needed Footer JS -->

    <script type="text/javascript" src="<?=public_url('asset/js/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?=public_url('asset/js/jquery.modal.min.js')?>"></script>

    <script type="text/javascript" src="<?=public_url('asset/js/selectbox.min.js')?>"></script>
    <script type="text/javascript" src="<?=public_url('asset/js/footer_include.js')?>"></script>
    <script type="text/javascript" src="<?=public_url('asset/js/ui.js')?>"></script>
    <script type="text/javascript" src="<?=public_url('asset/js/flux.min.js')?>"></script>
    <script type="text/javascript" src="<?=public_url('asset/js/popup.js')?>"></script>
    <script type="text/javascript" src="<?=public_url('asset/js/fancybox.js')?>"></script>
    <script src="<?=public_url('asset/js/notify.js')?>"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        $(document).ready(function () {
            var screenSize = $(window).height();
            var compareW = 767;
            if (screenSize > 0 && screenSize < compareW) {
                var fancy_a = 740;
                var fancy_b = 550;
                var fancy_c = "ishopbg-small";
                var fancy_d = "13px";
                var fancy_e = "3px";
                var fancy_f = "13px";
                var fancy_g = 754;
                var fancy_h = 574;
                var fancy_i = 6;
                var fancy_j = 20;
            }
            else
            {
                var fancy_a = 1016;
                var fancy_b = 655;
                var fancy_c = "ishopbg";
                var fancy_d = "16px";
                var fancy_e = "7px";
                var fancy_f = "16px";
                var fancy_g = 1032;
                var fancy_h = 690;
                var fancy_i = 8;
                var fancy_j = 28;
            }
            var fancybox_css = {
                'outer': {'background': null},
                'close': {'background_image': null, 'height': null, 'right': null, 'top': null, 'width': null}
            };
            $('a.itemshop').fancybox({
                'autoDimensions': false,
                'width': fancy_a,
                'height': fancy_b,
                'padding': 0,
                'scrolling': 'yes',
                'overlayColor': '#000',
                'overlayOpacity': 0.8,
                'onStart': function () {
                    fancybox_css.outer.background = $('#fancybox-outer').css('background');
                    fancybox_css.close.background_image = $('#fancybox-close').css('background-image');
                    fancybox_css.close.height = $('#fancybox-close').css('height');
                    fancybox_css.close.right = $('#fancybox-close').css('right');
                    fancybox_css.close.top = $('#fancybox-close').css('top');
                    fancybox_css.close.width = $('#fancybox-close').css('width');
                    $('#fancybox-outer').css({'background': 'transparent url("<?=public_url('')?>static/images/'+fancy_c+'.png") center center no-repeat'});
                    $('#fancybox-close').css({
                        'background-image': 'none',
                        'cursor': 'pointer',
                        'height': fancy_d,
                        'right': '3px',
                        'top': fancy_e,
                        'width': fancy_f
                    });
                },
                'onComplete': function () {
                    $('#fancybox-inner').css({'top': fancy_j, 'left': fancy_i});
                    $('#fancybox-wrap').css({'width': fancy_g, 'height': fancy_h});
                },
                'onClosed': function () {
                    if (null != fancybox_css.outer.background) {
                        $('#fancybox-outer').css('background', fancybox_css.outer.background);
                    }
                    if (null != fancybox_css.close.background_image) {
                        $('#fancybox-close').css('background-image', fancybox_css.close.background_image);
                    }
                    if (null != fancybox_css.close.height) {
                        $('#fancybox-close').css('height', fancybox_css.close.height);
                    }
                    if (null != fancybox_css.close.right) {
                        $('#fancybox-close').css('right', fancybox_css.close.right);
                    }
                    if (null != fancybox_css.close.top) {
                        $('#fancybox-close').css('top', fancybox_css.close.top);
                    }
                    if (null != fancybox_css.close.width) {
                        $('#fancybox-close').css('width', fancybox_css.close.width);
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        var Config = {
            URL: "",
            URL2: "",
            IconURL: "",
            FileURL: "<?=public_url()?>asset/",
            AjaxURL: "",

            Slider: {
                interval: 8000,
                effect: "blinds3d",
                id: "slider_bg"
            },

            Theme: {
                next: "",
                previous: ""
            }
        };

        function search() {
            var keyword = $("input[name=keyword]").val();
            if (keyword.length < 4) {
                UI.alert("Arama yaparken en az 4 karakter girmelisiniz.");
            } else if (keyword.length > 20) {
                UI.alert("Arama yaparken en fazla 20 karakter girmelisiniz.");
            } else {
                $("#search").submit();
            }
        }
        function serverstatus() {
            $.post("ajaxeed9.html?action=serverstatus", function (data) {
                if (data == "1") {
                    $(".rs_online").html('<font color="green">ONLINE</font>');
                } else {
                    $(".rs_online").html('<font color="red">OFFLINE</font>');
                }
            });
        }
    </script>
    <script>
        $(document).ready(function () {
            UI.initialize();
        });
    </script>
</head>
<?php   $cache = new Cache();
        $functions = new Functions();
?>

<?php

$sId = session_get('sId');

$urlLang = route(0);
$urlLang = rtrim($urlLang,'/');
$urlLang = filter_var($urlLang,FILTER_SANITIZE_URL);
$urlLang = explode('/', $urlLang);
if($sId == null){
    session_set('sId','site');
}

$aid = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
if (isset($aid)){

    $avatar = isset($playerInfo[0]['job']) ? $playerInfo[0]['job'] : null;
    $getAinsor = $account->prepare("SELECT cash,mileage FROM account WHERE id = ?");
    $getAinsor->execute([
        $aid
    ]);
    $getAin = $getAinsor->fetchAll(PDO::FETCH_ASSOC);

}

if (($cache->check('server_statistics'))){


    if (settings('total_online_status')){

        $totalonline= $player->prepare("SELECT COUNT(id) as count FROM player.player WHERE DATE_SUB(NOW(), INTERVAL 60 MINUTE) < last_play;");
        $totalonline->execute([
            0
        ]);
        $getCount['totalOnline'] = $totalonline->fetch(PDO::FETCH_ASSOC);

    }

    if (settings('total_player_status')){
        $totalplayer = $player->prepare("SELECT COUNT(id) as count FROM player.player");
        $totalplayer->execute([
            0
        ]);
        $getCount['totalPlayer'] = $totalplayer->fetch(PDO::FETCH_ASSOC);
    }

    if (settings('total_account_status')){

        $totalaccount =$account->prepare("SELECT COUNT(id) as count FROM account.account WHERE status = ?");
        $totalaccount->execute([
            'OK'
        ]);
        $getCount['totalAccount'] = $totalaccount->fetch(PDO::FETCH_ASSOC);

    }

    if (settings('today_login_status')){
        $todaylogin = $player->prepare("SELECT COUNT(id) as count FROM player.player WHERE last_play LIKE '%".date("Y-m-d")."%' ");
        $todaylogin->execute([]);
        $getCount['todayLogin'] = $todaylogin->fetch(PDO::FETCH_ASSOC);

    }

    if (settings('active_pazar_status')){
        $offline_shop_npc = settings('offline_shop_npc');

        //$activepazar= $player->prepare("SELECT COUNT(owner_id) as count FROM player.$offline_shop_npc");
       // $activepazar->execute([]);
        //$sonuc = $activepazar->fetch(PDO::FETCH_ASSOC);
        $getCount['activePazar'] =  '0';
    }
}

if ($cache->check('player_ranking')){

    $topplayer = $player->prepare("SELECT player.name,player.level FROM player.player WHERE player.player.`name` NOT LIKE '[%]%' ORDER BY player.player.`level` DESC, player.player.playtime DESC, player.player.exp DESC LIMIT 0,5");
    $topplayer->execute([]);
    $result['topplayer'] = $topplayer->fetchAll(PDO::FETCH_ASSOC);
    $topguild =  $player->prepare("SELECT * FROM player.guild ORDER BY ladder_point DESC LIMIT 0,5");
    $topguild->execute([]);
    $result['topguild'] = $topguild->fetchAll(PDO::FETCH_ASSOC);

}
?>
<?php if (settings('multi_languages')):?>
    <?php
    $getLanguage = $db->prepare("SELECT * FROM language");
    $getLanguage->execute();
    $languagesS = $getLanguage->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['language'] = settings('selected_language');

    ?>
    <style>
        .languagepicker {
            background-color: #FFF;
            display: inline-block;
            padding: 0;
            height: 40px;
            overflow: hidden;
            transition: all .3s ease;
            margin: 30px 0 0 0;
            vertical-align: top;
            float: left;
            position: fixed;
            right: 0px;
            z-index: 999;
        }

        .languagepicker:hover {
            /* don't forget the 1px border */
            height: 81px;
        }

        .languagepicker a{
            color: #000;
            text-decoration: none;
        }

        .languagepicker li {
            display: block;
            padding: 0px 10px;
            line-height: 40px;
            border-top: 1px solid #EEE;
        }

        .languagepicker li:hover{
            background-color: #EEE;
        }

        .languagepicker a:first-child li {
            border: none;
            background: #FFF !important;
        }

        .languagepicker li img {
            margin-top: 7px;
        }

        .roundborders {
            -webkit-border-top-left-radius: 5px;
            -webkit-border-bottom-left-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-bottomleft: 5px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .large:hover {
            height: <?=count($languagesS) * 45?>px;
        }
    </style>
    <ul class="languagepicker roundborders large">
        <?php foreach ($languagesS as $languages):?>
            <?php if ($languages['code'] === $_SESSION['language']):?>
                <a href="#nl"><li><img src="<?=URL."/data/flags/country/".$languages['code'].".png"?>"/></li></a>
            <?php endif;?>
        <?php endforeach;?>
        <?php foreach ($languagesS as $languages):?>
            <?php if ($languages['code'] !== $_SESSION['language']):?>
                <a href="<?=site_url('select-language?code='.$languages['code'])?>"><li><img src="<?=URL."/data/flags/country/".$languages['code'].".png"?>"/></li></a>
            <?php endif;?>
        <?php endforeach;?>
    </ul>
<?php endif;?>
<!-- Header -->
<header id="header">
    <!-- NAVIGATION -->
    <div class="holder">
        <ul class="top-navigation">
            <li>
                <a id="home" href="<?=site_url('index')?>"></a>
            </li>
            <li>
                <a id="forums" href="<?=site_url('download')?>"></a>
            </li>
            <li>
                <a id="changelogs" href="javascript:void(0)"></a>
                <div class="nddm-holder changelogs" style="margin-left: 20px;">
                    <div class="navi-dropdown">
                        <ul>
                            <li><a href="<?=site_url('ranked-player')?>"><?=$lng[65]?></a></li>
                            <li><a href="<?=site_url('ranked-guild')?>"><?=$lng[66]?></a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a class="itemshop itemshop-btn iframe" id="features" href="<?=URL.'/' .'shop'?>"></a>
            </li>
            <li>
                <a class="itemshop itemshop-btn iframe" id="media" href="<?=URL.'/' .'support'?>"></a>
            </li>
            <li>
                <a id="warmory" target="blank" href="<?= 'http://'.settings('settings_discord') ?>"></a>
            </li>
        </ul>
        <div class="membership-holder">
            <div class="membership-bar">
                <?php if (isset($_SESSION['user_id'])):?>
                    <!-- Logged in! -->
                    <div class="logged_in_info">
                       <span><a style="font-size: 1.3rem" href="<?= site_url('profile') ?>" ><?=$lng[9]?></a></span>

                        <span ><a style="font-size: 1.3rem" href="<?= site_url('logout') ?>" ><?=$lng[20]?></a></span>
                    </div>
                <?php else: ?>
                    <!-- Not logged -->
                    <div class="notlogged_bar">
                        <a  id="home_login" onclick="toggleLogin(event, this)"><?=$lng[21]?></a>
                        <a href="<?=site_url('register')?>" id="home_register"><?=$lng[10]?></a>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>

    <div class="logo-holder">
<br><br>
        <img width="25%" src="<?= URL. '/' .settings('settings_logo')?>" class="logo" alt="">

    </div>
</header>
<!-- /header -->

<div id="popup_bg"></div>
<!-- confirm box -->
<div id="confirm" class="popup">
    <h1 class="popup_question" id="confirm_question">confirm</h1>
    <div class="popup_links">
        <a href="javascript:void(0)" class="popup_button" id="confirm_button"></a>
        <a href="javascript:void(0)" class="popup_hide" id="confirm_hide" onclick="UI.hidePopup()">Cancel
        </a>
        <div style="clear: both;"></div>
    </div>
</div>
<!-- alert box -->
<div id="alert" class="popup">
    <h1 class="popup_message" id="alert_message">message</h1>
    <div class="popup_links">
        <a href="javascript:void(0)" class="popup_button" id="alert_button">Ok</a>
        <div style="clear: both;"></div>
    </div>
</div>
<div class="main_b_holder">
    <!-- Important Notices.End -->
    <div id="content">
        <!-- BODY Content start here -->


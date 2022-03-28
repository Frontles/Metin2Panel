<!DOCTYPE html>
<html>
<head>

    <!-- Meta start -->
    <meta charset="UTF-8">
    <meta name="robots" content="follow, index"/>
    <meta http-equiv="Content-Language" content="pl"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/">
    <title>Zahira2 - Türkiye'nin En Kaliteli Vslik Sunucusu</title>
    <!-- /meta start -->

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="http://localhost/panelim/favicon.ico" sizes="16x16" />
    <!-- /favicon -->

    <!-- Meta -->
    <meta name="keywords" content="<?= settings('settings_keywords') ?>"/>
    <meta name="description" content="<?= settings('settings_description')?>"/>
    <!-- /meta -->

    <!-- OpenGraph tags (espec. Facebook) -->
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="http://metin2.test/"/>
    <meta property="og:title" content="Zahira2 - Metin2 PVP Server"/>
    <meta property="og:description" content="Zahira2-Türkiye'nin En Kaliteli Vslik Sunucusu. Uzun süre boyunca, hoş dengeli ve ilginç oyun sunuyoruz!"/>
    <meta property="og:image" content="data/upload/tE1q0L1o5jQ5F4h.png"/>
    <!-- /openGraph tags -->


    <link rel="stylesheet" href="http://metin2.test/app/public/client/default/asset/css/default.css" type="text/css"/>
    <link rel="stylesheet" href="http://metin2.test/app/public/client/default/asset/css/cms.css" type="text/css"/>
    <link rel="stylesheet" href="http://metin2.test/app/public/client/default/asset/css/main.css?z=1" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="http://metin2.test/app/public/client/default/asset/css/selectbox.css"/>
    <link rel="stylesheet" type="text/css" href="http://metin2.test/app/public/client/default/asset/css/radiocheck.css"/>
    <link rel="stylesheet" type="text/css" href="http://metin2.test/app/public/client/default/asset/css/shadowbox.css"/>
    <link rel="stylesheet" type="text/css" href="http://metin2.test/app/public/client/default/asset/css/loginbox.css"/>
    <link rel="stylesheet" href="http://metin2.test/app/public/client/default/asset/css/rankings.css"/>
    <link rel="stylesheet" href="http://metin2.test/app/public/client/default/asset/css/popup.css"/>
    <link rel="stylesheet" href="http://metin2.test/app/public/client/default/asset/css/jquery.modal.css"/>
    <link rel="stylesheet" href="http://metin2.test/app/public/client/default/asset/css/basscss.min.css"/>
    <link href="http://metin2.test/app/public/client/default/asset/css/fancybox.css" rel="stylesheet" type="text/css" media="screen"/>


    <!-- Needed Footer JS -->

    <script type="text/javascript" src="http://metin2.test/app/public/client/default/asset/js/jquery.min.js"></script>
    <script type="text/javascript" src="http://metin2.test/app/public/client/default/asset/js/jquery.modal.min.js"></script>

    <script type="text/javascript" src="http://metin2.test/app/public/client/default/asset/js/selectbox.min.js"></script>
    <script type="text/javascript" src="http://metin2.test/app/public/client/default/asset/js/footer_include.js"></script>
    <script type="text/javascript" src="http://metin2.test/app/public/client/default/asset/js/ui.js"></script>
    <script type="text/javascript" src="http://metin2.test/app/public/client/default/asset/js/flux.min.js"></script>
    <script type="text/javascript" src="http://metin2.test/app/public/client/default/asset/js/popup.js"></script>
    <script type="text/javascript" src="http://metin2.test/app/public/client/default/asset/js/fancybox.js"></script>
    <script src="http://metin2.test/app/public/client/default/asset/js/notify.js"></script>

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
                    $('#fancybox-outer').css({'background': 'transparent url("http://metin2.test/app/public/client/default/static/images/'+fancy_c+'.png") center center no-repeat'});
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
            FileURL: "http://metin2.test/app/public/client/default/asset/",
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
</head>	    <style>
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
        height: 135px;
    }
</style>
<ul class="languagepicker roundborders large">
    <a href="#nl"><li><img src="http://metin2.test/data/flags/country/tr.png"/></li></a>
    <a href="http://metin2.test/languages/select/en"><li><img src="http://metin2.test/data/flags/country/en.png"/></li></a>
    <a href="http://metin2.test/languages/select/de"><li><img src="http://metin2.test/data/flags/country/de.png"/></li></a>
</ul>
<!-- Header -->
<header id="header">
    <!-- NAVIGATION -->
    <div class="holder">
        <ul class="top-navigation">
            <li>
                <a id="home" href="<?= site_url('index') ?>"></a>
            </li>
            <li>
                <a id="forums" href="<?= site_url('download') ?>"></a>
            </li>
            <li>
                <a id="changelogs" href="javascript:void(0)"></a>
                <div class="nddm-holder changelogs" style="margin-left: 20px;">
                    <div class="navi-dropdown">
                        <ul>
                            <li><a href="<?= site_url('ranked/player') ?>">Oyuncu Sıralaması</a></li>
                            <li><a href="<?= site_url('ranked/guild') ?>">Lonca Sıralaması</a></li>
                        </ul>
                    </div>
                </div>
            </li>

            <li>
                <a class="itemshop itemshop-btn iframe" id="features" href="<?= site_url('ishop') ?>"></a>
            </li>
            <li>
                <a class="itemshop itemshop-btn iframe" id="media" target="_blank" href="<?= site_url('support') ?>"></a>
            </li>
            <li>
                <a id="warmory" target="blank" href="https://discord.gg/qzJG77s"></a>
            </li>
        </ul>
        <?php if (session('user_id')):  ?>
            <div class="membership-holder">
                <div class="membership-bar">
                    <!-- Not logged -->
                    <div class="notlogged_bar">
                        <a href="<?= site_url('my-profile') ?>" >Profilim</a>

                        <a href="<?= site_url('logout') ?>" >Çıkış Yap</a>
                    </div>
                </div>
            </div>
        <?php else: ?>
        <div class="membership-holder">
            <div class="membership-bar">
                <!-- Not logged -->
                <div class="notlogged_bar">
                    <a href="#" id="home_login" onclick="toggleLogin(event, this)">Giriş Yap</a>

                    <a href="<?= site_url('register') ?>" id="home_register">Kayıt Ol</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <div class="logo-holder">

        <img src="data/upload/tE1q0L1o5jQ5F4h.png" class="logo" alt="">

    </div>
</header>
<!-- /header -->
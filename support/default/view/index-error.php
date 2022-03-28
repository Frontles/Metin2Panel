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
    <link rel="shortcut icon" type="image/x-icon" href="<?=URL.'favicon.ico'?>">
    <link rel="stylesheet" href="<?=support_public_url('css/bootstrap.min.css')?>" type="text/css" />
    <link rel="stylesheet" id="gameStyle" href="<?=support_public_url('css/style.min.css')?>" type="text/css" />

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
    <link rel="stylesheet" href="<?= support_public_url('css/ie-8-1.css') ?> " type="text/css" />
    <link rel="stylesheet" href="<?= support_public_url('css/ie-8-2.css') ?>" type="text/css" />
    <![endif]-->

    <!--[if IE 8]>
    <link rel="stylesheet" href="<?= support_public_url('css/ie-8-3.css') ?>" type="text/css" />
    <![endif]-->

    <script type="text/javascript" src="<?=support_public_url('js/composer.js')?>"></script>
    <script type="text/javascript" src="<?=support_public_url('js/helper.js')?>"></script>

    <!--[if lt IE 8]>
    <script type="text/javascript" src="<?= support_public_url('js/ie-8.js')?>"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?= support_public_url('js/ie-9.js')?>"></script>
    <![endif]-->

    <script type="text/javascript" src="<?=support_public_url('js/main.js')?>"></script>
</head>
<body class="ingame metin2 tr">
<div id="page" class="row-fluid">
    <div id="header" class="header clearfix">
        <div class="span5">
            <h1>
                <a style="background: <?=URL.settings('logo')?> 0 50% no-repeat;background-size: contain;"> <?=settings('settings_gamename')?> </a>
            </h1>
        </div>
    </div><!-- header -->
    <div id="contentContainer">
        <div class="content clearfix">

            <div id="error" class="contrast-box">
                <div class="dark-grey-box">
                    <h2><i class="icon-info left"></i>Hata</h2>
                    <br>
                    <h3>Hatanın sebebi aşağıdakilerden bir tanesi olabilir!</h3>
                    <ul class="clearfix" style="list-style: disc">
                        <li style="margin-top: 5px;">Mevcut olmayan bir sayfaya girmeye çalışıyor olabilirsiniz.</li>
                        <li style="margin-top: 5px;">Hesabınıza giriş yapmadan destek sistemine girmeye çalışıyor olabilirsiniz.</li>
                    </ul>
                    <h4>Bunlar dışında bir hata olduğunu düşünüyorsanız lütfen yetkililere bildirin!</h4>
                    <div class="btn_wrapper">
                    </div>
                </div>
            </div>


        </div>
        <div id="overlayMask"></div>
    </div><!-- close contentContainer -->
</div>

</body>
</html>

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
    <link rel="stylesheet" id="gameStyle" href="/temalar/market/assets/css/style.min.css" type="text/css" />
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
<?php if($this->config->item('market_durum') == true):?>
<? redirect('market'); ?>
<?php endif;?>
<div id="page" class="row-fluid">
    
    <div id="header" class="header clearfix"> </div>

    <div id="contentContainer">
        <div class="content clearfix">
            <div id="error" class="contrast-box">
                <div class="dark-grey-box">
                    <h2><i class="icon-info left"></i>Hata</h2>
                    <br>
                    <h3>Hatanın sebebi aşağıdakilerden bir tanesi olabilir!</h3>
                    <ul class="clearfix" style="list-style: disc">
                        <li style="margin-top: 5px;">Market Sistemimiz Henüz Açılmamıştır.</li>
                    </ul>
                    <h4>Bunlar dışında bir hata olduğunu düşünüyorsanız lütfen yetkililere bildirin!</h4>
                    <div class="btn_wrapper">
                    </div>
                </div>
            </div>
        </div>
        <div id="overlayMask"></div>
    </div>
</div>
</body>

</html>
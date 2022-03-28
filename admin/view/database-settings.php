<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8"/>
    <title><?= settings('settings_gamename') ?> | DB Bilgilerini Güncelle</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content=" <?= settings('settings_description') ?>"
          name="description"/>
    <meta content="<?= settings('settings_author') ?>" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="<?= admin_public_url('/global/plugins/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?= admin_public_url('/global/plugins/simple-line-icons/simple-line-icons.min.css') ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?= admin_public_url('/global/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?= admin_public_url('/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') ?>"
          rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?= admin_public_url('/global/css/components.min.css') ?>" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="<?= admin_public_url('/global/css/plugins.min.css') ?>" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?= admin_public_url('/pages/css/lock.min.css') ?>" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="<?= URL . '/favicon.ico' ?>"/>
</head>
<!-- END HEAD -->

<body class="">
<?php
$getDbKey = settings('dbkey');
?>
<div class="page-lock">

    <?php

    if (post('dbkey')) {
        $key = updatedbkey();

        if ($key['result'] == false) {
            echo '<script>alert("Lütfen Key Giriniz");</script>';
        } else {
            echo '<script>alert("database keyiniz : ' . $key['data'] . '");</script>';
            header('Location: ' . admin_url('database-settings2'));
        }
    }
    ?>
    <div class="page-logo">
        <a class="brand" href="<?= admin_url('index') ?>">
            <img src="<?= admin_public_url('/pages/img/logo-big.png') ?>" alt="logo"/> </a>
    </div>
    <div class="page-body">
        <div class="lock-head"> Database Key'inizi Giriniz.</div>
        <?php if ($getDbKey == null) ?>
        <div class="lock-body">
            <form class="lock-form pull-left" action="" method="post">
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" style="width: 290px;" type="text" autocomplete="off"
                           placeholder="Database Key" name="key"/>
                </div>
                <div class="form-actions">
                    <button type="submit" name="dbkey" value="1" style="width: 290px;" class="btn red uppercase">Kayıt
                        Et
                    </button>
                </div>
                <?php if ($getDbKey != null): ?>
                    <div class="form-actions">
                        <a href="<?= admin_url('database-settings2') ?>">
                            <button type="button" style="width: 290px;" class="btn white uppercase">Geç</button>
                        </a>
                    </div>
                <?php endif; ?>
            </form>
        </div>
        <div class="lock-bottom">
            <span style="color: white">Bu key sayesinde oyun database bilgileriniz Özel algoritma ile şifrelenmektedir. Bu key'i sizin belirlemeniz gerekmektedir. </span>
        </div>
    </div>
    <div class="page-footer-custom"> 2020 &copy; Metin2Panel. Metin2 Admin Paneli.</div>
</div>
<!--[if lt IE 9]>
<script src="<?= admin_public_url('/global/plugins/respond.min.js') ?>"></script>
<script src="<?= admin_public_url('/global/plugins/excanvas.min.js') ?>"></script>
<script src="<?= admin_public_url('/global/plugins/ie8.fix.min.js') ?>"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?= admin_public_url('/global/plugins/jquery.min.js') ?>" type="text/javascript"></script>
<script src="<?= admin_public_url('/global/plugins/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?= admin_public_url('/global/plugins/js.cookie.min.js') ?>" type="text/javascript"></script>
<script src="<?= admin_public_url('/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') ?>"
        type="text/javascript"></script>
<script src="<?= admin_public_url('/global/plugins/jquery.blockui.min.js') ?>" type="text/javascript"></script>
<script src="<?= admin_public_url('/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>"
        type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?= admin_public_url('/global/scripts/app.min.js') ?>" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= admin_public_url('/pages/scripts/lock.min.js') ?>" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>

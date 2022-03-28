<?php

$settingsquery = $db->prepare("SELECT * FROM settings WHERE settings_id =:id ");
$settingsquery->execute([
    'id' => 1
]);
$settingsrow = $settingsquery->fetch(PDO::FETCH_ASSOC);



$getIp =settings('db_ip');
$getPassword = settings('db_password');
$getUser = settings('db_user');
$getDb = settings('db_name');
$getDbKey = settings('dbkey');
if ($getDbKey == ''){
    header('Location:'. admin_url('database-settings'));
    exit();
}elseif($getIp == '' ||  $getUser == '' || $getDb == ''){
    header('Location:'. admin_url('database-settings2'));
    exit();
}

$adminId = session_get('admin_id');

$getmyprofiles = $db->prepare('SELECT * FROM users WHERE user_id = ?');
$getmyprofiles->execute([$adminId]);
$adminsonuc = $getmyprofiles->fetch(PDO::FETCH_ASSOC);
$getMyLogs = $db->prepare("SELECT content,date FROM admin_log WHERE user_id = ? ORDER BY date DESC LIMIT 0,8");
$getMyLogs->execute(array($adminId));

$countMyTicket = $db->prepare("SELECT id FROM ticket_status WHERE whoid = ? AND status = ?");
$countMyTicket->execute(array($adminId,'1'));
$getFullTicket = $db->prepare("SELECT ticketid,username,title,message,tarih,whoid FROM ticket_status WHERE status = ? ORDER BY tarih DESC");
$getFullTicket->execute(array('1'));
$getTicket = $getFullTicket->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= URL . '/favicon.ico' ?>" type="image/x-icon"/>
    <title><?= $settingsrow['settings_gamename'] ?> | <?= $settingsrow['settings_title'] ?></title>

    <!-- googlecharts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Bootstrap -->
    <link href="<?= admin_public_url('/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/dcd0f662c5.js" crossorigin="anonymous"></script>
    <!-- NProgress -->
    <link href="<?= admin_public_url('/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">

    <script>
        var api_url = '<?= site_url('api')?>';
    </script>
    <!-- iCheck -->
    <link href="<?= admin_public_url('/vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?= admin_public_url('/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>"
          rel="stylesheet">
    <link href="<?= admin_public_url('/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') ?>"
          rel="stylesheet">
    <link href="<?= admin_public_url('/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') ?>"
          rel="stylesheet">
    <link href="<?= admin_public_url('/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') ?>"
          rel="stylesheet">
    <link href="<?= admin_public_url('/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') ?>"
          rel="stylesheet">


    <!-- Dropzone.js -->

    <link href="<?= admin_public_url('/vendors/dropzone/dist/min/dropzone.min.css') ?>" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="<?= admin_public_url('/build/css/custom.min.css') ?>" rel="stylesheet">
    <!-- Extra.js -->


    <link href="<?= admin_public_url('/css/extra.css') ?>" rel="stylesheet">

    
   
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



    


    <!-- bootstrap-daterangepicker -->
 
    <link href="<?= admin_public_url("/datepicker/jquery.datetimepicker.min.css") ?>" rel="stylesheet">
    
    <style>

        div.dataTables_wrapper div.dataTables_filter input {
            width: 75%;
        }

        td {
            text-align: center;
        }

        .badge.badge-empty {

            display: inline-block;
            padding: 0;
            min-width: 8px;
            height: 8px;
            width: 8px;

        }

        .badge {
            font-size: 11px !important;
            font-weight: 300;
            height: 18px;
            color: #fff;
            padding: 3px 6px;
            -webkit-border-radius: 12px !important;
            -moz-border-radius: 12px !important;
            border-radius: 12px !important;
            text-shadow: none !important;
            text-align: center;
            vertical-align: middle;

        }

        .badge-primary {
            background-color: #337ab7;
        }

        .badge-warning {
            background-color: #F1C40F;

        }

        .badge-success {
            background-color: #36c6d3;;
        }

        .badge-danger {
            background-color: #ed6b75;;
        }

        .icon-btn {
            width: 220px;
            position: relative;
            height: 180px;
            margin: 15px;
            display: inline-block;
            border: 1px solid #ddd
        }

        .icon-btn:hover {
            text-decoration: none;
            border-color: #999;
            color: #444;
            text-shadow: 0 1px 0 #fff;
            transition: all .3s ease;
            cursor: pointer;
            box-shadow: none;
        }

        .icon i {
            font-size: 5rem !important;
        }

        .satis:hover {
            background-color: #e7ecf1;
            transition: all .5s ease;
        }

        .sayfalama a {
            display: inline-block;
            padding: 10px;
            background: #333;
            margin-right: 4px;
            color: #eee;
            text-decoration: none;
        }

        .sayfalama a.aktif {
            background: darkcyan;
            color: #fff;
        }

    </style>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="index" class="site_title"><img width="90%"
                                                            src="<?= admin_public_url('/images/logo.png') ?>"
                                                            alt=""></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?= isset($adminsonuc['user_image']) ? URL . '/' .  $adminsonuc['user_image'] : admin_public_url('/images/no-image.jpg'); ?>"
                             alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Hoşgeldiniz </span>
                        <h2> <?= session('admin_name') ?>  </h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <?php foreach ($menus as $mainurl => $menu): if (!permission($mainurl, 'show')) {
                                continue;
                            } ?>
                                <li>
                                    <a <?= isset($menu['submenu']) ? null : 'href=' . '"' . admin_url($mainurl) . '"' ?> >
                                        <i class="fa fa-<?= $menu['icon'] ?>"></i>
                                        <?= $menu['title'] ?> <?= !isset($menu['submenu']) ? null : '<span class="fa fa-chevron-down"></span>'; ?>
                                        <?php if (isset($menu['submenu'])): ?>
                                            <ul class="nav child_menu">
                                                <?php foreach ($menu['submenu'] as $url => $title): ?>
                                                    <li>
                                                        <a href="<?= admin_url($url) ?>">
                                                            <?= $title ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a href="<?= admin_url('logout') ?>" data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">


            <div class="nav_menu">


                <nav>
                    <div style="width: 6%" class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>


                    <?php if (permission('accounts', 'search')) : ?>

                        <div style="width: 50%;display: inline-block; margin-top:10px;">
                            <form style="display: inline-block;padding: 0px"
                                  class="search-form search-form-expanded col-md-6 col-xs-6"
                                  action="<?= admin_url('player-search') ?>" method="POST">
                                <div class="input-group">
                                    <input required minlength="3" type="text" class="form-control" id="characterlogin"
                                           required name="character" placeholder="Karakter Adı ile Arama">
                                    <span class="input-group-btn">
                                    <button type="submit" value="1" class="btn btn-dark">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                </div>
                            </form>

                            <form style="display: inline-block;padding: 0px"
                                  class="search-form search-form-expanded col-md-6 col-xs-6"
                                  action="<?= admin_url('account-search') ?>" method="POST">
                                <div class="input-group">
                                    <input required minlength="3" type="text" class="form-control" name="login"
                                           placeholder="Kullanıcı Adı ile Arama">
                                    <span class="input-group-btn">
                                    <button type="submit" value="1" class="btn btn-dark">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                </div>
                            </form>
                        </div>

                    <?php endif; ?>

                    <ul style="width: 30%" class="nav navbar-nav navbar-right">

                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="<?= isset($adminsonuc['user_image']) ? URL . '/' . $adminsonuc['user_image'] : admin_public_url('/images/no-image.jpg'); ?>"
                                     alt=""><?= session('admin_name') ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="<?= admin_url('my-profile') ?>"> Profil Bilgileri</a></li>


                                <li><a href="<?= admin_url('logout') ?>"><i class="fa fa-sign-out pull-right"></i> Çıkış
                                        Yap </a></li>
                            </ul>
                        </li>

                        <li class="">
                            <a href="<?= admin_url('delete-cache') ?>"><i class="fa fa-trash"></i></a>
                        </li>


                        <?php if (permission('tickets', 'send')) : ?>
                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green"><?= $getFullTicket->rowCount(); ?></span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <?php foreach ($getTicket as $val):?>
                                <?php $messageC = strlen($val['message']);
                                if ($messageC > 101 ){
                                    $message = substr($val['message'],0,100) . '...';
                                }else{
                                    $message = $val['message'];
                                }
                                ?>
                                <li>
                                    <a href="<?= admin_url('send-ticket-answer?id=' . $val['ticketid']) ?>">
                                        <span class="image">
                                            <img src="<?=admin_public_url('/images/no-image.jpg')?>" alt="Profile Image"/>
                                        </span>

                                        <span>
                                            <span><?= $val['username'] ?></span>

                                            <span class="time"><?=timeConvert($val['tarih'])?></span>
                                        </span>

                                        <span class="message">
                                            <?=$message?>
                                        </span>
                                    </a>
                                </li>
                                <?php endforeach;?>

                                <?php if( $getFullTicket->rowCount() <=0 ): ?>
                                <li>
                                    <div class="text-center">

                                            <strong>Hiç Mesaj Yok !</strong>

                                    </div>
                                </li>
                                <?php endif; ?>
                                <li>
                                    <div class="text-center">
                                        <a href="<?= admin_url('unread-tickets') ?>">
                                            <strong>Tüm Mesajları Gör</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>

                            </ul>
                        </li>
                        <?php endif; ?>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa fa-calendar"></i>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu" style="max-width: 300px;">
                                <li class="external">
                                    <h3>
                                        Son <span class="bold">8</span> Log Kaydı
                                    </h3>
                                </li>
                                <?php foreach ($getMyLogs->fetchAll(PDO::FETCH_ASSOC) as $val): ?>
                                <li>
                                    <a href="javascript:;">
                                        <span class="image">
                                            <img src="<?= admin_public_url('/images/no-image.jpg') ?>" alt=""> </span>
                                        <span>
                                            <span><?= session_get('admin_name') ?></span>
                                            <span class="time"><?= timeConvert($val['date']) ?></span>
                                        </span>
                                        <span class="message">
                                            <?= $val['content'] ?>nız
                                        </span>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>

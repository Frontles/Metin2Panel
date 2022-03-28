<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Erişim Engellendi ! </title>

    <!-- Bootstrap -->
    <link href="<?= admin_public_url('/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= admin_public_url('/vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= admin_public_url('/vendors/nprogress/nprogress.css')?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= admin_public_url('/build/css/custom.min.css')?>" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
            <div class="col-middle">
                <div class="text-center text-center">
                    <h1 class="error-number">403</h1>
                    <h2>Erişim Engellendi !</h2>
                    <p>Bu Sayfayı Görüntüleme İzniniz yok !
                    </p>
                    <a href="<?=admin_url('index');?>" class="btn btn-danger btn-outline"> Anasayfa'ya Git </a>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>

<!-- jQuery -->
<script src="<?= admin_public_url('/vendors/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap -->
<script src="<?= admin_public_url('/vendors/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- FastClick -->
<script src="<?=admin_public_url('/vendors/fastclick/lib/fastclick.js')?>"></script>
<!-- NProgress -->
<script src="<?=admin_public_url('/vendors/nprogress/nprogress.js')?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?=admin_public_url('/build/js/custom.min.js')?>"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>404 NOT FOUND</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="#1 selling multi-purpose bootstrap admin theme sold in themeforest marketplace packed with angularjs, material design, rtl support with over thausands of templates and ui elements and plugins to power any type of web applications including saas and admin dashboards. Preview page of Theme #1 for 404 page option 3"
          name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?=admin_public_url('/global/plugins/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=admin_public_url('/global/plugins/simple-line-icons/simple-line-icons.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=admin_public_url('/global/plugins/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=admin_public_url('/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <script src="<?=admin_public_url('/global/plugins/jquery.min.js')?>" type="text/javascript"></script>
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?=admin_public_url('/global/css/components.min.css')?>" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?=admin_public_url('/global/css/plugins.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?=admin_public_url('/pages/css/error.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="<?= admin_url()?>" /> </head>
<!-- END HEAD -->

<body class=" page-404-3">

<div class="page-inner">
    <img src="<?=admin_public_url('/pages/media/pages/earth.jpg')?>" class="img-responsive" alt=""> </div>
<div class="container error-404">
    <h1>404 <span style="font-size: 50px;">Not Found</span></h1>
    <h2>Böyle bir sayfa mevcut değil !</h2>
    <p> Hangi sayfayı aramıştınız ?  </p>
    <p>
    <form action="<?=URI::get_path('error/search')?>" method="post" class="form-horizontal" role="form">
        <div class="form-body">
            <div class="form-group">
                <div class="col-md-3">
                    <select id="link" class="form-control">
                        <option value="0"> boş</option>
                        <?php  /*foreach ($menu as $row):?>
                            <option value="<?=$row['link']?>"><?=$row['name']?></option>
                        <?php endforeach; */?>
                    </select>
                </div>
                <div class="col-md-3">
                    <a id="menu" href="" class="btn green btn-outline"> Git </a>
                </div>
            </div>
        </div>
    </form>
    <a href="<?=admin_url('index');?>" class="btn red btn-outline"> Anasayfa'ya Git </a>
    <br> </p>
</div>
<script>
    $( document ).ready(function() {
        $('#link').change(function () {
            var value = $('#link').val();
            var link = "<?=URI::get_path();?>"
            document.getElementById("menu").href=link+value;
            return false;
        });
    });
</script>
<script src="<?=admin_public_url('/global/plugins/respond.min.js')?>"></script>
<script src="<?=admin_public_url('/global/plugins/excanvas.min.js')?>"></script>
<script src="<?=admin_public_url('/global/plugins/ie8.fix.min.js')?>"></script>
<!-- BEGIN CORE PLUGINS -->
<script src="<?=admin_public_url('/global/plugins/jquery.min.js')?>" type="text/javascript"></script>
<script src="<?=admin_public_url('/global/plugins/bootstrap/js/bootstrap.min.js')?>" type="text/javascript"></script>
<script src="<?=admin_public_url('/global/plugins/js.cookie.min.js')?>" type="text/javascript"></script>
<script src="<?=admin_public_url('/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')?>" type="text/javascript"></script>
<script src="<?=admin_public_url('/global/plugins/jquery.blockui.min.js')?>" type="text/javascript"></script>
<script src="<?=admin_public_url('/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')?>" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?=admin_public_url('/global/scripts/app.min.js')?>" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
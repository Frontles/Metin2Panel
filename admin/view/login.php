<?php  if(post('createkey')){

    $createkey = createkey();
}  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?=URL.'/favicon.ico'?>" type="image/x-icon" />
    <title> <?= settings('settings_gamename') ?> | Login Admin Panel </title>

    <!-- Bootstrap -->
    <link href="<?= admin_public_url('/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= admin_public_url('/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= admin_public_url('/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= admin_public_url('/vendors/animate.css/animate.min.css') ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= admin_public_url('/build/css/custom.min.css') ?>" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="" method="post">
                    <h1> Giriş Yapın</h1>
                    <div>
                        <input type="text"  class="form-control" placeholder="Kullanıcı Adı" value="<?= post('user_name') ?>" name="user_name" required autofocus>
                    </div>
                    <div>
                        <input type="password" id="password" placeholder="Şifre"  class="form-control" name="user_password" >
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12 offset-md-12 mt-2">
                            <?php
                            if ($err =error()): ?>
                                <div  class=" alert alert-danger" >
                                    <?=$err?>
                                </div>
                            <?php endif; ?>
                            <?php  if ($succ =success()): ?>
                                <div class=" alert alert-success" role="alert">
                                    <?=$succ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div>

                        <button class="btn btn-dark" name="submit" type="submit" value="1">Giriş Yap</button>
                    </div>
                    <br>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Şifrenizi mi unuttunuz ?
                            <a  href="#signup" class="to_register"> Şifre Oluştur </a>
                        </p>
                        <div>
                            <h1><img src="<?= admin_public_url('/images/logo.png') ?>" alt="metin2panel"></h1>
                            <p>©2020 <a style="font-weight: bold;color: black" href="https://www.metin2panel.com" target="_blank">Metin2Panel</a>Tüm Hakları Saklıdır.  </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form action="" method="post">
                    <h1>Şifre Oluştur</h1>

                    <div>
                        Sistemde md5,sha1 vs. gibi şifreleme sistemleri kullanılmamıştır. Kendine has bir şifreleme sistemi mevcuttur. Bunun için bu bölümde şifre oluşturup , oluşan şifreyi kopyalayıp veritabanın da gerekli yere yapıştırarak kullanabilirsiniz.
                    </div>
                    <br><br>
                    <div>
                        <input type="text" name="key" class="form-control" />
                    </div>

                    <div>
                        <button type="submit" class="btn btn-dark" value="1" name="createkey">Şifre Oluştur</button>
                    </div>


                    <?php if (isset($createkey['result']) && $createkey['result'] == ''): ?>
                        <span style="color: darkred;font-weight: bold">
                            <?= $createkey['message'] ?>
                        </span>
                    <?php endif; ?>
                    <?php if (isset($createkey['result']) && $createkey['result'] == true): ?>
                        <span style="color: darkred;font-weight: bold" >
                            <?= $createkey['message']; ?>
                        </span>
                    <?php endif; ?>
                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Login Sayfası :
                            <a href="#signin" class="to_register"> Giriş Yap </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><img src="<?= admin_public_url('/images/logo.png') ?>" alt="metin2panel"></h1>
                            <p>©2020 <a style="font-weight: bold;color: black" href="https://www.metin2panel.com" target="_blank">Metin2Panel</a>Tüm Hakları Saklıdır.  </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>

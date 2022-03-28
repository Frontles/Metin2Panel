<?php require admin_view('/static/header');

$eptlsorgu = $db->prepare('SELECT * FROM ep_tlconvert');
$eptlsorgu->execute();
$eptlsonuc = $eptlsorgu->fetchAll(PDO::FETCH_ASSOC);

$ticketitlesor = $db->prepare('SELECT * FROM ticket_title');
$ticketitlesor->execute();
$ticketitles = $ticketitlesor->fetchAll(PDO::FETCH_ASSOC);

$say = 0;
$online = online_sayisi();
if (post('generalsettings')) {
    $genelayar = general_settings();

} elseif (post('maintenancesettings')) {
    $bakimmodu = maintenancesettings();
} elseif (post('sayacsettings')) {
    $sayac = sayacsettings();
} elseif (post('smtpsettings')) {
    $smtp = smtpsettings();
} elseif (post('linksettings')) {
    $links = linksettings();
} elseif (post('socketsettings')) {
    $sockets = socketsettings();
} elseif (post('wheel')) {
    $wheel = wheel();
} elseif (post('recaptcha')) {
    $recaptcha = recaptcha();
} elseif (post('payreks')) {
    $payreks = payreks();
} elseif (post('itemci')) {
    $itemci = itemci();
} elseif (post('paywant')) {
    $paywant = paywant();
} elseif (post('add_eptl')) {
    $epsonuc = add_eptl();
} elseif (post('edit_ticket')) {
    $ticketsettings = edit_ticket();
} elseif (post('gameshopping')) {
    $oyunalisveris = oyunalisveris();
} elseif (post('add_ticket_title')) {
    $ticketbaslik = addtickettitle();
} elseif (post('shopedit')) {
    $shopedit = shopedit();
}
?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="" tab>
            <div class="clearfix"></div>
            <div class="admin-tab">
                <ul tab-list>
                    <li>
                        <a href="#">Genel</a>
                    </li>
                    <li>
                        <a href="#">Online Sayısı</a>
                    </li>

                    <li>
                        <a href="#">Bakım Modu</a>
                    </li>
                    <li>
                        <a href="#">Sayaçlar</a>
                    </li>
                    <li>
                        <a href="#">SMTP</a>
                    </li>
                    <li>
                        <a href="#">Linkler</a>
                    </li>
                    <li>
                        <a href="#">Socket</a>
                    </li>
                    <li>
                        <a href="#">Çark</a>
                    </li>

                    <li>
                        <a href="#">Recaptcha</a>
                    </li>

                    <li>
                        <a href="#">Payreks</a>
                    </li>
                    <li>
                        <a href="#">İtemci</a>
                    </li>
                    <li>
                        <a href="#">Paywant</a>
                    </li>
                    <li>
                        <a href="#">EP-TL</a>
                    </li>
                    <li>
                        <a href="#">Ticket </a>
                    </li>
                    <li>
                        <a href="#">Oyun Alışveriş </a>
                    </li>

                    <li>
                        <a href="#"> Market </a>
                    </li>
                </ul>
            </div>
            <div class="tab-container">

                <div tab-content class="row">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="x_title">

                                <h2>Genel Ayarlar</h2>

                                <div class="clearfix"></div>

                            </div>
                            <br>
                            <?php if (isset($genelayar['result']) && $genelayar['result'] == ''): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                    <?= $genelayar['message'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($genelayar['result']) && $genelayar['result'] == true): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                    <?= $genelayar['message'] ?>
                                    <script>
                                        setTimeout(function () {
                                            window.location.assign("<?= admin_url('settings') ?>");
                                            //3 saniye sonra yönlenecek
                                        }, 1500);
                                    </script>
                                </div>
                            <?php endif; ?>
                            <form id="" action="" method="post" enctype="multipart/form-data" data-parsley-validate
                                  class="form-horizontal form-label-left">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Yüklü Logo <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php

                                        if (strlen(settings('settings_logo')) > 0) { ?>
                                            <img width="200px" src="<?= URL . '/' . settings('settings_logo') ?>"
                                                 alt="">


                                        <?php } else { ?>
                                            <img width="200px" src="<?= admin_public_url('/images/no-image.jpg') ?>"
                                                 alt="">

                                        <?php } ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Site Logo <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" name="settings_logo" class="form-control col-md-7 col-xs-12">
                                        <input type="hidden" name="eski_yol"
                                               value="<?php echo settings('settings_logo') ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Panel Title <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="settings_title"
                                               value="<?php echo settings('settings_title') ?>" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Site Description <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo settings('settings_description') ?>"
                                               name="settings_description" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Site Keywords <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?php echo settings('settings_keywords') ?>"
                                               name="settings_keywords" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Site Author <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="settings_author"
                                               value="<?php echo settings('settings_author') ?>" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Oyun Adı <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="settings_gamename"
                                               value="<?php echo settings('settings_gamename') ?>"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Oyun Sloganı <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="settings_gameslogan"
                                               value="<?php echo settings('settings_gameslogan') ?>"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Site Teması <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <select class="form-control col-md-7 col-xs-12" name="settings_theme">
                                            <option value="0">Tema Seçiniz</option>
                                            <?php foreach ($themes as $theme): ?>
                                                <option <?= settings('settings_theme') == $theme ? 'selected' : null; ?>
                                                        value="<?= $theme ?>"> <?= $theme ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> value="1"
                                                                                                              type="submit"
                                                                                                              name="generalsettings"
                                                                                                              class="btn btn-success">
                                            Güncelle
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row">

                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_title">
                                <h2>Online Sayısı </h2>
                                <div class="clearfix"></div>
                            </div>
                            <br>
                            <?php if (settings('socket_status') == '1'): ?>
                                <?php if ($online['ch1']['function'] === true): ?>
                                    <b style="color: darkred">Sunucunuz socket gönerimini desteklemiyor. Lütfen php.ini
                                        dosyasından extension=php_sockets.dll ya da extension=php_sockets.so dosyasını
                                        aktif edip apache serverı yeniden başlatın.</b>
                                <?php else: ?>
                                    <?php
                                    $data = online_sayisi();
                                    $ch1 = ($data["ch1"]['connect'] === true) ? $data["ch1"]["data"] : null;
                                    $ch2 = ($data["ch2"]['connect'] === true) ? $data["ch2"]["data"] : null;
                                    $ch3 = ($data["ch3"]['connect'] === true) ? $data["ch3"]["data"] : null;
                                    $ch4 = ($data["ch4"]['connect'] === true) ? $data["ch4"]["data"] : null;
                                    ?>
                                    <?php if ($ch1 === null): ?>
                                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-user fa-2x"></i></div>
                                                <span class="count" data-value="0">CH1 <small style="font-size: 2.1rem"> Kapalı </small> </span>
                                                <h3>Yanıt Yok</h3>
                                                <p></p>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-user fa-2x"></i></div>
                                                <span class="count"
                                                      data-value="<?= $ch1 ?>"><?= $ch1 ?> <small> Kişi </small> </span>
                                                <h3>CH 1</h3>
                                                <p></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($ch2 === null): ?>
                                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-user fa-2x"></i></div>
                                                <span class="count" data-value="0">CH1 <small style="font-size: 2.1rem"> Kapalı </small> </span>
                                                <h3>Yanıt Yok</h3>
                                                <p></p>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-user fa-2x"></i></div>
                                                <span class="count"
                                                      data-value="<?= $ch2 ?>"><?= $ch1 ?> <small> Kişi </small> </span>
                                                <h3>CH 1</h3>
                                                <p></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($ch3 === null): ?>
                                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-user fa-2x"></i></div>
                                                <span class="count" data-value="0">CH1 <small style="font-size: 2.1rem"> Kapalı </small> </span>
                                                <h3>Yanıt Yok</h3>
                                                <p></p>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-user fa-2x"></i></div>
                                                <span class="count"
                                                      data-value="<?= $ch3 ?>"><?= $ch3 ?> <small> Kişi </small> </span>
                                                <h3>CH 1</h3>
                                                <p></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($ch4 === null): ?>
                                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-user fa-2x"></i></div>
                                                <span class="count" data-value="0">CH1 <small style="font-size: 2.1rem"> Kapalı </small> </span>
                                                <h3>Yanıt Yok</h3>
                                                <p></p>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="tile-stats">
                                                <div class="icon"><i class="fa fa-user fa-2x"></i></div>
                                                <span class="count"
                                                      data-value="<?= $ch4 ?>"><?= $ch4 ?> <small> Kişi </small> </span>
                                                <h3>CH 1</h3>
                                                <p></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="tile-stats">
                                            <div class="icon"><i class="fa fa-user fa-2x"></i></div>
                                            <div class="count"
                                                 data-value="<?= $ch1 + $ch2 + $ch3 + $ch4 ?>"><?= $ch1 + $ch2 + $ch3 + $ch4 ?>
                                                <small>Kişi</small></div>
                                            <h3>Toplam Online</h3>
                                            <p>Toplam Online Oyuncu Sayısını Gösterir.</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>

                                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-user fa-2x"></i></div>
                                        <div class="count" data-value="<?= $online['count'] ?>"><?= $online['count'] ?>
                                            <small>Kişi</small></div>
                                        <h3>Toplam Online</h3>
                                        <p>Toplam Online Oyuncu Sayısını Gösterir.</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="x_title">
                            <h2>Bakım Modu Ayarları </h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>

                            <?php if (isset($bakimmodu['result']) && $bakimmodu['result'] == ''): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                    <?= $bakimmodu['message'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($bakimmodu['result']) && $bakimmodu['result'] == true): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                    <?= $bakimmodu['message'] ?>
                                    <script>
                                        setTimeout(function () {
                                            window.location.assign("<?= admin_url('settings') ?>");
                                            //3 saniye sonra yönlenecek
                                        }, 1500);
                                    </script>
                                </div>
                            <?php endif; ?>
                            <form id="demo-form2" action="" method="post" data-parsley-validate
                                  class="form-horizontal form-label-left">


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Bakım Modu Title <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?= settings('settings_maintenance_title') ?>"
                                               name="settings_maintenance_title" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Bakım Modu Text <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="settings_maintenance_text"
                                                  class="form-control col-md-7 col-xs-12"
                                                  rows="5"><?= settings('settings_maintenance_text') ?></textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Bakım Modu <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <select class="form-control col-md-7 col-xs-12" name="settings_maintenancemode">
                                            <option <?= settings('settings_maintenancemode') == 0 ? 'selected' : null; ?>
                                                    value="0">Kapalı
                                            </option>
                                            <option <?= settings('settings_maintenancemode') == 1 ? 'selected' : null; ?>
                                                    value="1">Açık
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> value="1"
                                                                                                              type="submit"
                                                                                                              name="maintenancesettings"
                                                                                                              class="btn btn-success">
                                            Güncelle
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div tab-content class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_title">
                            <h2>Online Oyuncu Sayacı</h2>

                            <div class="clearfix"></div>
                        </div>
                        <br>
                        <?php if (isset($sayac['result']) && $sayac['result'] == ''): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                <?= $sayac['message'] ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($sayac['result']) && $sayac['result'] == true): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                <?= $sayac['message'] ?>
                                <script>
                                    setTimeout(function () {
                                        window.location.assign("<?= admin_url('settings') ?>");
                                        //3 saniye sonra yönlenecek
                                    }, 1500);
                                </script>
                            </div>
                        <?php endif; ?>
                        <form id="demo-form2" action="" method="post" enctype="multipart/form-data"
                              data-parsley-validate class="form-horizontal form-label-left">


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Online Oyuncu Sayacı <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12" name="total_online_status">
                                        <option value="0" <?= settings('total_online_status') == 0 ? 'selected' : null; ?>>
                                            Pasif
                                        </option>
                                        <option value="1" <?= settings('total_online_status') == 1 ? 'selected' : null; ?>>
                                            Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Yanıltma <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="settings_onlineplayer"
                                           value="<?= settings('settings_onlineplayer') ?>"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="x_title">
                                <h2>Toplam Karakter Sayacı</h2>
                                <div class="clearfix"></div>
                            </div>

                            <br>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Kayıtlı Karakter Sayısı
                                    Gösterilsin mi ? <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12" name="total_player_status">
                                        <option value="0" <?= settings('total_player_status') == 0 ? 'selected' : null; ?>>
                                            Pasif
                                        </option>
                                        <option value="1" <?= settings('total_player_status') == 1 ? 'selected' : null; ?>>
                                            Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Yanıltma <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="settings_characters"
                                           value="<?= settings('settings_characters') ?>"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="x_title">
                                <h2>Günlük Giriş Sayaç</h2>

                                <div class="clearfix"></div>
                            </div>
                            <br>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Günlük Oyuncu Sayacı <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12" name="today_login_status">
                                        <option value="0" <?= settings('today_login_status') == 0 ? 'selected' : null; ?>>
                                            Pasif
                                        </option>
                                        <option value="1" <?= settings('today_login_status') == 1 ? 'selected' : null; ?>>
                                            Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Yanıltma <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="settings_dailyplayer"
                                           value="<?= settings('settings_dailyplayer') ?>"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="x_title">
                                <h2>Toplam Kayıtlı Hesap Sayacı</h2>

                                <div class="clearfix"></div>
                            </div>
                            <br>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Toplam Kayıtlı Hesap
                                    Gösterilsin mi ? <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12" name="total_account_status">
                                        <option value="0" <?= settings('total_account_status') == 0 ? 'selected' : null; ?>>
                                            Pasif
                                        </option>
                                        <option value="1" <?= settings('total_account_status') == 1 ? 'selected' : null; ?>>
                                            Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Yanıltma <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="settings_accounts"
                                           value="<?= settings('settings_accounts') ?>"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="x_title">
                                <h2>Aktif Pazar Sayacı</h2>

                                <div class="clearfix"></div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Aktif Pazar Sayısı <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12" name="active_pazar_status">
                                        <option value="0" <?= settings('active_pazar_status') == 0 ? 'selected' : null; ?>>
                                            Pasif
                                        </option>
                                        <option value="1" <?= settings('active_pazar_status') == 1 ? 'selected' : null; ?>>
                                            Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Yanıltma <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="settings_onlinebazaar"
                                           value="<?= settings('settings_onlinebazaar') ?>"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> value="1"
                                                                                                          type="submit"
                                                                                                          name="sayacsettings"
                                                                                                          class="btn btn-success">
                                        Güncelle
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div tab-content class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="x_title">
                            <h2>SMTP AYARLARI</h2>
                            <div class="clearfix"></div>
                        </div>

                        <br/>
                        <?php if (isset($smtp['result']) && $smtp['result'] == ''): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                <?= $smtp['message'] ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($smtp['result']) && $smtp['result'] == true): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                <?= $smtp['message'] ?>
                                <script>
                                    setTimeout(function () {
                                        window.location.assign("<?= admin_url('settings') ?>");
                                        //3 saniye sonra yönlenecek
                                    }, 1500);
                                </script>
                            </div>
                        <?php endif; ?>
                        <form id="demo-form2" action="" method="post" data-parsley-validate
                              class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mail Başlığı<span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="settings_smtpfrom"
                                           value="<?= settings('settings_smtpfrom') ?>" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">SMTP Host<span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="settings_smtphost"
                                           value="<?= settings('settings_smtphost') ?>" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">SMTP User ID<span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="settings_smtpuser"
                                           value="<?= settings('settings_smtpuser') ?>" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">SMTP Password <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="settings_smtppassword"
                                           value="<?= settings('settings_smtppassword') ?>" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">SMTP Port <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?= settings('settings_smtpport') ?>"
                                           name="settings_smtpport" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">SMTP Secure <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="settings_smtpsecure" class="form-control col-md-7 col-xs-12">
                                        <option <?= settings('settings_smtpsecure') == 'tls' ? 'selected' : null; ?>
                                                value="tls">tls
                                        </option>
                                        <option <?= settings('settings_smtpsecure') == 'ssl' ? 'selected' : null; ?>
                                                value="ssl">ssl
                                        </option>
                                    </select>


                                </div>
                            </div>


                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> type="submit"
                                                                                                          value="1"
                                                                                                          name="smtpsettings"
                                                                                                          class="btn btn-success">
                                        Güncelle
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div tab-content class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_title">
                            <h2>Link Ayarları</h2>
                            <div class="clearfix"></div>
                        </div>

                        <br/>
                        <?php if (isset($links['result']) && $links['result'] == ''): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                <?= $links['message'] ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($links['result']) && $links['result'] == true): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                <?= $links['message'] ?>
                                <script>
                                    setTimeout(function () {
                                        window.location.assign("<?= admin_url('settings') ?>");
                                        //3 saniye sonra yönlenecek
                                    }, 1500);
                                </script>
                            </div>
                        <?php endif; ?>
                        <form id="demo-form2" action="" method="post" data-parsley-validate
                              class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Facebook Hesabı <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="settings_facebook"
                                           value="<?= settings('settings_facebook') ?>"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Youtube Hesabı <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="settings_youtube"
                                           value="<?= settings('settings_youtube') ?>"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Instagram Hesabı <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="settings_instagram"
                                           value="<?= settings('settings_instagram') ?>"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Discord Hesabı <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?= settings('settings_discord') ?>"
                                           name="settings_discord" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> value="1"
                                                                                                          type="submit"
                                                                                                          name="linksettings"
                                                                                                          class="btn btn-success">
                                        Güncelle
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div tab-content class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="x_title">
                            <h2>Socket Ayarları</h2>

                            <div class="clearfix"></div>
                        </div>

                        <br>
                        <div style="text-align: center;">
                            <b style="color: darkblue;">Hatırlatma : Socket bağlantısı oyun src'si ile bağlantılı
                                çalışmaktadır.
                                Eğer bağlantı yapılmamışsa <br> Socket Bağlantı Durumunu Aktif yapmayınız.
                                Aksi halde güvenlik sorunu yaşayabilirsiniz..</b></div>
                        <br>
                        <hr>
                        <?php if (isset($sockets['result']) && $sockets['result'] == ''): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                <?= $sockets['message'] ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($sockets['result']) && $sockets['result'] == true): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                <?= $sockets['message'] ?>
                                <script>
                                    setTimeout(function () {
                                        window.location.assign("<?= admin_url('settings') ?>");
                                        //3 saniye sonra yönlenecek
                                    }, 1500);
                                </script>
                            </div>
                        <?php endif; ?>
                        <form id="demo-form2" action="" method="post" data-parsley-validate
                              class="form-horizontal form-label-left">


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Socket Durumu <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12" name="socket_status">
                                        <option value="0" <?= settings('socket_status') == 0 ? 'selected' : null; ?>>
                                            Pasif
                                        </option>
                                        <option value="1" <?= settings('socket_status') == 1 ? 'selected' : null; ?>>
                                            Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Socket Karşılama Keyi <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="socket_response"
                                           placeholder="Varsayılan Key : SHOWMETHEMONEY"
                                           value="<?= strlen(settings('socket_response')) >= 1 ? settings('socket_response') : 'SHOWMETHEMONEY' ?>"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Socket Port 1 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="socket_ch1port" value="<?= settings('socket_ch1port') ?>"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Socket Port 2 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="socket_ch2port" value="<?= settings('socket_ch2port') ?>"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Socket Port 3 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="socket_ch3port" value="<?= settings('socket_ch3port') ?>"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Socket Port 4 <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="socket_ch4port" value="<?= settings('socket_ch4port') ?>"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> value="1"
                                                                                                          type="submit"
                                                                                                          name="socketsettings"
                                                                                                          class="btn btn-success">
                                        Güncelle
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div tab-content class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="x_title">
                            <h2>Çark İşlemleri </h2>

                            <div class="clearfix"></div>
                        </div>

                        <br>
                        <?php if (isset($wheel['result']) && $wheel['result'] == ''): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                <?= $wheel['message'] ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($wheel['result']) && $wheel['result'] == true): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                <?= $wheel['message'] ?>
                                <script>
                                    setTimeout(function () {
                                        window.location.assign("<?= admin_url('settings') ?>");
                                        //3 saniye sonra yönlenecek
                                    }, 1500);
                                </script>
                            </div>
                        <?php endif; ?>
                        <form id="demo-form2" action="" method="post" data-parsley-validate
                              class="form-horizontal form-label-left">


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Çark Durumu <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12" name="settings_wheel">
                                        <option value="0" <?= settings('settings_wheel') == 0 ? 'selected' : null; ?>>
                                            Pasif
                                        </option>
                                        <option value="1" <?= settings('settings_wheel') == 1 ? 'selected' : null; ?>>
                                            Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Çark Fiyatı <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" <?= settings('settings_wheel') == 1 ? 'enabled' : 'disabled'; ?>
                                           name="settings_wheel_coins" value="<?= settings('settings_wheel_coins') ?>"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> value="1"
                                                                                                          type="submit"
                                                                                                          name="wheel"
                                                                                                          class="btn btn-success">
                                        Güncelle
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div tab-content class="row">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_title">

                                <h2>Recaptcha Ayarlar <small>

                                    </small></h2>

                                <div class="clearfix"></div>
                            </div>
                            <br>

                            <?php if (isset($recaptcha['result']) && $recaptcha['result'] == ''): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                    <?= $recaptcha['message'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($recaptcha['result']) && $recaptcha['result'] == true): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                    <?= $recaptcha['message'] ?>
                                    <script>
                                        setTimeout(function () {
                                            window.location.assign("<?= admin_url('settings') ?>");
                                            //3 saniye sonra yönlenecek
                                        }, 1500);
                                    </script>
                                </div>
                            <?php endif; ?>
                            <form id="demo-form2" action="" method="post" enctype="multipart/form-data"
                                  data-parsley-validate class="form-horizontal form-label-left">

                                <div class="form-group ">
                                    <label class="control-label col-md-3 col-sm-4 col-xs-12"> <span
                                                class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        Nasıl Recaptcha key alındığını öğrenmek için <a
                                                style="color: darkred; text-decoration: dotted !important; "
                                                href="https://www.youtube.com/watch?v=pOb93Hy7WSY"
                                                target="_blank">bu</a> linke tıklayınız.

                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Recaptcha Durumu <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <select class="form-control col-md-7 col-xs-12" name="recaptcha_status">
                                            <option <?= settings('recaptcha_status') == 0 ? 'selected' : null; ?>
                                                    value="0">Pasif
                                            </option>
                                            <option <?= settings('recaptcha_status') == 1 ? 'selected' : null; ?>
                                                    value="1"> Aktif
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Recaptcha Site Key <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?= settings('recaptcha_sitekey') ?>"
                                               name="recaptcha_sitekey" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Recaptcha Secret Key <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?= settings('recaptcha_secretkey') ?>"
                                               name="recaptcha_secretkey" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> value="1"
                                                                                                              type="submit"
                                                                                                              name="recaptcha"
                                                                                                              class="btn btn-success">
                                            Güncelle
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_title">

                                <h2><i class="fa fa-cc-visa font-red-sunglo"></i> Payreks Ayarlar</h2>

                                <div class="clearfix"></div>
                            </div>
                            <br>
                            <?php if (isset($payreks['result']) && $payreks['result'] == ''): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                    <?= $payreks['message'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($payreks['result']) && $payreks['result'] == true): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                    <?= $payreks['message'] ?>
                                    <script>
                                        setTimeout(function () {
                                            window.location.assign("<?= admin_url('settings') ?>");
                                            //3 saniye sonra yönlenecek
                                        }, 1500);
                                    </script>
                                </div>
                            <?php endif; ?>
                            <form id="demo-form2" action="" method="post" enctype="multipart/form-data"
                                  data-parsley-validate class="form-horizontal form-label-left">


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Payreks Durumu <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <select class="form-control col-md-7 col-xs-12" name="payreks_status">
                                            <option <?= settings('payreks_status') == 0 ? 'selected' : null; ?>
                                                    value="0">Pasif
                                            </option>
                                            <option <?= settings('payreks_status') == 1 ? 'selected' : null; ?>
                                                    value="1"> Aktif
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Payreks API Key <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?= settings('payreks_apikey') ?>"
                                               name="payreks_apikey" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Payreks Secret Key <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?= settings('payreks_secretkey') ?>"
                                               name="payreks_secretkey" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> value="1"
                                                                                                              type="submit"
                                                                                                              name="payreks"
                                                                                                              class="btn btn-success">
                                            Güncelle
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_title">

                                <h2><i class="fa fa-cc-visa font-red-sunglo"></i> İtemci Ayarlar</h2>

                                <div class="clearfix"></div>
                            </div>
                            <br>
                            <?php if (isset($itemci['result']) && $itemci['result'] == ''): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                    <?= $itemci['message'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($itemci['result']) && $itemci['result'] == true): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                    <?= $itemci['message'] ?>
                                    <script>
                                        setTimeout(function () {
                                            window.location.assign("<?= admin_url('settings') ?>");
                                            //3 saniye sonra yönlenecek
                                        }, 1500);
                                    </script>
                                </div>
                            <?php endif; ?>
                            <form id="demo-form2" action="" method="post" enctype="multipart/form-data"
                                  data-parsley-validate class="form-horizontal form-label-left">


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">İtemci Durumu <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <select class="form-control col-md-7 col-xs-12" name="itemci_status">
                                            <option <?= settings('itemci_status') == 0 ? 'selected' : null; ?>
                                                    value="0">Pasif
                                            </option>
                                            <option <?= settings('itemci_status') == 1 ? 'selected' : null; ?>
                                                    value="1"> Aktif
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">İtemci E-Pin Lİnk <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?= settings('itemci_link') ?>" name="itemci_link"
                                               required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">İtemci Komisyon Oranı <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" value="<?= settings('itemci_commission') ?>"
                                               name="itemci_commission" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> value="1"
                                                                                                              type="submit"
                                                                                                              name="itemci"
                                                                                                              class="btn btn-success">
                                            Güncelle
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_title">
                                <h2 style="color: #E26A6A"><i class="fa fa-cc-visa font-red-sunglo"></i> Paywant
                                    Ayarlar </h2>
                                <div class="clearfix"></div>
                            </div>
                            <br>
                            <?php if (isset($paywant['result']) && $paywant['result'] == ''): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                    <?= $paywant['message'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($paywant['result']) && $paywant['result'] == true): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                    <?= $paywant['message'] ?>
                                    <script>
                                        setTimeout(function () {
                                            window.location.assign("<?= admin_url('settings') ?>");
                                            //3 saniye sonra yönlenecek
                                        }, 1500);
                                    </script>
                                </div>
                            <?php endif; ?>
                            <form id="demo-form2" action="" method="post" enctype="multipart/form-data"
                                  data-parsley-validate class="form-horizontal form-label-left">


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Paywant Durumu <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <select class="form-control col-md-7 col-xs-12" name="paywant_status">
                                            <option <?= settings('paywant_status') == 0 ? 'selected' : null; ?>
                                                    value="0">Pasif
                                            </option>
                                            <option <?= settings('paywant_status') == 1 ? 'selected' : null; ?>
                                                    value="1"> Aktif
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Paywant Api Key <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?= settings('paywant_apikey') ?>"
                                               name="paywant_apikey" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Paywant Secret Key
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" value="<?= settings('paywant_secretkey') ?>"
                                               name="paywant_secretkey" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> value="1"
                                                                                                              type="submit"
                                                                                                              name="paywant"
                                                                                                              class="btn btn-success">
                                            Güncelle
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>EP-TL Miktarları </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br>
                                <?php if (isset($epsonuc['result']) && $epsonuc['result'] == ''): ?>
                                    <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                        <?= $epsonuc['message'] ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($epsonuc['result']) && $epsonuc['result'] == true): ?>
                                    <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                        <?= $epsonuc['message'] ?>
                                        <script>
                                            setTimeout(function () {
                                                window.location.assign("<?= admin_url('settings') ?>");
                                                //3 saniye sonra yönlenecek
                                            }, 1500);
                                        </script>
                                    </div>
                                <?php endif; ?>
                                <form id="demo-form2" action="" method="post" data-parsley-validate
                                      class="form-horizontal form-label-left">


                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">EP Miktarı <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="ep_miktar" placeholder="EP Miktarı Giriniz."
                                                   required class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">TL Karşılığı <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="tl_miktar" placeholder="TL karşılığını giriniz.."
                                                   required class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>


                                    <div class="form-group">

                                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?>
                                                    value="1" type="submit" name="add_eptl" class="btn btn-success">Ekle
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>EP-TL Fiyat Listesi <small>
                                    </small></h2>

                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">

                                <table id="datatable-responsive"
                                       class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>

                                        <th>EP Miktarı</th>
                                        <th>TL karşılığı</th>
                                        <th width="10%">Sil</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($eptlsonuc as $eptl) : ?>
                                        <tr class="text-center" style="">

                                            <td width="10%"><?= $eptl['ep_miktar'] ?></td>
                                            <td width="10%"> <?= $eptl['tl_miktar'] ?></td>
                                            <td width="10%">
                                                <?php if (permission('settings', 'edit')) : ?>
                                                    <a onclick="return confirm( 'Silme işlemine devam etmek istiyor musunuz ?')"
                                                       href="<?= admin_url('delete?table=ep_tlconvert&column=eptl_id&id=' . $eptl['eptl_id']) ?>">
                                                        <button class="btn btn-danger">Sil</button>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (!permission('settings', 'edit')): ?>
                                                    <span> Silme yetkiniz bulunmamaktadır.</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div tab-content class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="x_title">
                            <h2>Ticket Ayarları <small> </small></h2>

                            <div class="clearfix"></div>
                        </div>

                        <br>
                        <?php if (isset($ticketsettings['result']) && $ticketsettings['result'] == ''): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                <?= $ticketsettings['message'] ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($ticketsettings['result']) && $ticketsettings['result'] == true): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                <?= $ticketsettings['message'] ?>
                                <script>
                                    setTimeout(function () {
                                        window.location.assign("<?= admin_url('settings') ?>");
                                        //3 saniye sonra yönlenecek
                                    }, 1500);
                                </script>
                            </div>
                        <?php endif; ?>
                        <form id="demo-form2" action="" method="post" data-parsley-validate
                              class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ticket Durumu <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control col-md-7 col-xs-12" name="ticket_status">
                                        <option <?= settings('ticket_status') == 0 ? 'selected' : null; ?> value="0">
                                            Pasif
                                        </option>
                                        <option <?= settings('ticket_status') == 1 ? 'selected' : null; ?> value="1">
                                            Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ticket Mail Gönderimi <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control col-md-7 col-xs-12" name="ticket_mail_status">
                                        <option <?= settings('ticket_mail_status') == 0 ? 'selected' : null; ?>
                                                value="0">Pasif
                                        </option>
                                        <option <?= settings('ticket_mail_status') == 1 ? 'selected' : null; ?>
                                                value="1"> Aktif
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span
                                        class="required"></span></label><span
                                    class="help-block col-md-9 col-sm-9 col-xs-12"> (Oyuncu ticket gönderdiğinde ticket ayrıntıları mail hesabına gönderilir.)</span>


                            <div class="form-group">

                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> value="1"
                                                                                                          type="submit"
                                                                                                          name="edit_ticket"
                                                                                                          class="btn btn-success">
                                        Güncelle
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="x_title">
                            <h2>Ticket Konu Başlığı Ekle <small> </small></h2>

                            <div class="clearfix"></div>
                        </div>

                        <br>
                        <?php if (isset($ticketbaslik['result']) && $ticketbaslik['result'] == ''): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                <?= $ticketbaslik['message'] ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($ticketbaslik['result']) && $ticketbaslik['result'] == true): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                <?= $ticketbaslik['message'] ?>
                                <script>
                                    setTimeout(function () {
                                        window.location.assign("<?= admin_url('settings') ?>");
                                        //3 saniye sonra yönlenecek
                                    }, 1500);
                                </script>
                            </div>
                        <?php endif; ?>
                        <form id="demo-form2" action="" method="post" data-parsley-validate
                              class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Ticket Konu Başlığı <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="title" placeholder="Konu Başlığı"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">

                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> value="1"
                                                                                                          type="submit"
                                                                                                          name="add_ticket_title"
                                                                                                          class="btn btn-success">
                                        Ekle
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_title">
                            <h2>Ticket Konu Listesi <small>
                                </small></h2>
                            <div align="right">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> Konu Başlığı</th>
                                <th width="50px">Sil</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($ticketitles as $ticketitle) : $say++ ?>
                                <tr>
                                    <td><?= $say ?></td>
                                    <td><?= $ticketitle['title'] ?></td>
                                    <td>
                                        <?php if (permission('settings', 'edit')) : ?>
                                            <a onclick="return confirm( 'Silme işlemine devam etmek istiyor musunuz ?')"
                                               href="<?= admin_url('delete?table=ticket_title&column=id&id=' . $ticketitle['id']) ?>">
                                                <button class="btn btn-danger">Sil</button>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (!permission('settings', 'edit')): ?>
                                            <span> Silme yetkiniz bulunmamaktadır.</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div tab-content class="row">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_title">

                                <h2><i class="fa fa-cc-visa font-red-sunglo"></i> Oyun Alışverişi Ayarlar</h2>

                                <div class="clearfix"></div>
                            </div>
                            <br>

                            <?php if (isset($oyunalisveris['result']) && $oyunalisveris['result'] == ''): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                    <?= $oyunalisveris['message'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($oyunalisveris['result']) && $oyunalisveris['result'] == true): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                    <?= $oyunalisveris['message'] ?>
                                    <script>
                                        setTimeout(function () {
                                            window.location.assign("<?= admin_url('settings') ?>");
                                            //3 saniye sonra yönlenecek
                                        }, 1500);
                                    </script>
                                </div>
                            <?php endif; ?>
                            <form id="demo-form2" action="" method="post" enctype="multipart/form-data"
                                  data-parsley-validate class="form-horizontal form-label-left">


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Oyun  Alışveriş Durumu <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <select class="form-control col-md-7 col-xs-12" name="gameshop_status">
                                            <option <?= settings('gameshop_status') == 0 ? 'selected' : null; ?>
                                                    value="0">Pasif
                                            </option>
                                            <option <?= settings('gameshop_status') == 1 ? 'selected' : null; ?>
                                                    value="1"> Aktif
                                            </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Oyun Alışveriş E-Pin Lİnk
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="<?= settings('gameshopping_link') ?>"
                                               name="gameshopping_link" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> value="1"
                                                                                                              type="submit"
                                                                                                              name="gameshopping"
                                                                                                              class="btn btn-success">
                                            Güncelle
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row">
                    <form id="demo-form2" action="" method="post" enctype="multipart/form-data"
                          data-parsley-validate class="form-horizontal form-label-left">

                        <?php if (isset($shopedit['result']) && $shopedit['result'] == ''): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                <?= $shopedit['message'] ?>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($shopedit['result']) && $shopedit['result'] == true): ?>
                            <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                <?= $shopedit['message'] ?>
                                <script>
                                    setTimeout(function () {
                                        window.location.assign("<?= admin_url('settings') ?>");
                                        //3 saniye sonra yönlenecek
                                    }, 0);
                                </script>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_title">
                                <h2><i class="fa fa-cc-visa font-red-sunglo"></i> Market Ayarları <small>
                                    </small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Market Durumu <span
                                            class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12" name="shop_status">
                                        <option <?= settings('shop_status') == 0 ? 'selected' : null; ?> value="0">
                                            Pasif
                                        </option>
                                        <option <?= settings('shop_status') == 1 ? 'selected' : null; ?> value="1">
                                            Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Market Gamekey <span
                                            class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text"
                                           value="<?= settings('gamekey') ? settings('gamekey') : 'GF9001'; ?>"
                                           name="gamekey" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span
                                        class="required"></span></label><span
                                    class="help-block col-md-9 col-sm-9 col-xs-12"> Source'de cmd_general.cpp dosyasında ki SAS keyinizi giriniz. Varsayılan : GF9001</span>
                        </div>


                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_title">
                                <h2><i class="fa fa-cc-visa font-red-sunglo"></i> Happy Hour Etkinlik Ayarları <small>
                                    </small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Happy Hour Etkinlik Durumu
                                    <span
                                            class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control col-md-7 col-xs-12" name="shop_happyhourstatus">
                                        <option <?= settings('shop_happyhourstatus') == 0 ? 'selected' : null; ?>
                                                value="0">
                                            Pasif
                                        </option>
                                        <option <?= settings('shop_happyhourstatus') == 1 ? 'selected' : null; ?>
                                                value="1">
                                            Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Happy Hour Etkinlik Kazanç
                                    Miktarı
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text"
                                           value="<?= settings('shop_happyhour') ? settings('shop_happyhour') : 0; ?>"
                                           name="shop_happyhour" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span
                                        class="required"></span></label>
                            <span class="help-block col-md-9 col-sm-9 col-xs-12"> Örnek : 20 yaptığınızda tüm ep satın alımlarında oyuncuların hesabına otomatik +%20 <br> daha fazla ep yüklenir. Tüm ödeme sistemleri için geçerlidir.</span>

                        </div>


                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_title">
                                <h2><i class="fa fa-cc-visa font-red-sunglo"></i> Aktif Pazar  Ayarları </h2>
                                <div class="clearfix"></div>
                            </div>
                            <br>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Player Offline Shop NPC  Tablosu <span
                                            class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?= settings('offline_shop_npc') ? settings('offline_shop_npc') : 'offline_shop_npc'; ?>"
                                           name="offline_shop_npc" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span
                                        class="required"></span></label><span
                                    class="help-block col-md-9 col-sm-9 col-xs-12"> Lütfen player tablosundaki geçerli pazar tablosu adını giriniz. Default : offline_shop_npc</span>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Player Offline Shop Items Tablosu <span
                                            class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text"
                                           value="<?= settings('offline_shop_item') ? settings('offline_shop_item') : 'offline_shop_item'; ?>"
                                           name="offline_shop_item" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"><span
                                        class="required"></span></label><span
                                    class="help-block col-md-9 col-sm-9 col-xs-12"> Lütfen player tablosundaki geçerli pazar item tablosu adını giriniz. Default : offline_shop_item</span>
                        </div>
                        <div class="form-group">
                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button <?= (!permission('settings', 'edit')) ? 'disabled' : null; ?> value="1"
                                                                                                      type="submit"
                                                                                                      name="shopedit"
                                                                                                      class="btn btn-success">
                                    Güncelle
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- /page content -->


<?php require admin_view('/static/footer');

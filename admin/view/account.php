<?php require admin_view('/static/header');


$say = 0;

$info = account(get('id'));
$bilgi = new Info();
$hesap = $info['account'];
$oyuncu = $info['player'];
$safebox = $info['depo'];
$mallBox = $info['nesne'];
$marketLog = $info['market'];
$loginlog = $info['loginLog'];
$gameLog = $info['gameLog'];
$panelLog = $info['panelLog'];
$oldPass = $info['oldPass'];
$empireData = array(
    '1' => 'Kırmızı',
    '2' => 'Sarı',
    '3' => 'Mavi'
);
function playerStat($date)
{
    $now = date('Y-m-d H:i:s', strtotime('-30 minutes'));
    if ($now > $date) {
        return 'off';
    } elseif ($now <= $date) {
        return 'on';
    }
}

function convertLog($type)
{
    if ($type == 2)
        $data = "Şifre Değişikliği";
    elseif ($type == 3)
        $data = "Mail Değişikliği (0)";
    elseif ($type == 4)
        $data = "Mail Gönderildi";
    elseif ($type == 5)
        $data = "Mail Değişikliği (1)";
    elseif ($type == 6)
        $data = "Mail Gönderildi";
    elseif ($type == 7)
        $data = "Depo Şifresi Değişikliği";
    elseif ($type == 8)
        $data = "Mail Gönderildi";
    elseif ($type == 9)
        $data = "KSK Değişikliği";
    elseif ($type == 14)
        $data = "Mail Gönderildi";
    elseif ($type == 15)
        $data = "Mail Aktivasyonu Gerçekleşti";
    elseif ($type == 16)
        $data = "Bugdan Kurtarıldı";

    return $data;
}

function banType($value)
{
    if ($value == 0 || $value == 2)
        $data = "Süresiz Ban";
    elseif ($value == 1)
        $data = "Süreli Ban";
    elseif ($value == 3)
        $data = "Mac Ban";
    return $data;
}


$availDt = strtotime($hesap['availDt']);
$now = time();
$fark = $availDt - $now;

$functions = new Functions();

if (post('account_guncelle')) {
    $guncel = change();
}

$karaktersayisi = count($oyuncu);

?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="" tab>
            <div class="clearfix"></div>

            <div class="admin-tab">

                <div class="x_title">
                    <h2><i style="font-size: 25px !important; color: #3598DC" class="fa fa-user "></i>
                        <span style="font-weight: bold;font-size: 25px !important; color: #3598DC;padding: 20px;"
                              class="caption-subject t bold uppercase">Hesap İşlemleri</span> <small>

                        </small>

                    </h2>

                    <div class="clearfix"></div>
                </div>
                <ul tab-list>
                    <?php $_SESSION['changeAccount'] = isset($_SESSION['changeAccount']) ? $_SESSION['changeAccount'] : null; ?>
                    <li>
                        <a href="#">Genel </a>
                    </li>

                    <li>
                        <a href="#"> Oyun Giriş Kayıtları </a>
                    </li>
                    <li>
                        <a href="#"> Panel Hareket Kayıtları </a>
                    </li>
                    <li>
                        <a href="#"> Panel Giriş Kayıtları </a>
                    </li>
                    <li>
                        <a href="#"> Karakterler </a>
                    </li>

                    <li class="<?php if ($_SESSION['changeAccount'] == 'delete') {
                        echo 'active';
                    } ?>">
                        <a href="#"> Depo </a>
                    </li>
                    <li class="<?php if ($_SESSION['changeAccount'] == 'delete1') {
                        echo 'active';
                    } ?>">
                        <a href="#"> Nesne Deposu </a>
                    </li>
                    <li>
                        <a href="#"> Market Log </a>
                    </li>
                </ul>
            </div>

            <div class="tab-container">
                <div tab-content class="row" style="width: 90%">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <br/>
                            <div class="tab-pane active" id="tab_general">

                                <?php if (isset($guncel['result']) && $guncel['result'] == ''): ?>
                                    <div class=" alert alert-danger">
                                        <?= 'Güncelleme Başarısız.' ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($guncel['result']) && $guncel['result'] == true): ?>
                                    <div class=" alert alert-success" role="alert">
                                        <?= 'Güncelleme Başarılı !';
                                        if ($guncel['result'] == true): ?>
                                            <script>
                                                setTimeout(function () {
                                                    window.location.assign("<?= admin_url('account?id=' . get('id')) ?>");
                                                    //3 saniye sonra yönlenecek
                                                }, 1500);
                                            </script>
                                        <?php endif; ?>

                                    </div>
                                <?php endif; ?>


                                <h2 style="background-color: #E0EBF9;font-size: 20px;color: black;" class="alert">
                                    Kullanıcı Adı (idsi) : <?= $hesap['login'] ?> (<?= $hesap['id'] ?>)
                                    <?php if ($hesap['status'] == 'BLOCK' || $availDt > $now): ?>
                                        (Hesap Banlı)
                                    <?php endif; ?>
                                </h2><br>
                                <div style="background-color: #E0EBF9 !important;  " class="alert alert-info">
                                    <a href="<?= admin_url('account-addep?id=' . $hesap['id']) ?>"
                                       class="btn btn-danger"><i class="fa fa-plus"></i> Ep Ver</a>
                                    <?php if ($hesap['status'] == 'BLOCK' || $availDt > $now): ?>
                                        <a href="<?= admin_url('account-openban?id=' . $hesap['id']) ?>"
                                           class="btn btn-danger"><i class="fa fa-unlock"></i> Banı Kaldır</a>
                                    <?php else: ?>
                                        <a href="<?= admin_url('account-ban?id=' . $hesap['id']) ?>"
                                           class="btn btn-dark"><i class="fa fa-lock"></i> Banla</a>
                                    <?php endif; ?>
                                    <a href="<?= admin_url('allaccountlist?id=' . $hesap['id']) ?>"
                                       class="btn btn-primary"><i class="fa fa-lock"></i> Tüm Hesaplarını Görüntüle</a>
                                </div>
                                <?php if ($hesap['status'] == 'BLOCK' || $availDt > $now): ?>
                                    <div class="alert alert-info">
                                        <?php $getBanList = $db->prepare("SELECT * FROM ban_list WHERE account_id = :account_id");
                                        $getBanList->execute(array(':account_id' => $hesap['id']));
                                        $getBanLists = $getBanList->fetch(PDO::FETCH_ASSOC);

                                        ?>
                                        <h5><b>Banlanma Nedeni : <?= $getBanLists['why']; ?></b></h5>
                                        <h5><b>Ban Kanıtı : <?= $getBanLists['evidence']; ?></b></h5>
                                        <h5><b>Banlanma Tarihi : <?= $functions->zaman($getBanLists['date']); ?></b>
                                        </h5>
                                        <h5><b>Ban Tipi : <?= banType($getBanLists['type']); ?></b></h5>
                                    </div>
                                <?php endif; ?>
                                <h5><b>Hesap Oluşturma Tarihi : </b><?= $hesap['create_time']; ?>
                                    (<?= timeConvert($hesap['create_time']) ?>)</h5>
                                <h5><b>Karakter Sayısı : </b><?= count($oyuncu); ?></h5>
                                <h5><b>Bayrak :</b> <?php if (isset($oyuncu[0])) {
                                        echo '<img src="' . URL . 'data/flags/' . $oyuncu[0]['empire'] . '.jpg" alt="">';
                                    } else {
                                        echo 'Karakter Kaydı Yok';
                                    } ?></h5>
                                <h5><b>Toplam Yang : </b><?php if (count($oyuncu) == 0) {
                                        echo "Henüz karakteri bulunmuyor";
                                    } else {
                                        echo totalYang($hesap['id']);
                                    } ?></h5>
                                <h5><b>İp Adresi : </b><?= $hesap['ip']; ?></h5>
                                <h5><b>Son Giriş Tarihi :</b> <?php if (count($oyuncu) == 0) {
                                        echo "Henüz karakteri bulunmuyor";
                                    } else {
                                        echo $oyuncu[0]['last_play'];
                                    } ?></h5>
                                <h5><b>EP Miktarı :</b> <?= $hesap['cash'] ?> EP</h5>
                                <h5><b>EM Miktarı :</b> <?= $hesap['mileage'] ?> EM</h5>
                                <?php if ($oldPass != null): ?>
                                    <a href="<?= admin_url('restore-oldpassword?id=' . $hesap['id']) ?>"
                                       class="btn btn-danger">Şifreyi Geri Yükle</a>
                                <?php endif; ?>
                                <br>
                                <form id="accountForm" role="form" method="POST" action="">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>Adı Soyadı</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                <input type="text" id="real_name" class="form-control" name="real_name"
                                                       value="<?= $hesap['real_name']; ?>">
                                                <input type="hidden" name="account_id"
                                                       value="<?= $functions->turkce_karakter($hesap['id']); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Kullanıcı Adı</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                <input type="text" id="login" class="form-control" name="login"
                                                       value="<?= $functions->turkce_karakter($hesap['login']); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Yeni Şifre</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-lock"></i>
                                                        </span>
                                                <input type="text" id="password" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Mail Adresi</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </span>
                                                <input type="text" id="email" class="form-control" name="email"
                                                       value="<?= $hesap['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Telefon Numarası</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-lock"></i>
                                                        </span>
                                                <input type="text" id="phone1" class="form-control" name="phone1"
                                                       value="<?= $hesap['phone1']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Karakter Silme Şifresi</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-lock"></i>
                                                        </span>
                                                <input type="text" id="ksk" maxlength="13" class="form-control"
                                                       name="ksk" value="<?= $hesap['social_id']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Depo Şifresi</label>
                                            <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-lock"></i>
                                                        </span>
                                                <input <?php if ($karaktersayisi == 0) {
                                                    echo 'disabled';
                                                } ?> type="text" id="depo" class="form-control" maxlength="6"
                                                     name="depo" placeholder="<?php if ($karaktersayisi == 0) {
                                                    echo 'Karakter Yok !';
                                                } ?>" value="<?php if ($karaktersayisi == 0) {
                                                    echo '';
                                                } elseif ($oyuncu[0]['depo'] == null) {
                                                    echo '000000';
                                                } else {
                                                    echo $oyuncu[0]['depo'];
                                                }; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Bayrak</label>
                                            <select <?php if ($karaktersayisi == 0) {
                                                echo 'disabled';
                                            } ?> class="form-control" name="empire" id="empire">
                                                <option value=""> Bayrak Seçiniz..</option>
                                                <?php foreach ($empireData as $key => $row): ?>
                                                    <option value="<?= $key ?>" <?php if ($key == $oyuncu[0]['empire']) {
                                                        echo 'selected';
                                                    } ?>><?= $row ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="hidden" name="player_id" value="<?= ($oyuncu[0]['id']); ?>">

                                        </div>
                                    </div>
                                    <br>
                                    <div align="right">
                                        <input type="hidden" name="id" value="<?= get('id') ?>">
                                        <button value="1" type="submit" name="account_guncelle" class="btn btn-success">
                                            Güncelle
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Oyun Giriş Kayıtları <small>
                                        </small></h2>
                                    <div align="right">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php if (count($gameLog) == 0): ?>
                                        <h2>Oyuna Giriş Kaydı Yok.</h2>
                                    <?php else: ?>


                                    <table id="datatable-responsive"
                                           class="table table-striped table-bordered dt-responsive nowrap"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th> Oyuncu ID</th>
                                            <th> Tür</th>
                                            <th>Giriş Zamanı</th>
                                            <th>Oyun Süresi</th>
                                            <th>Çıkış Zamanı</th>
                                            <th>Kanal</th>
                                            <th>IP</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($gameLog as $log) : ?>
                                            <tr>
                                                <td><?= $log['pid'] ?></td>
                                                <td><?= $log['type'] ?></td>
                                                <td><?= $log['login_time'] ?></td>
                                                <td><?= $log['playtime'] ?></td>
                                                <td><?= $log['logout_time'] ?></td>
                                                <td><?= $log['channel'] ?></td>
                                                <td><?= $log['ip'] ?></td>
                                            </tr>

                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Panel Hareket Kayıtları <small>
                                        </small></h2>
                                    <div align="right">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php if (count($panelLog) == 0): ?>
                                        <h2>Panel Hareket Kaydı Yok.</h2>
                                    <?php else: ?>
                                    <table id="datatable-responsive"
                                           class="table table-striped table-bordered dt-responsive nowrap"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th> #</th>
                                            <th>İşlem</th>
                                            <th> Tür</th>
                                            <th> Tarih</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($panelLog as $log) :$say++; ?>
                                            <tr>
                                                <td><?= $say ?></td>
                                                <td><?= convertLog($log['type']) ?></td>
                                                <td><?= $log['content'] ?></td>
                                                <td><?= timeConvert($log['date']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Panel Giriş Kayıtları <small>

                                        </small></h2>
                                    <div align="right">

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php if (count($loginlog) == 0): ?>
                                        <h2>Panel Giriş Kaydı Yok.</h2>
                                    <?php else: ?>
                                    <table id="datatable-responsive"
                                           class="table table-striped table-bordered dt-responsive nowrap"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th> #</th>
                                            <th>İşlem</th>
                                            <th> Ip</th>
                                            <th> Tarih</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($loginlog as $log): $say++ ?>
                                            <tr>
                                                <td><?= $say ?></td>
                                                <td><?= logConvert($log['type']); ?></td>
                                                <td><?= $log['ip'] ?></td>
                                                <td><?= timeConvert($log['date']) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> Karakterler <small>

                                        </small></h2>
                                    <div align="right">

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php if (count($oyuncu) == 0): ?>
                                        <h2>Karakter Kaydı Yok.</h2>
                                    <?php else: ?>
                                    <table id="datatable-responsive"
                                           class="table table-striped table-bordered dt-responsive nowrap"
                                           cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Adı</th>
                                            <th>Level</th>
                                            <th>Sınıf</th>
                                            <th>Ip Adresi</th>
                                            <th>Durum</th>
                                            <th>İşlem</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($oyuncu as $row): $say++; ?>
                                            <tr>
                                                <td><?= $say ?></td>
                                                <td><?= $row['name'] ?></td>
                                                <td><?= $row['level'] ?></td>
                                                <td><img src="<?= URL . '/data/chrs/small/' . $row['job'] . '.png' ?>"
                                                         alt=""></td>
                                                <td><?= $row['ip'] ?></td>
                                                <td>
                                                    <img src="<?= URL . '/data/chrs/small/' . playerStat($row['last_play']) . '.png' ?>"
                                                         alt=""></td>
                                                <td>
                                                    <div class="margin-bottom-5 text-center">
                                                        <a href="<?= admin_url('player?id=' . $row['id']) ?>"
                                                           class="btn btn-primary text-center">
                                                            <i class="fa fa-edit"></i>
                                                            incele
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row <?php if ($_SESSION['changeAccount'] == 'delete') {echo 'active';session_set('changeAccount', 'NO');} ?>">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> Depo <small>
                                        </small></h2>
                                    <div align="right">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                    <?php if (count($safebox) == 0): ?>
                                        <h2>Depo Boş.</h2>
                                    <?php else: ?>
                                        <?php foreach ($safebox as $key => $row): ?>


                                            <div href="javascript:;" class="icon-btn"
                                                 style="width: 220px; height: 165px;">

                                                <span style="position: absolute; right: -6px;top: -9px"
                                                      class="badge badge-danger"> <?= $row['count']; ?> </span>
                                                <center>
                                                    <img src="<?= URL . '/data/items/' . $functions->itemToPng($row['vnum']) ?>"
                                                         onerror="this.src='<?= URL . '/data/items/60001.png' ?>'"
                                                         alt="" style="margin-bottom :<?php if ($row['size'] == '1') {
                                                        echo '64px;';
                                                    } elseif ($row['size'] == '2') {
                                                        echo '32px;';
                                                    } ?>">
                                                    <p> <?= $functions->turkce_karakter($row['name']); ?> </p>
                                                    <a class="btn btn-primary" data-toggle="modal"
                                                       href="#<?= $row['id'] ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="<?= admin_url('delete?player=1&table=item&column=id&id=' . $row['id']) ?>"
                                                       class="btn btn-dark">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </center>

                                            </div>


                                            <div class="modal fade" id="<?= $row['id']; ?>" style="display: none;">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content c-square">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title bold uppercase font-green-soft"><?= $functions->turkce_karakter($row['name']) ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="tabbable-line">
                                                                <div class="tab-content">
                                                                    <div class="border-default margin-bottom-10"
                                                                         style="padding: 10px; border: 2px solid #fff;">
                                                                        <p><?= $functions->gameIn('efsunlar')[$row['attrtype0']] ?> <?= $row['attrvalue0'] ?></p>
                                                                        <p><?= $functions->gameIn('efsunlar')[$row['attrtype1']] ?> <?= $row['attrvalue1'] ?></p>
                                                                        <p><?= $functions->gameIn('efsunlar')[$row['attrtype2']] ?> <?= $row['attrvalue2'] ?></p>
                                                                        <p><?= $functions->gameIn('efsunlar')[$row['attrtype3']] ?> <?= $row['attrvalue3'] ?></p>
                                                                        <p><?= $functions->gameIn('efsunlar')[$row['attrtype4']] ?> <?= $row['attrvalue4'] ?></p>
                                                                        <p><?= $functions->gameIn('efsunlar')[$row['attrtype5']] ?> <?= $row['attrvalue5'] ?></p>
                                                                        <p><?= $functions->gameIn('efsunlar')[$row['attrtype6']] ?> <?= $row['attrvalue6'] ?></p>
                                                                        <p style="color: red"><?php if (@array_search($functions->gameIn('taslar')[$row['socket0']], $functions->gameIn('taslar')) == false) {
                                                                                echo 'Taş Yok';
                                                                            } else {
                                                                                echo $functions->gameIn('taslar')[$row['socket0']];
                                                                            } ?></p>
                                                                        <p style="color: red"><?php if (@array_search($functions->gameIn('taslar')[$row['socket1']], $functions->gameIn('taslar')) == false) {
                                                                                echo 'Taş Yok';
                                                                            } else {
                                                                                echo $functions->gameIn('taslar')[$row['socket1']];
                                                                            } ?></p>
                                                                        <p style="color: red"><?php if (@array_search($functions->gameIn('taslar')[$row['socket2']], $functions->gameIn('taslar')) == false) {
                                                                                echo 'Taş Yok';
                                                                            } else {
                                                                                echo $functions->gameIn('taslar')[$row['socket2']];
                                                                            } ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                    class="btn btn-danger  sbold uppercase"
                                                                    data-dismiss="modal">Kapat
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row <?php if ($_SESSION['changeAccount'] == 'delete1') {echo 'active';session_set('changeAccount', 'NO');} ?>">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> Nesne Deposu <small>
                                        </small></h2>
                                    <div align="right">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                    <?php if (count($mallBox) == 0): ?>
                                        <h2>Nesne Market Deposu Boş.</h2>
                                    <?php else: ?>
                                        <?php foreach ($mallBox as $key => $rowMall): ?>
                                            <div href="javascript:;" class="icon-btn"
                                                 style="width: 220px; height: 165px;">

                                                <span style="position: absolute; right: -6px;top: -9px"
                                                      class="badge badge-danger"> <?= $rowMall['count']; ?> </span>
                                                <center>
                                                    <?php
                                                    
                                                    $query = $db->prepare('SELECT * FROM items WHERE vnum=:vnum');
                                                    $query->execute([
                                                        'vnum' => $rowMall['vnum']
                                                        ]);
                                                        $itemcek = $query->fetch(PDO::FETCH_ASSOC);
                                                    ?>
                                                    <br>
                                                    <img width="80px" src="<?=  URL . '/' .  $itemcek['item_image'] ?>"
                                                         
                                                         alt=""
                                                         style="margin-bottom :<?php if ($rowMall['size'] == '1') {
                                                             echo '64px;';
                                                         } elseif ($rowMall['size'] == '2') {
                                                             echo '32px;';
                                                         } ?>">
                                                    <p> <?= $functions->turkce_karakter($itemcek['item_name']); ?> </p>
                                                    <a class="btn btn-primary" data-toggle="modal"
                                                       href="#<?= $rowMall['id'] ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="<?= admin_url('delete?player=1&table=item&column=id&id=' . $rowMall['id']) ?>"
                                                       class="btn btn-dark">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </center>

                                            </div>
                                            <div class="modal fade" id="<?= $rowMall['id']; ?>" style="display: none;">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content c-square">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title bold uppercase font-green-soft"><?= $functions->turkce_karakter($rowMall['name']) ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="tabbable-line">
                                                                <div class="tab-content">
                                                                    <div class="border-default margin-bottom-10"
                                                                         style="padding: 10px; border: 2px solid #fff;">
                                                                        <p><?= $functions->gameIn('efsunlar')[$rowMall['attrtype0']] ?> <?= $rowMall['attrvalue0'] ?></p>
                                                                        <p><?= $functions->gameIn('efsunlar')[$rowMall['attrtype1']] ?> <?= $rowMall['attrvalue1'] ?></p>
                                                                        <p><?= $functions->gameIn('efsunlar')[$rowMall['attrtype2']] ?> <?= $rowMall['attrvalue2'] ?></p>
                                                                        <p><?= $functions->gameIn('efsunlar')[$rowMall['attrtype3']] ?> <?= $rowMall['attrvalue3'] ?></p>
                                                                        <p><?= $functions->gameIn('efsunlar')[$rowMall['attrtype4']] ?> <?= $rowMall['attrvalue4'] ?></p>
                                                                        <p><?= $functions->gameIn('efsunlar')[$rowMall['attrtype5']] ?> <?= $rowMall['attrvalue5'] ?></p>
                                                                        <p><?= $functions->gameIn('efsunlar')[$rowMall['attrtype6']] ?> <?= $rowMall['attrvalue6'] ?></p>
                                                                        <p style="color: red"><?php if (@array_search($functions->gameIn('taslar')[$rowMall['socket0']], $functions->gameIn('taslar')) == false) {
                                                                                echo 'Taş Yok';
                                                                            } else {
                                                                                echo $functions->gameIn('taslar')[$rowMall['socket0']];
                                                                            } ?></p>
                                                                        <p style="color: red"><?php if (@array_search($functions->gameIn('taslar')[$rowMall['socket1']], $functions->gameIn('taslar')) == false) {
                                                                                echo 'Taş Yok';
                                                                            } else {
                                                                                echo $functions->gameIn('taslar')[$rowMall['socket1']];
                                                                            } ?></p>
                                                                        <p style="color: red"><?php if (@array_search($functions->gameIn('taslar')[$rowMall['socket2']], $functions->gameIn('taslar')) == false) {
                                                                                echo 'Taş Yok';
                                                                            } else {
                                                                                echo $functions->gameIn('taslar')[$rowMall['socket2']];
                                                                            } ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                    class="btn btn-outline dark sbold uppercase"
                                                                    data-dismiss="modal">Kapat
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> Market Log <small>
                                        </small></h2>
                                    <div align="right">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php if (count($marketLog) == 0): ?>
                                        <h2>Nesne Market Log'u Bulunamadı.</h2>
                                    <?php else: ?>
                                        <table id="datatable-responsive"
                                               class="table table-striped table-bordered dt-responsive nowrap"
                                               cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Vnum</th>
                                                <th>Eşya Adı</th>
                                                <th>Tutarı</th>
                                                <th>Adet</th>
                                                <th>Tür</th>
                                                <th>Tarih</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($marketLog as $row): ?>
                                                <tr>
                                                    <td><?= $row['id'] ?></td>
                                                    <td><?= $row['vnum'] ?></td>
                                                    <td><?= $row['item_name'] ?></td>
                                                    <td><?= $row['coins'] ?> EP</td>
                                                    <td><?= $row['adet'] ?></td>
                                                    <td><?= $row['tur'] ?></td>
                                                    <td><?= $row['tarih'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- /page content -->


<?php require admin_view('/static/footer');


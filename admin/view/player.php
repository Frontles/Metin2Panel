<?php require admin_view('/static/header');




$say = 0;
$info = playerinfo(get('id'));
$karakter = $info['player'];
$equipment = $info['equipment'];
$inventory = $info['inventory'];

function derece($alignment){

    if($alignment > 11999){return "Kahraman"; }
    elseif($alignment > 7999){return "Soylu"; }
    elseif($alignment > 3999){return "İyi"; }
    elseif($alignment > 1999){return "Arkadaşça"; }
    elseif($alignment > -3999){return "Tarafsız"; }
    elseif($alignment > -7999){return "Agresif"; }
    elseif($alignment > -11999){return "Hileli"; }
    elseif($alignment < -20000){return "Kötü Niyetli"; }
    elseif($alignment >= -20000){return "Zalim"; }
}
function riding($value){
    if ($value == 0){
        return 'Pasif';
    }else{
        return 'Aktif';
    }
}

$functions = new Functions();
?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class=""tab>
            <div class="clearfix"></div>

            <div class="admin-tab">

                <div  class="x_title">
                    <h2><i style="font-size: 25px !important; color: #3598DC" class="fa fa-user "></i>
                        <span style="font-weight: bold;font-size: 25px !important; color: #3598DC;padding: 20px;" class="caption-subject t bold uppercase">Hesap İşlemleri</span> <small>

                        </small>

                    </h2>

                    <div class="clearfix"></div>
                </div>
                <ul tab-list>
                    <?php $_SESSION['changeAccount'] = isset($_SESSION['changeAccount']) ? $_SESSION['changeAccount'] : null;?>
                    <li>
                        <a href="#">Genel </a>
                    </li>

                    <li>
                        <a href="#"> Ekipmanları </a>
                    </li>
                    <li>
                        <a href="#"> Envanteri </a>
                    </li>

                </ul>
            </div>

            <div class="tab-container" >
                <div tab-content class="row" style="width: 90%">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <br />
                            <div class="tab-pane active" id="tab_general">

                                <?php
                                if ( isset($guncel['result']) && $guncel['result'] == ''): ?>
                                    <div  class=" alert alert-danger" >
                                        <?= 'Güncelleme Başarısız.'?>
                                    </div>
                                <?php endif; ?>
                                <?php  if (isset($guncel['result']) && $guncel['result'] ==true ):  ?>
                                    <div class=" alert alert-success" role="alert">
                                        <?= 'Güncelleme Başarılı !';
                                        if ($guncel['result']== true):  ?>
                                            <script>
                                                setTimeout(function(){
                                                    window.location.assign("<?= admin_url('account?id='. get('id')) ?>");
                                                    //3 saniye sonra yönlenecek
                                                },1500);
                                            </script>
                                        <?php endif;?>

                                    </div>
                                <?php endif; ?>


                                <h2 style="background-color: #E0EBF9;font-size: 20px;color: black;" class="alert"> Kullanıcı Adı (idsi)  : <?= $karakter['name'] ?> (<?= $karakter['id'] ?>)</h2><br>
                                <div style="background-color: #E0EBF9 !important;  " class="alert alert-info">
                                    <a href="<?=admin_url('account-ban?id='.$karakter['account_id'])?>" class="btn btn-dark"><i class="fa fa-lock"></i> Banla</a>
                                    <a href="<?=admin_url('allaccountlist?id='.$karakter['account_id'])?>" class="btn btn-primary"><i class="fa fa-lock"></i> Tüm Hesaplarını Görüntüle</a>
                                </div>
                                <h5><b>Karakter Adı : </b><?= $karakter['name'] ?></h5>
                                <h5><b>Sınıfı : </b><?= Functions::jobName($karakter['job']) ?></h5>
                                <h5><b>Son Görüldüğü Harita : </b><?= Functions::map($karakter['map_index']) ?></h5>
                                <h5><b>Son Görüldüğü Koordinatlar : </b><?= $karakter['x'] ?> / <?= $karakter['y'] ?></h5>
                                <h5><b>Seviyesi : </b><?= $karakter['level'] ?> Level</h5>
                                <h5><b>Derecesi : </b><?= derece($karakter['alignment']); ?></h5>
                                <h5><b>Exp Miktarı : </b><?= $karakter['exp'] ?> EXP</h5>
                                <h5><b>Yang Miktarı : </b><?= $karakter['gold'] ?> Yang</h5>
                                <h5><b>HP Miktarı : </b><?= $karakter['hp'] ?> HP</h5>
                                <h5><b>SP Miktarı : </b><?= $karakter['mp'] ?> SP</h5>
                                <h5><b>STR : </b><?= $karakter['st'] ?></h5>
                                <h5><b>VIT : </b><?= $karakter['ht'] ?></h5>
                                <h5><b>DEX : </b><?= $karakter['dx'] ?></h5>
                                <h5><b>INT : </b><?= $karakter['iq'] ?></h5>
                                <h5><b>INT : </b><?= $karakter['iq'] ?></h5>
                                <h5><b>Statü Puanı : </b><?= $karakter['stat_point'] ?></h5>
                                <h5><b>Beceri Puanı : </b><?= $karakter['skill_point'] ?></h5>
                                <h5><b>İp Adresi : </b><?= $karakter['ip'] ?></h5>
                                <h5><b>Son Oynama Tarihi : </b><?= timeConvert($karakter['last_play']) ?></h5>
                                <h5><b>At Leveli : </b><?= $karakter['horse_level'] ?></h5>
                                <h5><b>At Üstünde : </b><?= riding($karakter['horse_riding']) ?></h5>
                            </div>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row ">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> Ekipmanlar <small>
                                        </small></h2>
                                    <div align="right">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                    <?php if(count($equipment) == 0): ?>
                                        <h2>Ekipman Yok.</h2>
                                    <?php else:?>
                                        <?php foreach ($equipment as $key=>$row):?>



                                            <div href="javascript:;"   class="icon-btn" style="width: 200px; height: 200px;" >

                                                <span style="position: absolute; right: -6px;top: -9px" class="badge badge-danger"> <?=$row['count'];?> </span>
                                                <center>
                                                    <img  src="<?=URL.'/data/items/'.$functions->itemToPng($row['vnum'])?>" onerror="this.src='<?=URL.'/data/items/60001.png'?>'" alt="" style="margin-bottom :<?php if ($row['size']== '1'){echo '64px;';}elseif($row['size'] == '2'){echo '32px;';}?>">
                                                    <p> <?=$functions->turkce_karakter($row['name']);?> </p>
                                                    <a class="btn btn-primary" data-toggle="modal" href="#<?=$row['id']?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="<?=admin_url('delete?player=1&table=item&column=id&id=' . $row['id'])?>"  class="btn btn-dark">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </center>

                                            </div>





                                            <div class="modal fade" id="<?=$row['id'];?>" style="display: none;">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content c-square">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title bold uppercase font-green-soft"><?=$functions->turkce_karakter($row['name'])?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="tabbable-line">
                                                                <div class="tab-content">
                                                                    <div class="border-default margin-bottom-10" style="padding: 10px; border: 2px solid #fff;">
                                                                        <p><?=$functions->gameIn('efsunlar')[$row['attrtype0']]?> <?=$row['attrvalue0']?></p>
                                                                        <p><?=$functions->gameIn('efsunlar')[$row['attrtype1']]?> <?=$row['attrvalue1']?></p>
                                                                        <p><?=$functions->gameIn('efsunlar')[$row['attrtype2']]?> <?=$row['attrvalue2']?></p>
                                                                        <p><?=$functions->gameIn('efsunlar')[$row['attrtype3']]?> <?=$row['attrvalue3']?></p>
                                                                        <p><?=$functions->gameIn('efsunlar')[$row['attrtype4']]?> <?=$row['attrvalue4']?></p>
                                                                        <p><?=$functions->gameIn('efsunlar')[$row['attrtype5']]?> <?=$row['attrvalue5']?></p>
                                                                        <p><?=$functions->gameIn('efsunlar')[$row['attrtype6']]?> <?=$row['attrvalue6']?></p>
                                                                        <p style="color: red"><?php if(@array_search($functions->gameIn('taslar')[$row['socket0']],$functions->gameIn('taslar')) == false){echo 'Taş Yok';}else{echo $functions->gameIn('taslar')[$row['socket0']];}?></p>
                                                                        <p style="color: red"><?php if(@array_search($functions->gameIn('taslar')[$row['socket1']],$functions->gameIn('taslar')) == false){echo 'Taş Yok';}else{echo $functions->gameIn('taslar')[$row['socket1']];}?></p>
                                                                        <p style="color: red"><?php if(@array_search($functions->gameIn('taslar')[$row['socket2']],$functions->gameIn('taslar')) == false){echo 'Taş Yok';}else{echo $functions->gameIn('taslar')[$row['socket2']];}?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger  sbold uppercase" data-dismiss="modal">Kapat</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach;?>
                                    <?php endif;?>

                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
                <div tab-content class="row ">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2> Envanter <small>
                                        </small></h2>
                                    <div align="right">
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">


                                    <?php if(count($inventory) == 0): ?>
                                        <h2>Envanter Boş.</h2>
                                    <?php else:?>
                                        <?php foreach ($inventory as $key=>$row):?>



                                            <div href="javascript:;"   class="icon-btn" style="width: 200px; height: 200px;" >

                                                <span style="position: absolute; right: -6px;top: -9px" class="badge badge-danger"> <?=$row['count'];?> </span>
                                                <center>
                                                    <img  src="<?=URL.'/data/items/'.$functions->itemToPng($row['vnum'])?>" onerror="this.src='<?=URL.'/data/items/60001.png'?>'" alt="" style="margin-bottom :<?php if ($row['size']== '1'){echo '64px;';}elseif($row['size'] == '2'){echo '32px;';}?>">
                                                    <p> <?=$functions->turkce_karakter($row['name']);?> </p>
                                                    <a class="btn btn-primary" data-toggle="modal" href="#<?=$row['id']?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="<?=admin_url('delete?player=1&table=item&column=id&id=' . $row['id'])?>"  class="btn btn-dark">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </center>

                                            </div>





                                            <div class="modal fade" id="<?=$row['id'];?>" style="display: none;">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content c-square">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                            <h4 class="modal-title bold uppercase font-green-soft"><?=$functions->turkce_karakter($row['name'])?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="tabbable-line">
                                                                <div class="tab-content">
                                                                    <div class="border-default margin-bottom-10" style="padding: 10px; border: 2px solid #fff;">
                                                                        <p><?=$functions->gameIn('efsunlar')[$row['attrtype0']]?> <?=$row['attrvalue0']?></p>
                                                                        <p><?=$functions->gameIn('efsunlar')[$row['attrtype1']]?> <?=$row['attrvalue1']?></p>
                                                                        <p><?=$functions->gameIn('efsunlar')[$row['attrtype2']]?> <?=$row['attrvalue2']?></p>
                                                                        <p><?=$functions->gameIn('efsunlar')[$row['attrtype3']]?> <?=$row['attrvalue3']?></p>
                                                                        <p><?=$functions->gameIn('efsunlar')[$row['attrtype4']]?> <?=$row['attrvalue4']?></p>
                                                                        <p><?=$functions->gameIn('efsunlar')[$row['attrtype5']]?> <?=$row['attrvalue5']?></p>
                                                                        <p><?=$functions->gameIn('efsunlar')[$row['attrtype6']]?> <?=$row['attrvalue6']?></p>
                                                                        <p style="color: red"><?php if(@array_search($functions->gameIn('taslar')[$row['socket0']],$functions->gameIn('taslar')) == false){echo 'Taş Yok';}else{echo $functions->gameIn('taslar')[$row['socket0']];}?></p>
                                                                        <p style="color: red"><?php if(@array_search($functions->gameIn('taslar')[$row['socket1']],$functions->gameIn('taslar')) == false){echo 'Taş Yok';}else{echo $functions->gameIn('taslar')[$row['socket1']];}?></p>
                                                                        <p style="color: red"><?php if(@array_search($functions->gameIn('taslar')[$row['socket2']],$functions->gameIn('taslar')) == false){echo 'Taş Yok';}else{echo $functions->gameIn('taslar')[$row['socket2']];}?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger  sbold uppercase" data-dismiss="modal">Kapat</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach;?>
                                    <?php endif;?>

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

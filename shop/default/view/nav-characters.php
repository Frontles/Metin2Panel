<?php
$characters = nav_characters()['characters'];
$server = settings('settings_gamename');
$depo = nav_characters()['depo'];
function jobName($value){
    if($value == 0 || $value == 4){
        return 'Savaşçı';
    }elseif ($value == 1 || $value == 5){
        return 'Ninja';
    }elseif ($value == 2 || $value == 6){
        return 'Sura';
    }elseif ($value == 3 || $value == 7){
        return 'Şaman';
    }
}
require shop_view('static/header');
?>
<div class="content clearfix" id="wt_refpoint">
        <div id="account" class="mCSB_container row-fluid">
            <ul id="accountNav" class="span3">
                <li>
                    <a href="<?=shop_url('nav-characters')?>"
                       class="btn-sideitem btn-sideitem-active"><i class="icon-users"></i><span>Karakterlerim</span></a>
                </li>
                <li>
                    <a href="<?=shop_url('nav-log')?>"
                       class="btn-sideitem "><i class="icon-basket"></i><span>Satın aldıklarım</span></a>
                </li>
                <li>
                    <a href="<?=shop_url('nav-depo')?>"
                       class="btn-sideitem "><i class="icon-stack">
                            <div class="badge"><?=$depo?></div>
                        </i><span>Eşya Depom</span></a>
                </li>
                <li>
                    <a href="<?=shop_url('nav-coupon')?>"
                       class="btn-sideitem "><i class="icon-barcode"></i><span>Kodu kullan</span></a>
                </li>
            </ul>

            <!--Testing purposes -->
            <script type="text/javascript">
                zs.data.ttip = {
                    defaultPosition: 'right',
                    attribute: 'tooltip-content',
                    delay: 500
                }
            </script>
            <div id="accountContent" class="span11 players">
                <h2>Karakterlerim</h2>
                <div class="scrollable_container">
                    <div class="inside_scrollable_container">
                        <ul class="character_list clearfix playerSelection">
                            <?php foreach ($characters as $key=>$val):?>
                                <li class="no-margin" data-player-name="<?=$val['name'];?>"
                                    data-server-name="<?=$server;?>"
                                    data-server-id="50"
                                    data-player-id="1015857"
                                    data-url="#"
                                >
                                    <div class="inner_box clearfix">
                                        <img src="<?=shop_public_url('/images/chrs/'.$val['job'].'.png')?>"
                                             alt="<?=$val['name'];?>" style="height: 80px;"/>
                                        <p class="left">
                                            <span><strong>İsim:</strong> <?=$val['name'];?></span>
                                            <strong>Sınıf:</strong> <?=jobName($val['job'])?><br>
                                            <strong>Seviye:</strong> <?=$val['level']?><br>
                                            <strong>Sunucu:</strong> <?=$server?></p>
                                        <span class="checked"><i class="icon-checkmark"></i></span>
                                    </div>
                                </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /content -->
<?php

require shop_view('static/footer');

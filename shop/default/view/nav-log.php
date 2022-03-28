<?php
    $log = nav_log()['log'];
    $server = settings('settings_gamename');
    $depo = nav_log()['depo'];
    function tur($value){
        if($value == 1){
            return 'Nesne Market';
        }elseif ($value == 2){
            return 'İndirimli Market';
        }elseif ($value == 3){
            return 'EM Market';
        }elseif ($value == 4){
            return 'Kader Çarkı';
        }
    }

    require shop_view('static/header');
?>
<div class="content clearfix" id="wt_refpoint">
    <div id="account" class="mCSB_container row-fluid">
        <ul id="accountNav" class="span3">
            <li>
                <a href="<?=shop_url('nav-characters')?>"
                   class="btn-sideitem"><i class="icon-users"></i><span>Karakterlerim</span></a>
            </li>
            <li>
                <a href="<?=shop_url('nav-log')?>"
                   class="btn-sideitem btn-sideitem-active"><i class="icon-basket"></i><span>Satın aldıklarım</span></a>
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
            <h2>Satın Aldıklarım (<?=count($log)?>)</h2>
            <div class="scrollable_container">
                <div class="inside_scrollable_container">
                    <?php if(count($log) == 0): ?>
                        <h3>Nesne marketten hiç eşya satın alınmadı.</h3>
                    <?php else:?>
                    <ul class="character_list clearfix playerSelection">
                        <?php foreach ($log as $key=>$val):?>
                            <li class="no-margin" data-player-name="<?=$val['item_name'];?>"
                                data-server-name="<?=$server;?>"
                                data-server-id="50"
                                data-player-id="1015857"
                                data-url="#"
                                style="width: 260px;"
                            >
                                <div class="inner_box clearfix">
                                    <p class="left">
                                        <strong>Eşya Adı:</strong> <?=$val['item_name'];?><br>
                                        <strong>Fiyatı:</strong> <?=$val['coins']?><br>
                                        <strong>Miktarı:</strong> <?=$val['adet']?><br>
                                        <strong>Tarih:</strong> <?=$val['tarih']?><br>
                                        <strong>Satın Alma Şekli:</strong> <?=tur($val['tur'])?></p>
                                    <span class="checked"><i class="icon-checkmark"></i></span>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /content -->
<?php require shop_view('static/footer');
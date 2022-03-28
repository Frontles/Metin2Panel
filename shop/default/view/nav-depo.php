<?php
    $depos = nav_depo()['depos'];
    $server = settings('settings_gamename');
    $depo = nav_depo()['depo'];


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
                   class="btn-sideitem"><i class="icon-basket"></i><span>Satın aldıklarım</span></a>
            </li>
            <li>
                <a href="<?=shop_url('nav-depo')?>"
                   class="btn-sideitem  btn-sideitem-active"><i class="icon-stack">
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
            <h2>Eşya Depom (<?=$depo?>)</h2>
            <div class="scrollable_container">
                <div class="inside_scrollable_container">
                        <?php if($depo == 0): ?>
                            <h3>Nesne marketinde hiç eşyan yok.</h3>
                        <?php else:?>
                            <ul class="character_list clearfix playerSelection">
                            <?php foreach ($depos as $key=>$val):?>
                            
                            <?php
                                $query = $db->prepare('SELECT * FROM items WHERE vnum=:vnum');
                                $query->execute([
                                    'vnum' => $val['vnum']
                                    ]);
                                $itemcek = $query->fetch(PDO::FETCH_ASSOC);
                            ?>
                            
                                <li  style="width: 130px;" id="img" class="no-margin" data-server-name="<?=$server;?>" title="<?=$functions->turkce_karakter($itemcek['item_name']);?>">
                                    <div class="inner_box clearfix" style="height:100px;">
                                        <img style="width:100px !important;" src="<?= URL . '/' .  $itemcek['item_image'];?>" onerror="this.src='<?=URL.'/data/items/60001.png'?>'" alt="<?= $functions->turkce_karakter($itemcek['item_name']);?>"/>
                                        <center>
                                        <span><?= $functions->turkce_karakter($itemcek['item_name']) ?></span>
                                        </center>
                                    </div>
                                </li>
                            <?php endforeach;?>
                    </ul>
                        <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /content -->
<?php

require shop_view('static/footer');
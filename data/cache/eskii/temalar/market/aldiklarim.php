<?php
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
?>
<div class="content clearfix" id="wt_refpoint">
    <div id="account" class="mCSB_container row-fluid">
        <ul id="accountNav" class="span3">
            <li><a href="<?php echo base_url('market/karakterlerim');?>" class="btn-sideitem"><i class="icon-users"></i><span>Karakterlerim</span></a></li>
            <li><a href="<?php echo base_url('market/aldiklarim');?>" class="btn-sideitem btn-sideitem-active"><i class="icon-basket"></i><span>Satın aldıklarım</span></a></li>
            <li><a href="<?php echo base_url('market/depom');?>" class="btn-sideitem"><i class="icon-stack"></i><span>Eşya Depom</span></a></li>
            <li><a href="<?php echo base_url('market/kupon_kullan');?>" class="btn-sideitem"><i class="icon-barcode"></i><span>Kodu kullan</span></a></li>
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
            <h2>Satın Aldıklarım (<?=count($logs)?>)</h2>
            <div class="scrollable_container">
                <div class="inside_scrollable_container">
                    <?php if(count($logs) == 0): ?>
                        <h3>Nesne marketten hiç eşya satın alınmadı.</h3>
                    <?php else:?>
                    <ul class="character_list clearfix playerSelection">
                        <?php foreach ($logs as $key=>$row):?>
                            <li class="no-margin" data-player-name="<?=$row['item_name'];?>"
                                data-server-name="<?php echo $this->config->item('site_title');?>"
                                data-server-id="50"
                                data-player-id="1015857"
                                data-url="#"
                                style="width: 260px;"
                            >
                                <div class="inner_box clearfix">
                                    <p class="left">
                                        <strong>Eşya Adı:</strong> <?=$row['item_name'];?><br>
                                        <strong>Fiyatı:</strong> <?=$row['coins']?><br>
                                        <strong>Miktarı:</strong> <?=$row['adet']?><br>
                                        <strong>Tarih:</strong> <?=$row['tarih']?><br>
                                        <strong>Satın Alma Şekli:</strong> <?=tur($row['tur'])?></p>
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
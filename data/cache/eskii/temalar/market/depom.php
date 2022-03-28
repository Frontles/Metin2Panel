<div class="content clearfix" id="wt_refpoint">
    <div id="account" class="mCSB_container row-fluid ">
        <ul id="accountNav" class="span3">
            <li><a href="<?php echo base_url('market/karakterlerim');?>" class="btn-sideitem"><i class="icon-users"></i><span>Karakterlerim</span></a></li>
            <li><a href="<?php echo base_url('market/aldiklarim');?>" class="btn-sideitem "><i class="icon-basket"></i><span>Satın aldıklarım</span></a></li>
            <li><a href="<?php echo base_url('market/depom');?>" class="btn-sideitem  btn-sideitem-active"><i class="icon-stack"></i><span>Eşya Depom</span></a></li>
            <li><a href="<?php echo base_url('market/kupon_kullan');?>" class="btn-sideitem "><i class="icon-barcode"></i><span>Kodu kullan</span></a></li>
        </ul>
        <div id="accountContent" class="span11 players">
            <h2>Eşya Depom (<?php echo (int) count($items);?>)</h2>
            <div class="scrollable_container mCustomScrollbar _mCS_1 rendered"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
                <div class="inside_scrollable_container">
                    <ul class="character_list clearfix playerSelection">

                        <?php 
                            foreach ($items as $item):
                                $img = $this->model->get_item_image_code($item->type, $item->vnum, $item->locale_name);

                        ?>
                        <li style="width: 148px;" id="img" class="no-margin" data-server-name="MetinBlade" title="<?php echo item_ad_cevir($item->locale_name);?>">
                            <div class="inner_box clearfix" style="height: 97px;">
                                <img src="<?php echo base_url('temalar/items/'.$img.'.png');?>" onerror="this.src='<?php echo base_url('temalar/items/60001.png');?>'"  class="mCS_img_loaded">
                            </div>
                        </li>
                        <?php endforeach;?>                               
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
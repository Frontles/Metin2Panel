<div class="content clearfix" id="wt_refpoint">
    <div id="account" class="mCSB_container row-fluid ">
        <ul id="accountNav" class="span3">
            <li><a href="<?php echo base_url('market/karakterlerim');?>" class="btn-sideitem btn-sideitem-active"><i class="icon-users"></i><span>Karakterlerim</span></a></li>
            <li><a href="<?php echo base_url('market/aldiklarim');?>" class="btn-sideitem "><i class="icon-basket"></i><span>Satın aldıklarım</span></a></li>
            <li><a href="<?php echo base_url('market/depom');?>" class="btn-sideitem "><i class="icon-stack"></i><span>Eşya Depom</span></a></li>
            <li><a href="<?php echo base_url('market/kupon_kullan');?>" class="btn-sideitem "><i class="icon-barcode"></i><span>Kodu kullan</span></a></li>
        </ul>
        <div id="accountContent" class="span11 players">
            <h2>Karakterlerim</h2>
            <div class="scrollable_container mCustomScrollbar _mCS_1 mCS_no_scrollbar rendered"><div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
                <div class="inside_scrollable_container">
                    <ul class="character_list clearfix playerSelection">
                        <?php foreach ($karakterler as $karakter):?>
                                    
                        <li class="no-margin">
                            <div class="inner_box clearfix">
                                <img src="<?php echo base_url('temalar/market/assets/images/chrs/'.$karakter->job.'.png');?>" alt="[TL]Bestia" style="height: 80px;" class="mCS_img_loaded">
                                <p class="left">
                                    <span><strong>İsim:</strong> <?php echo $karakter->name;?></span>
                                    <strong>Sınıf:</strong> <?php echo $this->model->get_player_job($karakter->job);?><br>
                                    <strong>Seviye:</strong> <?php echo $karakter->level;?><br>
                                    <strong>Sunucu:</strong> <?php echo $this->config->item('site_title');?></p>
                                <span class="checked"><i class="icon-checkmark"></i></span>
                            </div>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div><div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; height: 0px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
        </div>
    </div>
</div>
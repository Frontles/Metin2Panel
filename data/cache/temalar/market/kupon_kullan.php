<div class="content clearfix" id="wt_refpoint">
    <div id="account" class="mCSB_container row-fluid ">
        <ul id="accountNav" class="span3">
            <li><a href="<?php echo base_url('market/karakterlerim');?>" class="btn-sideitem "><i class="icon-users"></i><span>Karakterlerim</span></a></li>
            <li><a href="<?php echo base_url('market/aldiklarim');?>" class="btn-sideitem "><i class="icon-basket"></i><span>Satın aldıklarım</span></a></li>
            <li><a href="<?php echo base_url('market/depom');?>" class="btn-sideitem "><i class="icon-stack"></i><span>Eşya Depom</span></a></li>
            <li><a href="<?php echo base_url('market/kupon_kullan');?>" class="btn-sideitem btn-sideitem-active"><i class="icon-barcode"></i><span>Kodu kullan</span></a></li>
        </ul>
        <div id="accountContent" class="span11 redeem-code">
            <h2>Kodu kullan</h2>
            <div class="scrollable_container">
                <div class="inside_scrollable_container">
                    <div class="contrast-box clearfix">
                        <div class="grey-box">
                            <p class="code-info">İkramiyeni kazanmak için kodunu gir. Sonra bir onay alacaksın ve maceran için kullanıma açılan tüm nesnelerin görüntülenecek.</p>
                            <img class="code-avatar" src="<?php echo base_url('temalar/market/assets/images/barkod.png');?>">

                            <form action="" method="post">
                                <?php echo form_label('Kodun: <small class="text-danger" style="display:inline-block;">'.form_error('epin').'</small>', 'epin', ['style'=>'width: 100%;', 'class'=>'code-label']);?>
                                <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                                <?php echo form_input('epin', set_value('epin'), ['id'=>'code','class'=>'span7', 'size'=>'30', 'placeholder'=>'Kodunu gir'])?>
                                <button class="btn-default span3 " type="submit" id="submitCode">Kullan</button>
                            </form>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
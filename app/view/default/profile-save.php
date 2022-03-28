<?php  require view('static/header');
$hesapbilgiler = characters();

?><aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[106]?><a href="<?=site_url('profile')?>" class="back-to-account" title="Geri"></a></h2>
            <div class="body">
                <?php   foreach ($hesapbilgiler['player'] as $key => $val):?>
    <a href="<?= site_url("profile-save-response?name=" . $val['name']) ?>">
        <div id="profileBox" class="player-table">
            <div class="player-row">
                <img src="<?= URL . '/data/chrs/medium/' . $val['job'] . '.png' ?>" alt="<?= $functions->jobName($val['job']); ?>" style="    display: block;margin-left: auto;margin-right: auto;">
                <center><span style="font: normal 18px 'Palatino Linotype', 'Times', serif; text-transform: none;color: wheat"><?=$val['name']?></span></center><br>
                <center><span><?=$lng[109]?> : <?=$functions->map($val['map_index']);?></span></center>
                <center><span style="font: normal 18px 'Palatino Linotype', 'Times', serif; text-transform: none;color: wheat"><?= $val['name'] ?></span></center>
                <br>
                <center><span class="warfg_btn"><input type="submit"  value="<?=$lng[110]?>"></span></center>
                <br><br>

            </div>
        </div>
    </a>

<?php endforeach;  ?>

            </div>
        </article>
    </div>

    </aside>

<?php
require view('sidebar');
require view('static/footer');
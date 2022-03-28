<?php


    function portrait($level)
    {
        if ($level < 26){
            return '1';
        }elseif ($level < 34){
            return '26';
        }elseif ($level < 42){
            return '34';
        }elseif ($level < 48){
            return '42';
        }elseif ($level < 54){
            return '48';
        }elseif ($level < 61){
            return '54';
        }elseif ($level < 70){
            return '61';
        }elseif ($level < 90){
            return '70';
        }elseif ($level >= 90){
            return '90';
        }
    }
    function jobName($value){
        if ($value == 0 || $value == 4){
            return 'Savascı';
        }elseif ($value == 1 || $value == 5){
            return 'Ninja';
        }elseif ($value == 2 || $value == 6){
            return 'Sura';
        }elseif ($value == 3 || $value == 7){
            return 'Şaman';
        }elseif ($value == 8){
            return 'Lycan';
        }
    }
    function gifName($value){
        if ($value == 0 || $value == 4){
            return 'barbarian';
        }elseif ($value == 1 || $value == 5){
            return 'crusader';
        }elseif ($value == 2 || $value == 6){
            return 'witch-doctor';
        }elseif ($value == 3 || $value == 7){
            return 'wizard';
        }
    }
    function playerStat($date){
        $now = date( 'Y-m-d H:i:s', strtotime('-30 minutes'));
        if ($now > $date){
            return 'off';
        }elseif ($now <= $date){
            return 'on';
        }
    }

require view('static/header');
$guild = lonca_detay(get('name'));

?>
<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[43]?></h2>
            <div class="body">
                <div class="warfg_account">
                    <section id="ucp_top">
						<?php $cache->open($guild['info']['name']);?>
						<?php if ($cache->check($guild['info']['name'])):?>
                        <section id="ucp_info" style="padding-right:15px;padding-left:15px;width: 100%;">
                            <aside>
                                <table width="100%">
                                    <tbody>
                                    <tr>
                                        <td width="40%"><?=$lng[46]?> :</td>
                                        <td width="50%" class="wheat"><?=$guild['info']['name']?></td>
                                    </tr>
                                    <tr>
                                        <td width="40%"><?=$lng[47]?> :</td>
                                        <td width="50%" class="wheat"><?=$guild['info']['ladder_point']?></td>
                                    </tr>
                                    <tr>
                                        <td width="40%">EXP :</td>
                                        <td width="50%" class="wheat"><?=$guild['info']['exp']?></td>
                                    </tr>
                                    <tr>
                                        <td width="40%"><?=$lng[48]?> :</td>
                                        <td width="50%" class="wheat"><img src="<?=URL.'/data/flags/'.$guild['info']['empire'].'.png';?>" style="width:30px;" alt="<?=settings('settings_gamename')?>"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </aside>
                            <aside>
                                <table width="100%">
                                    <tbody>
                                    <tr>
                                        <td width="40%"><?=$lng[49]?> :</td>
                                        <td width="50%" class="wheat"><?=$guild['info']['win']?></td>
                                    </tr>
                                    <tr>
                                        <td width="40%"><?=$lng[50]?> :</td>
                                        <td width="50%" class="wheat"><?=$guild['info']['draw']?></td>
                                    </tr>
                                    <tr>
                                        <td width="40%"><?=$lng[51]?> :</td>
                                        <td width="50%" class="wheat"><?=$guild['info']['loss']?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </aside>
                            <aside>
                                <div class="leader">
                                    <h3><?=$lng[44]?> : <a href="<?=site_url('detail-player?name'.$guild['info']['baskan'])?>"><?=$guild['info']['baskan']?></a></h3>
                                    <img src="<?=URL.'/data/chrs/big/'.$guild['info']['job'].'/'.portrait($guild['info']['seviye']).'.png'?>" alt="<?=settings('settings_gamename')?>" style="width:100px">
                                </div>
                            </aside>
                        </section>
                        <?php endif;?>
						<?php $cache->close($guild['info']['name']);?>
                        <div class="clear"></div>
                    </section>
                </div>
            </div>
        </article>
    </div>
</aside>
<?php   require view('sidebar');  require view('static/footer');
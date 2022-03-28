<?php
    function jobName($value){
        if ($value == 0 || $value == 4){
            return 'Savaşçı';
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
    function playerStat($date){
        $now = date( 'Y-m-d H:i:s', strtotime('-30 minutes'));
        if ($now > $date){
            return false;
        }elseif ($now <= $date){
            return true;
        }
    }
require view('static/header');
    $rankedguild = ranked_guild();
?>
<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[66]?></h2>
            <div class="body">
                <div  style="margin-left:10px;margin-bottom:20px;text-align: center;">
                    <a href="<?=site_url('ranked-player')?>"  class="nice_button "><?=$lng[65]?></a>
                    <a href="javascript:void(0);"  class="nice_button "><?=$lng[66]?></a>
                    <div class="ucp_divider"></div>
                </div>
                <table id="large" cellspacing="0" class="tablesorter">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?=$lng[67]?></th>
                        <th><?=$lng[71]?></th>
                        <th><?=$lng[37]?></th>
                        <th><?=$lng[44]?></th>
                        <th><?=$lng[72]?></th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $cache->open('guilds');?>
					<?php if ($cache->check('guilds')):?>
						<?php foreach ($rankedguild as $key=>$val):?>
                            <tr>
                                <td><?=($key+1)?></td>
                                <td><a href="<?=site_url('detail-guild?name='.$val['lonca'])?>" title="<?=$val['lonca']?>"><?=$val['lonca']?></a></td>
                                <td><?=$val['ladder_point']?></td>
                                <td><img src="<?=URL.'/data/flags/'.$val['bayrak'].'.png'?>" alt=""></td>
                                <td><a rel="nofollow" href="<?=site_url('detail-player?name='.$val['baskan'])?>"><?=$val['baskan'];?></a></td>
                                <td><span class="label label-green"><?=$val['win']?></span> | <span class="label label-draw"><?=$val['draw']?></span> | <span class="label label-red"><?=$val['loss']?></span></td>
                            </tr>
						<?php endforeach;?>
					<?php endif;?>
					<?php $cache->close('guilds');?>
                    </tbody>
                </table>
            </div>
        </article>
    </div>
</aside>

<?php  require view('sidebar');
       require view('static/footer');
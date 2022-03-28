<?php

function jobName($value)
{
    if ($value == 0 || $value == 4) {
        return 'Savaşçı';
    } elseif ($value == 1 || $value == 5) {
        return 'Ninja';
    } elseif ($value == 2 || $value == 6) {
        return 'Sura';
    } elseif ($value == 3 || $value == 7) {
        return 'Şaman';
    } elseif ($value == 8) {
        return 'Lycan';
    }
}

function playerStat($date)
{
    $now = date('Y-m-d H:i:s', strtotime('-30 minutes'));
    if ($now > $date) {
        return false;
    } elseif ($now <= $date) {
        return true;
    }
}

require view('static/header');
$rankedplayer = ranked_player();

?>
    <aside id="right">
        <div id="content_ajax">
            <article class="page_article">
                <h2 class="head"><?= $lng[65] ?></h2>
                <div class="body">
                    <div style="margin-left:10px;margin-bottom:20px;text-align: center;">
                        <a href="javascript:void(0);" class="nice_button "><?=$lng[65]?></a>
                        <a href="<?= site_url('ranked-guild') ?>" class="nice_button "><?=$lng[66]?></a>
                        <div class="ucp_divider"></div>
                    </div>
                    <table id="large" cellspacing="0" class="tablesorter">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?= $lng[67] ?></th>
                            <th><?= $lng[68] ?></th>
                            <th><?= $lng[37] ?></th>
                            <th><?= $lng[38] ?></th>
                            <th><?= $lng[40] ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php // $cache->open('players');?>
                        <?php if ($cache->check('players')): ?>
                            <?php foreach ($rankedplayer as $key => $val): ?>
                                <tr>
                                    <td><?= ($key + 1) ?></td>
                                    <td><a rel="nofollow" href="<?= site_url('detail-player?name=' . $val['name']) ?>"
                                           title="<?= jobName($val['job']) ?>"><?= $val['name'] ?></a></td>
                                    <td><?= $val['level'] ?></td>
                                    <td><img src="<?= URL . '/data/flags/' . $val['empire'] . '.png' ?>"
                                             alt="<?= settings('settings_gamename') ?>"></td>
                                    <td>
                                        <?php if ($val['guild_name'] != null): ?>
                                            <a href="<?= site_url('detail-guild?name=' . $val['guild_name']) ?>"><?= $val['guild_name']; ?></a>
                                        <?php else: ?>
                                            <b style="color: #8b303d">Yok</b>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $val['playtime'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php // $cache->close('players');?>
                        </tbody>
                    </table>
                </div>
            </article>
        </div>
    </aside>

<?php
require view('sidebar');
require view('static/footer');
<style>
    .ranked-table {
        display: table;
        width: 241px;
        margin-left: 7px;
    }
</style>
<aside id="left">
    <!-- Subscribe -->
    <div class="btns">
        <?php if (isset($_SESSION['aid'])): ?>
            <a href="<?= site_url('download') ?>" class="register_btn"></a>
        <?php else: ?>
            <a href="<?= site_url('register') ?>" class="register_btn"></a>
        <?php endif; ?>
    </div>
    <section class="box sidebox">
        <div class="body">
            <div id="update_status">
                <div id="realmlist">
                    <div class="Table" style="width:241px;">
                        <?php $cache->open('server_statistics'); ?>
                        <?php if ($cache->check('server_statistics')): ?>
                            <?php if (settings('total_online_status') != 0 || settings('today_login_status') != 0 || settings('total_account_status') != 0 || settings('total_player_status') != 0 || settings('active_pazar_status') != 0): ?>
                                <?php if (settings('total_online_status')): ?>
                                    <div class="Row a">
                                        <div class="Cell">
                                            <p><span class="status a1"></span></p>
                                        </div>
                                        <div class="Cell">
                                            <p><?= $lng[3] ?></p>
                                        </div>
                                        <div class="Cell">
                                            <p><span class="online">
                                            <p class="online"><?= $getCount['totalOnline']['count'] + settings('settings_onlineplayer') ?></span></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (settings('today_login_status')): ?>
                                    <div class="Row b">
                                        <div class="Cell">
                                            <p><span class="status a1"></span></p>
                                        </div>
                                        <div class="Cell">
                                            <p><?= $lng[4] ?></p>
                                        </div>
                                        <div class="Cell">
                                            <p><span class="online">
                                            <p class="online"><?= $getCount['todayLogin']['count'] + settings('settings_dailyplayer') ?></span></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (settings('total_account_status')): ?>
                                    <div class="Row a">
                                        <div class="Cell">
                                            <p><span class="status a1"></span></p>
                                        </div>
                                        <div class="Cell">
                                            <p><?= $lng[5] ?></p>
                                        </div>
                                        <div class="Cell">
                                            <p><span class="online">
                                            <p class="online"><?= $getCount['totalAccount']['count'] + settings('settings_accounts') ?></span></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (settings('total_player_status')): ?>
                                    <div class="Row b">
                                        <div class="Cell">
                                            <p><span class="status a1"></span></p>
                                        </div>
                                        <div class="Cell">
                                            <p><?= $lng[6] ?></p>
                                        </div>
                                        <div class="Cell">
                                            <p><span class="online">
                                            <p class="online"><?= $getCount['totalPlayer']['count'] + settings('settings_characters') ?></span></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (settings('active_pazar_status')): ?>
                                    <div class="Row a">
                                        <div class="Cell">
                                            <p><span class="status a1"></span></p>
                                        </div>
                                        <div class="Cell">
                                            <p><?= $lng[7] ?></p>
                                        </div>
                                        <div class="Cell">
                                            <p><span class="online">
                                            <p class="online"><?= $getCount['activePazar']['count'] + settings('settings_onlinebazaar') ?></span></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php $cache->close('server_statistics'); ?>
                    </div>
                </div>
                <?php $cache->open('player_ranking'); ?>
                <?php if ($cache->check('player_ranking')): ?>
                    <div id="realmlist">
                        <div class="mini-bar-title"><a href="<?= site_url('ranked-player') ?>"><?= $lng[11] ?></a></div>
                        <div class="mini-ranked-select">
                            <ul class="idTabs">
                                <li>
                                    <a id="player-btn" href="javascript:void(0)" class="selected"><?= $lng[65] ?></a>
                                </li>
                                <li>
                                    <a id="guild-btn" href="javascript:void(0)"><?= $lng[66] ?></a>
                                </li>
                            </ul>
                        </div>
                        <div id="player-rank" class="ranked-table">
                            <div class="Heading">
                                <div class="Cell">
                                    <p>#</p>
                                </div>
                                <div class="Cell">
                                    <p><?= $lng[67] ?></p>
                                </div>
                                <div class="Cell">
                                    <p><?= $lng[68] ?></p>
                                </div>
                            </div>
                            <div style="margin-top:5px;"></div>
                            <?php if (count($result['topplayer']) != 0): ?>
                                <?php foreach ($result['topplayer'] as $key => $val): ?>
                                    <div class="Row <?= ($key / 2) == 0 ? 'a' : 'b'; ?>">
                                        <div class="Cell">
                                            <p><span class="grade g<?= $key + 1 ?>"></span></p>
                                        </div>
                                        <div class="Cell">
                                            <p><a class="sig"
                                                  href="<?= site_url('detail-player?name=' . $val['name']) ?>"><?= $val['name'] ?></a>
                                            </p>
                                        </div>
                                        <div class="Cell">
                                            <p><span class="online"><?= $val['level'] ?></span></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?= $lng[28] ?>
                            <?php endif; ?>

                        </div>
                        <div id="guild-rank" class="ranked-table" style="display: none;">
                            <div class="Heading">
                                <div class="Cell">
                                    <p> #</p>
                                </div>
                                <div class="Cell">
                                    <p><?= $lng[69] ?></p>
                                </div>
                                <div class="Cell">
                                    <p><?= $lng[71] ?></p>
                                </div>
                            </div>
                            <div style="margin-top:5px;"></div>
                            <?php if (count($result['topguild']) != 0): ?>
                                <?php foreach ($result['topguild'] as $key => $val): ?>
                                    <div class="Row <?= ($key / 2) == 0 ? 'a' : 'b'; ?>">
                                        <div class="Cell">
                                            <p><span class="grade g<?= $key + 1 ?>"></span></p>
                                        </div>
                                        <div class="Cell">
                                            <p><a class="sig"
                                                  href="<?= site_url('detail-guild?name=' . $val['name']) ?>"><?= $val['name'] ?></a>
                                            </p>
                                        </div>
                                        <div class="Cell">
                                            <p><span class="online"><?= $val['ladder_point'] ?></span></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?= $lng[31] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php $cache->close('player_ranking') ?>
                <div id="realmlist">
                    <div class="mini-bar-title"><?= $lng[15] ?></div>
                    <div class="Table" style="width:241px;">
                        <iframe src="<?= site_url('event-index') ?>" class="event-frame"></iframe>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        var playerActive = true;
        $('#player-btn').click(function () {
            if (playerActive === false) {
                $('#guild-rank').hide();
                $('#player-rank').fadeIn();
                playerActive = true;
                $(this).addClass('selected');
                $('#guild-btn').removeClass('selected');
            }
        });
        $('#guild-btn').click(function () {
            if (playerActive === true) {
                $('#player-rank').hide();
                $('#guild-rank').fadeIn();
                playerActive = false;
                $(this).addClass('selected');
                $('#player-btn').removeClass('selected');
            }
        });
    </script>
    <!-- Social -->
    <div class="social_media">
        <ul>
            <li class="facebook_button ">
                <a target="blank " href="<?= settings('settings_facebook') ?>" title="Facebook "></a>
            </li>
            <li class="googleplus_button">
                <a target="blank" href="<?= settings('settings_youtube') ?>" title="YouTube"></a>
            </li>
        </ul>
    </div>
    <!-- Social.End -->
</aside>
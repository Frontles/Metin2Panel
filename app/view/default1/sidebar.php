<style>
    .ranked-table{
        display: table;
        width: 241px;
        margin-left: 7px;
    }
</style>

<aside id="left">
    <!-- Subscribe -->
    <div class="btns">
        <a href="http://metin2.test/register" class="register_btn"></a>
    </div>
    <section class="box sidebox">
        <div class="body">
            <div id="update_status">
                <div id="realmlist">
                    <div class="Table" style="width:241px;">
                    </div>
                </div>
                <div id="realmlist">
                    <div class="mini-bar-title"><a href="http://metin2.test/ranked/player">Sıralama</a></div>
                    <div class="mini-ranked-select">
                        <ul class="idTabs">
                            <li>
                                <a id="player-btn" href="javascript:void(0)" class="selected">Oyuncu Sıralaması</a>
                            </li>
                            <li>
                                <a id="guild-btn" href="javascript:void(0)">Lonca Sıralaması</a>
                            </li>
                        </ul>
                    </div>
                    <div id="player-rank" class="ranked-table">
                        <div class="Heading">
                            <div class="Cell">
                                <p>Oyun</p>
                            </div>
                            <div class="Cell">
                                <p>Topluluk</p>
                            </div>
                            <div class="Cell">
                                <p>Seviye</p>
                            </div>
                        </div>
                        <div style="margin-top:5px;"></div>
                        <div class="Row a">
                            <div class="Cell">
                                <p><span class="grade g1"></span></p>
                            </div>
                            <div class="Cell">
                                <p><a class="sig" href="http://metin2.test/detail/player/Raze">Raze</a></p>
                            </div>
                            <div class="Cell">
                                <p><span class="online">105</span></p>
                            </div>
                        </div>
                    </div>

                    <div id="guild-rank" class="ranked-table" style="display: none;">
                        <div class="Heading">
                            <div class="Cell">
                                <p>Sıralama</p>
                            </div>
                            <div class="Cell">
                                <p>Ad</p>
                            </div>
                            <div class="Cell">
                                <p>Online Süre</p>
                            </div>
                        </div>
                        <div style="margin-top:5px;"></div>
                        <div class="Row a">
                            <div class="Cell">
                                <p><span class="grade g1"></span></p>
                            </div>
                            <div class="Cell">
                                <p><a class="sig" href="http://metin2.test/detail/guild/Deneme">Deneme</a></p>
                            </div>
                            <div class="Cell">
                                <p><span class="online">19650</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="realmlist">
                    <div class="mini-bar-title">Etkinlik Takvimi</div>
                    <div class="Table" style="width:241px;">
                        <iframe src="http://metin2.test/event" class="event-frame"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var playerActive = true;
        $('#player-btn').click(function () {
            if (playerActive === false)
            {
                $('#guild-rank').hide();
                $('#player-rank').fadeIn();
                playerActive = true;
                $(this).addClass('selected');
                $('#guild-btn').removeClass('selected');
            }
        });
        $('#guild-btn').click(function () {
            if (playerActive === true)
            {
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
                <a target="blank " href="https://www.facebook.com/ZahiraMT2/" title="Facebook "></a>
            </li>
            <li class="googleplus_button">
                <a target="blank" href="https://discord.gg/qzJG77s" title="YouTube"></a>
            </li>
        </ul>
    </div>
    <!-- Social.End -->
</aside>
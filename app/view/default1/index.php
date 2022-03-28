<?php require 'header.php' ?>


<div id="popup_bg"></div>
<!-- confirm box -->
<div id="confirm" class="popup">
    <h1 class="popup_question" id="confirm_question">confirm</h1>
    <div class="popup_links">
        <a href="javascript:void(0)" class="popup_button" id="confirm_button"></a>
        <a href="javascript:void(0)" class="popup_hide" id="confirm_hide" onclick="UI.hidePopup()">Cancel
        </a>
        <div style="clear: both;"></div>
    </div>
</div>
<!-- alert box -->
<div id="alert" class="popup">
    <h1 class="popup_message" id="alert_message">message</h1>
    <div class="popup_links">
        <a href="javascript:void(0)" class="popup_button" id="alert_button">Ok</a>
        <div style="clear: both;"></div>
    </div>
</div>
<div class="main_b_holder">
    <!-- Important Notices.End -->
    <div id="content">
        <!-- BODY Content start here -->
        <aside id="right">

            <!-- SLİDER start here -->
            <div id="slider_bg">
                <div id="slider">
                    <a href="#">
                        <img src="<?= public_url('asset/slider/1.jpg') ?>" style="height: 266px; width: 100%;">
                </div>
            </div>
            <!-- SLİDER FINISH here -->

            <div id="content_ajax">
                <!-- Latest News Header -->
                <div class="news_container">
                    <div class="container_left">
                        Haberler ve Güncellemeler            </div>
                    <!-- Latest News Header.End -->
                </div>
                <article class="news_article">
                    <h2 class="news_head">
                        <a href="http://metin2.test/patch/view/1">Oyun Açılışı</a>
                        <span><a href="javascript:void(0)">Yayın Tarihi :</a> Yaklaşık 1 yıl önce önce</span>
                    </h2>
                    <div class="news_body">
                        <div class="news_content">
                            <p><span style="text-align: center;"></span><br></p>
                            <a class="readn_ln" href="http://metin2.test/patch/view/1">Daha fazla oku</a>
                        </div>
                        <div class="comments"></div>
                    </div>
                </article>
            </div>
        </aside>


        <?php require 'sidebar.php' ?>

        <div class="clear"></div>
        <!-- BODY Content end here -->
    </div>
</div>

<?php require 'footer.php';
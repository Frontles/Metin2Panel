<?php require view('static/header');

$patch = patch();

?>

<aside id="right">
    <div id="slider_bg">
        <div id="slider">
            <a href="javascript:void(0); ">
                <img src="<?=public_url('asset/slider/1.jpg')?>" style="height: 266px; width: 100%;">
            </a>
            <a href="javascript:void(0);">
                <img src="<?=public_url('asset/slider/2.jpg')?>" style="height: 266px; width: 100%;">
            </a>
            <a href="javascript:void(0);">
                <img src="<?=public_url('asset/slider/3.jpg')?>" style="height: 266px; width: 100%;">
            </a>
        </div>
    </div>
    <div id="content_ajax">
        <!-- Latest News Header -->
        <div class="news_container">
            <div class="container_left">
				<?= $lng[62]?>
            </div>
            <!-- Latest News Header.End -->
        </div>
		<?php $cache->open('patch');?>
		<?php if ($cache->check('patch')):?>
		<?php foreach ($patch as $val):?>
        <article class="news_article">
            <h2 class="news_head">
                <a href="<?=site_url('patch-view?id='.$val['id'])?>"><?=$val['title'];?></a>
                <span><a href="javascript:void(0)"><?=$lng[64]?> :</a> <?=timeConvert($val['tarih'])?> </span>
            </h2>
            <div class="news_body">
                <div class="news_content">
                    <p><span style="text-align: center;"><?=$val['short_content'];?></span><br></p>
                    <a class="readn_ln" href="<?=site_url('patch-view?id='.$val['id'])?>"><?=$lng[63]?></a>
                </div>
                <div class="comments"></div>
            </div>
        </article>
			<?php endforeach; ?>
		<?php endif;?>
		<?php $cache->close('patch');?>
    </div>
</aside>
<?php if (settings('facebook_like_status')):?>
    <div class="fbBoard fbBoard2" id="facebookLike">
        <center>

            <a href="<?=settings('settings_facebook')?>" target="_blank">
                <div class="facebook-like">
                    <img src="<?=public_url('/asset/images/face.png')?>" alt="">
                    <a href="javascript:void(0)" onclick="document.getElementById('facebookLike').style.display='none';" style="display:block;width:23px;height:23px;margin:0px;padding:0px;border:none;background-color:transparent;position:absolute;top:23px;right:70px;-webkit-border-radius: 12px;border-radius: 12px;"></a>
                    <iframe src="https://www.facebook.com/plugins/like.php?href=<?=settings('settings_facebook')?>&amp;send=false&amp;layout=button_count&amp;width=120&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=segoe+ui&amp;height=30&amp;appId=515295435153698" scrolling="no" frameborder="0" style="position:absolute;bottom:82px;right:104px;border:none; overflow:hidden; width:98px; height:21px;" allowtransparency="true"></iframe>
                </div>
            </a>
        </center>
    </div>
<?php endif;?>


<?php require view('sidebar'); ?>
<?php require view('static/footer'); ?>

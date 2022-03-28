<?php require view('static/header');

$patch = patch_view(get('id'));
?>
<style>
    .main-text-bg{
        width: 95%;
        overflow: auto;
        padding: 20px;
    }
</style>

<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
			<?php $cache->open($patch['id']);?>
			<?php if ($cache->check($patch['id'])):?>
            <h2 class="head"><?=$patch['title']?></h2>
            <div class="body">
                <div class="main-inner main-inner-news">
                    <div class="main-text-bg">
                        <div style="float: right;color: #A07332"><?=timeConvert($patch['tarih']);?></div>
                        <br><br>

                        <div class="main-text">
                            <?php if (isset($patch['image'])): ?>
                            <center>
                            <img width="100%" src="<?= URL . '/' . $patch['image']?>" alt="">
                            </center>
                            <br><br>
                            <?php endif; ?>
							<?=$patch['content']?>
                        </div>
                    </div>
                </div>
            </div>
			<?php endif;?>
			<?php $cache->close($patch['id']);?>
        </article>
    </div>
</aside>
<?php   require view('sidebar') ;
 require view('static/footer') ;
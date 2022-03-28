<?php require view('static/header');

$deporesponse = depo_response(get('str'));

?>

<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[111]?><a href="<?=site_url('profile')?>" class="back-to-account" title="Geri"></a></h2>
            <div class="body">
                <div class="bg-light">
                    <?php  if ( isset($deporesponse['result']) && $deporesponse['result'] == ''): ?>
                        <div  class=" alert alert-danger" >
                            <?= $lng[81]?>
                        </div>
                    <?php endif; ?>
                    <?php  if (isset($deporesponse['result']) && $deporesponse['result'] ==true ):  ?>
                        <div class=" alert alert-success" role="alert">
                            <?= $lng[120] ?>
                            <h3 class="header-3" style="font: normal 25px 'Palatino Linotype', 'Times', serif; text-transform: none;"><?=$lng[121]?> : <?=$deporesponse['data']?></h3>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </article>
    </div>
</aside>
<?php   require view('sidebar');
        require view('static/footer'); ?>


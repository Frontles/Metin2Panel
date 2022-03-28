<?php require view('static/header');

$forgotpassresponse = forgotpassresponse(get('str'));

?>

<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[25]?></h2>
            <div class="body">
                <div class="bg-light">
                    <?php  if ( isset($forgotpassresponse['result']) && $forgotpassresponse['result'] == ''): ?>
                        <div  class=" alert alert-danger" >
                            <?= $lng[81]?>
                        </div>
                    <?php endif; ?>
                    <?php  if (isset($forgotpassresponse['result']) && $forgotpassresponse['result'] ==true ):  ?>
                        <div class=" alert alert-success" role="alert">
                            <h3 class="header-3" style="font: normal 25px 'Palatino Linotype', 'Times', serif; text-transform: none;"><?=$lng[83]?> : <?=$forgotpassresponse['data'];?></h3>

                        </div>
                    <?php endif; ?>


                </div>
            </div>
        </article>
    </div>
</aside>

<?php require view('sidebar'); require view('static/footer');
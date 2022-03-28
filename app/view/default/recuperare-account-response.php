<?php require view('static/header');

$forgotusernameresponse = forgotusernameresponse(get('str'));


?>
<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[73]?></h2>
            <div class="body">
                <div class="bg-light">
                    <?php  if ( isset($forgotusernameresponse['result']) && $forgotusernameresponse['result'] == ''): ?>
                        <div  class=" alert alert-danger" >
                            <?= $lng[84]?>
                        </div>
                    <?php endif; ?>
                    <center>
                    <?php  if (isset($forgotusernameresponse['result']) && $forgotusernameresponse['result'] ==true ):  ?>
                        <div class=" alert alert-success" role="alert">

                            <h2 class="header-2" style="font: normal 25px 'Palatino Linotype', 'Times', serif; text-transform: none;"><?=$lng[86]?></h2>

                            <br>
                            ------------------------------------------------------
                            <br>
                            <?php foreach ($forgotusernameresponse['players'] as $key=>$val): ?>
                            <h4 class="header-4" style="font: normal 25px 'Palatino Linotype', 'Times', serif; text-transform: none;"> <?=$val['login'];?></h4>
                            <?php endforeach; ?>

                        </div>

                    <?php endif; ?>
                    </center>
                </div>
            </div>
        </article>
    </div>
</aside>
<?php require view('sidebar'); require view('static/footer');
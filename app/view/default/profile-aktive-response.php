<?php require view('static/header');

$aktiveresponse = aktiveresponse(get('str'));

?>

<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[98]?></h2>
            <div class="body">
                <div class="bg-light">
                    <?php  if ( isset($aktiveresponse['result']) && $aktiveresponse['result'] == ''): ?>
                        <div  class=" alert alert-danger" >
                            <?= $lng[81]?>
                        </div>
                    <?php endif; ?>
                    <?php  if (isset($aktiveresponse['result']) && $aktiveresponse['result'] ==true ):  ?>
                        <div class=" alert alert-success" role="alert">
                            <h3 class="header-3" style="font: normal 25px 'Palatino Linotype', 'Times', serif; text-transform: none;"><?=$lng[105]?></h3>

                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </article>
    </div>
</aside>
<?php   require view('sidebar');
require view('static/footer'); ?>
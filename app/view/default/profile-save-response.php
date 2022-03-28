<?php  require view('static/header');

$saveresponse = save_response(get('name'));

?>
<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[110]?><a href="<?=site_url('profile')?>" class="back-to-account" title="Geri"></a></h2>
            <div class="body">
                <?php  if ( isset($saveresponse['result']) && $saveresponse['result'] == ''): ?>
                    <div  class=" alert alert-danger" >
                        <?= $lng[168]?>
                    </div>
                <?php endif; ?>
                <?php  if (isset($saveresponse['result']) && $saveresponse['result'] ==true ):  ?>
                    <div class=" alert alert-success" role="alert">
                        <?= $lng[170] ?>
                        <center><span id="say" style="font-weight: bold;font-size: 45px;">600</span><br> <?=$lng[169]?></center>

                    </div>
                <?php endif; ?>
            </div>
        </article>
    </div>
</aside>
    <script type="text/javascript">
        var saniye = 601;
        function bak()
        {
            if(saniye != 0)
            {
                saniye = saniye - 1;
                document.getElementById("say").innerHTML = saniye;
                setTimeout(bak, 1000);
            }
        }
        window.onload=bak;
    </script>
<?php require view('sidebar'); require view('static/footer');
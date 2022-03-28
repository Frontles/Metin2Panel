<?php  require view('static/header');

if( post('login_submit')){
    $login= giris_yap();
}
?>

<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[21]?></h2>
            <div class="body">

                <center>
                    <?php  if ( isset($login['result']) && $login['result'] == ''): ?>
                        <div  class=" alert alert-danger" >
                            <?=$login['message']?>
                        </div>
                    <?php endif; ?>
                    <?php  if (isset($login['result']) && $login['result'] ==true ):  ?>
                        <div class=" alert alert-success" role="alert">
                            <?=$login['message']?>

                            <script>
                                setTimeout(function(){
                                    window.location.assign("<?= site_url('index') ?>");
                                    //3 saniye sonra yönlenecek
                                }, 2000);

                            </script>
                        </div>
                    <?php endif; ?>

                </center>

                <form action="" method="post" accept-charset="utf-8" class="page_form">
                    <table style="width:500px;">
                        <tr>
                            <td><label for="account_id"><?=$lng[22]?> :</label></td>
                            <td>
                                <span class="warfg_input" style=""><input type="text" name="login" value="" placeholder="<?=$lng[22]?>"></span>

                            </td>
                        </tr>
                        <tr>
                            <td><label for="account_password"><?=$lng[23]?> :</label></td>
                            <td>
                                <span class="warfg_input" style=""><input type="password" name="password" value="" placeholder="<?=$lng[23]?>"></span>
                            </td>
                        </tr>
                        <!--
                        <tr>
                           <td><label for="account_password"><?php //echo $lng[24]?> :</label></td>
                            <td>
								<?php // echo $this->captcha->google(\StaticDatabase\StaticDatabase::settings('sitekey'))->call();?>
                            </td>

                        </tr>
                         -->
                        <tr style="position: absolute;bottom: -60px; ">
                            <td align="right">
                                <span><a href="<?=site_url('recuperare')?>" data-hasevent="1">Şifremi Unuttum?</a><br></span>
                                <span><a href="<?=site_url('recuperare-account')?>" data-hasevent="1">Hesap Adımı Unuttum?</a><br></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <br>
                                <br>
                                <span  class="warfg_btn"><input type="submit" name="login_submit" value="<?=$lng[21]?>"></span>
                            </td>
                        </tr>


                    </table>
                </form>

            </div>
        </article>
    </div>
</aside>

<?php  require view('sidebar') ;
require view('static/footer');

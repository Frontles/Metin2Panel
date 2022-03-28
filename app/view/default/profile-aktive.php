<?php require view('static/header');

$mailaktive = mail_onay();
if (post('mailaktiveet')){
    $aktifet =change_aktive();
}
?>
<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[98]?><a href="<?=site_url('profile')?>" class="back-to-account" title="Geri"></a></h2>
            <div class="body">
                <div class="error-holder">
                    <div class="container_3 red wide fading-notification" align="left">
						<?php if ($mailaktive['mailaktive'] == 1):?>
							<?=$functions->alert('info',$lng[99])?>
						<?php else:?>
                    </div>
                </div>

                <?php  if ( isset($aktifet['result']) && $aktifet['result'] == ''): ?>
                    <div  class=" alert alert-danger" >
                        <?=$aktifet['message']?>
                    </div>
                <?php endif; ?>
                <?php  if (isset($aktifet['result']) && $aktifet['result'] ==true ):  ?>
                    <div class=" alert alert-success" role="alert">
                        <?=$aktifet['message']?>

                        <script>
                            setTimeout(function(){
                                window.location.assign("<?= site_url('profile') ?>");
                                //3 saniye sonra yönlenecek
                            }, 2000);

                        </script>
                    </div>
                <?php endif; ?>
                <form action="" method="post" accept-charset="utf-8" class="page_form">
                    <table style="width:500px;">
                        <tr>
                            <td><label for="account_password"><?=$lng[23]?> :</label></td>
                            <td>
                                <span class="warfg_input" style=""><input type="password" name="password" value="" placeholder="<?=$lng[23]?>"></span>
                            </td>
                        </tr>
                        <?php /*
                        <tr>
                            <td><label for="account_password"><?=$lng[24]?> :</label></td>
                            <td>
								<?=$this->captcha->google(\StaticDatabase\StaticDatabase::settings('sitekey'))->call();?>
                            </td>
                        </tr>
                         */?>
                        <tr>
                            <td></td>
                            <td>
                                <span class="warfg_btn"><input type="submit" name="mailaktiveet" value="<?=$lng[104]?>"></span>
                            </td>
                        </tr>
                    </table>
                </form>
				<?php endif;?>
            </div>
        </article>
    </div>
</aside>

<?php require view('sidebar'); require view('static/footer');
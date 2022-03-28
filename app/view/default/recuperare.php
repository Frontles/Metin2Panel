<?php require view('static/header');

if (post('login_submit')){
    $forgotpassword = forgot_password();
}
?>

<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[25]?></h2>
            <div class="body">
                <div class="error-holder">
                    <div class="container_3 red wide fading-notification" align="left">
						<?php if (isset($aid)):?>
							<?php
							echo  $functions->alert('error',$lng[74]);
							?>
						<?php else:?>
                    </div>
                </div>
                <?php  if ( isset($forgotpassword['result']) && $forgotpassword['result'] == ''): ?>
                    <div  class=" alert alert-danger" >
                        <?=$forgotpassword['message']?>
                    </div>
                <?php endif; ?>
                <?php  if (isset($forgotpassword['result']) && $forgotpassword['result'] ==true ):  ?>
                    <div class=" alert alert-success" role="alert">
                        <?=$forgotpassword['message']?>

                        <script>
                            setTimeout(function(){
                                window.location.assign("<?= site_url('index') ?>");
                                //3 saniye sonra yönlenecek
                            }, 2000);

                        </script>
                    </div>
                <?php endif; ?>
                <form action="" method="post" accept-charset="utf-8" class="page_form">
                    <table style="width:500px;">
                        <tr>
                            <td><label for="account_id"><?=$lng[22]?> :</label></td>
                            <td>
                                <span class="warfg_input" style=""><input type="text" name="login" value="" placeholder="<?=$lng[22]?>"></span>

                            </td>
                        </tr>
                        <tr>
                            <td><label for="account_password"><?=$lng[78]?> :</label></td>
                            <td>
                                <span class="warfg_input" style=""><input type="text" name="email" value="" placeholder="<?=$lng[78]?>"></span>
                            </td>
                        </tr>

                        <?php  /*
                        <tr>
                            <td><label for="account_password"><?=$lng[24]?> :</label></td>
                            <td>
								<?= $this->captcha->google(\StaticDatabase\StaticDatabase::settings('sitekey'))->call();?>
                            </td>
                        </tr>

                       */ ?>

                        <tr>
                            <td></td>

                            <td>
                                <br>
                                <span class="warfg_btn"><input type="submit" name="login_submit" value="<?=$lng[79]?>"></span>
                            </td>
                        </tr>
                    </table>
                </form>
				<?php endif;?>
            </div>
        </article>
    </div>
</aside>
<?php require view('sidebar')  ; require view('static/footer'); ?>


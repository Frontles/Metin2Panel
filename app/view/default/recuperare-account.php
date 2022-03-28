<?php require view('static/header');

if (post('login_submit')){
    $forgotusername = forgotusername();
}

?>

<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[73]?></h2>
            <div class="body">
                <div class="error-holder">
                    <div class="container_3 red wide fading-notification" align="left">
						<?php if (isset($aid)):?>
							<?php
							echo $functions->alert('error',$lng[74]);
							?>
						<?php else:?>
                    </div>
                </div>

                <?php  if ( isset($forgotusername['result']) && $forgotusername['result'] == ''): ?>
                    <div  class=" alert alert-danger" >
                        <?=$forgotusername['message']?>
                    </div>
                <?php endif; ?>
                <?php  if (isset($forgotusername['result']) && $forgotusername['result'] ==true ):  ?>
                    <div class=" alert alert-success" role="alert">
                        <?=$forgotusername['message']?>

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
                            <td><label for="account_id"><?=$lng[78]?> :</label></td>
                            <td>
                                <span class="warfg_input" style=""><input type="text" name="email" value="" placeholder="<?=$lng[78]?>"></span>

                            </td>
                        </tr>
                        <?php /*
                        <tr>
                            <td><label for="account_password"><?=$lng[24]?> :</label></td>
                            <td>
								<?=$this->captcha->google(\StaticDatabase\StaticDatabase::settings('sitekey'))->call();?>
                            </td>
                        </tr>

                         */ ?>

                        <tr>
                            <td></td>
                            <td>
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


<?php require view('sidebar');
require view('static/footer');
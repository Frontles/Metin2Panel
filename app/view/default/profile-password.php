<?php
    $ban = ban_password();
    $availDt = strtotime($ban['availDt']);
    $now = time();
    $fark = $availDt - $now;

    require view('static/header');

    if (post('change_password')){
        $changepass = passwordchange();
    }

?>
<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[141]?><a href="<?=site_url('profile')?>" class="back-to-account" title="Geri"></a></h2>
            <div class="body">
                <div class="error-holder">
                    <div class="container_3 red wide fading-notification" align="left">
						<?php if ($ban['status'] == 'BLOCK' || $availDt > $now):?>
							<?=$functions->alert('error',$lng[113]); ?>
						<?php endif;?>
						<?php if ($ban['status'] == 'OK' && $availDt <= $now):?>

                    </div>
                </div>
                <?php  if ( isset($changepass['result']) && $changepass['result'] == ''): ?>
                    <div  class=" alert alert-danger" >
                        <?=$changepass['message']?>
                    </div>
                <?php endif; ?>
                <?php  if (isset($changepass['result']) && $changepass['result'] ==true ):  ?>
                    <div class=" alert alert-success" role="alert">
                        <?=$changepass['message']?>

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
                            <td><label for="account_password"><?=$lng[165]?> :</label></td>
                            <td>
                                <span class="warfg_input" style=""><input type="password" name="oldpassword" maxlength="16" placeholder="<?=$lng[165]?>"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="account_password"><?=$lng[166]?> :</label></td>
                            <td>
                                <span class="warfg_input" style=""><input type="password" name="newpassword" maxlength="16" placeholder="<?=$lng[166]?>"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="account_password"><?=$lng[167]?> :</label></td>
                            <td>
                                <span class="warfg_input" style=""><input type="password" name="newpassword2" maxlength="16" placeholder="<?=$lng[167]?>"></span>
                            </td>
                        </tr>


                        <!--
                        <tr>
                            <td><label for="account_password"><?php //echo$lng[24]?> :</label></td>
                            <td>
								<?php// echo$this->captcha->google(\StaticDatabase\StaticDatabase::settings('sitekey'))->call();?>
                            </td>
                        </tr>
                        -->
                        <tr>
                            <td></td>
                            <td>
                                <span class="warfg_btn"><input type="submit" name="change_password" value="<?=$lng[141]?>"></span>
                            </td>
                        </tr>
                    </table>
                </form>
				<?php endif;?>
            </div>
        </article>
    </div>
</aside>

<?php require view('sidebar');require view('static/footer');
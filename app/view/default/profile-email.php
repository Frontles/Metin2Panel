<?php
    $ban = mail_onay();
    $availDt = strtotime($ban['availDt']);
    $now = time();
    $fark = $availDt - $now;

   require view('static/header');

   if(post('change_email')){
       $changemail = change_email();
   }
?>
<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[122]?><a href="<?=site_url('profile')?>" class="back-to-account" title="Geri"></a></h2>
            <div class="body">
                <div class="error-holder">
                    <div class="container_3 red wide fading-notification" align="left">
						<?php if ($ban['status'] == 'BLOCK' || $availDt > $now):?>
							<?=$functions->alert('error',$lng[112]); ?>
						<?php endif;?>
						<?php if ($ban['status'] == 'OK' && $availDt <= $now):?>

                    </div>
                </div>
                <?php  if ( isset($changemail['result']) && $changemail['result'] == ''): ?>
                    <div  class=" alert alert-danger" >
                        <?=$changemail['message']?>
                    </div>
                <?php endif; ?>
                <?php  if (isset($changemail['result']) && $changemail['result'] ==true ):  ?>
                    <div class=" alert alert-success" role="alert">
                        <?=$changemail['message']?>

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
                                <td style="width: 150px;">
                                    <label class="register-input" for="register-email"><?=$lng[23]?>:</label>
                                </td>
                                <td>
                                    <input type="password" id="password" name="password" required>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px;">
                                    <label class="register-input" for="register-email"><?=$lng[133]?>:</label>
                                </td>
                                <td>
                                    <input type="email" class="form-control grunge" name="newmail" id="newmail" required/>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 150px;">
                                    <label class="register-input" for="register-email"><?=$lng[134]?>:</label>
                                </td>
                                <td>
                                    <input type="email" class="form-control grunge" name="newmail2" id="newmail2" required/>
                                </td>
                            </tr>

                            <?php /*
                            <tr>
                                <td>
                                    <label class="register-input" for="register-email" style="margin-top: -23px;"><?=$lng[24]?>:</label>
                                </td>
                                <td>
									<?=$this->captcha->google(\StaticDatabase\StaticDatabase::settings('sitekey'))->call();?>
                                </td>
                            </tr>
                                    */?>
                            <tr>
                                <td></td>
                                <td>
                                    <span class="warfg_btn"><input type="submit" name="change_email" value="<?=$lng[122]?>"></span>
                                </td>
                            </tr>
                        </table>
                    </form>
				<?php endif; ?>

            </div>
        </article>
    </div>
</aside>

<?php require view('sidebar'); require view('static/footer');
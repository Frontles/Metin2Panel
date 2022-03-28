<?php

require view('static/header');
    $ban = mail_onay();
    $availDt = strtotime($ban['availDt']);
    $now = time();
    $fark = $availDt - $now;

    if(post('change_ksk')){
        $changeksk = change_ksk();
    }
?>
<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[153]?><a href="<?=site_url('profile')?>" class="back-to-account" title="Geri"></a></h2>
            <div class="body">
                <div class="error-holder">
                    <div class="container_3 red wide fading-notification" align="left">
						<?php if ($ban['status'] == 'BLOCK' || $availDt > $now):?>
							<?=$functions->alert('error',$lng[112]); ?>
						<?php endif;?>
						<?php if ($ban['status'] == 'OK' && $availDt <= $now):?>
						<?php if ($ban['mailaktive'] == 0):?>
							<?=$functions->alert('error',$lng[113])?>
                            <a href="<?=site_url('profile-aktive')?>" ><button type="submit" class="center-block btn btn-grunge"><?=$lng[98]?></button></a>
						<?php else:?>
                    </div>
                </div>
                <?php  if ( isset($changeksk['result']) && $changeksk['result'] == ''): ?>
                    <div  class=" alert alert-danger" >
                        <?= $changeksk['message']?>
                    </div>
                <?php endif; ?>
                <?php  if (isset($changeksk['result']) && $changeksk['result'] ==true ):  ?>
                    <div class=" alert alert-success" role="alert">
                        <?= $changeksk['message'] ?>
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
                                <span class="warfg_btn"><input type="submit" name="change_ksk" value="<?=$lng[156]?>"></span>
                            </td>
                        </tr>
                    </table>
                </form>
				<?php endif;?>
				<?php endif;?>
            </div>
        </article>
    </div>
</aside>


<?php require view('sidebar'); require view('static/footer');
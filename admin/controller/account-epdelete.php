<?php

if(!permission('accounts','ep-delete')){
    permission_page();
}
$arg = get('id');

    $control = $account->prepare('SELECT id FROM account WHERE id=:id');
    $control->execute([
        'id'=>$arg
    ]);
    if(($control->rowCount()) < 1):
        $result['result']  = false;
    $result['message']  = 'ID bulunamadı';
        ?>

        <script>
            setTimeout(function(){
                window.location.assign("<?= admin_url('error')?> ");
                //3 saniye sonra yönlenecek
            }, 2000);

        </script>
    <?php
    else :
        $update = $account->prepare(' UPDATE account SET cash=:cash WHERE id=' . $arg );
        $sonuc= $update->execute(['cash'=>0]);

        // Session::set('changeOK',true);
        if ($sonuc == true){
            $result['result'] = true;
            $result['message'] = 'Silme Başarılı. Epi Olan Hesaplar Sayfasına Yönlendirliyorsunuz..';

            ?>

            <?php  if ( isset($result['result']) && $result['result'] == ''): ?>
                <div  class=" alert alert-danger" >
                    <?=$result['message']?>
                </div>
            <?php endif; ?>
            <?php  if (isset($result['result']) && $result['result'] ==true ):  ?>
                <div class=" alert alert-success" role="alert">
                    <?=$result['message']?>
                    <script>
                        setTimeout(function(){
                            window.location.assign("<?= admin_url('account-gotep')?> ");
                            //3 saniye sonra yönlenecek
                        }, 1000);

                    </script>
                </div>
            <?php endif; ?>
            <?php
        }

    endif;


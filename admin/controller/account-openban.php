<?php
$arg = get('id');
$filtre = new Filter();
$id = $filtre->numberFilter($arg);

if(!permission('accounts','ban')){
    permission_page();
}

    if ($id == false){

        die('ID boş bırakılamaz.');
    }

    $control = $account->prepare ('SELECT id FROM account WHERE id=:id');
    $control->execute([
        'id'=>$id
    ]);
    if(($control->rowCount()) <= 0){
        die('Böyle Bir ID ye ait Kullanıcı yok!');
    }else {

        $update = $account->prepare('UPDATE account SET 
        status=:status,
        availDt=:availDt 
        
        WHERE id=' . $id);

        $update->execute([
            'status' => 'OK',
            'availDt' => '1970-01-01 00:00:00'
        ]);


    }



if ($update->rowCount() == 1):
    $result['result']= true;
    $result['message'] = 'Ban Başarıyla açıldı !' ?>
<script>
    window.location.assign("<?= admin_url('account?id='. $id) ?>");
</script>
<?php else:
    $result['result']= false;
    $result['message'] =  'bu kullanıcı zaten banlı değil 3 Saniye içinde yönlendiriliyorsunuz..'  ?>
    <script>
        setTimeout(function(){
            window.location.assign("<?= admin_url('account?id='. $id) ?>");
            //3 saniye sonra yönlenecek
        }, 3000);

    </script>
<?php endif;
return $result?>
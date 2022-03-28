<?php

$id = get('id');

$control = $account->prepare('SELECT id FROM account WHERE id=:id');
$control->execute([
   'id'=>$id
]);
if($control->rowCount() < 1){
    die('BÖYLE BİR İD BULUNAMADI ');
}else{

    $control2 = $db->prepare('SELECT * FROM old_password WHERE account_id=:account_id');
    $control2->execute([
        'account_id'=>$id
    ]);
    if($control2->rowCount() < 1){
        die('BU KULLANICI DAHA ÖNCE HİÇ ŞİFRESİNİ DEĞİŞTİRMEMİŞ. ');
    }else{
        $getInfo = $control2->fetch(PDO::FETCH_ASSOC);

        $newPass = $getInfo['old_password'];
        $updatepass = $account->prepare(' UPDATE account SET password=:password WHERE id= ' . $id);
        $updatepass->execute(['password'=>$newPass]);


        $oldpassdelete= $db->prepare(' DELETE FROM old_password WHERE account_id=:account_id');
       $sonuc = $oldpassdelete->execute([
            'account_id'=>$id
        ]);
        if ($sonuc)
            header('Location:'. $_SERVER['HTTP_REFERER']);
    }
}
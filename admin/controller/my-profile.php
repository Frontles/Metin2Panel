<?php

$id = session_get('admin_id');
$sorgu = $db->prepare('SELECT user_id,user_image,user_name,user_realname,user_imza,user_rank FROM users WHERE user_id=:user_id');
$sorgu->execute(['user_id'=>$id]);
$user = $sorgu->fetch(PDO::FETCH_ASSOC);


function editmyprofile(){

    global $db;
    global $id;

    $resim = resim_yukle($_FILES['user_image']);


    if ($resim['result'] == 1){
        $yol = $resim['yol'];
    }else{
        $yol = null;
    }

    $sorgu = $db->prepare("UPDATE users SET

 user_imza=:user_imza,
 user_realname=:user_realname, 
 user_image=:user_image
 
 WHERE user_id =" . $id);

    $update=$sorgu->execute([
        'user_realname'=>post('user_realname'),
        'user_image'=>strlen($yol)> 5 ? $yol : post('eski_yol'),
        'user_imza'=> post('user_imza')


    ]);

    if ($update){

        if ($resim['result'] == true) {
            $resimsil = post('eski_yol');
            unlink($resimsil);
        }

        $result['result'] = true;
        $result['message'] = 'Hesap Düzenleme İşlemi Başarılı !';
    }else{
        $result['result'] = false;
        $result['message'] = 'Bir Sorun Oluştu !';
    }

    return $result;

}



require admin_view('my-profile');
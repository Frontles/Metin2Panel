<?php
if(!permission('users','add')){
    permission_page();
}




function add_admin_account() {


    global $db;
    $username= post('user_name');
    $password=post('user_password');
    $query= $db->prepare('SELECT * FROM users WHERE user_name=:user_name ');
    $query->execute([
        'user_name'=>$username
    ]);

    $row = $query->fetch(PDO::FETCH_ASSOC);
    if ($row){
        $result['result'] = false;
        $result['message'] = 'Bu Kullanıcı Adı veya E-posta mevcut. Lütfen Başka bir tane adresi deneyin.';

    }elseif (post('user_rank')== 0){
        $result['result'] = false;
        $result['message'] = 'Üye Rütbesini Seçmediniz !';
    }
    else{

        $data = json_encode($_POST['user_permissions']);

        $sorgu = $db->prepare("INSERT INTO users SET
 user_name=:user_name, 
 user_ip_aciklama=:user_ip_aciklama,
 user_status=:user_status,
 user_password=:user_password,
 user_ip=:user_ip,
 user_rank=:user_rank,
 user_imza=:user_imza,
 user_permissions=:user_permissions ");

        $insert=$sorgu->execute([
            'user_name'=>post('user_name'),
            'user_ip_aciklama'=>post('user_ip_aciklama'),
            'user_status'=>post('user_status'),
            'user_ip'=> post('user_ip'),
            'user_imza'=>post('user_imza'),
            'user_rank'=>post('user_rank') ,
            'user_password'=>password_hash($password,PASSWORD_DEFAULT),
            'user_permissions'=>$data

        ]);

        if ($insert){
            $result['result']= true;
            $result['message'] = 'Hesap Oluşturma İşlemi Başarılı !';
            setAdminLog($username . 'Adlı Yönetici Hesabını Oluşturdu.');
        }else{
            $result['result']= true;
            $result['message'] = 'Bir Hata Oluştu !';
        }
    }

    return $result;
}



require admin_view('add-admin');
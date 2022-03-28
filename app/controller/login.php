<?php

function giris_yap(){
    global $account;
    $username= post('login');
    $pass= post('password');


    $query= $account->prepare('SELECT * FROM account WHERE login=:login');
    $query->execute([
        'login'=>$username
    ]);

    $val = $query->fetch(PDO::FETCH_ASSOC);
    if ($val){
        $password_verify = password_verify($pass, $val['password']);
        if ($password_verify){
            $result['result'] = true;
            $result['message'] = 'Başarıyla Giriş yaptınız. Ana Sayfaya Yönlendiriliyorsunuz..';
            $_SESSION['user_id'] = $val['id'];
            $_SESSION['user_name'] = $val['login'];
            setloginlog( '1');

        }else{
            $result['result'] = false;

            $result['message'] = 'Şifreniz Hatalı Lütfen kontrol edin.';
        }
    }else{
        $result['result'] = false;
        $result['message'] = 'Bu Kullanıcı Adı Mevcut Değil.';
    }
    return $result;
}


require view('login');
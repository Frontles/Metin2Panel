<?php




 function kayit_ol(){
    global $account;
    $username= post('login');
    $pass= post('password');
    $pass2= post('password2');
    $email=  post('email');
    $name= post('name');
    $ksk = post('ksk');
    $phone = post('phone');
    $ip = GetIP();
    
    $kayittarih= date("Y-m-d H:i:s");
    //üye kontrolü

    $query= $account->prepare('SELECT * FROM account WHERE login=:login');
    $query->execute([
        'login'=>$username
    ]);

    $val = $query->fetch(PDO::FETCH_ASSOC);
    if ($val){
        $result['result'] = false ;
        $result['message'] = 'Bu Kullanıcı Adı veya E-posta mevcut. Lütfen Başka bir tane adresi deneyin.';

    }elseif ($pass != $pass2){

        $result['result'] = false ;
        $result['message'] = 'Girdiğiniz Şifreler Uyuşmuyor.';

    }
    else{
        $query = $account->prepare('INSERT INTO account SET
                login=:login,
                email=:email,
                real_name=:real_name,
                social_id=:ksk,
                phone1=:phone,
                password=:password,
                create_time=:create_time,
                ip=:ip');
        $sonuc = $query->execute([
            'login'=>$username,
            'email'=>$email,
            'real_name'=>$name,
            'ksk'=>$ksk,
            'phone'=>$phone,
            'create_time'=>$kayittarih,
            'password'=>password_hash($pass,PASSWORD_DEFAULT),
            'ip'=>$ip
        ]);

        if($sonuc){
            $result['result'] = true ;
            $result['message'] = 'Üyeliğiniz Başarıyla oluşturuldu. Yönlendiriliyorsunuz...';

        }else {
            $result['result'] = false ;
            $result['message'] = 'Bir sorun oluştu. Lütfen Daha Sonra tekrar deneyin.';

        }
    }
    return $result;
}



require view('register');
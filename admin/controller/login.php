<?php
if( isset($_POST['submit'])){
    $username= post('user_name');
    $pass= post('user_password');


    $query= $db->prepare('SELECT * FROM users WHERE user_name=:user_name');
    $query->execute([
        'user_name'=>$username

    ]);

    $row = $query->fetch(PDO::FETCH_ASSOC);


    
    if ($row && $row['user_status'] == 1){
        $password_verify = password_verify($pass, $row['user_password']);
        if ($password_verify){
            
                $succ = 'Başarıyla Giriş yaptınız. Yönlendiriliyorsunuz..';
                $_SESSION['admin_id'] = $row['user_id'];
                $_SESSION['admin_name'] = $row['user_name'];
                $_SESSION['admin_rank']= $row['user_rank'];
                $_SESSION['user_permissions']= $row['user_permissions'];
                setAdminLog("Giriş Yaptı");
                header('Refresh:2;Url='. admin_url());
                
            
            
        }
        else{
            $err = 'Şifreniz Hatalı Lütfen kontrol edin.';
        }
    }elseif ($row['user_status'] && $row['user_status'] == 0){
        $err= 'Üyeliğiniz dondurulmuştur. Giriş Yapmanız Engellendi.';
    }
    
    else{
        $err = 'Bu Kullanıcı Veritabanında Mevcut Değil.';
    }
}


/*
 if ($row && $row['user_status'] == 1 ){
        if ($row['user_rank'] == 0 || $row['user_rank']== 3 ){
            
        $err = 'Bu alana Giriş için Rütbeniz Yeterli Değil!';
        }else{
            $password_verify = password_verify($pass, $row['user_password']);
        if ($password_verify){
            $succ = 'Başarıyla Giriş yaptınız. Yönlendiriliyorsunuz..';
            $_SESSION['admin_id'] = $row['user_id'];
            $_SESSION['admin_name'] = $row['user_name'];
            $_SESSION['admin_rank']= $row['user_rank'];
            $_SESSION['user_permissions']= $row['user_permissions'];
            setAdminLog("Giriş Yaptı");
            header('Refresh:2;Url='. admin_url());
        }
        else{
            $err = 'Şifreniz Hatalı Lütfen kontrol edin.';
        }
    }elseif ($row['user_status'] && $row['user_status'] == 0){
        $err= 'Üyeliğiniz dondurulmuştur. Giriş Yapmanız Engellendi.';
    }
    else{
        $err = 'Bu Kullanıcı Veritabanında Mevcut Değil.';
    }
        }
}

*/
if (isset($_SESSION['admin_name'])){
    header('Location'.admin_url());

}


function createkey()

{

    $key = filter_var($_POST["key"],FILTER_SANITIZE_STRING);;

    if (empty($key)) {

        $data['result'] = false;

        $data['message'] = "Lütfen şifre alanını boş bırakmayınız";

    } else {

        $data['result'] = true;

        $hash = password_hash($key,PASSWORD_DEFAULT);

        $data['message'] = $hash;

    }

    return $data;

}
require admin_view('login');
<?php
if(!permission('accounts','add')){
    permission_page();
}



function create()
{
    global $account;
    $filter = new Filter();
    $name = $filter->wordFilter(post('realname'));
    $login = $filter->mainFilter(post('login'));
    $password = $filter->passwordFilter(post('password'));
    $email = post('email');
    $ksk = $filter->numberFilter(post('ksk'));

     if (strlen($ksk) > 7) {
        $data['result'] = false;
        $data['message'] = ' Karakter Silme Kodu 7 karakterden fazla olamaz.';
    } else {
        $control = $account->prepare('SELECT login FROM account WHERE login=:login');
        $control->execute([
            'login' => $login
        ]);
        if (($control->rowCount()) > 0) {

            $data['result'] = false;
            $data['message'] = "Bu Kullanıcı Adı Kullanılıyor !";

        } else {
            $data['email'] = $email;
            $now = date("Y-m-d H:i:s");
            $addaccount = $account->prepare("INSERT INTO account SET
            
            login=:login,
            password=:password,
            real_name=:real_name,
            social_id=:social_id,
            email=:email,
            create_time=:create_time,
            mailaktive=:mailaktive ");
            $addaccount->execute([
                'real_name'=>$name,
                'login'=>$login,
                'password'=>$password,
                'email'=> $email,
                'social_id'=> $ksk,
                'create_time'=> $now,
                'mailaktive'=> '0'
            ]);
           setAdminLog("$login Kullanıcısını Oluşturdu");
            $data['result'] = true;
            $data['message'] = $login . ' Adlı Kullanıcıyı Başarıyla Oluşturdunuz ! Kullanıcı Hesap Sayfasına Yönlendiriliyorsunuz... ';
            $data['sonid'] = $account->lastInsertId();
        }
    }
    return $data;
}



require admin_view('add-account');
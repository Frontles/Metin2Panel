<?php

function ban_password()

{

    global $account;
    $aid = session_get('user_id');

    $getBansor = $account->prepare('SELECT status,availDt FROM account WHERE id=:id ');

    $getBansor->execute([
        'id' => $aid
    ]);
    $getBan = $getBansor->fetch(PDO::FETCH_ASSOC);
    $result['status'] = $getBan['status'];

    $result['availDt'] = $getBan['availDt'];

    return $result;

}


function passwordchange()

{

    //if (settings('recaptcha'))
    {
        // $secret = \StaticDatabase\StaticDatabase::settings('secretkey');

        $ip = $_SERVER['REMOTE_ADDR'];

        //$captcha = $_POST['g-recaptcha-response'];

       // $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");

     //   $captchaRes = json_decode($rsp, true);

      //  if (!$captchaRes['success'])
        {
        //    Session::set('cError', 'recaptcha');

          //  URI::redirect('profile/password');

           // exit;

        }

    }

    $filter = new Filter();
    global $account;
    global $lng;
    $oldPassword = $filter->passwordFilter($_POST['oldpassword']);

    $newPassword = $filter->passwordFilter($_POST['newpassword']);

    $newPassword2 = $filter->passwordFilter($_POST['newpassword2']);

    if ($oldPassword == false || $newPassword == false || $newPassword2 == false) {

        $result['result'] = false;
        $result['message'] = $lng[160];

        header('Location:' .site_url('profile-password'));

    } elseif ($oldPassword == "" || $newPassword == "" || $newPassword2 == "") {

        $result['result'] = false;
        $result['message'] = $lng[160];


    } else {

        if ($newPassword != $newPassword2) {

            $result['result'] = false;
            $result['message'] = $lng[161];



        } elseif (strlen($newPassword) <= 6) {

            $result['result'] = false;
            $result['message'] = $lng[128];

        } elseif (strlen($newPassword) > 16) {

            $result['result'] = false;
            $result['message'] = $lng[162];

        } elseif ($oldPassword == $newPassword) {

            $result['result'] = false;
            $result['message'] = $lng[163];

        } else {

            $aid = session_get('user_id');

            $getPassword = $account->prepare("SELECT id FROM account WHERE id = ? AND password = ?");
            $getPassword->execute([$aid,password_verify($oldPassword,$newPassword)]);

            if (count($getPassword) <= 0) {

                $result['result'] = false;
                $result['message'] = $lng[163];

            } else {

                $sorgu = $account->prepare("UPDATE account SET password = ? WHERE id = ?");
                $sonuc = $sorgu->execute([password_hash($newPassword,PASSWORD_DEFAULT),$aid]);


                if($sonuc){
                    setplayerlog( '2', "$oldPassword şifresini $newPassword olarak güncelledi");

                    $result['result'] = true;
                    $result['message'] = $lng[164];

                }

            }

        }

    }

    return $result;
}

require view('profile-password');
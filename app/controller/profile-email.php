<?php



function mail_onay()

{

    global $account;
    $aid = session_get('user_id');

   $sorgu = $account->prepare('SELECT mailaktive,status,availDt FROM account WHERE id=:id');
   $sorgu->execute([
       'id'=>$aid
   ]);

   $sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);
   return $sonuc;
}


function change_email()

{

    /*if (\StaticDatabase\StaticDatabase::settings('recaptcha') == 1) {

        $secret = \StaticDatabase\StaticDatabase::settings('secretkey');

        $ip = $_SERVER['REMOTE_ADDR'];

        $captcha = $_POST['g-recaptcha-response'];

        $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");

        $captchaRes = json_decode($rsp, true);

        if (!$captchaRes['success']) {

            Session::set('cError', 'recaptcha');

            URI::redirect('profile/email');

            exit;

        }

    }

    */
    $aid = session_get('user_id');

    global $account;
    global $lng;
    $filter = new Filter();
    $getAktivesor = $account->prepare('SELECT mailaktive FROM account WHERE id=:id');
    $getAktivesor->execute(['id' => $aid]);
    $getAktivesonuc = $getAktivesor->fetch(PDO::FETCH_ASSOC);
    $getAktive = $getAktivesonuc['mailaktive'];

    if ($getAktive == 1) {

        $result['result'] = false;
        $result['message'] =$lng[131] ;


    }



    $password = $filter->passwordFilter($_POST['password']);

    $newmail = $filter->mailFilter($_POST['newmail']);

    $newmail2 = $filter->mailFilter($_POST['newmail2']);

    if ($newmail == false || $newmail2 == false) {

        $result['result'] = false;
        $result['message'] =$lng[126] ;

    } elseif ($password == "" || $newmail == "" || $newmail2 == "") {

        $result['result'] = false;
        $result['message'] =$lng[126] ;

    } else {

        if ($newmail != $newmail2) {

            $result['result'] = false;
            $result['message'] =$lng[127] ;

        } elseif (strlen($newmail) <= 6) {

            $result['result'] = false;
            $result['message'] =$lng[128] ;

        } elseif (strlen($newmail) > 50) {

            $result['result'] = false;
            $result['message'] =$lng[129] ;

        } else {

            $dbpasssor = $account->prepare("SELECT id,email,password FROM account WHERE id =:id ");
            $dbpasssor->execute(['id'=>$aid]);
            $dbpass= $dbpasssor->fetch(PDO::FETCH_ASSOC);


            $getPassword = password_verify($password,$dbpass['password']);


            if ($getPassword <= 0) {

                $result['result'] = false;
                $result['message'] =$lng[131] ;


            } else {


                $oldMail = $getPassword['email'];

                $updatesor = $account->prepare(' UPDATE account SET email=:email WHERE id=' . $aid);
               $update= $updatesor->execute(['email' => $newmail]);


               if ($update){
                   setplayerlog( '3', "$oldMail mail adresini $newmail adresiyle güncelledi");

                   $result['result'] = true;
                   $result['message'] =$lng[132] ;
               }


            }

        }

    }
    return $result;

}

require view('profile-email');
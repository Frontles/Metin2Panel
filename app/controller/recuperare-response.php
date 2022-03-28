<?php

function randomPassword() {

    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

    $pass = array(); //remember to declare $pass as an array

    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache

    for ($i = 0; $i < 8; $i++) {

        $n = rand(0, $alphaLength);

        $pass[] = $alphabet[$n];

    }

    return implode($pass); //turn the array into a string

}

function forgotpassresponse($arg)

{

    $filter = new Filter();
    $hash = new Hash();
    global $account;

    $key = $filter->numberFilter($arg);

    if($key == false){

        $result['result'] = false;

    }else{

        $token = filter_var($_GET['token'],FILTER_SANITIZE_URL);

        if (empty($token)){

            $result['result'] = false;

        }else{

            $control = $account->prepare('SELECT login,email,t_status,t_token,t_type FROM account WHERE t_key=:t_key');
            $control->execute(['t_key'=>$key]);

            if($control->rowCount() <= 0){

                $result['result'] = false;

            }else{

                $info = $control->fetch(PDO::FETCH_ASSOC);

                $login = $info['login'];

                $email = $info['email'];

                $t_status = $info['t_status'];

                $t_token = $info['t_token'];

                $tType = $info['t_type'];

                $getToken = $hash->create('md5',$key.$login.$email,settings('tokenkey'));

                if($t_status == 0){

                    $result['result'] = false;

                }elseif ($t_token == null){

                    $result['result'] = false;

                }elseif ($t_token != $getToken){

                    $result['result'] = false;

                }else{

                    if($tType != 4){

                        $result['result'] = false;

                    }else{



                        $newPass = randomPassword();

                        $result['data'] = $newPass;

                        $text = "Sayın <b>$login</b>, şifreniz başarıyla değiştirilmiştir. <br>  <b>NOT : Lütfen şifrenizi kimseyle paylaşmayınız. Unutmayın hiçbir yönetici sizden şifrenizi istemez.</b><br><br><br><a href='javascript:void(0);'><button style='background-color: #1AB2E8; width: 350px; padding: 0; height: 50px; border-radius: 7px;border: none;'><b> $newPass </b></button></a><br><br><br> <b>".settings('settings_gamename')." Yönetimi</b><br><br><br>";

                        sendmail(settings('settings_gamename')." Yeni Şifreniz",$email,$text);

                        $sorgu  = $account->prepare("UPDATE account SET password = ?,t_status = ?,t_key = ?, t_token = ? WHERE login = ? AND email = ?");
                        $sorgu->execute([ password_hash($newPass,PASSWORD_DEFAULT),'0','0','0',$login,$email]);
                        $result['result'] = true;


                    }

                }

            }

        }

    }

    return $result;

}

require view('recuperare-response');
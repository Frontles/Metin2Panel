<?php


function forgotusernameresponse($arg)

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

        }else {

            $control = $account->prepare('SELECT login,email,t_status,t_token,t_type,id FROM account WHERE t_key=:t_key');
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

                $getToken = $hash->create('md5',$key.$email,settings('tokenkey'));

                if($t_status == 0){

                    $result['result'] = false;

                }elseif ($t_token == null){

                    $result['result'] = false;

                }elseif ($t_token != $getToken){

                    $result['result'] = false;

                }else{

                    if($tType != 16){

                        $result['result'] = false;

                    }else{
                        $hesapadlari = $account->prepare('SELECT login from account WHERE email=:email');
                        $hesapadlari->execute(['email'=>$email]);
                        $result['players'] = $hesapadlari->fetchAll(PDO::FETCH_ASSOC);

                        $result['result'] = true;

                        $result['data'] = $login;

                        $sorgu = $account->prepare("UPDATE account SET t_status = ?,t_key = ?, t_token = ? WHERE id =" . $info['id']);
                        $sorgu->execute(['0','0','0']);

                    }

                }

            }

        }

    }

    return $result;

}

require view('recuperare-account-response');
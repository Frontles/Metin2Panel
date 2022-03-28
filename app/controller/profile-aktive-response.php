<?php


function aktiveresponse($t_key)

{

    $filter = new Filter();
    global $account;
    $arg2 = $filter->numberFilter($t_key);

    if ($arg2 == false) {

        $result['result'] = false;

    } else {

        $aid = session_get('user_id');

        $token = filter_var($_GET['token'],FILTER_SANITIZE_URL);

        $getTokenSe = $account->prepare('SELECT t_token,t_type,t_status,t_key FROM account WHERE id=:id AND t_status=:t_status AND t_key=:t_key ');
        $getTokenSe->execute([
            'id' => $aid,
            't_status' => '1',
            't_key' => $arg2
        ]);


        if (($getTokenSe->rowCount()) <= 0) {

            $result['result'] = false;

        } else {

            $getTokenS = $getTokenSe->fetch(PDO::FETCH_ASSOC);

            $getToken = isset($getTokenS['t_token']) ? $getTokenS['t_token'] : null;

            if ($token != $getToken) {

                $result['result'] = false;
                $result['message'] = 'Tokenler Eşleşmiyor !';
            } else {

                $tType = $getTokenS['t_type'];

                if ($tType != 5) {

                    $result['result'] = false;

                } else {


                    $sorgu = $account->prepare(' UPDATE account SET 
                        t_status=:t_status,
                        t_key=:t_key,
                        t_token=:t_token,
                        t_type=:t_type,
                        mailaktive=:mailaktive WHERE id='. $aid);
                    $sorgu->execute([
                        't_status' => '0',
                        't_key' => '0',
                        't_token' => '0',
                        't_type' => '0',
                        'mailaktive' => '1'
                    ]);

                    setplayerlog( '15', "mail aktivasyonu gerçekleştirildi");

                    $result['result'] = true;



                }

            }

        }

    }

    return $result;
}

require view('profile-aktive-response');
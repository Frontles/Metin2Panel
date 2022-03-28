<?php


function generateRandomString($length = 10)

{

    $characters = '0123456789';

    $charactersLength = strlen($characters);

    $randomString = '';

    for ($i = 0; $i < $length; $i++) {

        $randomString .= $characters[rand(0, $charactersLength - 1)];

    }

    return $randomString;

}

function depo_response($arg)

{

    $filter = new Filter();
    $arg2 = $filter->numberFilter($arg);
    global $account;
    global $player;
    if ($arg2 == false) {

        $result['result'] = false;

    } else {

        $aid = session_get('user_id');

        $token = filter_var($_GET['token'],FILTER_SANITIZE_URL);

        $getTokenSe = $account->prepare('SELECT t_token,t_type FROM account WHERE id=:id AND t_status=:t_status AND t_key=:t_key ');
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

            $depo = generateRandomString(6);

            if ($token != $getToken) {

                $result['result'] = false;
                $result['message'] = 'Tokenler Eşleşmiyor !';

            } else {

                $tType = $getTokenS['t_type'];

                if ($tType != 1) {

                    $result['result'] = false;

                } else {

                    $control = $player->prepare('SELECT account_id FROM safebox WHERE account_id=:account_id');
                    $control->execute([
                        'account_id' => $aid
                    ]);

                    if (($control->rowCount()) <= 0) {

                        $sorgu = $player->prepare(' INSERT INTO player.safebox SET 
                            account_id=:account_id,
                            size=:size,
                            password=:password,
                            gold=:gold');
                        $sorgu->execute([
                            'account_id' => $aid,
                            'size' => '5',
                            'password' => $depo,
                            'gold' => '0'
                        ]);

                    } else {

                        $sorgu = $player->prepare(' UPDATE player.safebox SET password=:password WHERE id=' . $aid);
                        $sorgu->execute([
                            'password' => $depo
                        ]);
                    }

                   $sorgu2= $account->prepare('UPDATE account SET 
                        t_status=:t_status,
                        t_key=:t_key,
                        t_token=:t_token,
                        t_type=:t_type WHERE id='. $aid);
                    $sorgu2->execute([
                        't_status' => '0',
                        't_key' => '0',
                        't_token' => '0',
                        't_type' => '0'
                    ]);

                    setplayerlog( '7', "depo şifresi $depo olarak güncellendi");

                    $result['result'] = true;

                    $result['data'] = $depo;



                }

            }

        }

    }

    return $result;
}

require view('profile-depo-response');
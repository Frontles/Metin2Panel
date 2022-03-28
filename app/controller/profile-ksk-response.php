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

function kskresponse($arg)

{

    $filter = new Filter();
    global $account;
    global $lng;
    $arg2 = $filter->numberFilter($arg);

    if ($arg2 == false) {

        $result['result'] = false;

    } else {

        $aid = session_get('user_id');

        $token = filter_var($_GET['token'],FILTER_SANITIZE_URL);

        $getTokenSe = $account->prepare('SELECT t_token,t_type,email FROM account WHERE id=:id AND t_status=:t_status AND t_key=:t_key ');
        $getTokenSe->execute([
            'id' => $aid,
            't_status' => '1',
            't_key' => $arg2
        ]);
        if ($getTokenSe->rowCount() <= 0) {

            $result['result'] = false;

        } else {

            $getTokenS = $getTokenSe->fetch(PDO::FETCH_ASSOC);

            $getToken = isset($getTokenS['t_token']) ? $getTokenS['t_token'] : null;

            if ($token != $getToken) {

                $result['result'] = false;

            } else {

                $tType = $getTokenS['t_type'];

                if ($tType != 2) {

                    $result['result'] = false;

                } else {

                    $ksk =generateRandomString(7);

                    $sorgu = $account->prepare('UPDATE account SET 
                        social_id=:social_id WHERE id=' . $aid);
                    $sorgu->execute([
                        'social_id' => $ksk
                    ]);

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

                    setplayerlog('9', "karakter silme kodu $ksk olarak güncellendi");
                    $result['result'] = true;
                    $result['data'] = $ksk;
                    $getMail = $getTokenS['email'];
                    $text = "sistemimizden karakter silme şifresi isteminde bulundunuz.Yeni Karakter Şifreniz: <br><br><br><h3 style='background-color: #1AB2E8; width: 350px; padding: 0; height: 50px; border-radius: 7px;border: none;text-align: center'> $ksk</h3><br><br><br><br><br> <b>" . settings('settings_gamename') . " Yönetimi</b><br><br><br>";


                    sendmail(settings('settings_gamename') . " Yeni Karakter Silme Şifresi", $getMail, $text);



                }

            }

        }

    }

    return $result;
}

require view('profile-ksk-response');
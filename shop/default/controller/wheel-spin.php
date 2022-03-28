<?php


function wheel_spin($arg)

{
    global $account;
    global $db;
    $hashh = new Hash();

    $arg = filter_var($arg,FILTER_SANITIZE_STRING);

    $play_wheel = isset($_SESSION['play_wheel']) ? $_SESSION['play_wheel'] : null;

    if ($play_wheel === null)

        $data['result'] = false;

    else

    {

        $aId = session_get('user_id');

        $cLogin = session_get('user_name');

        $getCoinssor = $account->prepare('SELECT cash FROM account WHERE id=:id');
        $getCoinssor->execute(['id'=>$aId]);
        $getCoinssonuc = $getCoinssor->fetch(PDO::FETCH_ASSOC);
        $getCoins= $getCoinssonuc['cash'];
        $token = $hashh->create('md5',$aId.$cLogin.$getCoins,$play_wheel);

        unset($_SESSION['play_wheel']);

        if ($arg !== $token)

            $data['result'] = false;

        elseif ($getCoins < settings('settings_wheel_coins'))

            $data['result'] = false;

        else

        {

            $data['result'] = true;

            $dataitems = $db->prepare("SELECT id,vnum,item_name,item_image FROM wheel_items ORDER BY RAND() LIMIT 16");
            $dataitems->execute();
            $data['items'] = $dataitems->fetchAll(PDO::FETCH_ASSOC);

            $data['random'] = rand(49,64);

            $data['gift_info'] = $data['items'][$data['random'] - 49];

        }

    }

    return $data;

}



require shop_view('wheel-spin');
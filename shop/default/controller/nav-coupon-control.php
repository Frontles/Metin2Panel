<?php


function nav_control(){



    global $db;
    global $account;

    $aId = session_get('user_id');

    $code = filter_var($_POST['code'],FILTER_SANITIZE_STRING);

    $control = $db->prepare('SELECT id FROM coupons WHERE anahtar=:anahtar and status=:status');
    $control->execute(['anahtar'=>$code,'status'=>'0']);
    $kuponid = $control->fetch(PDO::FETCH_ASSOC);

    if(($control->rowCount()) <= 0){

        $result['result'] = false;

    }else{

        $result['result'] = true;

        $getCoinssor = $db->prepare('SELECT ep FROM coupons WHERE anahtar=:anahtar and status=:status');
        $getCoinssor->execute(['anahtar'=>$code,'status'=>'0']);
        $getCoins = $getCoinssor->fetch(PDO::FETCH_ASSOC);

        $coinssor = $account->prepare(' SELECT cash FROM account WHERE id=:id');
        $coinssor->execute(['id'=>$aId]);
        $coins = $coinssor->fetch(PDO::FETCH_ASSOC)['cash'];

        if (settings('shop_happyhour'))

            $newCoins = ($getCoins['ep'] * intval(settings('shop_happyhourstatus')) / 100) + $getCoins['ep'] + $coins;

        else
            $newCoins = $getCoins['ep'] + $coins;
        $sorgu  = $account->prepare('UPDATE account SET cash=:cash WHERE id=' . $aId);
        $sorgu->execute(['cash'=>$newCoins]);
        $date = date("Y-m-d H:i:s");

        $sorgu2 = $db->prepare("UPDATE coupons SET 
            account_id=:account_id,
            status=:status,
            use_date=:use_date WHERE  id= " . $kuponid['id']);
        $sorgu2->execute(['account_id'=>$aId,'status'=>'1','use_date'=>$date]);

        $result['coins'] = $getCoins['ep'];

    }

    return $result;

}

require shop_view('nav-coupon-control');
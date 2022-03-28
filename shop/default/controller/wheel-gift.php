<?php

function setPos($getPos)
{

    if ($getPos >= '-1' and $getPos < '4') {

        return $getPos + 1;

    } elseif ($getPos == '4') {

        return $getPos + 6;

    } elseif ($getPos >= '10' and $getPos < '14') {

        return $getPos + 1;

    } elseif ($getPos == '14') {

        return $getPos + 6;

    } elseif ($getPos >= '20' and $getPos < '24') {

        return $getPos + 1;

    } elseif ($getPos == '24') {

        return $getPos + 6;

    } elseif ($getPos >= '30' and $getPos < '34') {

        return $getPos + 1;

    } elseif ($getPos == '34' and $getPos > '34') {

        return false;

    }

}

function wheel_gift($arg, $arg1)

{

    global $db;
    global $account;
    global $player;
    $hashh = new Hash();

    $arg = filter_var($arg, FILTER_SANITIZE_STRING);

    $arg1 = filter_var($arg1, FILTER_SANITIZE_STRING);

    $giftKey = isset($_SESSION['gift_key']) ? $_SESSION['gift_key'] : null;

    if ($giftKey === null)

        $data['result'] = false;

    else {

        $aId = session_get('user_id');

        $getItemsor = $db->prepare('SELECT * FROM wheel_items WHERE id=:id');
        $getItemsor->execute(['id' => $arg]);
        $getItem = $getItemsor->fetch(PDO::FETCH_ASSOC);

        $getCoinssor = $account->prepare('SELECT cash,mileage FROM account WHERE id=:id');
        $getCoinssor->execute(['id' => $aId]);
        $getCoins = $getCoinssor->fetch(PDO::FETCH_ASSOC);


        $token = $hashh->create('md5', $aId . $arg . $getItem['vnum'], $giftKey);

        unset($_SESSION['gift_key']);

        if ($token !== $arg1)

            $data['result'] = false;

        elseif ($getCoins['cash'] < settings('settings_wheel_coins'))

            $data['result'] = false;

        else {

            $Possor = $player->prepare("SELECT pos FROM player.item WHERE owner_id = ? and window = ? ORDER BY pos DESC");
            $Possor->execute([$aId, 'MALL']);
            $Pos = $Possor->fetch(PDO::FETCH_ASSOC);
            $getPos = (($Possor->rowCount()) > 0) ? $Pos['pos'] : -1;

            if ($getPos >= '34')

                $data['result'] = false;

            else {

                $randId = rand(1000000000, 2147483640);

                $controlId = $player->prepare('SELECT id FROM item WHERE id=:id');
                $controlId->execute(['id' => $randId]);

                if (($controlId->rowCount()) > 0)

                    $data['result'] = false;

                else {

                    $newCoins = $getCoins['cash'] - settings('settings_wheel_coins');

                    $newEm = $getCoins['mileage'] + settings('settings_wheel_coins');

                    $sorgu = $account->prepare('UPDATE account SET 
                        cash=:cash,
                        mileage=:mileage WHERE  id=' . $aId);
                    $sorgu->execute(['cash' => $newCoins, 'mileage' => $newEm]);

                    $owner_id = $aId;

                    $window = 'MALL';

                    $pos = setPos($getPos);

                    $item_name = $getItem['item_name'];

                    $item_image = $getItem['item_image'];

                    $count = $getItem['countt'];

                    $vnum = $getItem['vnum'];

                    $socket0 = $getItem['socket0'];

                    $socket1 = $getItem['socket1'];

                    $socket2 = $getItem['socket2'];

                    $attrtype0 = $getItem['attrtype1'];

                    $attrtype1 = $getItem['attrtype2'];

                    $attrtype2 = $getItem['attrtype3'];

                    $attrtype3 = $getItem['attrtype4'];

                    $attrtype4 = $getItem['attrtype5'];

                    $attrtype5 = $getItem['attrtype6'];

                    $attrtype6 = $getItem['attrtype7'];

                    $attrvalue0 = $getItem['attrvalue1'];

                    $attrvalue1 = $getItem['attrvalue2'];

                    $attrvalue2 = $getItem['attrvalue3'];

                    $attrvalue3 = $getItem['attrvalue4'];

                    $attrvalue4 = $getItem['attrvalue5'];

                    $attrvalue5 = $getItem['attrvalue6'];

                    $attrvalue6 = $getItem['attrvalue7'];

                    $date = date("Y-m-d H:i:s");

                    if ($getItem['item_time'] == '1') {


                        $sorgu2 = $player->prepare("INSERT INTO player.item (id, owner_id, window, pos, count, vnum, socket0, socket1, socket2, attrtype0, attrvalue0, attrtype1, attrvalue1, attrtype2, attrvalue2, attrtype3, attrvalue3, attrtype4, attrvalue4, attrtype5, attrvalue5, attrtype6, attrvalue6) VALUES (?,?,?,?,?,?,UNIX_TIMESTAMP(NOW())+?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $sorgu2->execute([$randId, $owner_id, $window, $pos, $count, $vnum, $socket0, $socket1, $socket2,$attrtype0, $attrvalue0 ,$attrtype1, $attrvalue1, $attrtype2, $attrvalue2, $attrtype3, $attrvalue3, $attrtype4, $attrvalue4, $attrtype5, $attrvalue5, $attrtype6, $attrvalue6]);


                        $sorgu3 = $db->prepare(' INSERT INTO items_log SET 
                            account_id=:account_id,
                            item_id=:item_id,
                            vnum=:vnum,
                            item_name=:item_name,
                            tur=:tur,
                            coins=:coins,
                            adet=:adet,
                            tarih=:tarih');
                        $sorgu3->execute([
                            'account_id' => $aId,
                            'item_id' => $vnum,
                            'vnum' => $vnum,
                            'item_name' => $item_name,
                            'tur' => '3',
                            'coins' => settings('settings_wheel_coins'),
                            'adet' => $count,
                            'tarih' => $date]);

                    } elseif ($getItem['item_time'] == '0') {



                        $sorgu4 = $player->prepare("INSERT INTO player.item (id, owner_id, window, pos, count, vnum, socket0, socket1, socket2, attrtype0, attrvalue0, attrtype1, attrvalue1, attrtype2, attrvalue2, attrtype3, attrvalue3, attrtype4, attrvalue4, attrtype5, attrvalue5, attrtype6, attrvalue6) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $sorgu4->execute([$randId, $owner_id, $window, $pos, $count, $vnum, $socket0, $socket1, $socket2,$attrtype0, $attrvalue0 ,$attrtype1, $attrvalue1, $attrtype2, $attrvalue2, $attrtype3, $attrvalue3, $attrtype4, $attrvalue4, $attrtype5, $attrvalue5, $attrtype6, $attrvalue6]);


                        $sorgu3 = $db->prepare(' INSERT INTO items_log SET 
                            account_id=:account_id,
                            item_id=:item_id,
                            vnum=:vnum,
                            item_name=:item_name,
                            tur=:tur,
                            coins=:coins,
                            adet=:adet,
                            tarih=:tarih');
                        $sorgu3->execute([
                            'account_id' => $aId,
                            'item_id' => $vnum,
                            'vnum' => $vnum,
                            'item_name' => $item_name,
                            'tur' => '3',
                            'coins' => settings('settings_wheel_coins'),
                            'adet' => $count,
                            'tarih' => $date]);

                    }

                    $data = ["result" => true, "data" => [$item_name, $item_image, $newCoins, $newEm]];

                }

            }

        }

    }

    return $data;

}

$wheelgift = wheel_gift(get('id'), get('token'));
if ($wheelgift == true) {

    require shop_view('wheel-gift_success');
} else {

    require shop_view('wheel-gift_error');
}
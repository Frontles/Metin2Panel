<?php


function nav_log(){


    global $db;
    global $player;
    $aId = session_get('user_id');

    $resultlog = $db->prepare(' SELECT item_name,coins,tarih,tur,adet FROM items_log WHERE account_id=:account_id');
    $resultlog->execute(['account_id'=>$aId]);
    $result['log'] = $resultlog->fetchAll(PDO::FETCH_ASSOC);


    $resultdepo = $player->prepare('SELECT id FROM item WHERE owner_id=:owner_id and window=:window ');
    $resultdepo->execute([
        'owner_id'=>$aId,
        'window'=>'MALL'
    ]);
    $result['depo'] = $resultdepo->rowCount();
    return $result;

}

require shop_view('nav-log');
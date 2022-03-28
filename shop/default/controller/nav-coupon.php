<?php

function nav_coupon(){

    global $player;

    $aId = session_get('user_id');

    $resultdepo = $player->prepare('SELECT id FROM item WHERE owner_id=:owner_id and window=:window ');
    $resultdepo->execute([
        'owner_id'=>$aId,
        'window'=>'MALL'
    ]);
    $result['depo'] = $resultdepo->rowCount();


    return $result;

}


require shop_view('nav-coupon');
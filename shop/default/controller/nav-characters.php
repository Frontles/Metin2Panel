<?php


function nav_characters(){


    global $player;
    $aId = session_get('user_id');

    $resultcharacters = $player->prepare('SELECT name,job,level FROM player WHERE account_id=:account_id');
    $resultcharacters->execute([
        'account_id'=>$aId
    ]);
    $result['characters'] = $resultcharacters->fetchAll(PDO::FETCH_ASSOC);

    $resultdepo = $player->prepare('SELECT id FROM item WHERE owner_id=:owner_id and window=:window ');
    $resultdepo->execute([
        'owner_id'=>$aId,
        'window'=>'MALL'
    ]);
    $result['depo'] = $resultdepo->rowCount();
    return $result;


}

require shop_view('nav-characters');
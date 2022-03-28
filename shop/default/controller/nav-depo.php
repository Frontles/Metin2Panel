<?php


function nav_depo(){

    global $player;

    $aId = session_get('user_id');

    $resultdepos = $player->prepare("SELECT player.item.vnum,player.item_proto.locale_name FROM player.item LEFT JOIN player.item_proto ON player.item.vnum = player.item_proto.vnum WHERE player.item.owner_id = ? AND player.item.window = ?");
    $resultdepos->execute([$aId,'MALL']);
    $result['depos'] = $resultdepos->fetchAll(PDO::FETCH_ASSOC);

    $resultdepo = $player->prepare('SELECT id FROM item WHERE owner_id=:owner_id and window=:window');
    $resultdepo->execute(['owner_id'=>$aId,'window'=>'MALL']);
    $result['depo'] = $resultdepo->rowCount();
    return $result;

}

require shop_view('nav-depo');
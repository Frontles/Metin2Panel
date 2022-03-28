<?php

function playerinfo($id){
global $player;


        $getInfosor = $player->prepare("SELECT * FROM player WHERE id =:id");
        $getInfosor->execute([
            'id'=>$id
        ]);
        $result['player'] = $getInfosor->fetch(PDO::FETCH_ASSOC);


    $resultenvanter = $player->prepare("SELECT item.id,item.count,item.vnum,item.socket0,item.socket1,item.socket2,item.attrtype0,item.attrtype1,item.attrtype2,item.attrtype3,item.attrtype4,item.attrtype5,item.attrtype6,item.attrvalue0,item.attrvalue1,item.attrvalue2,item.attrvalue3,item.attrvalue4,item.attrvalue5,item.attrvalue6,player.item_proto.locale_name as name,player.item_proto.size FROM player.item
LEFT JOIN player.item_proto ON player.item_proto.vnum = player.item.vnum
WHERE owner_id = ? AND window = ?");
    $resultenvanter->execute([$id, 'INVENTORY']);
    $result['inventory'] = $resultenvanter->fetchAll(PDO::FETCH_ASSOC);


    $resultekipman = $player->prepare("SELECT item.id,item.count,item.vnum,item.socket0,item.socket1,item.socket2,item.attrtype0,item.attrtype1,item.attrtype2,item.attrtype3,item.attrtype4,item.attrtype5,item.attrtype6,item.attrvalue0,item.attrvalue1,item.attrvalue2,item.attrvalue3,item.attrvalue4,item.attrvalue5,item.attrvalue6,player.item_proto.locale_name as name,player.item_proto.size FROM player.item
LEFT JOIN player.item_proto ON player.item_proto.vnum = player.item.vnum
WHERE owner_id = ? AND window = ?");
    $resultenvanter->execute([$id, 'EQUIPMENT']);
    $result['equipment'] = $resultenvanter->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

require admin_view('player');
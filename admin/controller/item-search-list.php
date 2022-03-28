<?php



if (!permission('item-search', 'show')) {
    permission_page();
}
$vnum= get('vnum');


$getItemNamesor= $player->prepare('SELECT locale_name FROM item_proto WHERE vnum=:vnum');
$getItemNamesor->execute([
    'vnum'=>$vnum
]);
$getItemName = $getItemNamesor->fetch(PDO::FETCH_ASSOC);


$query = $player->prepare('SELECT id,owner_id,window,count,vnum FROM item WHERE vnum=:vnum');
$query->execute([
    'vnum'=>$vnum
]);
$items = $query->fetchAll(PDO::FETCH_ASSOC);



require admin_view('item-search-list');
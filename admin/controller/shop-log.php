<?php

if(!permission('logs','show')){
    permission_page();
}



function shop()
{

    global $db;
    $query = $db->prepare('SELECT account_id,item_name,adet,tarih FROM items_log');
    $query ->execute([]);
    $data['all']=$query->fetchAll(PDO::FETCH_ASSOC);

    $query2 = $db->prepare("SELECT item_id,adet,item_name FROM (SELECT item_id, COUNT(vnum) as adet,item_name FROM items_log GROUP BY vnum HAVING COUNT( * ) > ?) items_log ORDER BY adet DESC");
    $query2 ->execute([
        '5'
    ]);
    $data['popular']=$query2->fetchAll(PDO::FETCH_ASSOC);


    return $data;
}

require admin_view('shop-log');
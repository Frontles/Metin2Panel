<?php


function buy_index()

{
    global $db;

    $epprice= $db->prepare('SELECT * FROM ep_tlconvert');
    $epprice->execute();
    $result['ep_price'] = $epprice->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}


require shop_view('buy-index');
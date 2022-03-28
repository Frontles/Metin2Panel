<?php



function product_em()

{

    global $db;

    $menuresult= $db->prepare('SELECT * FROM shop_menu WHERE status=:status');
    $menuresult->execute(['status' => 0]);
    $result['menu'] = $menuresult->fetchAll(PDO::FETCH_ASSOC);

    $items = $db->prepare('SELECT * FROM items WHERE  durum=:durum');
    $items->execute([ 'durum' => 2]);
    $result['items'] = $items->fetchAll(PDO::FETCH_ASSOC);


    return $result;

}

require shop_view('product-em');
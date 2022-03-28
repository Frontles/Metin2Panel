<?php

function product_discount()

{

    global $db;
    $menuresult= $db->prepare('SELECT * FROM shop_menu WHERE status=:status');
    $menuresult->execute(['status' => 0]);
    $result['menu'] = $menuresult->fetchAll(PDO::FETCH_ASSOC);


    $items = $db->prepare('SELECT * FROM items WHERE discount_status=:discount_status ');
    $items->execute(['discount_status' => 1]);
    $result['items'] = $items->fetchAll(PDO::FETCH_ASSOC);

    return $result;

}


require shop_view('product-discount');
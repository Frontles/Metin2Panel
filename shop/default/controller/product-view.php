<?php


function product_view($arg)

{

    global $db;
    $menusresult= $db->prepare('SELECT * FROM shop_menu WHERE status=:status');
    $menusresult->execute(['status' => 0]);
    $result['menus'] = $menusresult->fetchAll(PDO::FETCH_ASSOC);

    $menuresult= $db->prepare('SELECT * FROM shop_menu WHERE id=:id');
    $menuresult->execute(['id' => $arg]);
    $result['menu'] = $menuresult->fetchAll(PDO::FETCH_ASSOC);

    $items = $db->prepare('SELECT * FROM items WHERE kategori_id=:kategori_id and durum=:durum');
    $items->execute(['kategori_id' => $arg, 'durum' => 1]);
    $result['items'] = $items->fetchAll(PDO::FETCH_ASSOC);

    return $result;

}

require shop_view('product-view');

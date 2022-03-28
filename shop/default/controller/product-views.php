<?php



function product_views($arg)

{

    global $db;
    $menusresult= $db->prepare('SELECT * FROM shop_menu WHERE status=:status');
    $menusresult->execute(['status' => 0]);
    $result['menus'] = $menusresult->fetchAll(PDO::FETCH_ASSOC);

    $allmenu = $db->prepare('SELECT * FROM shop_menu WHERE mainmenu=:mainmenu');

    $allmenu->execute(['mainmenu' => $arg]);
    $result['allMenu'] = $allmenu->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

require shop_view('product-views');
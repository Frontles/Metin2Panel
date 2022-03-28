<?php

if(!permission('shop','show')){
    permission_page();
}
$query = $db->prepare('SELECT * FROM shop_menu');
$query ->execute([]);
$categories=$query->fetchAll(PDO::FETCH_ASSOC);

if (!permission('shop', 'show')){

    permission_page();
}
require admin_view('category-list');
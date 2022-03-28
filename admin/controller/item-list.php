<?php

if(!permission('shop','show')){
    permission_page();
}
$query = $db->prepare('SELECT * FROM items');
$query ->execute([]);
$items=$query->fetchAll(PDO::FETCH_ASSOC);

require admin_view('item-list');
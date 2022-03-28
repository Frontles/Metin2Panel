<?php

if(!permission('shop','show')){
    permission_page();
}
$query = $db->prepare('SELECT * FROM wheel_items');
$query ->execute([]);
$items=$query->fetchAll(PDO::FETCH_ASSOC);


require admin_view('wheel-item-list');
<?php

if(!permission('news','show')){
    permission_page();
}
$query = $db->prepare('SELECT * FROM banner');
$query ->execute([]);
$news=$query->fetchAll(PDO::FETCH_ASSOC);



require admin_view('shop-news-list');
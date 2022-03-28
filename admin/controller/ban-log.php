<?php


$query = $db->prepare('SELECT * FROM ban_list');
$query->execute();
$rows = $query->fetchAll(PDO::FETCH_ASSOC);


if (!permission('logs', 'show')){

    permission_page();
}
require admin_view('ban-log');
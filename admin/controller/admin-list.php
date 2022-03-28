<?php

if(!permission('users','show')){
    permission_page();
}
$query = $db->prepare('SELECT * FROM users');
$query ->execute([]);
$admins=$query->fetchAll(PDO::FETCH_ASSOC);

require admin_view('admin-list');
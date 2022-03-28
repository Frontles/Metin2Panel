<?php


$query = $db->prepare('SELECT * FROM patch');
$query ->execute([]);
$news=$query->fetchAll(PDO::FETCH_ASSOC);

require admin_view('news-list');
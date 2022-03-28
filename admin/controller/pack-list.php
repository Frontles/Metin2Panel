<?php


if (!permission('packs', 'show')) {
    permission_page();
}
$query = $db->prepare('SELECT * FROM pack');
$query->execute([]);
$packs = $query->fetchAll(PDO::FETCH_ASSOC);

require admin_view('pack-list');
<?php


if (!permission('tickets', 'show')) {
    permission_page();
}
$query = $db->prepare('SELECT * FROM ticket_status WHERE status=:status');
$query->execute([
    'status'=>0
]);
$tickets = $query->fetchAll(PDO::FETCH_ASSOC);


require admin_view('read-tickets');
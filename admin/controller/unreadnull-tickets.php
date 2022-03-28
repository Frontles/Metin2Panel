<?php



if (!permission('tickets', 'show')) {
    permission_page();
}
$query = $db->prepare('SELECT * FROM ticket_status WHERE status=:status and whoid=:whoid');
$query->execute([
    'status'=>1,
    'whoid'=>0
]);
$tickets = $query->fetchAll(PDO::FETCH_ASSOC);


require admin_view('unreadnull-tickets');
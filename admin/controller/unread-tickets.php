<?php


$query = $db->prepare('SELECT * FROM ticket_status WHERE status=:status');
$query->execute([
    'status'=>1
]);
$tickets = $query->fetchAll(PDO::FETCH_ASSOC);




if (!permission('tickets', 'show')) {
    permission_page();
}
require admin_view('unread-tickets');

?>

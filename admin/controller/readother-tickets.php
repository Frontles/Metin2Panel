<?php


$adid= session('admin_id');
if (!permission('tickets', 'show')) {
    permission_page();
}
$query = $db->prepare('SELECT * FROM ticket_status WHERE status=:status and whoid !=:whoid');
$query->execute([
    'status'=>0,
    'whoid'=>$adid
]);
$tickets = $query->fetchAll(PDO::FETCH_ASSOC);


require admin_view('readother-tickets');
<?php


$adid= session('admin_id');

$adname=session('admin_name');

$array = [$adid,0];
if (!permission('tickets', 'show')) {
    permission_page();
}
$query = $db->prepare('SELECT * FROM ticket_status WHERE status=:status and whoid!=:whoid and whoname!=:whoname');
 $exec = $query->execute([
    'status'=>1,
     'whoid'=>0,
     'whoname'=> $adname


]);

$tickets = $query->fetchAll(PDO::FETCH_ASSOC);


require admin_view('unreadother-tickets');
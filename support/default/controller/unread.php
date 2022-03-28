<?php

if (settings('ticket_status')== 0){
    header('Location:'. support_url('error'));
}

$aid = session('user_id');



$sth = $db->prepare('SELECT * FROM ticket_status WHERE accountid=:accountid and status=:status ');
$sth->execute([
    'accountid'=>$aid,
    'status'=>1
]);

$count = $sth->rowCount();
$sonuc = $sth->fetchAll(PDO::FETCH_ASSOC);

require support_view('unread');
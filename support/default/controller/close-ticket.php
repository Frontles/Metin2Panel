<?php

$id = get('id');


$control = $db->prepare('SELECT ticketid FROM ticket_status where ticketid=:ticketid');
$control->execute([
    'ticketid'=>$id
]);

if( ($control->rowCount() ) <= 0){
    support_url('error');
    exit;
}else
{
    $sorgu =  $db->prepare('UPDATE ticket_status SET status=:status  WHERE ticketid='. $id);
    $sonuc= $sorgu->execute([
        'status'=>2

    ]);

    if($sonuc){

        header('Location:'. $_SERVER['HTTP_REFERER']);
        exit;
    }
}

if (settings('ticket_status')== 0){
    header('Location:'. support_url('error'));
}

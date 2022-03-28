<?php

if (settings('ticket_status')== 0){
    header('Location:'. support_url('error'));
}

    $aid = session('user_id');

    $ticketid = get('id');
    $ticketControlsor = $db->prepare("SELECT ticketid FROM ticket_status WHERE ticketid = ? and accountid = ? and status != ?", [$ticketid, $aid, '2']);

    if (($ticketControlsor->rowCount()) < 0) {

        header('Location:'. support_url('errors/index'));
        exit;

    } else {

        $sth  = $db->prepare('SELECT * FROM tickets WHERE ticketid=:ticketid and accountid=:accountid');
        $sth->execute([
           'ticketid'=>$ticketid,
           'accountid'=> $aid
        ]);
        $sonuc = $sth->fetchAll(PDO::FETCH_ASSOC);

    }



require support_view('ticket-view');

<?php

 function index()

{

    if (settings('ticket_status')== 0){
        header('Location:'. support_url('error'));
    }
    global $account;
    global $db;
    $aID = session('user_id');



    $bansor = $account->prepare('SELECT ticket_ban FROM account WHERE id=:id');
    $bansor->execute([
        'id'=>$aID
    ]);
    @$result['ban']  = $bansor->fetch(PDO::FETCH_ASSOC);



    $titlesor = $db->prepare('SELECT * FROM ticket_title');
    $titlesor->execute([]);
    @$result['title']  = $titlesor->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

require support_view('index');
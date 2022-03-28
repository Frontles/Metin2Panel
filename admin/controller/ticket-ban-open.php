<?php

$arg = get('id');


if (!permission('tickets', 'ban')) {
    permission_page();
}
$control = $account->prepare(' SELECT id FROM account WHERE id=:id');
$control->execute([
    'id'=>$arg
]);
if(($control->rowCount()) <= 0){

    support_url('error');
    exit();
}else{
    $sorgu= $account->prepare('UPDATE account SET ticket_ban=:ticket_ban WHERE id ='. $arg);
    $sonuc = $sorgu->execute([
        'ticket_ban'=>0
    ]);
    if ($sonuc){

        setAdminLog("$arg ID'li Kullanıcının Ticket Banını  Açtı");

        header('Location:'. $_SERVER['HTTP_REFERER']);
        exit();
    }
}

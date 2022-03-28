<?php


$arg = post('id');

$filtre = new Filter();
$aid = session('user_id');

$arg =$filtre->numberFilter($arg);

$message = $filtre->turkishFilter(post('message'));

if ($arg === false || $message === false)
    $json['error'] = "Lütfen özel karakter kullanmayınız!";

else {

$ticketControl = $db->prepare("SELECT ticketid FROM ticket_status WHERE ticketid =:ticketid and accountid =:accountid and status !=:status");
$ticketControl->execute([
 'ticketid'=> $arg,
 'accountid'=> $aid,
 'status' => '2'
]);
$ticketasd= $ticketControl->fetch(PDO::FETCH_ASSOC);


if ( ($ticketControl->rowCount() ) <= 0){

    $json['error'] = "Böyle Bir ticket bulunmamaktadır!";
    print_r($ticketasd);exit;
}
else {


if (strlen($message) < 10){
    $json['error'] = "Mesajınız 10 karakterden kısa olamaz!";

}


else {

$getTicketsor = $db->prepare(' SELECT title ,tarih,whoid FROM ticket_status  WHERE ticketid=:ticketid and accountid=:accountid') ;
 $getTicketsor->execute([
'ticketid'=>$arg,
'accountid'=>$aid
]);
 $getTicket = $getTicketsor->fetch(PDO::FETCH_ASSOC);

$title = $getTicket['title'];

$ticketDate = $getTicket['tarih'];

$whoId = $getTicket['whoid'];

$now = date('Y-m-d H:i:s', time() - 300);

if ($now < $ticketDate)
    $json['error'] = "5 dakika ara ile ticket gönderebilirsiniz!";

else {

$loginsor = $account->prepare('SELECT login FROM account WHERE id=:id ');
$loginsor->execute([
'id'=>$aid
]);

$loginsonuc = $loginsor->fetch(PDO::FETCH_ASSOC);
$login = $loginsonuc['login'];

$sorgu = $db->prepare('INSERT INTO tickets SET
ticketid=:ticketid,
accountid=:accountid,
username=:username,
title=:title,
message=:message,
divs=:divs,
first=:first
');

$sorgu->execute([
'ticketid' => $arg,

'accountid' => $aid,

'username' => $login,

'title' => $title,

'message' => $message,

'divs' => 'user',

'first' => '0'
]);


$update = $db->prepare('UPDATE  ticket_status SET message=:message ,  status=:status , first=:first WHERE ticketid= '. $arg );


$updatesonuc= $update->execute([
'message'=>$message,
'status'=>1,
'first'=>0

]);


if ($updatesonuc){
    $json['success'] = 'Ticket Gönderildi !';

}

if (settings('ticket_mail_status')== 1)
{


//Mail Gönderimi

$getMailsor = $account->prepare('SELECT email FROM account WHERE id=:id');
$getMailsor->execute([
'id'=>$aid
]);
$getMailsonuc= $getMailsor->fetch(PDO::FETCH_ASSOC);

$getMail= $getMailsonuc['email'];

$ticketUrl = support_url('ticket-view?id=' . $arg);

$mailText = "Sayın $login, <br><br> <strong>#$arg</strong> numaralı destek talebiniz tarafımıza ulaşmıştır. En kısa zamanda yönetim ekibi tarafından dönüş sağlanacaktır. Lütfen beklemede kalınız. <br><br>

<strong>Konu : </strong> $title<br>

<strong>Mesaj : </strong>$message<br>

<strong>Ticket Numarası : </strong>: $arg<br>

<strong>Ticket Adresiniz : </strong> : $ticketUrl <br><br>

" . settings('settings_gamename') . " Yönetimi

";

//$this->mail->send(settings('settings_gamename') . ' Ticket Sistemi', $getMail, $this->sablon->sablon1($mailText));

//Mail Gönderimi

}

}

}

}

}




<?php


if (!permission('tickets', 'send')) {
    permission_page();
}
function find_url($string)
{
//"www."
    $pattern_preg1 = '#(^|\s)(www|WWW)\.([^\s<>\.]+)\.([^\s\n<>]+)#sm';
    $replace_preg1 = '\\1<a href="http://\\2.\\3.\\4" target="_blank" class="link">\\2.\\3.\\4</a>';

//"http://"
    $pattern_preg2 = '#(^|[^\"=\]]{1})(http|HTTP|ftp)(s|S)?://([^\s<>\.]+)\.([^\s<>]+)#sm';
    $replace_preg2 = '\\1<a href="\\2\\3://\\4.\\5" target="_blank" class="link">\\2\\3://\\4.\\5</a>';

    $string = preg_replace($pattern_preg1, $replace_preg1, $string);
    $string = preg_replace($pattern_preg2, $replace_preg2, $string);

    return $string;
}

$ticketControl = $db->prepare("SELECT * FROM ticket_status WHERE ticketid=:ticketid ");
$ticketControl->execute([
    'ticketid'=>get('id')




]);

$stat = $ticketControl->fetch(PDO::FETCH_ASSOC);
 function vieww($arg)

{
global $db;


    $ticketControl = $db->prepare("SELECT * FROM ticket_status WHERE ticketid=:ticketid ");
    $ticketControl->execute([
        'ticketid'=>$arg




    ]);

    $stat = $ticketControl->fetch(PDO::FETCH_ASSOC);

    $aid = $stat['accountid'];

    if (($ticketControl->rowCount()) <= 0) {

        header('Location' . support_url('error-index'));
        exit;

    } else {

        $sth = $db->prepare('SELECT * FROM tickets where  ticketid=:ticketid and accountid=:accountid');
        $sth->execute([
            'ticketid'=>$arg,
            'accountid'=>$aid

        ]);
        $sonuc =$sth->fetchAll(PDO::FETCH_ASSOC);

        return $sonuc;

    }

}

$ticket = vieww(get('id'));



$accountID = isset($ticket[0]['accountid']) ? $ticket[0]['accountid'] : 0;

$getBansor = $account->prepare("SELECT ticket_ban FROM account WHERE id = ?");
$getBansor->execute([
    $accountID
]);
$getBansonuc = $getBansor->fetch(PDO::FETCH_ASSOC);

 $getBan = $getBansonuc['ticket_ban'];

 $ticketsor = $db->prepare('SELECT status FROM ticket_status WHERE ticketid=:id');
 $ticketsor->execute([
     'id'=>get('id')
 ]);
 $status = $ticketsor->fetch(PDO::FETCH_ASSOC);



function send($arg)
{

global $db;
global $account;
$sablon = new Sablon();
    $ticketid = post("ticketid");
    if ($arg != $ticketid){
    }else{


        $adId = session('admin_id');
        $aName = session('admin_name');
        $accountid = post("accountid");
        $username = post("username");
        $title = post("title");
        $message = post("message");
        date_default_timezone_set('Europe/Istanbul');
        $date =
        $sorgu = $db->prepare('UPDATE ticket_status SET
            message=:message,
            status=:status,
            first=:first,
            whoid=:whoid,
            whoname=:whoname
            WHERE ticketid=' . $ticketid);

        $sorgu->execute([
            'message'=>$message,
            'status'=>'0',
            'first'=>'0',
            'whoid'=>$adId,
            'whoname'=>$aName
        ]);


        $sorgu2 = $db->prepare(' INSERT INTO tickets SET    
            ticketid=:ticketid,
            accountid=:accountid,
            username=:username,
            title=:title,
            message=:message,
            divs=:divs,
            first=:first');

        $sorgu2->execute([
            'ticketid'=>$ticketid,
            'accountid'=>$accountid,
            'username'=>$aName,
            'title'=>$title,
            'message'=>$message,
            'divs'=>'admin',
            'first'=>'0'
        ]);
        setAdminLog("#$arg ID'li Ticket'ı Cevapladı");
        header('Location:'. $_SERVER['HTTP_REFERER']);

        //Mail Gönderimi

        if(settings('ticket_mail_status')== 1){


        $getMailsor = $account->prepare('SELECT email FROM account WHERE id=:id');
        $getMailsor->execute([
            'id'=>$accountid
        ]);

        $getMailsonuc = $getMailsor->fetch(PDO::FETCH_ASSOC);
        $getMail = $getMailsonuc['email'];
        $ticketUrl = URL. '/support/'.'ticket-view?id='.$arg;

        $mailText = "Sayın $aName, <br><br> <strong>#$arg</strong> numaralı destek talebiniz cevaplanmıştır. <br> ". settings('settings_gamename')." Yönetimi İyi Oyunlar Diler... <br><br> 

                                <strong>Konu : </strong> $title<br>

                                <strong>Mesaj : </strong>$message<br>

                                <strong>Ticket Numarası : </strong>: $arg<br>

                                <strong>Ticket Adresiniz : </strong> : $ticketUrl <br><br>

                                ".settings('settings_gamename')." Yönetimi

                                ";

        sendmail(settings('settings_gamename').' Ticket Sistemi',$getMail,$sablon->sablon1($mailText));

        }
//Mail Gönderimi

    }

}

require admin_view('send-ticket-answer');
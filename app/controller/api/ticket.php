<?php

$filtre = new Filter();

if ($data = form_control()){
    global $filtre;
    global $account;
    global $db;
    $ticket_title = $filtre->numberFilter($_POST['ticket_title']);

    $ticket_content = $filtre->turkishFilter($_POST['message_content']);

    $captcha = $filtre->passwordFilter($_POST['captcha']);

    $randomCode = isset($_SESSION['random_code']) ? $_SESSION['random_code'] : null;

    $captcha_code = md5(Session::get('user_id').$randomCode);

    if ($ticket_title === false || $ticket_content === false || $captcha === false)
        $json['error'] = "Lütfen özel karakter kullanmayınız!";
    elseif (strlen($ticket_content) < 10)
        $json['error'] = "Mesajınız 10 karakterden büyük olmalıdır!";


    else {

        $aId = $_SESSION['user_id'];

        $userControl = $account->prepare('SELECT * FROM account where id=:id');
        $userControl->execute(['id'=>$aId]);
        $count =$userControl->rowCount();

        if ($count <= 0)
        {
            $json['error'] = "Kullanıcı bulunamadı!";
        }else{

            $titleControl = $db->prepare('SELECT * FROM ticket_title where id=:id');
            $titleControl->execute(['id'=>$ticket_title]);
            $titlerow=$titleControl ->fetch(PDO::FETCH_ASSOC);
            $countitle =$titleControl->rowCount();

            if ($countitle <= 0)
            {
                $json['error'] = "Lütfen bir başlık belirleyiniz!";

            }
            else {

                $getLastTicketsor = $db->prepare('SELECT * FROM ticket_status where accountid=:id ORDER BY tarih DESC LIMIT 1');
                $getLastTicketsor->execute(['id' => $aId]);
                $sontarih = $getLastTicketsor->fetch(PDO::FETCH_ASSOC);



                $countlasticket = $getLastTicketsor->rowCount();


                $getLastTicket = $countlasticket > 0 ? $sontarih['tarih'] : "0000-00-00 00:00:00";

                $now = date('Y-m-d H:i:s');
                if (strtotime($now) - strtotime($getLastTicket) < 300)
                    $json['error'] = "5 dakika ara ile ticket gönderebilirsiniz!";

                else

                {

                    $ticketInfo = $titlerow;

                    $cLogin = $_SESSION['user_name'];

                    $ticket_title = $ticketInfo['title'];

                    $ticketID = rand(100000000, 999999999);

                    $ticketsor = $db->prepare('INSERT INTO tickets SET 
                        ticketid=:ticketid,
                        accountid=:accountid,
                        username=:username,
                        title=:title,
                        message=:message,
                        divs=:divs,
                        first=:first');
                     $ticketsor->execute([
                         'ticketid'=>$ticketID,
                         'accountid'=>$aId,
                         'username'=>$cLogin,
                         'title'=>$ticket_title,
                         'message'=>$ticket_content,
                         'divs'=>'user',
                         'first'=>1

                     ]);

                    $tickets = $db->prepare(' INSERT INTO ticket_status SET 
                            ticketid=:ticketid,
                            accountid=:accountid,
                            username=:username,
                            type=:type,
                            title=:title,
                            message=:message,
                            status=:status,
                            first=:first ');
                    $insert = $tickets->execute([
                        'ticketid' => $ticketID,
                        'accountid' => $aId,
                        'username' => $cLogin,
                        'type' => '1',
                        'title' => $ticket_title,
                        'message' => $ticket_content,
                        'status' => '1',
                        'first' => '1'
                    ]);

                    if($insert){
                        $json['success'] = 'Mesajınız Bize İletilmiştir. En kısa Sürede Tarafınıza dönüş sağlanacaktır. İyi oyunlar.';
                    }
                    else{
                        $json['error']=' Bir sorun oluştu ve Mesajınız gönderilemedi. Lütfen daha sonra tekrar deneyin..!';
                    }
                }
            }

        }

    }




}else{
    $json['error']='Lütfen tüm Alanları doldurup tekrar deneyin.';
}
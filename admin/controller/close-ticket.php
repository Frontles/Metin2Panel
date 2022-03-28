<?php


function close_ticket(){
    $id = get('id');

global $db;
global $functions;
    $control = $db->prepare('SELECT ticketid FROM ticket_status where ticketid=:ticketid');
    $control->execute([
        'ticketid'=>$id
    ]);

    if( ($control->rowCount() ) <= 0){
        $result['result'] = false;
        $result['message'] = 'Bu ID \' ye sahip bir kullanıcı bulunamadı !';
    }else
    {
        $sorgu =  $db->prepare('UPDATE ticket_status SET status=:status  WHERE ticketid='. $id);
        $sonuc= $sorgu->execute([
            'status'=>2

        ]);

        if($sonuc){
            $result['result'] = true;
            $result['message'] = 'Ticket Başarıyla Kapatıldı ! Önceki Sayfaya Yönlendiriliyorsunuz...';
            setAdminLog( $id ."ID'li Ticket'ı Kapattı");


        }
    }

       return $result;
}
$closeticket = close_ticket();
if ( isset($closeticket['result']) && $closeticket['result'] == ''): ?>
    <div  class=" alert alert-danger" >
        <?= $closeticket['message']?>
    </div>
<?php endif; ?>
<?php  if (isset($closeticket['result']) && $closeticket['result'] ==true ):  ?>
    <div class=" alert alert-success" role="alert">
        <?= $closeticket['message'] ?>
        <?php header('Refresh:2;url='. $_SERVER['HTTP_REFERER']); ?>
    </div>
<?php endif;
<?php
$eventsorgu= $db->prepare('SELECT * FROM event_list');
$eventsorgu->execute();
$eventsonuc=$eventsorgu->fetchAll(PDO::FETCH_ASSOC);

$functions = new Functions();

function create_event()
{
    global $functions;
    global $db;
    $eventFlag = post('event_flag');
    if ($eventFlag === false || $eventFlag == '0'){

        $result['result'] = false;
        $result['message'] = 'Lütfen Event Tipini Seçiniz !';

    }

    else
    {

        $sorgu = $db->prepare('SELECT * FROM event_list WHERE event_id=:id');
        $sorgu->execute([
            'id'=>$eventFlag,
        ]);
        $get = $sorgu->fetch(PDO::FETCH_ASSOC);

        if (($sorgu->rowCount()) > 0)
        {

            $notice = explode("[END_ENTER]",$get['gameNotice']);
            if (  $sendserver = $functions->sendServer($notice[0])['connect'] === false){

                $result['result'] = false;
                $result['message']= 'Hatalı Seçim veya Oyununuz Kapalı. Lütfen Kontrol edin !';
            } else {
                $flag = $get["eventFlag"];
                $functions->sendServer("$flag 1","EVENT");
                $result['result'] = true;
                $result['message'] = 'Event Açma Başarılı !';
            }
        } else{
            $result['result'] = false;
            $result['message']= 'Bir Sorun Oluştu.';
        }

    }
    return $result;
}
if(!permission('events','event-open')){
    permission_page();
}
require admin_view('add-event');
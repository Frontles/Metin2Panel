<?php

$sorgu= $db->prepare('SELECT * FROM event_list');
$sorgu->execute();
$eventplanla=$sorgu->fetchAll(PDO::FETCH_ASSOC);




function event_plan(){

    global $db;
    $eventflag = post('event_flag');
    $startDate = post('event_startdate');
    $finishDate = post('event_finishdate');
    if ($eventflag == '0' || $startDate == '' || $finishDate == '') {
        $result['result'] = false;
        $result['message'] = 'Eksik Alanlar Var. Lütfen Kontrol Edin !';
    } else {
        $control = $db->prepare('SELECT * FROM event_list WHERE event_flag=:event_flag ');
        $control->execute([
            'event_flag'=>$eventflag
        ]);
        $getEventInfo =$control->fetch(PDO::FETCH_ASSOC);

        $eventFlag = $getEventInfo['event_flag'];
        $eventNotice = $getEventInfo['gameNotice'];
        $eventName = $getEventInfo['event_name'];
        if ($control->rowCount() <= 0) {
            $result['result'] = false;
            $result['message']= 'Event planı oluşturulamadı.' ;
        } else {
            $control2 = $db->prepare('SELECT event_id FROM event_crone WHERE event_startdate=:event_startdate ');
            $control2->execute([
                'event_startdate'=>$startDate
            ]);

            if (($control2->rowCount()) > 0) {
                $result['result'] = false;
                $result['message']= ' Bu Tarihte Planlanmış Bir Event Var Zaten !';
            } else {

                $month = explode(" ", $startDate);
                $month = $month[0];
                $month = explode("-", $month);
                $month = $month[1];
                $day = explode(" ", $startDate);
                $day = $day[0];
                $day = explode("-", $day);
                $day = $day[2];
                $explode = explode(" ", $startDate)[0];
                $dExplode = explode("-", $explode);
                $mExplode = explode(' ',$startDate)[1];
                $mmExplode = explode(':',$mExplode);
                $now = time();
                $start = mktime($mmExplode[0],$mmExplode[1],$mmExplode[2],$month,$day,$dExplode[0]);

                if ($start < $now){
                    $result['result']= false;
                    $result['message']= 'Geçmiş Tarih Girdiniz. Lütfen Başlangıç Tarihini düzeltin.';
                }else{


                $sorgu4 = $db->prepare("INSERT INTO event_crone SET
            event_flag=:event_flag,
            event_startdate=:event_startdate,
            event_name=:event_name,
            event_finishdate=:event_finishdate,
            event_gamenotice=:event_gamenotice,
            event_status=:event_status,
            ay=:ay,
            gun=:gun ");

                $insert=$sorgu4->execute([
                    'event_startdate' => $startDate,
                    'event_flag' => $eventFlag,
                    'event_status' => '0',
                    'event_gamenotice' => $eventNotice,
                    'event_finishdate' => $finishDate,
                    'event_name' => $eventName,
                    'ay' => $month,
                    'gun' => $day
                ]);

                if($insert){
                    setAdminLog("$eventName Eventi Planladı");
                    $result['result'] = true;
                    $result['message'] = 'Event Planlandı !' ;
                }else{
                    $result['result'] = false;
                    $result['message'] = 'Bir Sorun Oluştu ve Event Planlanamadı !' ;
                }

                }
            }
        }
    }
    return $result;



}
if(!permission('events','event-plan')){
    permission_page();
}
require admin_view('event-plan');
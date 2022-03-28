<?php

$eventsorgu= $db->prepare('SELECT * FROM event_crone WHERE event_id=:id');
$eventsorgu->execute([
    'id'=> get('id')
]);
$eventsonuc=$eventsorgu->fetch(PDO::FETCH_ASSOC);



$eventkategorisorgu= $db->prepare('SELECT * FROM event_list');
$eventkategorisorgu->execute();
$eventkategorisonuc=$eventkategorisorgu->fetchAll(PDO::FETCH_ASSOC);


if(!permission('events','edit')){
    permission_page();
}



function edit_event(){

    global $db;
    $eventflag= post('event_flag');
    $startdate = post('event_startdate');
    $finishdate = post('event_finishdate');
    $sorgu2 = $db->prepare('SELECT * FROM event_list WHERE event_flag=:eventflag ');
    $sorgu2->execute([
        'eventflag'=>$eventflag
    ]);
    $row2 =$sorgu2->fetch(PDO::FETCH_ASSOC);
    $eventname = $row2['event_name'];
    $gamenotice = $row2['gameNotice'];
    $explode = explode(" ", $startdate)[0];
    $dExplode = explode("-", $explode);
    $mExplode = explode(' ',$startdate)[1];
    $mmExplode = explode(':',$mExplode);

    $day = $dExplode[2];
    $month = $dExplode[1];
    $now = time();
    $start = mktime($mmExplode[0],$mmExplode[1],$mmExplode[2],$month,$day,$dExplode[0]);

    if ($start < $now){
       $result['result']= false;
       $result['message']= 'Geçmiş Tarih Girdiniz. Lütfen Başlangıç Tarihini düzeltin.';
    }else{
        $sorgu3 = $db->prepare(" UPDATE event_crone SET
    event_flag=:event_flag,
    event_startdate=:event_startdate, 
    event_name=:event_name,
    event_finishdate=:event_finishdate,
    event_gamenotice=:event_gamenotice,
    event_status=:event_status,
    ay=:ay,
    gun=:gun
    WHERE event_id = " . get('id'));

        $update=$sorgu3->execute([
            'event_flag'=> $eventflag,
            'event_startdate'=>$startdate,
            'event_name'=> $eventname,
            'event_finishdate'=>$finishdate,
            'event_gamenotice'=>$gamenotice,
            'event_status'=> 0,
            'gun'=>$day,
            'ay'=>$month

        ]);

        if ($update){
            $result['result'] =true;
            $result['message']= 'Event Başarıyla Düzenlendi !';
        }else{
            $result['result'] =false;
            $result['message']= 'Event Düzenleme İşlemi Başarısız !';
        }
    }

    return $result;
}
require admin_view('edit-event');

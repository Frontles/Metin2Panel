<?php

function event()

{
    global $db;

    $day = filter_var($_GET['day'], FILTER_SANITIZE_URL);

    if (strlen($day) == 1) {

        $day = '0' . $day;

    }

    $date = new DateTime(date("Y-m-d H:i:s"));

    $month = $date->format('m');

    $getCronesor = $db->prepare('SELECT event_startdate,event_finishdate,event_name FROM event_crone WHERE ay=:ay and gun=:gun');
    $getCronesor->execute([
        'ay' => $month,
        'gun' => $day
    ]);
    $getCrone = $getCronesor->fetch(PDO::FETCH_ASSOC);

    if ($getCrone != null) {

        $startDate = strtotime($getCrone['event_startdate']);

        $finishDate = strtotime($getCrone['event_finishdate']);

        $eventName = $getCrone['event_name'];

        echo '[{"name":"' . $eventName . '","timestamp":' . $startDate . ',"timestamp2":' . $finishDate . '}]';

    } else {

        echo '[{"name":"Event Yok","timestamp":"" ,"timestamp2":""}]';

    }


}


require view('event-index');
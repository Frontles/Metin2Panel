<?php

$filter = new Filter();



if(!permission('sockets','open-drop')){
    permission_page();
}
function drop_open()
{

    $functions = new Functions();
    global $filter;
    $flag = $filter->numberFilter($_POST['drop_flag']);
    $type = $filter->numberFilter($_POST['drop_type']);
    $rate = $filter->numberFilter($_POST['drop_rate']);
    $time = $filter->numberFilter($_POST['drop_time']);

    if ($flag === false || $type === false || $rate === false || $time === false){
        $result['result'] = false;
        $result['message'] = 'Bilgileri Kontrol Edin !';
    }

    else
    {

        // SENDSERVER KONTROL EDİLECEK BURASIDA OKEY
        if ($type === '0') {
            Functions::sendServer("0 1 $rate $time","PRIV_EMPIRE");
            Functions::sendServer("0 2 $rate $time","PRIV_EMPIRE");
            Functions::sendServer("0 3 $rate $time","PRIV_EMPIRE");
            Functions::sendServer("0 4 $rate $time","PRIV_EMPIRE");
        }
        else{

            $functions->sendServer("$flag $type $rate $time","PRIV_EMPIRE");

        }
        $result['result'] = true;
        $result['message'] = 'Drop Açıldı !';
    }

return $result;
}

require admin_view('socket-drop');
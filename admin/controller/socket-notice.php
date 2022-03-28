<?php

if(!permission('sockets','notice')){
    permission_page();
}

function noticeset(){

    $functions = new Functions();
    $notice = post('notice');

    if ($notice == ''){

        $result['result'] = false;
        $result['message'] = 'Duyuru Alanı Boş Bırakılamaz !';

    }elseif (strlen($notice) > 100){

        $result['result'] = false;
        $result['message'] = 'Duyuru En Fazla 100 Karakter Olabilir !';

    }else{

        // BURADA KALDIIK DÜZELTME YAPMALIYIZ SENDSERVER SETADMİNLOG

       $functions->sendServer($notice);

        setAdminLog("$notice Duyuru geçti");

        $result['result'] = true;
        $result['message'] = 'Duyuru Yapıldı !';

    }

  return  $result;

}
require admin_view('socket-notice');
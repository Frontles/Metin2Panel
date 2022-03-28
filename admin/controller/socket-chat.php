<?php

$filtre = new Filter();

if(!permission('sockets','chat-ban')){
    permission_page();
}

function chatset()

{
    global $filtre;
    global $player;
    $functions = new Functions();

    $time = post('time');

    $name = $filtre->mainFilter(post('name'));

    if ($time == '' || $name == ''){
        $result['result'] = false;
        $result['message'] = ' Eksik Alanlar Var. Lütfen Kontrol Edin !';

    }else{

        $control = $player->prepare('SELECT name FROM player WHERE name=:name');
        $control->execute([
            'name'=>$name
        ]);

        if ($control->rowCount() < 1){

            $result['result'] = false;
            $result['message'] = ' Oyuncu Bulunamadı !';

        }else{

            // TÜM SOCKETLARI KONTROL ET SON AŞAMADAYIZ SOCKETLERDE
            $functions->sendServer($name.' '.$time,"BLOCK_CHAT");

            setAdminLog("$name isimli kullanıcıya $time süre chat ban attı");

            $result['result'] = true;
            $result['message'] = 'Chat Ban Atıldı !' ;

        }

    }

     return $result;

}

require admin_view('socket-chat');

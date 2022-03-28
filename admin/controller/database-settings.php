<?php

function updatedbkey(){
    global $db;
    $key = post('key');
    if($key == ''){
        $result['result'] = false;
    }else{
        $result['result'] = true;
        $result['data'] = $key;
       $sorgu = $db->prepare('UPDATE settings SET dbkey_new=:dbkey_new WHERE settings_id=1');
        $sorgu->execute(['dbkey_new'=>$key]);
       setAdminLog("Oyun Database Keyini Güncelledi");
    }
    return $result;
}

if(!permission('database-settings','show') && (!permission('database-settings','edit'))){
    permission_page();
}
require admin_view('database-settings');
<?php




function updatedb(){

    global $db;
    $ip = post('ip');
    $user = post('user');
    $password = post('password');
    $key = settings('dbkey_new');
    $dbname = post('dbname');
    if ($ip == '' || $user == '' ){
        $result['result'] = false;
    }else{
        $result['result'] = true;
        $result['data'] = array($ip,$user,$password);
       
        $sorgu = $db->prepare('UPDATE settings SET 
            db_ip=:db_ip,
            db_user=:db_user,
            db_password=:db_password,
            dbkey_new=:dbkey_new,
            dbkey=:dbkey,
            db_name=:db_name');
        $sorgu->execute([
            'db_ip'=>$ip,
            'db_user'=>$user,
            'db_password'=>$password,
            'dbkey'=>settings('dbkey_new'),
            'dbkey_new'=>0,
            'db_name'=>$dbname

        ]);

        setAdminLog("Oyun Database Bilgilerini Güncelledi");
    }
    return $result;
}

if(!permission('database-settings','show') && (!permission('database-settings','edit'))){
    permission_page();
}
require admin_view('database-settings2');
<?php

function admin_controller ($controllerName){

    $controllerName = strtolower($controllerName);
    return PATH . '/admin/controller/' . $controllerName . '.php';
}

function admin_view ($viewName){

    $viewName = strtolower($viewName);
    return PATH . '/admin/view/' . $viewName . '.php';
}

function admin_url($url=false){
    return URL .'/admin/' . $url;
}

function admin_public_url($url=false){
    return URL .'/admin/public' . $url;
}

function user_ranks($rankId=null){
    $ranks= [
        1=>'Yönetici',
        2=>'Moderatör',
        4=>'Ticket Yetkilisi'
    ];
    return $rankId ? $ranks[$rankId]: $ranks;
}
 function eventList()

{

    return ["socket_moon", "socket_hexa", "socket_valentine", "socket_valentine2", "socket_halloween", "socket_mount", "socket_football", "socket_puzzle"];

}
function permission($url,$action){
    $permissions = json_decode(session('user_permissions'),true);
    if (isset($permissions[$url][$action]))
        return true;
    return false;
}

function permission_page(){
    header('Location:'. admin_url('permission-denied'));
    exit;
}

function setAdminLog($content)

{
    global $db;

    $id = session_get('admin_id');

    $name = session_get('admin_name');


    date_default_timezone_set('Asia/Bahrain');

    $setLog = $db->prepare("INSERT INTO admin_log SET user_id=:user_id,user_name=:user_name,content=:content ");

    $setLog->execute([
        'user_id'=>$id,
        'user_name'=>$name,
        'content'=>$content

    ]);

}





function totalYang($accountid)
{

    global $player;

    $sth = $player->prepare("SELECT SUM(gold) as toplam FROM player WHERE account_id=:account_id");

    $sth->execute([
        'account_id'=>$accountid
    ]);

    $sthsonuc = $sth->fetch(PDO::FETCH_ASSOC);

    return $sthsonuc['toplam'];

}

function logConvert($type)

{

    if ($type == 0)

        $result = 'Çıkış';

    elseif ($type == 1)

        $result = 'Giriş';



    return $result;

}

function inDecode($value,$key){
	// echo $value;
	// echo "<hr>"; // şifre hatalı diyor ben kendimden kopyalıyorum yapıştırdım sanıyorum meğersem kopyalamıyormuş benden :)
	return $value;
	$decode = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($value), MCRYPT_MODE_CBC, md5(md5($key))), "\0");

	return $decode;

}


function sendServer($text, $type = "NOTICE", $port = "1")	{
    
    if (settings('socket_status')) {
       
        if (!function_exists("socket_create")) {
             
            $return['function'] = false;
            $return['connect'] = false;
            $return['data'] = false;
        } else {			
        $return['function'] = true;
        $serverIP = settings('db_ip');
        $serverResponse = settings('socket_response');
        $port = settings('socket_ch' . $port . 'port');
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        
        if ($socket < 0)
            $return = ['data' => "Geçersiz Socket Tanımı", 'connect' => false, "function" => true];
        else {
            
            $socketConnect = @socket_connect($socket, $serverIP, $port);
            if ($socketConnect == false)
                $return = ['connect' => false, "data" => "Bağlantı Başarısız", "function" => true];
            else {
                
                $return['connect'] = true;
                if ($type == "NOTICE")
                    $command = "NOTICE $text";
                elseif ($text == false)
                    $command = "$type";
                else
                    $command = "$type $text";
                $command = iconv("UTF-8", "WINDOWS-1254//TRANSLIT", $command);
                $query2 = "\x40$serverResponse\x0A";
                $query_size2 = strlen($query2);
                socket_write($socket, $query2, $query_size2);
                socket_recv($socket, $result2, 256, 0);
                $query = "\x40" . $command . "\x0A";
                $query_size = strlen($query);
                $query_result = socket_write($socket, $query, $query_size);
                if ($query_result < 0)
                    $return['data'] = socket_strerror($query_result);
                else {
                    socket_recv($socket, $result2, 256, 0);
                    if ($result2 == "OK")
                        $return['data'] = "OK";
                    else {
                        if ($text == false && $type == "USER_COUNT")
                            $return['data'] = explode(" ", $result2)[0];
                        else
                            $return['data'] = $result2;
                    }
                }
            }
        }
        socket_close($socket);
        }
        return $return;
    } else
        return false;
}


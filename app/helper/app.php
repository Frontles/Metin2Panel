<?php


$ayarsorgu= $db->prepare("SELECT * FROM settings WHERE settings_id =:id ");
$ayarsorgu->execute([
    'id'=> 1
]);
$ayarsonuc= $ayarsorgu->fetch(PDO::FETCH_ASSOC);
function GetIP()

{
    if (getenv("HTTP_CLIENT_IP")) {

        $ip = getenv("HTTP_CLIENT_IP");

    } elseif (getenv("HTTP_X_FORWARDED_FOR")) {

        $ip = getenv("HTTP_X_FORWARDED_FOR");

        if (strstr($ip, ',')) {

            $tmp = explode(',', $ip);

            $ip = trim($tmp[0]);

        }

    } else {

        $ip = getenv("REMOTE_ADDR");

    }
    return $ip;
}


function settings($name){
    global $ayarsonuc;
    return isset($ayarsonuc[$name]) ? $ayarsonuc[$name] : "";
}

function controller ($controllerName){

    $controllerName = strtolower($controllerName);
    return PATH . '/app/controller/' . $controllerName . '.php';
}

function view ($viewName){
    $viewName = strtolower($viewName);
    return PATH . '/app/view/' . settings('settings_theme') . '/' . $viewName . '.php';
}

function data_items($itemName){
    return URL . '/data/items/' . $itemName;
}

function route ($index){
    global $route;
    return isset ($route[$index]) ? $route[$index] : false;

}

function session($name){
    return isset($_SESSION[$name]) ? $_SESSION[$name]:false;
}

 function session_set($key, $value)
{
    if (is_array($value))

        $_SESSION[$key] = $value;

    else

        $_SESSION[$key] = filter_var($value,FILTER_SANITIZE_STRING);

}

 function session_get($key)
{
    if (isset($_SESSION[$key]))
        return $_SESSION[$key];
}


function timeConvert ( $zaman ){
    $zaman =  strtotime($zaman);
    $zaman_farki = time() - $zaman;
    $saniye = $zaman_farki;
    $dakika = round($zaman_farki/60);
    $saat = round($zaman_farki/3600);
    $gun = round($zaman_farki/86400);
    $hafta = round($zaman_farki/604800);
    $ay = round($zaman_farki/2419200);
    $yil = round($zaman_farki/29030400);
    if( $saniye < 60 ){
        if ($saniye == 0){
            return "az önce";
        } else {
            return $saniye .' saniye önce';
        }
    } else if ( $dakika < 60 ){
        return 'yaklaşık ' .$dakika .' dakika önce';
    } else if ( $saat < 24 ){
        return  'yaklaşık ' . $saat.' saat önce';
    } else if ( $gun < 7 ){
        return 'yaklaşık ' . $gun .' gün önce';
    } else if ( $hafta < 4 ){
        return  'yaklaşık ' . $hafta.' hafta önce';
    } else if ( $ay < 12 ){
        return 'yaklaşık ' . $ay .' ay önce';
    } else {
        return 'yaklaşık ' . $yil.' yıl önce';
    }
}


function resim_yukle($dosya, $boyutLimit = 1, $dosya_uzantilari = null)
{

    if ($dosya['error'] == 4){
        $result['result'] = false;
        $result['message'] = 'Lütfen dosyanızı seçin.';
    } else {

        if (is_uploaded_file($dosya['tmp_name'])){

            $uzanti = explode('.', $dosya['name']);
            $uzanti = $uzanti[1];

            $gecerli_dosya_uzantilari = $dosya_uzantilari ? $dosya_uzantilari : [
                'image/jpeg',
                'image/png',
                'image/gif'
            ];

            $gecerli_dosya_boyutu = (1024 * 1014) * $boyutLimit;

            $dosya_uzantisi = $dosya['type'];

            if (in_array($dosya_uzantisi, $gecerli_dosya_uzantilari)){

                if ($gecerli_dosya_boyutu >= $dosya['size']){

                    $ad = uniqid();

                    $uploads_dir = PATH .'/data/upload/';


                    $refimgyol = $uploads_dir. $ad . '.' . $uzanti ;

                    $resimyol = 'data/upload/' . $ad . '.'. $uzanti;



                    $yukle = move_uploaded_file($dosya['tmp_name'], $refimgyol);

                    if ($yukle){

                        $result['result'] = true;
                        $result['yol'] = $resimyol;
                    } else {
                        $result['result'] = false;
                        $result['message'] = 'Bir sorun oluştu ve dosyanız yüklenemedi.';
                    }

                } else {
                    $result['result'] = false;
                    $result['message'] = 'Yükleyeceğiniz dosya en fazla 3MB olabilir.';
                }

            } else {
                $result['result'] = false;
                $result['message'] = 'Yüklediğiniz dosya geçerli bir formatta değil.';
            }

        } else {
            $result['result'] = false;
            $result['message'] = 'Dosya yüklenirken bir sorun oluştu.';
        }
    }
    return $result;
}


function setplayerlog($type,$content)

{
    global $db;

    $id = session_get('user_id');

    $name = session_get('user_name');

    $ip = GetIP();

    date_default_timezone_set('Asia/Bahrain');

    $setLog = $db->prepare("INSERT INTO player_log SET
        account_id=:account_id,
        login=:login,
        content=:content,
        ip=:ip,
        type=:type ");

    $setLog->execute([
        'account_id'=>$id,
        'login'=>$name,
        'content'=>$content,
        'ip'=>$ip,
        'type'=>$type

    ]);

}


function setloginlog($type)

{
    global $db;

    $id = session_get('user_id');

    $name = session_get('user_name');

    $ip = GetIP();

    date_default_timezone_set('Asia/Bahrain');

    $setLog = $db->prepare("INSERT INTO login_log SET
        account_id=:account_id,
        login=:login,
        ip=:ip,
        type=:type ");

    $setLog->execute([
        'account_id'=>$id,
        'login'=>$name,
        ':ip'=>$ip,
        'type'=>$type

    ]);

}




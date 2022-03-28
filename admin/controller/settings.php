<?php

if (!permission('settings', 'show')) {
    permission_page();
}

$functions = new Functions();
try {
// SAYAC AYARLARI
    function sayacsettings(){

        global $db;

        $sorgu = $db->prepare("UPDATE settings SET
 total_online_status=:total_online_status , 
 settings_onlineplayer=:settings_onlineplayer,
 today_login_status=:today_login_status , 
 settings_dailyplayer=:settings_dailyplayer,
 total_account_status=:total_account_status , 
 settings_accounts=:settings_accounts,
 total_player_status=:total_player_status , 
 settings_characters=:settings_characters,
 active_pazar_status=:active_pazar_status, 
 settings_onlinebazaar=:settings_onlinebazaar
 
 
 WHERE settings_id=1");

        $update = $sorgu->execute([
            'total_online_status' => post('total_online_status'),
            'settings_onlineplayer' => post('settings_onlineplayer'),
            'today_login_status' => post('today_login_status'),
            'settings_dailyplayer' => post('settings_dailyplayer'),
            'total_account_status' => post('total_account_status'),
            'settings_accounts' => post('settings_accounts'),
            'total_player_status' => post('total_player_status'),
            'settings_characters' => post('settings_characters'),
            'active_pazar_status' => post('active_pazar_status'),
            'settings_onlinebazaar' => post('settings_onlinebazaar')


        ]);

        if ($update) {
            $result['result'] = true;
            $result['message'] = 'Güncelleme Başarılı !';
        } else {
            $result['result'] = false;
            $result['message'] = ' Bir Sorun Oluştu';


        }
        return $result;

    }
// ONLİNE SAYISI AYARLARI
    function online_sayisi()
    {
        global $functions;
        global $player;
        if (settings('socket_status') == 1) {

            $ch1 = $functions->sendServer(false, "USER_COUNT", "1");
            $ch2 = $functions->sendServer(false, "USER_COUNT", "2");
            $ch3 = $functions->sendServer(false, "USER_COUNT", "3");
            $ch4 = $functions->sendServer(false, "USER_COUNT", "4");
            $return = ["ch1" => $ch1, "ch2" => $ch2, "ch3" => $ch3, "ch4" => $ch4];
        } else {
            $sorgu = $player->prepare("SELECT COUNT(id) as count FROM player.player WHERE DATE_SUB(NOW(), INTERVAL 60 MINUTE) < last_play;");
            $sorgu->execute([0]);
            $return = $sorgu->fetchAll(PDO::FETCH_ASSOC);
            
        }
        return $return;
    }

// ÇARK AYARLARI
    function wheel()  {

        global $db;

        $sorgu = $db->prepare("UPDATE settings SET
 settings_wheel=:settings_wheel, 
 settings_wheel_coins=:settings_wheel_coins

 WHERE settings_id = 1");

        $update = $sorgu->execute([
            'settings_wheel' => post('settings_wheel'),
            'settings_wheel_coins' => post('settings_wheel_coins')

        ]);

        if ($update) {
            $result['result'] = true;
            $result['message'] = 'Güncelleme Başarılı !';
        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }

        return $result;
    }

// RECAPTCHA AYARLARI
    function recaptcha()  {
        global $db;

        $sorgu = $db->prepare("UPDATE settings SET
 recaptcha_status=:recaptcha_status, 
 recaptcha_sitekey=:recaptcha_sitekey,
 recaptcha_secretkey=:recaptcha_secretkey

 WHERE settings_id = 1");

        $update = $sorgu->execute([
            'recaptcha_status' => post('recaptcha_status'),
            'recaptcha_sitekey' => post('recaptcha_sitekey'),
            'recaptcha_secretkey' => post('recaptcha_secretkey')

        ]);

        if ($update) {
            $result['result'] = true;
            $result['message'] = 'Güncelleme Başarılı !';
        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }

        return $result;
    }

// EP-TL AYARLARI
    function add_eptl() {

        global $db;

        $sorgu = $db->prepare("INSERT INTO ep_tlconvert SET
 ep_miktar=:ep_miktar , 
 tl_miktar=:tl_miktar
 ");

        $insert = $sorgu->execute([
            'ep_miktar' => post('ep_miktar'),
            'tl_miktar' => post('tl_miktar')

        ]);

        if ($insert) {
            $result['result'] = true;
            $result['message'] = 'EP Fiyatlandırma Başarılı !';
        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }

        return $result;
    }


// TICKET AYARLARI

    function edit_ticket()  {

        global $db;

        $sorgu = $db->prepare("UPDATE settings SET
 ticket_status=:ticket_status, 
 ticket_mail_status=:ticket_mail_status

 WHERE settings_id = 1");

        $update = $sorgu->execute([
            'ticket_status' => post('ticket_status'),
            'ticket_mail_status' => post('ticket_mail_status')

        ]);

        if ($update) {
            $result['result'] = true;
            $result['message'] = 'Güncelleme Başarılı !';
        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }

        return $result;
    }

    function addtickettitle()  {

        global $db;

        $sorgu = $db->prepare("INSERT INTO ticket_title SET title=:title ");

        $update = $sorgu->execute([
            'title' => post('title')
        ]);

        if ($update) {
            $result['result'] = true;
            $result['message'] = 'Ekleme Başarılı !';
        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }

        return $result;
    }
    //İtemci AYARLARI
    function itemci() {

        global $db;

        $sorgu = $db->prepare("UPDATE settings SET
 itemci_status=:itemci_status, 
 itemci_link=:itemci_link,
 itemci_commission=:itemci_commission

 WHERE settings_id = 1");

        $update = $sorgu->execute([
            'itemci_status' => post('itemci_status'),
            'itemci_link' => post('itemci_link'),
            'itemci_commission' => post('itemci_commission')

        ]);

        if ($update) {
            $result['result'] = true;
            $result['message'] = 'Güncelleme Başarılı !';
        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }
        return $result;
    }
    // PAYWANT AYARLARI
    function paywant() {

        global $db;

        $sorgu = $db->prepare("UPDATE settings SET
 paywant_status=:paywant_status, 
 paywant_apikey=:paywant_apikey,
 paywant_secretkey=:paywant_secretkey

 WHERE settings_id = 1");

        $update = $sorgu->execute([
            'paywant_status' => post('paywant_status'),
            'paywant_apikey' => post('paywant_apikey'),
            'paywant_secretkey' => post('paywant_secretkey')

        ]);

        if ($update) {
            $result['result'] = true;
            $result['message'] = 'Güncelleme Başarılı !';
        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }
        return $result;
    }


    // PAYREKS AYARLARI
    function payreks() {

        global $db;

        $sorgu = $db->prepare("UPDATE settings SET
 payreks_status=:payreks_status, 
 payreks_apikey=:payreks_apikey,
 payreks_secretkey=:payreks_secretkey

 WHERE settings_id = 1");

        $update = $sorgu->execute([
            'payreks_status' => post('payreks_status'),
            'payreks_apikey' => post('payreks_apikey'),
            'payreks_secretkey' => post('payreks_secretkey')

        ]);

        if ($update) {
            $result['result'] = true;
            $result['message'] = 'Güncelleme Başarılı !';
        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }

        return $result;
    }


    // OYUN ALIŞVERİŞ AYARLARI
    function oyunalisveris() {

        global $db;

        $sorgu = $db->prepare("UPDATE settings SET
 gameshop_status=:gameshop_status, 
 gameshopping_link=:gameshopping_link

 WHERE settings_id = 1");

        $update = $sorgu->execute([
            'gameshop_status' => post('gameshop_status'),
            'gameshopping_link' => post('gameshopping_link')

        ]);

        if ($update) {
            $result['result'] = true;
            $result['message'] = 'Güncelleme Başarılı !';
        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }

        return $result;
    }

    // MARKET AYARLARI
    function shopedit() {

        global $db;

        $sorgu = $db->prepare("UPDATE settings SET
        shop_status=:shop_status, 
        gamekey=:gamekey,
        shop_happyhourstatus=:shop_happyhourstatus, 
        shop_happyhour=:shop_happyhour,
        offline_shop_item=:offline_shop_item,
        offline_shop_npc=:offline_shop_npc
       

        WHERE settings_id = 1");

        $update = $sorgu->execute([
            'shop_status' => post('shop_status'),
            'gamekey' => post('gamekey'),
            'shop_happyhourstatus' => post('shop_happyhourstatus'),
            'shop_happyhour' => post('shop_happyhour'),
            'offline_shop_item' => post('offline_shop_item'),
            'offline_shop_npc' => post('offline_shop_npc')

        ]);

        if ($update) {

            $result['result'] = true;
            $result['message'] = 'Güncelleme Başarılı !';
        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }

        return $result;
    }

    // SOCKET AYARLARI
    function socketsettings() {

        global $db;

        $sorgu = $db->prepare("UPDATE settings SET

 socket_ch1port=:socket_ch1port, 
 socket_ch2port=:socket_ch2port,
 socket_ch3port=:socket_ch3port,
 socket_ch4port=:socket_ch4port,
 socket_status=:socket_status,
 socket_response=:socket_response
 
 WHERE settings_id = 1");

        $update = $sorgu->execute([
            'socket_ch1port' => post('socket_ch1port'),
            'socket_ch2port' => post('socket_ch2port'),
            'socket_ch3port' => post('socket_ch3port'),
            'socket_ch4port' => post('socket_ch4port'),
            'socket_status' => post('socket_status'),
            'socket_response' => post('socket_response')
        ]);

        if ($update) {
            $result['result'] = true;
            $result['message'] = 'Güncelleme Başarılı !';
        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }

        return $result;
    }

// LINK AYARLARI
    function linksettings()  {

        global $db;

        $sorgu = $db->prepare("UPDATE settings SET
 settings_facebook=:settings_facebook , 
 settings_youtube=:settings_youtube,
 settings_discord=:settings_discord ,
 settings_instagram=:settings_instagram
 WHERE settings_id=1");

        $update = $sorgu->execute([
            'settings_facebook' => post('settings_facebook'),
            'settings_youtube' => post('settings_youtube'),
            'settings_discord' => post('settings_discord'),
            'settings_instagram' => post('settings_instagram')
        ]);

        if ($update) {
            $result['result'] = true;
            $result['message'] = 'Güncelleme Başarılı !';
        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }

        return $result;
    }


// SMTP SETTINGS
    function smtpsettings()  {

        global $db;

        $sorgu = $db->prepare("UPDATE settings SET
 settings_smtpfrom=:settings_smtpfrom , 
 settings_smtphost=:settings_smtphost,
 settings_smtpuser=:settings_smtpuser ,
 settings_smtppassword=:settings_smtppassword,
 settings_smtpport=:settings_smtpport,
 settings_smtpsecure=:settings_smtpsecure
 
 WHERE settings_id=1");

        $update = $sorgu->execute([
            'settings_smtpfrom' => post('settings_smtpfrom'),
            'settings_smtphost' => post('settings_smtphost'),
            'settings_smtpuser' => post('settings_smtpuser'),
            'settings_smtppassword' => post('settings_smtppassword'),
            'settings_smtpport' => post('settings_smtpport'),
            'settings_smtpsecure' => post('settings_smtpsecure')
        ]);

        if ($update) {
            $result['result'] = true;
            $result['message'] = 'Güncelleme Başarılı !';

        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }
        return $result;
    }


    // BAKIM MODU AYARLARI
    function maintenancesettings() {

        global $db;

        $sorgu = $db->prepare("UPDATE settings SET
            settings_maintenance_title=:settings_maintenance_title , 
            settings_maintenance_text=:settings_maintenance_text,
            settings_maintenancemode=:settings_maintenancemode
            WHERE settings_id=1");

        $update = $sorgu->execute([
            'settings_maintenance_title' => post('settings_maintenance_title'),
            'settings_maintenance_text' => post('settings_maintenance_text'),
            'settings_maintenancemode' => post('settings_maintenancemode')

        ]);

        if ($update) {

            $result['result'] = true;
            $result['message'] = 'Güncelleme Başarılı !';


        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }


        return $result;
    }
// GENEL  AYARLAR

    function general_settings() {

        global $db;

        $resim = resim_yukle($_FILES['settings_logo']);


        if ($resim['result'] == 1){
            $yol = $resim['yol'];
        }else{
            $yol = null;
        }


        if (post('settings_theme') == '0'){
            $result['result']= false;
            $result['message'] = 'Lütfen Site Teması Seçiniz !';
        }else{

        $sorgu = $db->prepare("UPDATE settings SET
        settings_title=:settings_title , 
        settings_description=:settings_description,
        settings_keywords=:settings_keywords ,
        settings_author=:settings_author,
        settings_logo=:settings_logo,
        settings_theme=:settings_theme,
        settings_gameslogan=:settings_gameslogan,
        settings_gamename=:settings_gamename
        WHERE settings_id=1");

        $update = $sorgu->execute([
            'settings_title' => post('settings_title'),
            'settings_description' => post('settings_description'),
            'settings_keywords' => post('settings_keywords'),
            'settings_author' => post('settings_author'),
            'settings_theme' => post('settings_theme'),
            'settings_gameslogan' => post('settings_gameslogan'),
            'settings_gamename' => post('settings_gamename'),
            'settings_logo' => strlen($yol)> 5 ? $yol : post('eski_yol')
        ]);

        if ($update) {

            if ($resim['result'] == true) {
                $resimsil = post('eski_yol');
                unlink($resimsil);
            }
            $result['result'] = true;
            $result['message'] = 'Güncelleme Başarılı !';

        }else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu !';
        }

        }


        return $result;
    }
    $themes = [];
    foreach (glob(PATH . '/app/view/*/') as $folder) {
        $folder = explode('/', rtrim($folder, '/'));
        $themes[] = end($folder);

    }

} catch (UnexpectedValueException $e) {
    echo $e->getMessage();
}


require admin_view('settings');
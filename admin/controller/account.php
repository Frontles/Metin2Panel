<?php

if (!permission('accounts', 'edit')) {
    permission_page();
}
function account($arg)
{
    $filtre = new Filter();

    global $account;
    global $player;
    global $db;
    $login = $filtre->numberFilter($arg);
    if ($login == false) {
        header('Location:' . admin_url('errors/index'));
    } else {
        $control = $account->prepare(' SELECT id FROM account WHERE id=:id');
        $control->execute([
            'id' => $login
        ]);
        if (($control->rowCount()) <= 0) {
            $result['result'] = false;
            header('Location:'. admin_url('index'));
            exit;
        } else {

            setAdminLog("$arg ID'lı Kullanıcının Profilini İnceledi");
            $result['result'] = true;
            //Account İnfo
            $hesapsor = $account->prepare(' SELECT id,login,real_name,social_id,email,phone1,ip,create_time,status,availDt, cash,mileage FROM account WHERE id=:id ');
            $hesapsor->execute([
                'id' => $login
            ]);
            $result['account'] = $hesapsor->fetch(PDO::FETCH_ASSOC);

            $account_id = $result['account']['id'];
            //Player İnfo
            $resultplayer = $player->prepare("SELECT player.id,player.`name`,player.job,player.`level`,player.ip,player.last_play,player_index.empire,safebox.`password` as depo FROM player.player
LEFT JOIN player.player_index ON player.player_index.pid1 = player.id
OR player.player_index.pid2 = player.id
OR player.player_index.pid3 = player.id
OR player.player_index.pid4 = player.id
LEFT JOIN player.safebox ON player.safebox.account_id = ?
WHERE player.account_id = ?", [$account_id, $account_id]);
            $resultplayer->execute([$account_id, $account_id]);
            $result['player'] = $resultplayer->fetchAll(PDO::FETCH_ASSOC);

            //Depo İnfo

            $resultdepo = $player->prepare("SELECT item.id,item.count,item.vnum,item.socket0,item.socket1,item.socket2,item.attrtype0,item.attrtype1,item.attrtype2,item.attrtype3,item.attrtype4,item.attrtype5,item.attrtype6,item.attrvalue0,item.attrvalue1,item.attrvalue2,item.attrvalue3,item.attrvalue4,item.attrvalue5,item.attrvalue6,player.item_proto.locale_name as name,player.item_proto.size FROM player.item
LEFT JOIN player.item_proto ON player.item_proto.vnum = player.item.vnum
WHERE owner_id = ? AND window = ?");
            $resultdepo->execute([$account_id, 'SAFEBOX']);
            $result['depo'] = $resultdepo->fetchAll(PDO::FETCH_ASSOC);



            //Nesne İnfo
            $resultnesne = $player->prepare("SELECT item.id,item.count,item.vnum,item.socket0,item.socket1,item.socket2,item.attrtype0,item.attrtype1,item.attrtype2,item.attrtype3,item.attrtype4,item.attrtype5,item.attrtype6,item.attrvalue0,item.attrvalue1,item.attrvalue2,item.attrvalue3,item.attrvalue4,item.attrvalue5,item.attrvalue6,player.item_proto.locale_name as name,player.item_proto.size FROM player.item
LEFT JOIN player.item_proto ON player.item_proto.vnum = player.item.vnum
WHERE owner_id = ? AND window = ?");
            $resultnesne->execute([$account_id, 'MALL']);
            $result['nesne'] = $resultnesne->fetchAll(PDO::FETCH_ASSOC);

            //Market İnfo

            $resultmarket = $db->prepare(' SELECT id,vnum,item_name,coins,adet,tarih,tur FROM items_log WHERE account_id=:account_id');
            $resultmarket->execute([
                'account_id' => $account_id
            ]);
            $result['market'] = $resultmarket->fetchAll(PDO::FETCH_ASSOC);

            //Giriş Log
            $resultloginlog = $db->prepare(' SELECT ip,date,type FROM login_log WHERE account_id=:account_id');
            $resultloginlog->execute([
                'account_id' => $account_id
            ]);
            $result['loginLog'] = $resultloginlog->fetchAll(PDO::FETCH_ASSOC);

            //Game Giriş Log
            $resultgamelog = $account->prepare(' SELECT type,login_time,channel,pid,ip,logout_time,playtime FROM log.loginlog WHERE account_id=:account_id');
            $resultgamelog->execute([
                'account_id' => $account_id
            ]);
            $result['gameLog'] = $resultgamelog->fetchAll(PDO::FETCH_ASSOC);


            //Panel Log
            $resultpanellog = $db->prepare('SELECT content,ip,date,type FROM player_log WHERE account_id=:account_id');
            $resultpanellog->execute([
                'account_id' => $account_id
            ]);
            $result['panelLog'] = $resultpanellog->fetchAll(PDO::FETCH_ASSOC);

            //Old Password

            $resultoldpass = $db->prepare('SELECT * FROM old_password where account_id =:account_id ');
            $resultoldpass->execute([
                'account_id' => $account_id
            ]);
            $result['oldPass'] = $resultoldpass->fetchAll(PDO::FETCH_ASSOC);

        }

        return $result;
    }
}

function change()
{
    global $account;

    global $db;
    global $player;
    $real_name = post('real_name');
    $login = post('login');
    $password = post('password');
    $email = post('email');
    $phone1 = post('phone1');
    $ksk = post('ksk');
    $depo = post('depo');
    $empire = post('empire') ? post('empire') : null;
    $account_id = post('account_id');
    $player_id = post('player_id') ? post('player_id') : null;
    $control = $account->prepare(' SELECT id,login,password FROM account WHERE id=:id');
    $control->execute([
        'id' => $account_id
    ]);
    if ($control->rowCount() <= 0) {
        $result['message'] = 'ID geçersiz.';
    } else {

        $getInfo = $control->fetch(PDO::FETCH_ASSOC);

        $getLogin = $getInfo['login'];
        if ($login != $getLogin) {
            $searchLogin = $account->prepare(' SELECT login FROM account WHERE login=:login');
            $searchLogin->execute([
                'login' => $login
            ]);

            if (($searchLogin->rowCount()) == 1) {
                $result['result'] = 'got';

            } else {
                if ($password == null) {

                    $sorgu = $account->prepare('UPDATE account SET 
                        real_name =:real_name,
                        login=:login,
                        email=:email,
                        phone1 =:phone1,
                        social_id=:social_id
                        WHERE id=' . $account_id);

                    $sorgu->execute([
                        'real_name' => $real_name,
                        'login' => $login,
                        'email' => $email,
                        'phone1' => $phone1,
                        'social_id' => $ksk
                    ]);


                    $depoCon = $account->prepare('SELECT account_id FROM player.safebox WHERE account_id=:account_id');
                    $depoCon->execute([
                        'account_id' => $account_id
                    ]);


                    if (($depoCon->rowCount()) <= 0) {


                        $deposifre = $player->prepare(' INSERT INTO player.safebox SET 
                            account_id=:account_id,
                            size=:size,
                            password=:password');
                        $deposifre->execute([
                            'account_id' => $account_id,
                            'size' => '5',
                            'password' => $depo
                        ]);
                    } else {


                        $query = $player->prepare('UPDATE safebox SET password=:password WHERE account_id= ' . $account_id);
                        $query->execute([
                            'password' => $depo
                        ]);

                    }
                    if ($empire != null || $empire != 0) {
                        $empireChange = $player->prepare("UPDATE player.player_index SET empire = ? WHERE pid1 = ? OR pid2 = ? OR pid3 = ? OR pid4 = ?");
                        $empireChange->execute([$empire, $player_id, $player_id, $player_id, $player_id]);

                    }

                    $result['result'] = true;
                } else {

                    $date = date('Y-m-d H:i:s');
                    $oldPass = $getInfo['password'];
                    $control2 = $db->prepare('SELECT id FROM old_password WHERE account_id=:account_id');
                    $control2->execute([
                        'account_id' => $account_id
                    ]);
                    if (($control2->rowCount()) < 1) {

                        $insertoldpass = $db->prepare(' INSERT INTO old_password SET 
                            account_id=:account_id,
                            old_password=:old_password,
                            date=:date');

                        $insertoldpass->execute([
                            'account_id' => $account_id,
                            'old_password' => $oldPass,
                            'date' => $date
                        ]);

                    } else {

                        $updateoldpass = $db->prepare(' UPDATE old_password SET 
                                old_password=:old_password,
                                date=:date 
                                WHERE account_id =' . $account_id);
                        $updateoldpass->execute([
                            'old_password' => $oldPass,
                            'date' => $date
                        ]);

                    }

                    $sorgu2 = $account->prepare("UPDATE account SET real_name = ?,login = ?, phone1 = ?, email = ?, social_id = ?, password = PASSWORD(?) WHERE id = ?");

                    $sorgu2->execute([$real_name, $login, $phone1, $email, $ksk, $password, $account_id]);

                    setAdminLog("$account_id ID'li Kullanıcının Bilgilerini Güncelledi");
                    $depoCon = $player->prepare('SELECT account_id FROM safebox WHERE account_id=:account_id');
                    $depoCon->execute([
                        'account_id' => $account_id
                    ]);
                    if (($depoCon->rowCount()) <= 0) {

                        $sorgu3 = $player->prepare(' INSERT INTO player.safebox SET 
                        password=:password,
                        account_id=:account_id,
                        size=:size');
                        $sorgu3->execute([
                            'account_id' => $account_id,
                            'password' => $depo,
                            'size' => 5
                        ]);
                    } else {

                        $sorgu3 = $player->prepare(' UPDATE player.safebox SET password=:password WHERE account_id= ' . $account_id);
                        $sorgu3->execute([
                            'password' => $depo
                        ]);

                    }
                    if ($empire != null) {
                        $empireChange = $player->prepare("UPDATE player.player_index SET empire = ? WHERE pid1 = ? OR pid2 = ? OR pid3 = ? OR pid4 = ?");
                        $empireChange->execute([$empire, $player_id, $player_id, $player_id, $player_id]);
                    }
                    $result['result'] = true;
                }
            }
        } else {
            if ($password == null) {

                $sorgu4 = $account->prepare(' UPDATE account SET 
                    real_name =:real_name,
                    phone1=:phone1,
                    social_id=:social_id,
                    email=:email WHERE id=' . $account_id);
                $sorgu4->execute([
                    'real_name' => $real_name,
                    'phone1' => $phone1,
                    'social_id' => $ksk,
                    'email' => $email
                ]);

                $depoCon = $player->prepare('SELECT account_id FROM safebox WHERE account_id=:account_id');
                $depoCon->execute([
                    'account_id' => $account_id
                ]);
                if (($depoCon->rowCount()) <= 0) {


                    $sorgu5 = $player->prepare(' INSERT INTO player.safebox SET 
                        password=:password,
                        account_id=:account_id,
                        size=:size');
                    $sorgu5->execute([
                        'account_id' => $account_id,
                        'password' => $depo,
                        'size' => 5
                    ]);

                } else {

                    $sorgu5 = $player->prepare(' UPDATE safebox SET password=:password WHERE account_id=' . $account_id);
                    $sorgu5->execute([
                        'password' => $depo
                    ]);

                }
                if ($empire != null) {
                    $empireChange = $player->prepare("UPDATE player.player_index SET empire = ? WHERE pid1 = ? OR pid2 = ? OR pid3 = ? OR pid4 = ?");
                    $empireChange->execute([$empire, $player_id, $player_id, $player_id, $player_id]);
                }
                $result['result'] = true;
            } else {

                $date = date('Y-m-d H:i:s');
                $oldPass = $getInfo['password'];
                $control2 = $db->prepare('SELECT id FROM old_password WHERE account_id=:account_id');
                $control2->execute([
                    'account_id' => $account_id
                ]);
                if (($control2->rowCount()) < 1) {


                    $insertoldpass = $db->prepare(' INSERT INTO old_password SET 
                            account_id=:account_id,
                            old_password=:old_password,
                            date=:date');

                    $insertoldpass->execute([
                        'account_id' => $account_id,
                        'old_password' => $oldPass,
                        'date' => $date
                    ]);

                } else {

                    $updateoldpass = $db->prepare(' UPDATE old_password SET 
                        old_password=:old_password,
                        date=:date 
                        WHERE account_id =' . $account_id);

                    $updateoldpass->execute([
                        'old_password' => $oldPass,
                        'date' => $date
                    ]);

                }
                $updatehesap = $account->prepare("UPDATE account SET real_name = ?, phone1 = ?,email = ?, social_id = ?, password = PASSWORD(?) WHERE id = ?");
                $updatehesap->execute([$real_name, $phone1, $email, $ksk, $password, $account_id]);
                //Functions::setAdminLog("$account_id ID'li Kullanıcının Bilgilerini Güncelledi");
                $depoCon = $player->prepare('SELECT account_id FROM safebox WHERE account_id=:account_id');
                $depoCon->execute([
                    'account_id' => $account_id
                ]);
                if (($depoCon->rowCount()) <= 0) {
                    $sorgu6 = $player->prepare(' INSERT INTO player.safebox SET 
                        password=:password,
                        account_id=:account_id,
                        size=:size');
                    $sonuc6 = $sorgu6->execute([
                        'account_id' => $account_id,
                        'password' => $depo,
                        'size' => 5
                    ]);


                } else {

                    $sorgu6 = $player->prepare(' UPDATE safebox SET password=:password WHERE account_id=' . $account_id);
                    $sorgu6->execute([
                        'password' => $depo
                    ]);

                }
                if ($empire != null) {
                    $empireChange = $player->prepare("UPDATE player.player_index SET empire = ? WHERE pid1 = ? OR pid2 = ? OR pid3 = ? OR pid4 = ?");
                    $empireChange->execute([$empire, $player_id, $player_id, $player_id, $player_id]);
                }
                $result['result'] = true;
            }
        }
    }
    return $result;
}


require admin_view('account');
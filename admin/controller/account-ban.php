<?php

$infoid = get('id');
$infosor = $account->prepare('SELECT id, login FROM account WHERE id=:id');
$infosor->execute([
    'id'=>$infoid
]);
$info = $infosor->fetch(PDO::FETCH_ASSOC);

if(!permission('accounts','ban')){
    permission_page();
}
function banned($arg)
{


    global $account;global $db;
        $banDate = post('banDate');
        $id = post('id');
        $id2 = htmlspecialchars(trim($arg));
        $why = post('why');
        $evidence = post('evidence');

        if ($id != $id2){
            $result['result'] = false;
            $result['message'] = "Hata";

        }else{
            if ($banDate == '' || $why == ''){
                $result['result'] = false;
                $result['message'] = "Lütfen Ban Süresi ve Ban Nedenini Giriniz.";

            }else{

                $getInfosor = $account->prepare('SELECT login,status,availDt,email FROM account WHERE id=:id');
                $getInfosor->execute([
                    'id'=>$id
                ]);
                $getInfo = $getInfosor->fetch(PDO::FETCH_ASSOC);

                $status = $getInfo['status'];
                $availDt = $getInfo['availDt'];
                $login = $getInfo['login'];
                $email = $getInfo['email'];
                $availTo = strtotime($availDt);
                $now = time();
                if ($status == 'BLOCK'){
                    $result['result'] = false;
                    $result['message'] = "Bu hesap zaten banlı";
                }elseif ($availTo > $now){
                    $result['result'] = false;
                    $result['message'] = "Bu hesap zaten banlı";
                }else{

                   $sorgu = $account->prepare(' UPDATE account SET availDt=:availDt WHERE id='. $id);
                    $sorgu->execute([
                        'availDt'=>$banDate
                    ]);
                    $controlBanList = $db->prepare('SELECT account_id FROM ban_list WHERE account_id=:account_id');
                    $controlBanList->execute([
                        'account_id'=>$id
                    ]);
                    $date = date('Y-m-d H:i:s');
                    if ($controlBanList->rowCount() == 0){

                        $sorgu2 = $db->prepare('INSERT INTO ban_list SET 
                            account_id=:account_id,
                            why=:why,
                            evidence=:evidence,
                            date=:date,
                            type=:type');
                        $sorgu2->execute([
                            'account_id'=>$id,
                            'why'=>$why,
                            'evidence'=>$evidence,
                            'date'=>$date,
                            'type'=>'1'
                        ]);

                    }else{

                        $update = $db->prepare(' UPDATE ban_list SET
                        account_id=:account_id,
                            why=:why,
                            evidence=:evidence,
                            date=:date,
                            type=:type
                            
                            WHERE account_id= '. $id);

                         $update->execute([
                            'account_id'=>$id,
                            'why'=>$why,
                            'evidence'=>$evidence,
                            'date'=>$date,
                            'type'=>'1'
                        ]);

                    }
                    $result['result'] = true;
                    $result['message'] = "Hesap Başarıyla Banlandı ! Yönlendiriliyorsunuz...";
                   
                    if ( strlen($evidence) >0){
                            sendmail('  Hesabınız Süreli Banlanmıştır!',$email,"Sayın $login, hesabınız $banDate tarihine kadar banlanmıştır. <br> <br> Ban nedeniniz : $why <br><br> Ban Kanıtı : $evidence");
                        }else{
                            sendmail('  Hesabınız Süreli Banlanmıştır!',$email,"Sayın $login, hesabınız $banDate tarihine kadar banlanmıştır. <br> Ban nedeniniz : $why");
                        }
                    setAdminLog("$id ID'li Kullanıcıyı $banDate Tarihine Kadar Banladı !");
                    sendServer($login,"DC");
                }
            }
        }
        return $result;

}

function perma_banned($arg)
{
    global $account;global $db;
    $id = post('id');
    $id2 = htmlspecialchars(trim($arg));
    $why = post('why');
    $evidence = post('evidence');

        if ($id2 != $id){
            $result['result'] = false;
            $result['message'] = "Hata";
        }else{
            if ($id == "" || $why == ""){
                $result['result'] = false;
                $result['message'] = "Lütfen Ban Nedenini Belirtiniz";
            }else{
                $controlsor = $account->prepare('SELECT id,status,login,email FROM account WHERE id=:id');
                $controlsor->execute([
                    'id'=>$id
                ]);
                $control = $controlsor->fetch(PDO::FETCH_ASSOC);
                if (count($control) == 0){
                    $result['result'] = false;
                    $result['message'] = "Kullanıcı Bulunamadı";
                }else{
                    $controlStatus = $control['status'];
                    $email = $control['email'];
                    $login = $control['login'];
                    if ($controlStatus == 'BLOCK'){
                        $result['result'] = false;
                        $result['message'] = "Kullanıcı Zaten Banlı";
                    }else{
                      $sorgu =  $account->prepare("UPDATE account SET status = ? WHERE id = ?");
                       $sorgu->execute(['BLOCK',$id]);
                        $controlBanList = $db->prepare(' SELECT account_id FROM ban_list WHERE account_id=:account_id');
                        $controlBanList->execute([
                            'account_id'=>$id
                        ]);
                        $date = date('Y-m-d H:i:s');
                        if (($controlBanList->rowCount()) == 0){
                           $insertban = $db->prepare(' INSERT INTO ban_list SET 
                                account_id=:account_id,
                                why=:why,
                                evidence=:evidence,
                                date=:date,
                                type=:type');
                           $insertban->execute([
                               'account_id'=>$id,
                               'why'=>$why,
                               'evidence'=>$evidence,
                               'date'=>$date,
                               'type'=>'2'
                           ]);
                        }else{
                         $updateban = $db->prepare('UPDATE ban_list SET 
                             why=:why,
                             evidence=:evidence,
                             date=:date,
                             type=:type 
                             WHERE account_id='. $id);
                         $updateban->execute([
                             'why'=>$why,
                             'evidence'=>$evidence,
                             'date'=>$date,
                             'type'=>'2'
                         ]);
                        }
                        $result['result'] = true;
                        $result['message'] = "Hesap Başarıyla Banlandı";
                        setAdminLog("$id ID'li Kullanıcıyı Süresiz Banladı");

                        if ( strlen($evidence) >0){
                            sendmail('  Hesabınız Süresiz Banlanmıştır!',$email,"Sayın $login, hesabınız süresiz olarak banlanmıştır. <br> <br> Ban nedeniniz : $why <br><br> Ban Kanıtı : $evidence");
                        }else{
                            sendmail('  Hesabınız Süresiz Banlanmıştır!',$email,"Sayın $login, hesabınız süresiz olarak banlanmıştır. <br> Ban nedeniniz : $why");
                        }

                        $getLoginsor = $account->prepare('SELECT login FROM account WHERE id=:id');
                        $getLoginsor->execute([
                            'id'=>$id
                        ]);
                        $getLoginsonuc= $getLoginsor->fetch(PDO::FETCH_ASSOC);
                        $getLogin =$getLoginsonuc['login'];
                        Functions::sendServer($getLogin,"DC");
                    }
                }
            }
        }
        return $result;

}



require admin_view('account-ban');
<?php


function buy_paywant()

{


        $sId = session_get('sId');

        return $sId;

}

function paywantAntiInjection($sql){

    $sql 			= preg_replace(@sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$sql);

    $sql 			= trim($sql);

    $sql 			= strip_tags($sql);

    $sql 			= addslashes($sql);

    return $sql;

}


function curlPost($url, $params){

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,$url);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER , TRUE);

    curl_setopt($ch, CURLOPT_POST , TRUE);

//		curl_setopt($ch, CURLOPT_TIMEOUT, 50);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

    $result = curl_exec($ch);

    if (curl_errno($ch)) {

        print curl_error($ch);

    } else {

        curl_close($ch);

    }

    return $result;

}

function paywantnotify($arg){

    global $account;
    global $db;
    if($_POST){

        if ($arg !== settings('paywant_token'))

            die("NULL");

        else

        {

            $SiparisID = paywantAntiInjection($_POST["SiparisID"]);

            $ExtraData= paywantAntiInjection($_POST["ExtraData"]);

            $UserID= paywantAntiInjection($_POST["UserID"]);

            $ReturnData= paywantAntiInjection($_POST["ReturnData"]);

            $Status= paywantAntiInjection($_POST["Status"]);

            $OdemeKanali= paywantAntiInjection($_POST["OdemeKanali"]);

            $OdemeTutari= paywantAntiInjection($_POST["OdemeTutari"]);

            $NetKazanc= paywantAntiInjection($_POST["NetKazanc"]);

            $Hash= filter_var($_POST["Hash"],FILTER_SANITIZE_STRING);

            $apiKey = settings('paywant_apikey');

            $apiSecret = settings('paywant_secretkey');

            if($SiparisID == "" || $ExtraData == "" || $UserID == "" || $ReturnData == "" || $Status == "" || $OdemeKanali == "" || $OdemeTutari == "" || $NetKazanc == "" || $Hash == "")

            {

                echo "eksik veri";

                exit();

            }else{

                $hashKontrol = base64_encode(hash_hmac('sha256',"$SiparisID|$ExtraData|$UserID|$ReturnData|$Status|$OdemeKanali|$OdemeTutari|$NetKazanc".$apiKey,$apiSecret,true));

                if($Hash != $hashKontrol){

                    exit("hash hatali");

                }else{

                    $kontrol = $account->prepare('SELECT id FROM account WHERE id=:id and login=:login');
                    $kontrol->execute(['id'=>$UserID,'login'=>$ReturnData]);

                    if($kontrol->rowCount() > 0){

                        $kontrol2 = $db->prepare(' SELECT ID from api_paywant WHERE SiparisID=:SiparisID');
                        $kontrol2->execute(['SiparisID'=>$SiparisID]);

                        if ($kontrol2->rowCount() > 0){

                            // daha önce yükleme olmuş, işlem yapma "1 " döndür

                            exit("OK");

                        }else{

                            $data = array(

                                'SiparisID'=>$SiparisID,

                                'UserID'=>$UserID,

                                'ReturnData'=>$ReturnData,

                                'Status'=>$Status,

                                'OdemeKanali'=>$OdemeKanali,

                                'OdemeTutari'=>$OdemeTutari,

                                'NetKazanc'=>$NetKazanc,

                                'ExtraData'=>$ExtraData,

                                'Tarih'=>date("Y-m-d H:i:s")

                            );

                            $kayitGir = $db->query("INSERT INTO api_paywant (SiparisID,UserID,ReturnData,Status,OdemeKanali,OdemeTutari,NetKazanc,ExtraData,Tarih) VALUES 

							('$SiparisID','$UserID','$ReturnData','$Status','$OdemeKanali','$OdemeTutari','$NetKazanc','$ExtraData','".date("Y-m-d H:i:s")."')");

                            if ($kayitGir){

                                // log girildi kontrol yapıp yükleyelim

                                if($Status  == "100"){

                                    if (settings('shop_happyhourstatus'))

                                        $ExtraData = ($ExtraData * intval(settings('shop_happyhour')) / 100) + $ExtraData;

                                    $yukle =  $account->query("UPDATE account.account SET cash = cash + $ExtraData  WHERE id='$UserID' and login='$ReturnData'");

                                    if($yukle){

                                        exit("OK");

                                    }else{

                                        exit("ep verilemedi");

                                    }

                                }else{

                                    // 101 , ödeme iptal edildi

                                    exit("OK");

                                }

                            }else{

                                // log girilmedi

                                echo "log girilemedi";

                            }

                        }

                    }else{

                        echo "kullanici yok";

                    }

                }

            }

        }

    }else{

        exit("post yok");

    }

}

require shop_view('buy-paywant');
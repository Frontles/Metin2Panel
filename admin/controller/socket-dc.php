<?php
$filtre = new Filter();

if(!permission('sockets','dc-at')){
    permission_page();
}
function dcset()



{
global $filtre;
global $player;
global $account;
$functions = new Functions();

    $stat = $filtre->numberFilter($_POST['stat']);

    $name = $filtre->mainFilter($_POST['character_name']);

    if ($stat == '' || $name == ''){

        $result['result'] = false;
        $result['message'] = 'Boş Alanlar Var Lütfen Kontrol Edin !';

    }else{


        if ($stat == '1'){

            $control = $player->prepare('SELECT account_id,name FROM player WHERE name=:name');
            $control->execute([
                'name'=>$name
            ]);


            if ($control->rowCount() < 1){



                $result['result'] = false;
                $result['message'] = 'Bu İsme Sahip Bir Oyuncu Bulunamadı !';

            }else{


                $functions->sendServer($name,"DC");
                $hata = sendServer($name,"DC");
               print_r($hata);exit;


                setAdminLog("$name isimli kullanıcıya DC attı");


                $result['result'] = true;
                $result['message'] = 'DC Atma Başarılı !';

            }

        }elseif ($stat==0){
            $control = $account->prepare('SELECT id,login FROM account WHERE login=:name');
            $control->execute([
                'name'=>$name
            ]);


            if ($control->rowCount() < 1){



                $result['result'] = false;
                $result['message'] = 'Bu İsme Sahip Bir Oyuncu Bulunamadı !';

            }else{


               
                setAdminLog("$name isimli kullanıcıya DC attı");


                $result['result'] = true;
                $result['message'] = 'DC Atma Başarılı !';

            }
        }

    }

     return $result;

}

require admin_view('socket-dc');
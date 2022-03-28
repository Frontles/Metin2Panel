<?php

$infoid = get('id');
$infosor = $account->prepare('SELECT id, login FROM account WHERE id=:id');
$infosor->execute([
    'id'=>$infoid
]);
$info = $infosor->fetch(PDO::FETCH_ASSOC);

function addep()
{
    global $account;
    $id = post('id');
    $count = post('count');
    if ($count == '' || $count == '0')
    {
        $result['result'] = false;
        $result['message'] = 'Lütfen Yüklemek İstediğiniz EP Miktarını Giriniz. ';
    }
    else
    {
        $controlsor = $account->prepare('SELECT * FROM account WHERE id=:id');
        $controlsor->execute(['id'=>$id]);
        $control = $controlsor->fetch(PDO::FETCH_ASSOC);

        if(($controlsor->rowCount()) < 1){
            $result['result'] = false;
            $result['message'] = 'Böyle Bir ID bulunamadı.';
            die();
        }else{
            $getCash = $control['cash'];
            $newCash = $count + $getCash;
          $update=  $account->prepare("UPDATE account SET cash=:cash WHERE id=" .$id);
        $succ =  $update->execute([
              'cash'=>$newCash
          ]);
          if ($succ){
              $result['result'] = true;
              $result['message'] = 'EP Yüklemesi Başarılı ! Hesap İşlemleri Sayfasına Yönlendiriliyorsunuz..';
          }

        }

    }
    return $result;
}

if (!permission('accounts', 'edit')) {
    permission_page();
}

require admin_view('account-addep');
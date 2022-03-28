<?php

function allaccountlist($arg)
{
    global $db;
    global $account;
    $array = array();
    $getLogIpsor = $db->prepare('SELECT distinct ip FROM login_log WHERE account_id ='. $arg . ' ORDER BY date ASC' );
    $getLogIpsor->execute();

    $getLogIp  = $getLogIpsor->fetchAll(PDO::FETCH_ASSOC);
    
    $searchLogsor = $db->prepare('SELECT distinct account_id as id FROM login_log WHERE ip=:ip');
    $searchLogsor->execute([
        'ip'=>$getLogIp[0]['ip']
        ]);
    $searchLog= $searchLogsor->fetchAll(PDO::FETCH_ASSOC);

    $resultt = array_merge($array,$searchLog);

    $data = "";
    foreach ($resultt as $item) {
        $data .= ' id = '.$item['id'].' OR ';
    }
    $data = rtrim($data,' OR ');

    $getSearchResult = $account->prepare('SELECT id,login,email,status,ip FROM account.account WHERE ' .$data);
    $getSearchResult->execute();
    $resultwho = $account->prepare('SELECT login FROM account WHERE id=:id');
    $resultwho->execute(['id'=>$arg]);
    $resultwhosonuc = $resultwho->fetch(PDO::FETCH_ASSOC);

    $result['who'] = $resultwhosonuc['login'];

    $result['data'] = $getSearchResult->fetchAll(PDO::FETCH_ASSOC);


    return $result;
}
require admin_view('allaccountlist');
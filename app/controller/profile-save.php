<?php


function characters()

{
    global $account;
    global $player;
    global $db;
    $aid = session_get('user_id');

    $getplayeraccount = $account->prepare('SELECT login,email,phone1,cash,mileage,status,availDt FROM account WHERE id=:id');
    $getplayeraccount->execute([
        'id' => $aid
    ]);

    $getPlayers['account'] = $getplayeraccount->fetch(PDO::FETCH_ASSOC);
    if ($getplayeraccount->rowCount()<1){
        header('Location:'. site_url('error'));
    }

    $getplayersplayer = $player->prepare(' SELECT id,name,job,level,playtime,last_play,map_index FROM player WHERE account_id=:account_id');
    $getplayersplayer->execute([
        'account_id' => $aid
    ]);

    $getPlayers['player'] = $getplayersplayer->fetchAll(PDO::FETCH_ASSOC);





    return $getPlayers;

}

require view('profile-save');


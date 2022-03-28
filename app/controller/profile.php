<?php

function profile()

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

    $getplayersplayer = $player->prepare(' SELECT name,job,level,playtime,last_play FROM player WHERE account_id=:account_id');
    $getplayersplayer->execute([
        'account_id' => $aid
    ]);

    $getPlayers['player'] = $getplayersplayer->fetchAll(PDO::FETCH_ASSOC);

    $getplayersaktivasyon = $account->prepare('SELECT mailaktive FROM account WHERE id=:id');
    $getplayersaktivasyon->execute([
        'id' => $aid
    ]);

    $getPlayers['aktivasyon'] = $getplayersaktivasyon->fetch(PDO::FETCH_ASSOC);

    $availDt = strtotime($getPlayers['account']['availDt']);

    $status = $getPlayers['account']['status'];

    $now = time();

    if ($status == 'BLOCK' || $availDt > $now) {

        $getplayersban= $db->prepare('SELECT why,evidence FROM ban_list WHERE account_id=:account_id');
        $getplayersban->execute([
            'account_id' => $aid
        ]);

        $getPlayers['ban'] = $getplayersban->fetch(PDO::FETCH_ASSOC);
    }

    return $getPlayers;

}

require view('profile');
<?php

$filtre = new Filter();

$name = $filtre->mailFilter(post('character'));

function search()
{

    global $name;
        global $player;
        $searchsor = $player->prepare("SELECT player.player.id,player.player.account_id,player.player.name,player.player.ip,player.player.job,account.account.login FROM player.player LEFT JOIN account.account ON account.id = player.account_id WHERE player.`name` LIKE ?");
        $searchsor->execute([
            "%$name%"
        ]);

        $searchrows = $searchsor->fetchAll(PDO::FETCH_ASSOC);
        $data['result'] = true;


       setAdminLog("$name İsminde Karakter Aradı");
        $data['name'] = $searchrows;
        $data['count'] = $searchsor->rowCount();
    return $data;

}



require admin_view('player-search');
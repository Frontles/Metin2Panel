<?php

function ranked_player()

{
    $cache = new Cache();
    global $player;

    if ($cache->check('players')) {

        $datasor= $player->prepare("SELECT player.id,player.name,player.job,player.level,player.playtime,player.last_play,player_index.empire,guild.name AS guild_name

                FROM player.player 

                LEFT JOIN player.player_index ON player.player.account_id = player.player_index.id 

                LEFT JOIN player.guild_member ON guild_member.pid=player.id 

                LEFT JOIN player.guild ON guild.id=guild_member.guild_id

                LEFT JOIN account.account ON account.id=player.account_id

                WHERE player.player.`name` NOT LIKE '[%]%' ORDER BY player.player.`level` DESC,player.player.playtime DESC,player.player.exp DESC LIMIT 0,50");
        $datasor->execute();
        $data = $datasor->fetchAll(PDO::FETCH_ASSOC);

        return $data;

    }

}

require view('ranked-player');
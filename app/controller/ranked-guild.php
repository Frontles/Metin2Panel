<?php


function ranked_guild()

{
    $cache = new Cache();

    global $player;
    if ($cache->check('guilds')) {

        $datasor = $player->prepare("SELECT player.guild.`name` as lonca,player.guild.win,player.guild.draw,player.guild.loss,player.guild.ladder_point,player.player.`name` as baskan,player.player_index.empire as bayrak FROM player.guild LEFT JOIN player.player ON player.guild.`master` = player.player.id LEFT JOIN player.player_index ON player.player.account_id = player.player_index.id ORDER BY player.guild.ladder_point DESC LIMIT 0,50");

        $datasor->execute();
        $data = $datasor->fetchAll(PDO::FETCH_ASSOC);
        return $data;

    }

}

require view('ranked-guild');
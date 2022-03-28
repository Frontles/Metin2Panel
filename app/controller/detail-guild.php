<?php

function lonca_detay($arg)

{

    global $player;
    $cache = new Cache();
    $guildName = filter_var($arg, FILTER_SANITIZE_STRING);

    if ($guildName == false) {

        return false;

    } else {

        $control = $player->prepare('SELECT id FROM guild WHERE name=:name');
        $control->execute([
            'name' => $guildName
        ]);

        if ($control->rowCount() <= 0) {

            header('Location:' . site_url('error'));
            exit;

        } elseif ($control->rowCount() > 0) {

            if ($cache->check($arg)) {

                $sth = $player->prepare("SELECT player.guild.id,player.guild.`name`,player.guild.`level`,player.guild.ladder_point,player.guild.exp,player.player_index.empire,player.player.`name` as baskan,player.guild.win,player.guild.draw,player.guild.loss,player.player.job,player.player.`level` as seviye 

FROM player.guild

LEFT JOIN player.player_index ON player.player_index.pid1 = player.guild.`master` 

OR player.player_index.pid2 = player.guild.`master`

OR player.player_index.pid3 = player.guild.`master`

OR player.player_index.pid4 = player.guild.`master`

OR player.player_index.pid4 = player.guild.`master`

LEFT JOIN player.player ON player.player.id = player.guild.`master`

WHERE player.guild.`name` = ?");
                $sth->execute([$guildName]);
                $result["info"] = $sth->fetch(PDO::FETCH_ASSOC);




                $guildId = $result['info']['id'];

                $getRes2 = $player->prepare('SELECT pid FROM guild_member WHERE guild_id=:guild_id');
                $getRes2->execute([
                    'guild_id' => $guildId
                ]);


                $result['count'] = $getRes2->rowCount();

            } else {

                $infosor = $player->prepare("SELECT player.guild.id,player.guild.`name` FROM player.guild WHERE player.guild.`name` = ?" );
                $infosor->execute([$guildName]);
                $result["info"] = $infosor->fetch(PDO::FETCH_ASSOC);

            }

            return $result;

        }

    }

}

require view('detail-guild');
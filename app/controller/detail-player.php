<?php


function oyuncu_detay($arg)

{

    $cache = new Cache();
    global $player;
    $playerName = htmlspecialchars(trim($arg));
    if ($playerName == false) {

        return false;

    } else {

        $control = $player->prepare('SELECT id FROM player WHERE name=:name');
        $control->execute([
            'name' => $playerName
        ]);
        if ($control->rowCount() <= 0) {

            header('Location:'. site_url('error'));
            exit;

        } elseif ($control->rowCount() > 0) {

            if ($cache->check($playerName)) {

                $sorgu = $player->prepare("SELECT guild.`name` as lonca,player.`name`,player.playtime,player.last_play,player_index.empire,player.`level`,player.map_index,player.exp,player.skill_group,player.job
                FROM player.player 
                LEFT JOIN player.guild_member ON guild_member.pid = player.id 
                LEFT JOIN player.guild ON guild.id = guild_member.guild_id
                INNER JOIN player.player_index ON player_index.id = player.account_id
                WHERE player.`name` = ?" );
                $sorgu->execute([$playerName]);
                $sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);
                return $sonuc;
            } else{

                $sorgu = $player->prepare("SELECT player.`name` FROM player.player WHERE player.`name` = ?");
                $sorgu->execute([$playerName]);
                $sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);
                return $sonuc;
            }


        }

    }

}


require view('detail-player');
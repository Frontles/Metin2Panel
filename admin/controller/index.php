<?php


function dashboard()

{
    $cache = new Cache();
    global $account;
    global $player;
    global $db;
    $offline_shop_npc = settings('offline_shop_npc');




        //Player Count Statistic

        $totalaccount = $account->prepare("SELECT COUNT(id) as count FROM account");
        $totalaccount->execute([]);
        $getCount['totalAccount'] = $totalaccount->fetch(PDO::FETCH_ASSOC);

        $activeaccount= $account->prepare("SELECT COUNT(id) as count FROM account WHERE status='OK' ");
        $activeaccount->execute();
        $getCount['countActive'] = $activeaccount->fetch(PDO::FETCH_ASSOC);


        $bannedaccount= $account->prepare("SELECT COUNT(id) as count FROM account.account WHERE status!='OK' ");
        $bannedaccount->execute();
        $getCount['countBanned'] = $bannedaccount->fetch(PDO::FETCH_ASSOC);

        $charactercount = $player->prepare("SELECT COUNT(id) as count FROM player");
        $charactercount->execute();
        $getCount['countCharacter'] =$charactercount->fetch(PDO::FETCH_ASSOC);



        /* 
        $countep =  $player->prepare("SELECT COUNT(*) as count FROM player." . $offline_shop_npc);
        $countep->execute();
        $getCount['countEp'] = $countep->fetch(PDO::FETCH_ASSOC);
          
          */
        
        $countep = $player->prepare("SELECT COUNT(id) as count FROM player");
        $countep->execute();
        $getCount['countEp'] =$countep->fetch(PDO::FETCH_ASSOC);

        
        $countoday = $account->prepare("SELECT COUNT(id) as count FROM account.account WHERE create_time LIKE '%" . date("Y-m-d") . "%'  ");
        $countoday->execute();
        $getCount['countToday'] =$countoday->fetch(PDO::FETCH_ASSOC);

        $countodaylogin = $player->prepare("SELECT COUNT(id) as count FROM player WHERE last_play LIKE '%" . date("Y-m-d") . "%' ");
        $countodaylogin->execute();
        $getCount['countTodayLogin'] =$countodaylogin->fetch(PDO::FETCH_ASSOC);

        $countguild = $player->prepare("SELECT COUNT(id) as count FROM player.guild");
        $countguild->execute();
        $getCount['countGuild'] = $countguild->fetch(PDO::FETCH_ASSOC);





    //Player Diagram Statistic

    $countred = $player->prepare("SELECT COUNT(player.id) as count FROM player.player INNER JOIN player.player_index ON player.account_id = player_index.id WHERE player_index.empire=1");
    $countred->execute();
    $getCount['countRed'] = $countred->fetch(PDO::FETCH_ASSOC);

    $countyellow = $player->prepare("SELECT COUNT(player.id) as count FROM player.player INNER JOIN player.player_index ON player.account_id = player_index.id WHERE player_index.empire=2");
    $countyellow->execute();
    $getCount['countYellow'] = $countyellow->fetch(PDO::FETCH_ASSOC);


    $countblue = $player->prepare("SELECT COUNT(player.id) as count FROM player.player INNER JOIN player.player_index ON player.account_id = player_index.id WHERE player_index.empire=3");
    $countblue->execute();
    $getCount['countBlue'] = $countblue->fetch(PDO::FETCH_ASSOC);


    //Flag Diagram Statistic

    $countwarrior = $player->prepare("SELECT COUNT(player.id) as count FROM player.player WHERE player.job = 0 OR player.job = 4");
    $countwarrior->execute();
    $getCount['countWarrior'] = $countwarrior->fetch(PDO::FETCH_ASSOC);


    $countninja = $player->prepare("SELECT COUNT(player.id) as count FROM player.player WHERE player.job = 1 OR player.job = 5");
    $countninja->execute();
    $getCount['countNinja'] = $countninja->fetch(PDO::FETCH_ASSOC);


    $countsura = $player->prepare("SELECT COUNT(player.id) as count FROM player.player WHERE player.job = 2 OR player.job = 6");
    $countsura->execute();
    $getCount['countSura'] = $countsura->fetch(PDO::FETCH_ASSOC);


    $countshaman = $player->prepare("SELECT COUNT(player.id) as count FROM player.player WHERE player.job = 3 OR player.job = 7");
    $countshaman->execute();
    $getCount['countShaman'] = $countshaman->fetch(PDO::FETCH_ASSOC);


    $countlycan = $player->prepare("SELECT COUNT(player.id) as count FROM player.player WHERE player.job = 8");
    $countlycan->execute();
    $getCount['countLycan'] = $countlycan->fetch(PDO::FETCH_ASSOC);


    //Game BootLog

    $corelog = $player->prepare("SELECT * FROM log.bootlog ORDER BY time DESC LIMIT 10");
    $corelog->execute();
    $getCount['coreLog'] = $corelog->fetchAll(PDO::FETCH_ASSOC);


    $commandlog = $player->prepare("SELECT userid,ip,port,username,command,date FROM log.command_log ORDER BY date DESC LIMIT 10");
    $commandlog->execute();
    $getCount['commandLog'] = $commandlog->fetchAll(PDO::FETCH_ASSOC);


    //Gain Statistic

    $countpaywant = $db->prepare("SELECT SUM(NetKazanc) AS gain FROM api_paywant WHERE DATE(`Tarih`) = CURDATE()");
    $countpaywant->execute();
    $countpaywantsor = $countpaywant->fetch(PDO::FETCH_ASSOC);
    $getCount['countPaywant'] = $countpaywantsor['gain'];
    

    

    $countepin = $db->prepare("SELECT ep AS gain FROM coupons WHERE DATE(`use_date`) = CURDATE() AND `status` = ?");
    $countepin->execute(['1']);
    $getCount['countEpin'] = $countepin->fetchAll(PDO::FETCH_ASSOC);

    $epprice = $db->prepare("SELECT * FROM ep_tlconvert");
    $epprice->execute();
    $getCount['epPrice'] = $epprice->fetchAll(PDO::FETCH_ASSOC);

    $gettotalpaywant = $db->prepare("SELECT SUM(NetKazanc) AS gain FROM api_paywant");
    $gettotalpaywant->execute();
    $gettotalpaywantsor = $gettotalpaywant->fetch(PDO::FETCH_ASSOC);
    $getCount['getTotalPaywant'] = $gettotalpaywantsor['gain'];

    

    $gettotalepin = $db->prepare("SELECT ep AS gain FROM coupons WHERE `status` = 1");
    $gettotalepin->execute();
    $getCount['getTotalEpin'] = $gettotalepin->fetchAll(PDO::FETCH_ASSOC);


    return $getCount;

}

require admin_view('index');
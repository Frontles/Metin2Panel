<?php


function save_response($arg2)

{
    global $player;
    global $account;
    $playerName = get('name');

    $arg2 = filter_var($arg2, FILTER_SANITIZE_STRING);

    $randomKey = session_get('bug_key');

    $hashKey = md5($playerName . $randomKey);

    $aid = session_get('user_id');

    $control = $player->prepare('SELECT name FROM player WHERE account_id=:account_id and name=:name');
    $control->execute([
        'account_id' => $aid,
        'name' => $playerName
    ]);
    if ($control->rowCount() <= 0) {

        $result['result'] = false;
    } else {
        $timesor = $account->prepare(' SELECT t_date FROM account WHERE id=:id');
        $timesor->execute([
            'id' => $aid
        ]);
        $time = $timesor->fetch(PDO::FETCH_ASSOC);
        $now = date('Y-m-d H:i:s', strtotime('-10 minutes'));

        if ($time['t_date'] > $now) {
            $result['result'] = false;
        } else {
            $sorgu = $player->prepare('UPDATE player SET
                exit_x=:exit_x ,
                exit_y=:exit_y,
                exit_map_index=:exit_map_index,
                x=:x,
                y=:y,
                map_index=:map_index 
                
                WHERE id= ' . $aid);

            $sorgu->execute([
                'exit_x' => '876288',
                'exit_y' => '250466',
                'exit_map_index' => '43',
                'x' => '876288',
                'y' => '250466',
                'map_index' => '43'
            ]);
            setplayerlog( '16', "$playerName isim'li karakter bugdan kurtarıldı");
            $sorgu2 = $account->prepare('UPDATE account SET t_date=:t_date WHERE id=' . $aid);
            $sorgu2->execute([
                't_date' => date('Y-m-d H:i:s')
            ]);
            $result['result'] = true;

        }
    }
    unset($_SESSION['bug_key']);

    return $result;

}


require view('profile-save-response');
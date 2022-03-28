<?php



function wheel_index()

{

    global $account;
    global $db;
    $aId = session_get('user_id');

    $datacoins = $account->prepare('SELECT cash FROM account WHERE id=:id');
    $datacoins->execute(['id'=>$aId]);
    $datacoinss = $datacoins->fetch(PDO::FETCH_ASSOC);
    $data['coins'] = $datacoinss['cash'];

    $dataitems= $db->prepare("SELECT * FROM wheel_items");
    $dataitems->execute();
    $data['items']= $dataitems->fetchAll(PDO::FETCH_ASSOC);

    return $data;

}

require shop_view('wheel-index');
<?php


function download()

{
    global $db;

    $datasor = $db->prepare('SELECT * FROM pack');
    $datasor->execute();
    $data = $datasor->fetchAll(PDO::FETCH_ASSOC);

    return $data;

}
require view('download');
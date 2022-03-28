<?php

$table= get('table');
$column = get('column');
$id = get('id');





if (get('player') == 1 ){
    delete_playertable();
    exit;
}elseif (!get('player')){

    $query = $db-> prepare('DELETE FROM '. $table .' WHERE '.$column . '=:id');
    $query-> execute([
        'id'=>$id
    ]);


    header('Location:'. $_SERVER['HTTP_REFERER']);
}
function delete_playertable(){
    global $player;
global $column;
global $table;
global $id;
    $query = $player-> prepare('DELETE FROM '. $table .' WHERE '.$column . '=:id');
    $query-> execute([
        'id'=>$id
    ]);


    header('Location:'. $_SERVER['HTTP_REFERER']);
}
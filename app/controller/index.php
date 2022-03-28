<?php


function patch()

{
    global $db;

    global $cache;
    if ($cache->check('patch')){
        $patchsor = $db->prepare("SELECT id,title,image,tarih,short_content FROM patch ORDER BY tarih DESC LIMIT 0,4");
        $patchsor->execute();
        $result = $patchsor->fetchAll(PDO::FETCH_ASSOC);
    }


    return isset($result) ? $result : null;

}


require view('index');
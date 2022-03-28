<?php




function shop_index(){
    global $db;

    $mainbanner = $db->prepare("SELECT image,title,content FROM banner WHERE typee = ?");
    $mainbanner->execute([0]);
    $result['mainBanner'] = $mainbanner->fetchAll(PDO::FETCH_ASSOC);


    $subbanner = $db->prepare("SELECT image,title,content FROM banner WHERE typee = ?");
    $subbanner->execute([1]);
    $result['subBanner'] = $subbanner->fetch(PDO::FETCH_ASSOC);


    $items = $db->prepare('SELECT * FROM items WHERE popularite=:popularite');
    $items->execute(['popularite'=>'1']);
    $result['items'] = $items->fetchAll(PDO::FETCH_ASSOC);


    return $result;

}

require shop_view('index');
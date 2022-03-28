<?php


function shop_search(){

    $filter = new Filter();
    $token = post('__token') ? filter_var($_POST['__token'],FILTER_SANITIZE_STRING) :null;

    $searchString = post('searchString') ? $filter->passwordFilter($_POST['searchString']) :null;



    global $db;
    $aId = session_get('user_id');

    $pId = session_get('player_id');

    $hash = hash_hmac('md5',$aId.$pId,'inpinos');



   if (strlen($searchString) < 2)

        $result = ["result"=>false,"message"=>500];

    elseif ($hash != $token)

        $result = ["result"=>false,"message"=>501];

    elseif (empty($searchString))

        $result = ["result"=>false,"message"=>502];

    else{

        $sth = $db->prepare("SELECT * FROM items WHERE (item_name LIKE ? OR coins LIKE ?) AND (durum = ? OR durum = ?)");
        $sth->execute(["%$searchString%",$searchString,"1","2"]);
        $sonuc = $sth->fetchAll(PDO::FETCH_ASSOC);

        if(($sth->rowCount()) <= 0)

            $result = ["result"=>false,"message"=>503];

        else{

            $result['result'] = true;

            $result['data'] = $sonuc;

             $menuresult= $db->prepare('SELECT * FROM shop_menu WHERE status=:status');
             $menuresult->execute(['status'=>0]);
             $result['menu'] = $menuresult->fetchAll(PDO::FETCH_ASSOC);

            $result['message'] = 'OK';

        }

    }

    return $result;

}

require shop_view('search');
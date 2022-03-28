<?php



function search(){

    if(get('searchValue')){

        $searchValue = get("searchValue");
        if(empty($searchValue)){
            $data['result'] = false;
        }else{
            global $player;
            // limit (sayfa içinde kaç veri gözükecek)
            $limit = 95;

            // sayfa sayısı (kaçıncı sayfa)
            $data['sayfa'] = isset($_GET['sayfa']) && is_numeric($_GET['sayfa']) ? $_GET['sayfa'] : 1;
            if ($data['sayfa'] <= 0){
                $data['sayfa'] = 1;
            }elseif (!get('sayfa')){
                $data['sayfa']=1;
            }


            // toplam veri

            $baslangic = ($data['sayfa'] * $limit) - $limit;
            $sorgu = $player->prepare('SELECT vnum,locale_name FROM item_proto WHERE  vnum LIKE ?');
            $sorgu->execute([
                "%$searchValue%"
            ]);
            $sonuc = $sorgu->fetchAll(PDO::FETCH_ASSOC);
            $searchsor = $player->prepare('SELECT vnum,locale_name FROM item_proto WHERE  vnum LIKE ? LIMIT ' . $baslangic . ',' . $limit );
            $searchsor->execute([
                "%$searchValue%"
            ]);


            $searchrows = $searchsor->fetchAll(PDO::FETCH_ASSOC);
            $data['result'] = true;
            $data['items'] = $searchrows;
            $data['count'] = $sorgu->rowCount();
            $toplamVeri = $data['count'];
            // toplam sayfa sayısı
            $data['toplamsayfa'] = ceil($toplamVeri / $limit);
            // veriler kaçtan başlayacak

            if(get('sayfa') > $data['toplamsayfa'] || get('sayfa')<1 ){
                header('Location:'. admin_url('error-page'));
            }


        }
        return $data;
    }
}

$aramasonuclari = search();



$sol = $aramasonuclari['sayfa'] - 3;
$sag = $aramasonuclari['sayfa'] + 3;

if ($aramasonuclari['sayfa'] <= 3){
    $sag = 7;
}
if ($sag > $aramasonuclari['toplamsayfa']){
    $sol = $aramasonuclari['toplamsayfa'] - 6;
}




require admin_view('search');
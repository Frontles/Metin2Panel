<?php

if (post('search')){
    $searchValue = post("searchValue");
    header('Location:'. admin_url('search') . '?searchValue=' . $searchValue . '&sayfa=1');
    exit;
}


// limit (sayfa içinde kaç veri gözükecek)
$limit = 96;

// sayfa sayısı (kaçıncı sayfa)
$sayfa = isset($_GET['sayfa']) && is_numeric($_GET['sayfa']) ? $_GET['sayfa'] : 1;
if ($sayfa <= 0){
    $sayfa = 1;
}elseif (!get('sayfa')){
    $sayfa=1;
}

// toplam veri
$toplamVeri = $player->query('SELECT count(vnum) as toplam FROM item_proto')->fetch(PDO::FETCH_ASSOC)['toplam'];

// toplam sayfa sayısı
$toplamSayfa = ceil($toplamVeri / $limit);

// veriler kaçtan başlayacak
$baslangic = ($sayfa * $limit) - $limit;

// verileri listele
$veriler = $player->query('SELECT vnum,locale_name FROM item_proto ORDER BY vnum ASC LIMIT ' . $baslangic . ',' . $limit)->fetchAll(PDO::FETCH_ASSOC);



$sol = $sayfa - 3;
$sag = $sayfa + 3;

if ($sayfa <= 3){
    $sag = 7;
}
if ($sag > $toplamSayfa){
    $sol = $toplamSayfa - 6;
}
if(get('sayfa') > $toplamSayfa || get('sayfa')<1 ){
    header('Location:'. admin_url('error-page'));
}


if (!permission('shop', 'show')){

    permission_page();
}

require admin_view('items');
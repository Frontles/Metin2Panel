<?php



 function add_top_category() {
     global $db;
    $sorgu = $db->prepare("INSERT INTO shop_menu SET
 name=:name, 
 icon=:icon,
 alone=:alone,
 mainmenu=:mainmenu,
 status=:status,
 icon_type=:icon_type
 ");

    $insert=$sorgu->execute([
        'mainmenu'=>0,
        'status'=> 0,
        'name'=>post('name'),
        'alone'=>post('alone'),
        'icon'=>post('icon'),
        'icon_type'=>1

    ]);

    $son_id=$db->lastInsertId();

    $sorgu2= $db->prepare("UPDATE shop_menu SET
    who=:who
     WHERE id = {$son_id}");
    $sorgu2->execute([
        'who'=> $son_id
    ]);

    if ($insert){
        $result['result'] = true;
        $result['message']= 'Kategori Ekleme Başarılı !';
    }else{
        $result['result'] = false;
        $result['message']= 'Bir Sorun Oluştu !';
    }
     return $result;
}



function add_bottom_category() {

     global $db;
    $name = post('name');
    $main = post('mainCategory');



    $sorgu = $db->prepare("INSERT INTO shop_menu SET
 name=:name, 
 who=:who,
 alone=:alone,
 mainmenu=:mainmenu,
 status=:status
 ");

    $insert=$sorgu->execute([
        'mainmenu'=>$main,
        'status'=> 1,
        'name'=>$name,
        'alone'=>1,
        'who'=>$main
    ]);


    if ($insert){

        $result['result'] = true;
        $result['message']= 'Kategori Ekleme Başarılı !';
    }else{
        $result['result'] = false;
        $result['message']= 'Bir Sorun Oluştu !';
    }

    return $result;
}

if (!permission('shop', 'category-add')){

    permission_page();
}
require admin_view('add-category');
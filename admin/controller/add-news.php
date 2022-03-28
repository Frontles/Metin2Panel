<?php
if(!permission('news','news-add')){
    permission_page();
}

function add_news(){

    global $db;
    $resim = resim_yukle($_FILES['news_logo']);
    if ($resim['result'] == 1){
        $yol = $resim['yol'];
    }else{
        $yol = null;
    }
    $sorgu = $db->prepare("INSERT INTO patch SET
     title=:title, 
     content=:content,
     short_content=:short_content,
     image=:image
     ");

    $update=$sorgu->execute([
        'title'=>post('title'),
        'content'=> $_POST['content'],
        'short_content'=>post('short_content'),
        'image'=>$yol
    ]);

    if ($update){
       $result['result']= true;
       $result['message']= 'Haber Başarıyla Eklendi !';

    }else{
        $result['result']= false;
        $result['message']= 'Haber Ekleme Başarısız !';
    }

    return $result;
}
require admin_view('add-news');

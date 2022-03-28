<?php


if (!permission('news', 'shop-news-add')){

    permission_page();
}
function shop_newsleft()

{

    global $db;
    $image = post('link');

    $title = post('title');

    $content = post('content');

    if ($image === '' || $title === '' || $content === '') {

        $result['result'] = false;
        $result['result'] = 'Boş Alanlar Var. Lütfen Kontrol Edin !';
    } else {
        $sorgu = $db->prepare("INSERT INTO banner SET 
            typee=:typee,
            title=:title,
            image=:image,
            content=:content
            ");
        $insert = $sorgu->execute([
            'typee' => 0,
            'image' => $image,
            'title' => $title,
            'content' => $content
        ]);


        if ($insert) {
            $result['result'] = true;
            $result['message'] = 'Sol Mini Bannere Haber Eklendi !';
        } else {
            $result['result'] = false;
            $result['message'] = 'İşlem Başarısız !';
        }

    }
    return $result;
}

function shop_newsright()
{

    global $db;


    $image = post('image');

    $title = post('title');

    $content = post('content');

    if ($image === '' || $title === '' || $content === '') {
        $result['result'] = false;
        $result['result'] = 'Boş Alanlar Var. Lütfen Kontrol Edin !';
    }

    $sorgu1 = $db->prepare('SELECT typee FROM banner WHERE typee=:typee');
    $sorgu1->execute(['typee'=>1]);
    if($sorgu1->rowCount() == 0){

        $sorgu2 = $db->prepare("INSERT INTO banner SET
        image=:image, 
        title=:title,
        content=:content,
        typee=:typee ");

        $insert = $sorgu2->execute([
            'image' => $image,
            'title' => $title,
            'content' => $content,
            'typee'=>1


        ]);


        if ($insert) {
            $result['result'] = true;
            $result['message'] = 'Sağ Mini Bannere Haber Eklendi !';
        } else {
            $result['result'] = false;
            $result['message'] = 'İşlem Başarısız !';
        }
    }
    else {

        $sorgu = $db->prepare("UPDATE banner SET
        image=:image, 
        title=:title,
        content=:content
        WHERE typee = '1' ");

        $update = $sorgu->execute([
            'image' => $image,
            'title' => $title,
            'content' => $content


        ]);


        if ($update) {
            $result['result'] = true;
            $result['message'] = 'Sağ Mini Bannere Haber Eklendi !';
        } else {
            $result['result'] = false;
            $result['message'] = 'İşlem Başarısız !';
        }
    }

    return $result;

}

require admin_view('shop-add-news');

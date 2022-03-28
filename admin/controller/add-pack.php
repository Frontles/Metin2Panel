<?php


if(!permission('packs','add')){
    permission_page();
}
function addpack()
{

    global $db;
    $name = post('pack_name');

    $size = post('pack_size');

    $url = post('pack_url');

    $source = post('pack_source');

    if ($name == '' || $size == '' || $url == '' || $source == '') {
        $result['result'] = false;
        $result['message'] = 'Boş Alanlar Var Lütfen Kontrol Edin !';
    } else {
        $sorgu = $db->prepare("INSERT INTO pack SET
            pack_name=:pack_name , 
            pack_url=:pack_url,
            pack_size=:pack_size,
            pack_image=:pack_image,
            pack_type=:pack_type
            ");

        $insert = $sorgu->execute([
            'pack_name' => $name,
            'pack_url' => $url,
            'pack_size' => $size,
            'pack_image' => $source,
            'pack_type' => 1

        ]);

        if ($insert) {
            $result['result'] = true;
            $result['message'] = 'Pack Başarıyla Eklendi  !';
        } else {
            $result['result'] = false;
            $result['message'] = 'Bir Sorun Oluştu ve Pack Eklenemedi !';
        }


    }

    return $result;


}


require admin_view('add-pack');

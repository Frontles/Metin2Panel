<?php

function generate_key()
{
    static $max = 60466175;
    return strtoupper(sprintf(
        "%05s-%05s-%05s-%05s",
        base_convert(mt_rand(0, $max), 10, 36),
        base_convert(mt_rand(0, $max), 10, 36),
        base_convert(mt_rand(0, $max), 10, 36),
        base_convert(mt_rand(0, $max), 10, 36)
    ));
}


if (!permission('coupon', 'add')){
    permission_page();
}
function add_coupon() {
    global $db;
    $count = post('epCount');
     settype($count,'integer');
    $i = 0;
    $ep = post('coupon_ep');

    if ($ep == ''){
        $result['result'] = false;
        $result['message'] = 'Lütfen EP değeri giriniz !';
    }

    else {

        while ($i < $count ) :;
            $key = generate_key();

            $id = rand(10000000, 999999999);

        $sorgu = $db->prepare("INSERT INTO coupons SET
 id=:id , 
 ep=:ep,
 status=:status,
 anahtar=:anahtar
 ");


        $insert = $sorgu->execute([
            'id' => $id,
            'ep' => $ep,
            'anahtar' => $key,
            'status' => '0'

        ]);
            $i++;
        endwhile;

        if ($insert) {

            $result['result']= true;
            $result['message'] = 'Kupon Başarıyla Oluşturuldu !';
        } else {
            $result['result']= false;
            $result['message'] = 'Kupon Oluşturma İşlemi Başarısız !';
        }

    }

     return $result;

}
    require admin_view('add-coupons');
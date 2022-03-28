<?php


if (!permission('shop', 'item-edit')) {
    permission_page();
}

$id = get('id');
$query = $db->prepare('SELECT * FROM items WHERE id=:id');
$query->execute([
    'id' => $id
]);
$itemcek = $query->fetch(PDO::FETCH_ASSOC);


if (!$itemcek) {
    header('Location:' . admin_url());
    exit;
}


$functions = new Functions();
function edit_item() {
global $db;
global $player;
global $functions;
// item var mı kontrolü ( max10 tane olmalı)

    $control = $db->prepare('SELECT * FROM items WHERE vnum=:vnum');
    $control->execute([
        'vnum'=>post('vnum')
    ]);
    $toplam = $control->rowCount();

    $getProtoquery = $player->prepare('SELECT flag,wearflag,limitvalue0,applytype0,applytype1,applytype2 FROM item_proto WHERE vnum=:vnum');

    $getProtoquery->execute([
        'vnum'=>post('vnum')
    ]);
    $getProto = $getProtoquery->fetch(PDO::FETCH_ASSOC);

    if($toplam > 10){
        $result = ['result'=>false,'message'=>'Bir itemden en fazla 10 adet ekleyebilirsiniz !'];
    }else{
        $itemName = post('itemName');
        $resim = resim_yukle($_FILES['item_logo']);
        if ($resim['result'] == 1){
            $yol = $resim['yol'];
        }else{
            $yol = null;
        }$itemEp = post('itemEp');
        $unit_price = post('unit_price');
        $count_1 = post('count_1');
        $count_2 = post('count_2');
        $count_3 = post('count_3');
        $count_4 = post('count_4');
        $count_5 = post('count_5');
        $discount_1 = post('discount_1');
        $discount_2 = post('discount_2');
        $discount_3 = post('discount_3');
        $discount_4 = post('discount_4');
        $discount_5 = post('discount_5');
        $itemCategory = post('itemCategory');
        $itemStatus = post('status');
        $itemTime = post('time') == null ? '0' :post('time');
        $itemId = rand(100000000,999999999);
        $description = post("description");
        $information = post("information");
        $attrType1 = post('attrType1');
        $attrType2 = post('attrType2');
        $attrType3 = post('attrType3');
        $attrType4 = post('attrType4');
        $attrType5 = post('attrType5');
        $attrType6 = post('attrType6');
        $attrType7 = post('attrType7');
        $attrValue1 = post('attrValue1') =='' ? '0' :post('attrValue1');
        $attrValue2 = post('attrValue2') =='' ? '0' : post('attrValue2');
        $attrValue3 = post('attrValue3') =='' ? '0' :post('attrValue3');
        $attrValue4 = post('attrValue4') =='' ? '0' :post('attrValue4');
        $attrValue5 = post('attrValue5') =='' ? '0' :post('attrValue5');
        $attrValue6 = post('attrValue6') =='' ? '0' :post('attrValue6');
        $attrValue7 = post('attrValue7') =='' ? '0' :post('attrValue7');
        $socket0 = post('socket0');
        $socket1 = post('socket1');
        $socket2 = post('socket2');
        $day = post('day');
        $hour = post('hour');
        $second = post('second');
        $popular = post('popular') == null ? '0' :post('popular');
        $faq_status = post('faq_status');
        $days = $day * (60*60*24);
        $hours = $hour * (60*60);
        $seconds = $second * (60);
        $time = $days + $hours + $seconds;
        $multiCount = 0;
        $discount_status = 0;
        for ($i=1;$i<6;$i++)
        {
            if (post("count_$i") > 0)
                $multiCount++;
        }
        if ($multiCount > 1 && $getProto['flag'] != 4)
            $result = ['result'=>false,'message'=>'Bu item üst üste konmaz !'];
        else
        {
            if ($discount_1 > 0 || $discount_2 > 0 || $discount_3 > 0 || $discount_4 > 0 || $discount_5 > 0)
                $discount_status = 1;
            if ($itemTime == 1){
                if ($time === 0)
                    $socket0 = $getProto['limitvalue0'];
                else
                    $socket0 = $time;
            }
            $wearFlag = $functions->item_attr($getProto['wearflag']);

            $query= $db->prepare("UPDATE items SET 
                item_id=:item_id,
                vnum=:vnum,
                item_name=:item_name,
                item_image=:item_image,
                coins=:coins,
                unit_price=:unit_price,
                count_1=:count_1,
                count_2=:count_2,
                count_3=:count_3,
                count_4=:count_4,
                count_5=:count_5,
                kategori_id=:kategori_id,
                durum=:durum,
                item_time=:item_time,
                discount_1=:discount_1,
                discount_2=:discount_2,
                discount_3=:discount_3,
                discount_4=:discount_4,
                discount_5=:discount_5,
                description=:description,
                attrtype1=:attrtype1,
                attrtype2=:attrtype2,
                attrtype3=:attrtype3,
                attrtype4=:attrtype4,
                attrtype5=:attrtype5,
                attrtype6=:attrtype6,
                attrtype7=:attrtype7,
                attrvalue1=:attrvalue1,
                attrvalue2=:attrvalue2,
                attrvalue3=:attrvalue3,
                attrvalue4=:attrvalue4,
                attrvalue5=:attrvalue5,
                attrvalue6=:attrvalue6,
                attrvalue7=:attrvalue7,
                socket0=:socket0,
                socket1=:socket1,
                socket2=:socket2,
                tarih=:tarih,
                information=:information,
                popularite=:popularite,
                multi_count=:multi_count,
                discount_status=:discount_status,
                faq_status=:faq_status,
                wear_flag=:wear_flag,
                applytype0=:applytype0,
                applytype1=:applytype1,
                applytype2=:applytype2
                
                WHERE id = {$_GET['id']}");

            $update= $query->execute([
                'item_id'=>$itemId,
                'vnum'=>post('vnum'),
                'item_name'=>$itemName,
                'item_image'=>  strlen($yol) >5 ?$yol :  post('eski_yol'),
                'coins'=>$itemEp,
                'unit_price'=>$unit_price,
                'count_1'=>$count_1,
                'count_2'=>$count_2,
                'count_3'=>$count_3,
                'count_4'=>$count_4,
                'count_5'=>$count_5,
                'kategori_id'=>$itemCategory,
                'durum'=>$itemStatus,
                'item_time'=>$itemTime,
                'discount_1' => $discount_1,
                'discount_2' => $discount_2,
                'discount_3' => $discount_3,
                'discount_4' => $discount_4,
                'discount_5' => $discount_5,
                'description'=>$description,
                'attrtype1'=>$attrType1,
                'attrtype2'=>$attrType2,
                'attrtype3'=>$attrType3,
                'attrtype4'=>$attrType4,
                'attrtype5'=>$attrType5,
                'attrtype6'=>$attrType6,
                'attrtype7'=>$attrType7,
                'attrvalue1'=>$attrValue1,
                'attrvalue2'=>$attrValue2,
                'attrvalue3'=>$attrValue3,
                'attrvalue4'=>$attrValue4,
                'attrvalue5'=>$attrValue5,
                'attrvalue6'=>$attrValue6,
                'attrvalue7'=>$attrValue7,
                'socket0'=>$socket0,
                'socket1'=>$socket1,
                'socket2'=>$socket2,
                'tarih'=>date("Y-m-d H:i:s"),
                'information'=>$information,
                'popularite' =>$popular,
                'multi_count' => $multiCount,
                'discount_status' => $discount_status,
                'faq_status' =>$faq_status,
                'wear_flag' =>$wearFlag,
                'applytype0' => $getProto['applytype0'],
                'applytype1' => $getProto['applytype1'],
                'applytype2' => $getProto['applytype2']
            ]);

            if ($update){
                if ($resim['result']== true){
                    $resimsil = post('eski_yol');
                    unlink(  $resimsil );
                }
                $result['result']= true;
                $result['message']= 'İtem Başarıyla Güncellendi !';

            }else{
                $result['result']= false;
                $result['message']= 'Bir Sorun Oluştu. !';
            }

        }
    }


    return $result;
}
require admin_view('edit-item');
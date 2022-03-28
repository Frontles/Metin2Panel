<?php


$getItem= $player->prepare('SELECT * FROM item_proto WHERE vnum=:vnum');
$getItem->execute([
    'vnum'=>get('vnum')
]);
$wheelitem = $getItem->fetchAll(PDO::FETCH_ASSOC);

function item($vnum)
{

    global $wheelitem;
    global $getItem;
    if ($getItem->rowCount() <= 0){
        $data['res'] = false;

    }else{

        if ($file = fopen(data_items('item_desc.txt'), "r")) {
            $itemDesc = null;
            while(!feof($file)) {
                $line = fgets($file);
                $exp = explode('	',$line);

                if ($exp[0] === get('vnum')){
                    $itemDesc .= $exp[2];

                }

            }
            fclose($file);
            $data['res'] = true;
            $data['result'] = $wheelitem;

            $data['item_desc'] = $itemDesc;
            $data['image'] = Functions::itemToPng($wheelitem[0]['vnum']);

        }
        else
        {
            $data['res'] = false;
        }
    }
    return $data;

}


function add_wheel_item(){

// item var mı kontrolü ( max10 tane olmalı)

    global $db;
    global $player;
    global $functions;
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

    $carksayisor = $db->prepare("SELECT id  FROM wheel_items");
    $carksayisor->execute([]);
    $toplam2 = $carksayisor-> rowCount();
    if($toplam > 10){
        $result = ['result'=>false,'message'=>'Bu itemden en fazla 10 adet ekleyebilirsiniz !'];
    }elseif ($toplam2 > 47){
        $result = ['result'=>false,'message'=>'Çarka en fazla 48 adet item ekleyebilirsiniz !'];

    }else{

        $itemName = post('itemName');
        $resim = resim_yukle($_FILES['item_logo']);
        if ($resim['result'] == 1){
            $yol = $resim['yol'];
        }else{
            $yol = null;
        }
        $countt = post('countt');
        $itemTime = post('time');
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
        $days = $day * (60*60*24);
        $hours = $hour * (60*60);
        $seconds = $second * (60);


        $time = $days + $hours + $seconds;
        if ($countt > 1 && $getProto['flag'] != 4)
            $result = ['result'=>false,'message'=>'Bu item üst üste konmaz !'];
        else
        {
            if ($itemTime == 1){
                if ($time === 0)
                    $socket0 = $getProto['limitvalue0'];
                else
                    $socket0 = $time;
            }
            $query= $db->prepare('INSERT INTO wheel_items SET
                vnum=:vnum,
                item_name=:item_name,
                item_image=:item_image,
                countt=:countt,
                item_time=:item_time,
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
                information=:information
                ');

            $insert= $query->execute([
                'vnum'=>post('vnum'),
                'item_name'=>$itemName,
                'item_image'=>  strlen($yol) >5 ?$yol :  substr(data_items($functions->itemToPng(post('vnum'))),25),
                'countt'=>$countt,
                'item_time'=>$itemTime,
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
                'information'=>$information
            ]);

            $result['result']= true;
            $result['message'] = 'Çark İtem Ekleme Başarılı !';

        }
    }

    return $result;
}

if (!permission('shop', 'wheel-item-add')){

    permission_page();
}
require admin_view('add-wheel-item');
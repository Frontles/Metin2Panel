<?php

$carkdurum =settings('settings_wheel');
$carkitemsayisor = $db->prepare('SELECT * FROM wheel_items');
$carkitemsayisor->execute();
$carkitemsayi = $carkitemsayisor->rowCount();

if($carkdurum!= 1){
    require  shop_view('wheel-error2');

}elseif($carkitemsayi<16){
    require shop_view('wheel-error');
}
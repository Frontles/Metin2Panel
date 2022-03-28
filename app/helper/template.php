<?php

function site_url($url=false){
    return URL .'/' . $url;
}

function public_url($url=false){
    return URL .'/public/' . settings('settings_theme'). '/' . $url;
}

function error(){
    global $err;
    return isset($err) ? $err : false;
}

function success(){
    global $succ;
    return isset($succ) ? $succ : false;
}
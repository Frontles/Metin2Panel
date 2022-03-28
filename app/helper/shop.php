<?php



function shop_controller ($controllerName){

    $controllerName = strtolower($controllerName);
    return PATH . '/shop/'.  settings('settings_theme') . '/controller/'  .  $controllerName . '.php';
}

function shop_view ($viewName){

    $viewName = strtolower($viewName);
    return PATH . '/shop/' . settings('settings_theme') . '/view/' . $viewName . '.php';
}


function shop_url($url=false){
    return URL .'/shop/' . $url;
}

function shop_public_url($url=false){
    return URL .'/shop/' . settings('settings_theme') . '/public/'  . $url;
}
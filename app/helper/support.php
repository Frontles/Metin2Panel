<?php



function support_controller ($controllerName){

    $controllerName = strtolower($controllerName);
    return PATH . '/support/'.  settings('settings_theme') . '/controller/'  .  $controllerName . '.php';
}

function support_view ($viewName){

    $viewName = strtolower($viewName);
    return PATH . '/support/' . settings('settings_theme') . '/view/' . $viewName . '.php';
}


function support_url($url=false){
    return URL .'/support/' . $url;
}

function support_public_url($url=false){
    return URL .'/support/' . settings('settings_theme') . '/public/'  . $url;
}
<?php

if (!route(1)){
    $route[1]= 'index';
}
if (!file_exists(support_controller(route(1)))){
    $route[1]= 'index';
}


require support_controller(route(1));
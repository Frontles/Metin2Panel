<?php

if (!route(1)) {
    $route[1] = 'index';
}
if (!file_exists(shop_controller(route(1)))) {
    $route[1] = 'index';
}


require shop_controller(route(1));
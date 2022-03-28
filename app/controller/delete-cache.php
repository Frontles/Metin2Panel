<?php

$cache = new Cache();

    $cache->delete('all');

    Session::set('delete_cache',true);

    header('Location:'. admin_url('index'));


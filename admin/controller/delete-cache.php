<?php

$cache = new Cache();

    $cache->delete('all');

    session_set('delete_cache',true);

    header('Location:'. admin_url('index'));


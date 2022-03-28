<?php


function patch_view($arg)

{
    global $db;

    $sth = $db->prepare('SELECT * FROM patch WHERE id=:id');
    $sth->execute([
        'id' => $arg
    ]);

    $sonuc = $sth->fetch(PDO::FETCH_ASSOC);
    if (($sth->rowCount()) == 0) {

        site_url('errors');

    } else {

        return $sonuc;

    }

}

require view('patch-view');

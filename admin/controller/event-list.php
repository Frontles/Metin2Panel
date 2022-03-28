<?php
$eventsorgu= $db->prepare('SELECT * FROM event_crone');
$eventsorgu->execute();
$eventsonuc=$eventsorgu->fetchAll(PDO::FETCH_ASSOC);

if(!permission('events','show')){
    permission_page();
}
require admin_view('event-list');
<?php

$arg = get('code');

$filtre = new Filter();

$arg = $filtre->mainFilter(strtolower($arg));
if ($arg === false){
    header('Location:'. site_url('index'));exit;
}
 else {

     $control = $db->prepare('SELECT * FROM language WHERE code=:code');
     $control->execute(['code'=>$arg]);
     if (($control->rowCount()) <= 0) {
         header('Location:' . site_url('index'));exit;
     }
     else {
         $sorgu = $db->prepare('UPDATE settings SET 
          selected_language=:selected_language WHERE settings_id='. 1);
         $sorgu->execute([
             'selected_language'=>$arg
         ]);

         header('Location:'. site_url('index'));exit;
     }
 }


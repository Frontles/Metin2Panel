<?php


session_start();
ob_start();
error_reporting(E_ALL);
ini_set("display_errors",1);

date_default_timezone_set('Europe/Istanbul');

function loadClasses($ClassName)
{
    require __DIR__ . '/classes/' . $ClassName . '.php';
} 


spl_autoload_register('loadClasses');



$config = require __DIR__ . '/config.php';
try {
    $db = new PDO ('mysql:host='. $config['db']['host'] . ';dbname='. $config['db']['name'] . ';charset=utf8' , $config['db']['user'],$config['db']['pass']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $account = new PDO ('mysql:host='. $config['account']['host'] . ';dbname='. $config['account']['name'] . ';charset=utf8', $config['account']['user'],$config['account']['pass']);
    $account->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $player = new PDO ('mysql:host='. $config['player']['host'] . ';dbname='. $config['player']['name'] . ';charset=utf8', $config['player']['user'],$config['player']['pass']);
    $player->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



}
catch (PDOException $e){
     echo 'mysql hatası :'  . $e;
     
}

foreach (glob(__DIR__ . '/helper/*.php') as $helperFile) {
    require $helperFile;
}

foreach (glob(__DIR__ . '/language/*.php') as $languageFile) {
    require $languageFile;
}


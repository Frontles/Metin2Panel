<?php
setloginlog('0');


if (isset($_SESSION['user_id']))

    unset($_SESSION['user_id']);

if (isset($_SESSION['player_id']))

    unset($_SESSION['player_id']);

if (isset($_SESSION['shopLogin']))

    unset($_SESSION['shopLogin']);

if (isset($_SESSION['sId']))

    unset($_SESSION['sId']);


if (isset($_SESSION['user_name']))

    unset($_SESSION['user_name']);


header('Location:'. site_url());
exit;
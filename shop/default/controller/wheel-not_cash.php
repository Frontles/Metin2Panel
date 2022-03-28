<?php

$aid = session_get('user_id');
$sorgu = $account->prepare('SELECT cash,mileage FROM account WHERE id=:id');
$sorgu->execute(['id'=>$aid]);
$sonuc = $sorgu->fetch(PDO::FETCH_ASSOC);


require shop_view('wheel-not_cash');
<?php

if(!permission('coupon','show')){
    permission_page();
}
$query = $db->prepare('SELECT * FROM coupons WHERE status=:status');
$query ->execute([
    'status'=>1
]);
$coupons=$query->fetchAll(PDO::FETCH_ASSOC);



require admin_view('used-coupons');
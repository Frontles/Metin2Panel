<?php



if (!permission('accounts', 'show')) {
    permission_page();
}
$query = $account->prepare('SELECT * FROM account WHERE cash >:cash');
$query->execute([
    'cash'=>0
]);
$goteps = $query->fetchAll(PDO::FETCH_ASSOC);



require admin_view('account-gotep');

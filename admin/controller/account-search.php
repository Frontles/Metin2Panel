<?php

$filtre = new Filter();

$login = $filtre->mailFilter(post('login'));


if (!permission('accounts', 'search')) {
    permission_page();
}
if (!post('login')){
    header('Location:'. admin_url('index'));
    exit;
}
function search()
{

    if (post('login')) {



        global $login;
            global $account;
            $searchsor = $account->prepare("SELECT id,login,email,status,ip FROM account WHERE  login LIKE ? ");
            $searchsor->execute([
                "%$login%"
            ]);

            $searchrows = $searchsor->fetchAll(PDO::FETCH_ASSOC);
            $data['result'] = true;



            $data['login'] = $searchrows;
            $data['count'] = $searchsor->rowCount();

        }
        return $data;


}





require admin_view('account-search');
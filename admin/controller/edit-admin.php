<?php
if(!permission('users','edit')){
    permission_page();
}
$id = get('id');
$query = $db->prepare('SELECT * FROM users WHERE user_id=:id');
 $query->execute([
    'id'=>$id
]);
$row = $query->fetch(PDO::FETCH_ASSOC);

if (!$row){

   header('Location:'. admin_url('admin-list'));
}

function edit_admin() {
global $db;
global $id;


    $data = json_encode($_POST['user_permissions']);
    
    
    $sorgu = $db->prepare("UPDATE users SET

 user_ip_aciklama=:user_ip_aciklama,
 user_ip=:user_ip,
 user_imza=:user_imza,
 user_name=:user_name, 
 user_status=:user_status,
 user_rank=:user_rank,
 user_permissions=:user_permissions
 
 WHERE user_id = {$id}");

    $update=$sorgu->execute([
        'user_name'=>post('user_name'),
        'user_ip'=>post('user_ip'),
        'user_status'=>post('user_status'),
        'user_ip_aciklama'=> post('user_ip_aciklama'),
        'user_imza'=> post('user_imza'),
        'user_rank'=>post('user_rank'),
        'user_permissions'=>$data

    ]);

    if ($update){
        $result['result'] = true;
        $result['message'] = 'Hesap Düzenleme İşlemi Başarılı !';
    }else{
        $result['result'] = false;
        $result['message'] = 'Bir Sorun Oluştu !';
    }

    return $result;
}
$permissions = json_decode($row['user_permissions'],true);


require admin_view('edit-admin');
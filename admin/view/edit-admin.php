<?php
require admin_view('static/header');


$uyesorgu= $db->prepare("SELECT * FROM users WHERE user_id =:id ");
$uyesorgu->execute([
    'id'=> get('id')
]);
$uyesonuc= $uyesorgu->fetch(PDO::FETCH_ASSOC);

if(post('edit_admin')){
    $editadmin = edit_admin();
}
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Bilgi Güncelle <small>
                            </small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <?php if ( isset($editadmin['result']) && $editadmin['result'] == ''): ?>
                            <div  class=" alert alert-danger" >
                                <?= $editadmin['message']?>
                            </div>
                        <?php endif; ?>
                        <?php  if (isset($editadmin['result']) && $editadmin['result'] ==true ):  ?>
                            <div class=" alert alert-success" role="alert">
                                <?= $editadmin['message'];
                                if ($editadmin['result']== true):  ?>
                                    <script>
                                        setTimeout(function(){
                                            window.location.assign("<?= admin_url('edit-admin?id='. get('id')) ?>");
                                            //3 saniye sonra yönlenecek
                                        },1500);
                                    </script>
                                <?php endif;?>

                            </div>
                        <?php endif; ?>

                        <form id="demo-form2" action="" method="post" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Adı <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="user_name"  value="<?= post('user_name') ? post('user_name') : $uyesonuc['user_name'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >IP Adresi <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?= $uyesonuc['user_ip'] ?>" name="user_ip"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >IP Açıklaması <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text"  name="user_ip_aciklama" value="<?= post('user_ip_aciklama') ? post('user_ip_aciklama') : $uyesonuc['user_ip_aciklama'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı İmzası <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text"  name="user_imza" placeholder="Kullanıcı imzası" required="required" value="<?= post('user_imza') ? post('user_imza') : $uyesonuc['user_imza']; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Durum <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="user_status" id="heard" class="form-control">
                                        <option value="1" <?= $uyesonuc['user_status']== '1' ? 'selected' : null; ?> >Aktif</option>
                                        <option value="0" <?= $uyesonuc['user_status']== '0' ? 'selected' : null; ?> >Pasif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Rütbe <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    
                                   
                                    <select class="form-control col-md-7 col-xs-12" name="user_rank"><option value="0">Rütbe Seçiniz</option>
                                        <?php foreach (user_ranks() as $id=> $rank):  ?>
                                            <option <?= $uyesonuc['user_rank'] == $id ? 'selected': null; ?> value="<?= $id ?>"> <?= $rank ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>



                            <?php if(permission('users','izinekle')): ?>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Izinler <span class="required">*</span>
                                </label>
                                <div class="permissions col-md-6 col-sm-6 col-xs-12">

                                    <?php foreach ($menus as $url=> $menu): ?>
                                     <div class="">
                                         <h3><?= $menu['title'] ?></h3>
                                     </div>

                                    <div class="list">
                                        <?php foreach ($menu['permissions'] as $key=> $val ): ?>

                                            <label>
                                                <input <?= (isset($permissions[$url][$key]) &&$permissions[$url][$key] == 1 ) ? 'checked' :null; ?> name="user_permissions[<?= $url?>][<?= $key?>]" value="1" type="checkbox">  <?= $val  ?>
                                                <br>
                                            </label>
                                        
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endif; ?>



                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input type="hidden" name="user_id" value="<?= $uyesonuc['user_id'] ?>">
                                    <button  type="submit" name="edit_admin" value="1" class="btn btn-success">Güncelle</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->

<?php require admin_view('static/footer');?>

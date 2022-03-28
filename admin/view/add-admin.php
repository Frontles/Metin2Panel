<?php require admin_view('static/header');

if (post('add_admin')){

   $addadmin = add_admin_account();
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
                        <h2>Yönetici Oluştur <small>
                            </small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <?php if ( isset($addadmin['result']) && $addadmin['result'] == ''): ?>
                            <div  class=" alert alert-danger" >
                                <?= $addadmin['message']?>
                            </div>
                        <?php endif; ?>
                        <?php  if (isset($addadmin['result']) && $addadmin['result'] ==true ):  ?>
                            <div class=" alert alert-success" role="alert">
                                <?= $addadmin['message'];
                                if ($addadmin['result']== true):  ?>
                                    <script>
                                        setTimeout(function(){
                                            window.location.assign("<?= admin_url('admin-list') ?>");
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
                                    <input type="text"  name="user_name"  placeholder="Kullanıcı Adınızı Giriniz(Minimum 4 karakter).." value="<?= post('user_name') ? post('user_name') : null; ?>" minlength="4" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Şifre <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  type="password"  name="user_password"  placeholder="Şifrenizi  Giriniz(Minimum 5 karakter).."  minlength="5" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >IP Adresi <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" placeholder="Kullanıcının IP Adresini Giriniz.." name="user_ip" value="<?= post('user_ip') ? post('user_ip') : null; ?>"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >IP Açıklaması <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text"  name="user_ip_aciklama" placeholder="Örn: Esat pc" required="required" value="<?= post('user_ip_aciklama') ? post('user_ip_aciklama') : null; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı İmzası <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text"  name="user_imza" placeholder="Kullanıcı imzası" required="required" value="<?= post('user_imza') ? post('user_imza') : null; ?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Durum <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="user_status" id="heard" class="form-control">

                                        <option value="1" >Aktif</option>
                                        <option value="0" >Pasif</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Rütbe <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control col-md-7 col-xs-12" name="user_rank"><option value="0">Rütbe Seçiniz</option>
                                        <?php foreach (user_ranks() as $id=> $rank):  ?>
                                            <option value="<?= $id ?>"> <?= $rank ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

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
                                                    <input <?= (isset($permissions[$url][$key]) &&$permissions[$url][$key] == 1 ) ? 'checked' :null; ?> name="user_permissions[<?= $url?>][<?= $key?>]" value="1" type="checkbox"><?= $val ?>
                                                </label>

                                            <?php endforeach; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <style>
                                .permissions{
                                    max-width: 48%;
                                    border: 1px solid #ccc;
                                    background-color: #fff;
                                    padding: 10px;
                                }
                                .permissions  h3 {
                                    font-size: 16px;
                                    font-weight: bold;

                                }
                                .permissions .list{
                                    padding-bottom: 15px;

                                }
                                .permission div:last-child .list{
                                    padding-bottom: 0px !important;
                                }
                                .permissions .list label{
                                    display: inline-block !important;
                                    margin-right: 10px;
                                    font-weight: normal !important;
                                }
                            </style>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button  type="submit" name="add_admin" value="1" class="btn btn-success">Ekle</button>
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

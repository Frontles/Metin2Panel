<?php require admin_view('static/header');

if(post('add_account')){
    $create = create();

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
                        <h2 style="color: #32C5D2"> <i class="fa fa-user"></i> Hesap Oluştur <small>
                            </small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <?php

                        if ( isset($create['result']) && $create['result'] == false): ?>

                            <div  class=" alert alert-danger" >

                                <?= $create['message']?>

                            </div>

                        <?php endif; ?>

                        <?php  if (isset($create['result']) && $create['result'] ==true ):  ?>

                            <div class=" alert alert-success" role="alert">

                                <?= $create['message'];  ?>
                                <script>
                                    setTimeout(function(){
                                        window.location.assign("<?= admin_url('account?id='. $create['sonid']) ?>");
                                    },2000);
                                </script>

                            </div>

                        <?php endif; ?>
                        <br />
                        <form id="demo-form2" action="" method="post" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Ad Soyad: <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?= post('realname') ? post('realname') : null; ?>" name="realname"  placeholder="Adınız ve Soyadınız" minlength="3" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Adı: <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" value="<?= post('login') ? post('login') : null; ?>"  name="login"  placeholder="Kullanıcı Adınız(Minimum 4 karakter).." minlength="4" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Şifre <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="password" value="<?= post('password') ? post('password') : null; ?>"  name="password"  placeholder="Şifreniz(Minimum 5 karakter).." minlength="5" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >E-mail Adresi: <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" placeholder="E-mail Adresi" value="<?= post('email') ? post('email') : null; ?>" name="email"  class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Karakter Silme Kodu : <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" placeholder="Karakter Silme Kodu"  value="<?= post('ksk') ? post('ksk') : null; ?>" name="ksk"  required="required" class="form-control col-md-7 col-xs-12">
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
                                    <button  type="submit" name="add_account" value="1" class="btn btn-success">Hesap Oluştur</button>
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


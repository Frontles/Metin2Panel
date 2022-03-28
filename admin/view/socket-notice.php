<?php require admin_view('static/header');

if (post('socket_notice')){

   $duyuru = noticeset();
}

?>

<center>
    <div class="right_col" role="main" >
        <div  class="row" style="width: 80%" >
            <ul>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-bullhorn font-red"></i> DUYURU GEÇ  <small>

                                </small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <br>
                        <?php if (isset($duyuru['result']) && $duyuru['result'] == ''): ?>
                            <div class=" alert alert-danger " style="width: 50%">
                                <?= $duyuru['message'] ?>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($duyuru['result']) && $duyuru['result'] == true): ?>
                            <div class=" alert alert-success" style="width: 50%" role="alert">
                                <?= $duyuru['message'];
                                if ($duyuru['result'] == true): ?>
                                    <script>
                                        setTimeout(function () {
                                            window.location.assign("<?= admin_url('socket-notice') ?>");
                                            //3 saniye sonra yönlenecek
                                        }, 1500);
                                    </script>
                                <?php endif; ?>

                            </div>
                        <?php endif; ?>
                        <form id="demo-form2" action="" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" > Duyuru <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="notice"  required="required" placeholder="Duyuru" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" ><span class="required"></span></label><span class="help-block col-md-6col-sm-6 col-xs-12">Oyun içi Yazmak Istediğiniz Duyuruyu  giriniz... </span>


                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button  type="submit" value="1" name="socket_notice" class="btn btn-success"> Duyuru Geç </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</center>
<?php require admin_view('static/footer'); ?>
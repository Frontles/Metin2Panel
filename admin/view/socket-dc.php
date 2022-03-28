<?php require admin_view('static/header');

if (post('dc_at')) {

    $dcat = dcset();
}

?>
    <center>
        <div class="right_col" role="main">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php if (settings('socket_status') == 0): ?>
                    <b style="color: darkred">Bu işlemi gerçekleştirebilmem için <a
                                href="<?= admin_url('settings') ?>">buradan</a> oyununuzun socket bağlantısını
                        gerçekleştirmeniz gerekiyor...</b>
                <?php else: ?>
                    <br>
                    <?php if (isset($dcat['result']) && $dcat['result'] == ''): ?>
                        <div class=" alert alert-danger " style="width: 50%">
                            <?= $dcat['message'] ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($dcat['result']) && $dcat['result'] == true): ?>
                        <div class=" alert alert-success" style="width: 50%" role="alert">
                            <?= $dcat['message'];
                            if ($dcat['result'] == true): ?>
                                <script>
                                    setTimeout(function () {
                                        window.location.assign("<?= admin_url('socket-dc') ?>");
                                        //3 saniye sonra yönlenecek
                                    }, 1500);
                                </script>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>


                    <div class="row " style="width: 100% !important;">

                        <ul>
                            <div class="col-md-12 col-sm-12 col-xs-12" style="width: 75% !important;">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><i class="fa fa-exclamation font-red"></i> DC AT <small>(KARAKTER ADI
                                                ILE)

                                            </small></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <br>

                                    <form id="demo-form2" action="" method="post" enctype="multipart/form-data"
                                          data-parsley-validate class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Karakter Adı
                                                <span
                                                        class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="hidden" name="stat" value="1">
                                                <input type="text" name="character_name" required="required"
                                                       class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button value="1" type="submit" name="dc_at"
                                                        class="btn btn-success">Dc At
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </ul>
                    </div>
                    <br><br>
                    <div class="row " style="width: 100% !important;">
                        <ul>
                            <div class="col-md-12 col-sm-12 col-xs-12" style="width: 75% !important;">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><i class="fa fa-exclamation font-red"></i> DC AT <small>(KULLANICI ADI
                                                ILE)

                                            </small></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <br>
                                    <form id="demo-form2" action="" method="post" enctype="multipart/form-data"
                                          data-parsley-validate class="form-horizontal form-label-left">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> Kullanıcı Adı
                                                <span
                                                        class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="hidden" name="stat" value="0">
                                                <input type="text" name="character_name" required="required"
                                                       class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button value="1" type="submit" name="dc_at"
                                                        class="btn btn-success">Dc At
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </center>
<?php require admin_view('static/footer'); ?>
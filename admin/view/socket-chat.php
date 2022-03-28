<?php require admin_view('static/header');


if (post('chat_ban')){

   $chatban = chatset();
}

?>

    <center>
        <div class="right_col" role="main" >
            <div  class="row" style="width: 80%" >
                <ul>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-exclamation font-red"></i> CHAT BAN AT  <small> (KARAKTER ADI ILE)

                                    </small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <br>
                            <?php if (isset($chatban['result']) && $chatban['result'] == ''): ?>
                                <div class=" alert alert-danger " style="width: 50%">
                                    <?= $chatban['message'] ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($chatban['result']) && $chatban['result'] == true): ?>
                                <div class=" alert alert-success" style="width: 50%" role="alert">
                                    <?= $chatban['message'];
                                    if ($chatban['result'] == true): ?>
                                        <script>
                                            setTimeout(function () {
                                                window.location.assign("<?= admin_url('socket-chat') ?>");
                                                //3 saniye sonra yönlenecek
                                            }, 1500);
                                        </script>
                                    <?php endif; ?>

                                </div>
                            <?php endif; ?>

                            <form id="demo-form2" action="" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" > Karakter Adı <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="name"  required="required" placeholder="Karakter Adı" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" ><span class="required"></span></label><span class="help-block col-md-6col-sm-6 col-xs-12">Chat Ban atmak istediğiniz Karakter adını giriniz... </span>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" > Süre <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="time"  placeholder="1 gün = 24h, 2 saat = 1h, 30 dakika = 30m" required="required" class="form-control col-md-5 col-xs-12">
                                    </div>
                                </div>
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" ><span class="required"></span></label><span class="help-block col-md-6 col-sm-6 col-xs-12">Chat Ban atmak istediğiniz süreyi giriniz... </span>


                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button value="1"  type="submit" name="chat_ban" class="btn btn-success">Chat Ban At</button>
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
<?php require admin_view('static/header');



if (post('open_drop')){
   $socketdrop = drop_open();
}
?>

    <div class="right_col" role="main">
        <div class="row" >
        <?php if (settings('socket_status') == 0):?>
            <b style="color: darkred">Bu işlemi gerçekleştirebilmem için <a href="<?=URI::get_path('setting/socket')?>">buradan</a> oyununuzun socket bağlantısını gerçekleştirmeniz gerekiyor...</b>
        <?php else:?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_title">
                    <h2> <i class="fa fa-code "></i>  Dropları Aç <small>
                        </small></h2>
                    <div class="clearfix"></div>
                </div>
                <br>
                <?php if (isset($dcat['result']) && $dcat['result'] == ''): ?>
                    <div class=" alert alert-danger">
                        <?= $dcat['message'] ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($dcat['result']) && $dcat['result'] == true): ?>
                    <div class=" alert alert-success" role="alert">
                        <?= $dcat['message'];
                        if ($dcat['result'] == true): ?>
                            <script>
                                setTimeout(function () {
                                    window.location.assign("<?= admin_url('socket-drop') ?>");
                                    //3 saniye sonra yönlenecek
                                }, 1500);
                            </script>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>
                <form id="couponCreate" action="" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">



                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Bayrak Seçiniz <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control col-md-7 col-xs-12" id="" name="drop_flag">
                                <option  value="0">Tüm Bayraklar</option>
                                <option  value="1">Kırmızı Bayrak</option>
                                <option  value="2">Mavi Bayrak</option>
                                <option  value="3">Sarı Bayrak</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Drop Türü Seçiniz. <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control col-md-7 col-xs-12" id="epCount" name="drop_type">
                                <option  value="0">Tüm Droplar</option>
                                <option  value="1">Item Drop</option>
                                <option  value="2">Gold Drop</option>
                                <option  value="3">Gold10 Drop</option>
                                <option  value="4">Exp Drop</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Oran <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="ep"  name="drop_rate" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" ><span class="required"></span></label><span class="help-block col-md-9 col-sm-9 col-xs-12"> Açmak İstediğiniz Drop Oranı</span>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Süre <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="ep"  name="drop_time" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" ><span class="required"></span></label><span class="help-block col-md-9 col-sm-9 col-xs-12"> Drop Süresi (Saat olarak hesaplanır..)</span>

                    <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button data-style="contract"  value="1" type="submit" name="open_drop" class="btn btn-success">Oluştur</button>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>
        </div>
    </div>

<?php require admin_view('static/footer')?>
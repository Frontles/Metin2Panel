<?php require admin_view('static/header');

if (post('add_coupon')){
    $addcoupon = add_coupon();
}

?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">


                    <div class="x_title">
                        <h2> <i class="fa fa-cc-visa font-red-sunglo"></i>  Market Ayarları <small>
                            </small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <br>
                    <?php if ( isset($addcoupon['result']) && $addcoupon['result'] == ''): ?>
                        <div  class=" alert alert-danger" >
                            <?= $addcoupon['message']?>
                        </div>
                    <?php endif; ?>
                    <?php  if (isset($addcoupon['result']) && $addcoupon['result'] ==true ):  ?>
                        <div class=" alert alert-success" role="alert">
                            <?= $addcoupon['message'];
                            if ($addcoupon['result']== true):  ?>
                                <script>
                                    setTimeout(function(){
                                        window.location.assign("<?= admin_url('add-coupons') ?>");
                                        //3 saniye sonra yönlenecek
                                    },1200);
                                </script>
                            <?php endif;?>

                        </div>
                    <?php endif; ?>
                    <form id="couponCreate" action="" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >EP Miktarı <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="ep"  name="coupon_ep" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" ><span class="required"></span></label><span class="help-block col-md-9 col-sm-9 col-xs-12"> Oluştumak İstediğiniz Kuponun Ep Miktarını Giriniz...</span>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kaç Adet kupon Oluşturulsun ? <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" id="epCount" name="epCount">
                                    <option  value="1">1 Adet</option>
                                    <option  value="5">5 Adet</option>
                                    <option  value="10">10 Adet</option>
                                    <option  value="15">15 Adet</option>
                                    <option  value="20">20 Adet</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button data-style="contract"  value="1" type="submit" name="add_coupon" class="btn btn-success">Oluştur</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



<?php require admin_view('static/footer')?>
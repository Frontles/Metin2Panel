<?php require admin_view('/static/header');


$bannersor = $db->prepare('SELECT * FROM banner WHERE typee=:typee');
$bannersor->execute([
    'typee' => 1
]);
$banner = $bannersor->fetch(PDO::FETCH_ASSOC);

if (post('banner_left')){
    $shopaddnewsleft = shop_newsleft();
}
if (post('banner_right')){
    $shopaddnewsright = shop_newsright();
}


?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <center>
                <div class="row" style="width: 80%">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-newspaper-o"> </i> Markete Haber Ekle (Sol Mini Banner)
                                </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br/>
                                <?php if (isset($shopaddnewsleft['result']) && $shopaddnewsleft['result'] == ''): ?>
                                    <div class=" alert alert-danger">
                                        <?= $shopaddnewsleft['message'] ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($shopaddnewsleft['result']) && $shopaddnewsleft['result'] == true): ?>
                                    <div class=" alert alert-success" role="alert">
                                        <?= $shopaddnewsleft['message'];
                                        if ($shopaddnewsleft['result'] == true): ?>
                                            <script>
                                                setTimeout(function () {
                                                    window.location.assign("<?= admin_url('shop-news-list') ?>");
                                                    //3 saniye sonra yönlenecek
                                                }, 1500);
                                            </script>
                                        <?php endif; ?>

                                    </div>
                                <?php endif; ?>
                                <form id="newsCreate" action="" method="POST" data-parsley-validate
                                      class="form-horizontal form-label-left">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Haber Resim Linki <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="link" placeholder="Haber resmi için link giriniz.."
                                                   required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <br><br>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Haber Başlığı <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" value="<?= post('title') ? post('title') : null; ?>" name="title" placeholder="Haber Başlığını giriniz.."
                                                   required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>


                                    <br><br>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Haber İçeriği
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="content"
                                                   value="<?= post('content') ? post('content') : null; ?>"
                                                   placeholder=" Haber için içerik giriniz.." required="required"
                                                   class="form-control col-md-7 col-xs-12">

                                        </div>
                                    </div>
                                    <br>


                                    <div class="form-group">
                                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button value="1" type="submit" name="banner_left" class="btn btn-success">
                                                Ekle
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-newspaper-o"> </i> Markete Haber Ekle (Sağ Mini Banner)</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br/>
                                <?php if (isset($shopaddnewsright['result']) && $shopaddnewsright['result'] == ''): ?>
                                    <div class=" alert alert-danger">
                                        <?= $shopaddnewsright['message'] ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($shopaddnewsright['result']) && $shopaddnewsright['result'] == true): ?>
                                    <div class=" alert alert-success" role="alert">
                                        <?= $shopaddnewsright['message'];
                                        if ($shopaddnewsright['result'] == true): ?>
                                            <script>
                                                setTimeout(function () {
                                                    window.location.assign("<?= admin_url('shop-news-list') ?>");
                                                    //3 saniye sonra yönlenecek
                                                }, 1500);
                                            </script>
                                        <?php endif; ?>

                                    </div>
                                <?php endif; ?>
                                <form id="newsCreate" action="" method="POST" data-parsley-validate
                                      class="form-horizontal form-label-left">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Haber Resim Linki <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="image" value="<?= $banner['image'] ?>"
                                                   required="required" class="form-control col-md-7 col-xs-12 " placeholder="Haber Resim Linki">
                                        </div>
                                    </div>

                                    <br><br>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Haber Başlığı <span
                                                    class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="title" value="<?= $banner['title'] ?>"
                                                   required="required" class="form-control col-md-7 col-xs-12" placeholder="Haber Başlığı">
                                        </div>
                                    </div>


                                    <br><br>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kısa İçerik
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="content" value="<?= $banner['content'] ?>"
                                                   placeholder=" Haber için kısa içerik (ÖRN: Patch v4 Güncellemesi için tıklayınız...)"
                                                   required="required" class="form-control col-md-7 col-xs-12">

                                        </div>
                                    </div>
                                    <br>


                                    <div class="form-group">
                                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button value="1" type="submit" name="banner_right" class="btn btn-success">
                                                Ekle
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
    <!-- /page content -->
<?php require admin_view('/static/footer');
<?php require admin_view('/static/header');


$bannersor= $db->prepare('SELECT * FROM banner WHERE typee=:typee');
$bannersor->execute([
    'typee'=>1
]);
$banner= $bannersor->fetch(PDO::FETCH_ASSOC);

if (post('add_pack')){
    $addpack = addpack();
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
                                <h2><i class="fa fa-files-o">  </i>  Pack Ekle <small>

                                    </small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <?php if (isset($addpack['result']) && $addpack['result'] == ''): ?>
                                    <div class=" alert alert-danger " style="width: 50%">
                                        <?= $addpack['message'] ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($addpack['result']) && $addpack['result'] == true): ?>
                                    <div class=" alert alert-success" style="width: 50%" role="alert">
                                        <?= $addpack['message'];
                                        if ($addpack['result'] == true): ?>
                                            <script>
                                                setTimeout(function () {
                                                    window.location.assign("<?= admin_url('pack-list') ?>");
                                                    //3 saniye sonra yönlenecek
                                                }, 1500);
                                            </script>
                                        <?php endif; ?>

                                    </div>
                                <?php endif; ?>
                                <form id="newsCreate" action="" method="POST"  data-parsley-validate class="form-horizontal form-label-left">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Pack Linki <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="pack_url" placeholder="Pack Linki" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>

                                    <br><br>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Pack Başlığı <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="pack_name"  placeholder="Pack Adı" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>


                                    <br><br>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Pack Boyutu<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="pack_size" placeholder=" Pack Boyutu" required="required" class="form-control col-md-7 col-xs-12">

                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kaynak <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="source" name="pack_source" class="form-control col-md-7 col-xs-12" >

                                                <option value="./data/flags/dosyatc.png" selected>Dosya.tc</option>
                                                <option value="./data/flags/dosyaco.png" selected>Dosya.co</option>
                                                <option value="./data/flags/mega.png">Mega.nz</option>
                                                <option value="./data/flags/yandex.png">Yandex.Disk</option>
                                                <option value="./data/flags/mediafire.png">Mediafire</option>
                                                <option value="./data/flags/dosyaupload.png">DosyaUpload.com</option>
                                                <option value="./data/flags/file.png">Diğer</option>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <img id="fileImage" src="<?=URL.'/data/flags/file.png'?>" width="100px">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button value="1"  type="submit" name="add_pack" class="btn btn-success">Ekle</button>
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

    <script>

        $('#source').change(function(){
            var image = $('#source').val();
            document.getElementById('fileImage').src = "<?=URL?>" + image;
        });
    </script>
    <!-- /page content -->
<?php require admin_view('/static/footer');
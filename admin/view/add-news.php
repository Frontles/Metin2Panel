<?php require admin_view('/static/header');


$previewsorgu = $db->prepare('SELECT * FROM preview WHERE preview_id=:id');
$previewsorgu->execute([
    'id' => 1
]);
$previewsonuc = $previewsorgu->fetch(PDO::FETCH_ASSOC);

if (post('add_news')){
    $addnews = add_news();
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
                            <h2><i class="fa fa-newspaper-o"> </i> Haber Ekle</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <?php if (isset($addnews['result']) && $addnews['result'] == ''): ?>
                                <div class=" alert alert-danger">
                                    <?= $addnews['message'] ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($addnews['result']) && $addnews['result'] == true): ?>
                                <div class=" alert alert-success" role="alert">
                                    <?= $addnews['message'];
                                    if ($addnews['result'] == true): ?>
                                        <script>
                                            setTimeout(function () {
                                                window.location.assign("<?= admin_url('news-list') ?>");
                                                //3 saniye sonra yönlenecek
                                            }, 1500);
                                        </script>
                                    <?php endif; ?>

                                </div>
                            <?php endif; ?>
                            <form id="newsCreate" action="" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group form-md-line-input form-md-floating-label ">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Haber Resmi Ekle
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6">


                                        <input type="file" id="dosya" name="news_logo" class="form-control col-md-7 col-xs-12">
                                        <div  class="resimonizle"></div>
                                    </div>
                                </div>

                                <br><br>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Haber Başlığı <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="title"
                                               value="<?= post('short_content') ? post('news_title') : null; ?>"
                                               required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <br><br>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kısa İçerik
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="short_content"
                                               value="<?= post('short_content') ? post('news_short') : null; ?>"
                                               placeholder=" Haber için kısa içerik (ÖRN: Patch v4 Güncellemesi için tıklayınız...)"
                                               required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Haber İçeriği <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="content" id="editor1"
                                                  class="ckeditor"><?= post('content') ? post('content') : null; ?></textarea>
                                    </div>
                                </div>

                                <br>
                                <script type="text/javascript">
                                    CKEDITOR.replace('editor1',
                                        {
                                            filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
                                            filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',
                                            filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',
                                            filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php/?command=QuickUpload&type=Files',
                                            filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                            filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                            forcePasteAsPlainText: true

                                        }
                                    );

                                </script>

                                <script>
                                    $(function(){
                                        $("#dosya").change(function(){
                                            var dosya=document.getElementById ("dosya");
                                            if (dosya.files && dosya.files[0]){
                                                var veoku=new FileReader();
                                                veoku.onload=function() {
                                                    var adres=veoku.result;
                                                    $('.resimonizle').html('<img height="150" src="'+adres+'"/>');
                                                }
                                                veoku.readAsDataURL(dosya.files[0]);//veri okuma
                                               }
                                        });
                                    })
                                </script>
                                <br>


                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button value="1" type="submit" name="add_news" class="btn btn-success">Ekle
                                        </button>
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
<?php require admin_view('/static/footer');
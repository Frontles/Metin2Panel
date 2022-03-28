<?php

require admin_view('static/header');

if (post('editprofile')){
    $editprofile = editmyprofile();
}
?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="" >
            <div class="clearfix"></div>

            <div class="tab-container">

                <div class="row">
                    <ul>
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="x_title">

                                <h2>Profilimi Düzenle</h2>

                                <div class="clearfix"></div>

                            </div>
                            <br>
                            <?php if (isset($editprofile['result']) && $editprofile['result'] == ''): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-danger">
                                    <?= $editprofile['message'] ?>
                                </div>
                            <?php endif; ?>

                            <?php if (isset($editprofile['result']) && $editprofile['result'] == true): ?>
                                <div class=" col-md-10 col-sm-10 col-xs-12 alert alert-success" role="alert">
                                    <?= $editprofile['message'] ?>
                                    <script>
                                        setTimeout(function () {
                                            window.location.assign("<?= admin_url('my-profile') ?>");
                                            //3 saniye sonra yönlenecek
                                        }, 1500);
                                    </script>
                                </div>
                            <?php endif; ?>
                            <form id="" action="" method="post" enctype="multipart/form-data" data-parsley-validate
                                  class="form-horizontal form-label-left">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Yüklü Resim <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php

                                        if (strlen($user['user_image']) > 0) { ?>
                                            <img width="200px" src="<?= URL . '/' . $user['user_image'] ?>"
                                                 alt="">


                                        <?php } else { ?>
                                            <img width="200px" src="<?= admin_public_url('/images/no-image.jpg') ?>"
                                                 alt="">

                                        <?php } ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Profil Resmi <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file" name="user_image" class="form-control col-md-7 col-xs-12">
                                        <input type="hidden" name="eski_yol"
                                               value="<?php echo $user['user_image'] ?>">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kullanıcı Adı <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="user_name" required readonly
                                               value="<?php echo $user['user_name'] ?>"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Gerçek Adı <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="user_realname"
                                               value="<?php echo $user['user_realname'] ?>"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı İmzası <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea name="user_imza" id="editor1" class="ckeditor"><?= $user['user_imza'] ?></textarea>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    CKEDITOR.replace('editor1',
                                        {
                                            filebrowserBrowseUrl:'ckfinder/ckfinder.html',
                                            filebrowserImageBrowseUrl:'ckfinder/ckfinder.html?type=Images',
                                            filebrowserFlashBrowseUrl:'ckfinder/ckfinder.html?type=Flash',
                                            filebrowserUploadUrl:'ckfinder/core/connector/php/connector.php/?command=QuickUpload&type=Files',
                                            filebrowserImageUploadUrl:'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                            filebrowserFlashUploadUrl:'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                            forcePasteAsPlainText:true

                                        }
                                    );

                                </script>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Yetki <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <select disabled class="form-control col-md-7 col-xs-12" name="user_rank"><option value="0">Rütbe Seçiniz</option>
                                            <?php foreach (user_ranks() as $id=> $rank):  ?>
                                                <option <?= $user['user_rank'] == $id ? 'selected': null; ?> value="<?= $id ?>"> <?= $rank ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button  value="1" type="submit" name="editprofile" class="btn btn-success">Güncelle </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- /page content -->


<?php require admin_view('/static/footer');

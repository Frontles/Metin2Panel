<?php require admin_view('static/header');

if (post('main')){
  $kategoriekle =  add_top_category();
}
if (post('sub')){
    $kategoriekle= add_bottom_category();
}

?>

    <div class="right_col" role="main">
        <div class=""tab>
            <div class="clearfix"></div>
            <div class="admin-tab">
                <ul tab-list>
                    <li>
                        <a href="#">Üst Kategori</a>
                    </li>
                    <li>
                        <a href="#">Alt Kategori</a>
                    </li>

                </ul>
            </div>
            <div class="tab-container">
                    <div tab-content class="row">
                        <?php if ( isset($kategoriekle['result']) && $kategoriekle['result'] == ''): ?>
                            <div  class=" alert alert-danger" >
                                <?= $kategoriekle['message']?>
                            </div>
                        <?php endif; ?>

                        <?php  if (isset($kategoriekle['result']) && $kategoriekle['result'] ==true ):  ?>
                            <div class=" alert alert-success" role="alert">
                                <?= $kategoriekle['message'] ?>
                                <script>
                                    setTimeout(function(){
                                        window.location.assign("<?= admin_url('add-category') ?>");
                                        //3 saniye sonra yönlenecek
                                    },1500);
                                </script>
                            </div>
                        <?php endif; ?>

                        <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="x_title">
                                    <h2>Üst ( Ana ) Kategori <small>

                                        </small></h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br>
                                    <form id="maincategory" action="" method="post"  data-parsley-validate class="form-horizontal form-label-left">


                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kategori Adı <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text"  name="name" placeholder="Kategori adı giriniz." required class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kategori Resim Linki <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="icon" placeholder="Kategori Resim Linki giriniz." required class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>


                                        <div class="form-group md-checkbox-list">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                            </label>
                                            <div class="col-md-8">
                                                <div class="md-checkbox-list">
                                                    <div class="md-checkbox has-info">
                                                        <input type="hidden" name="alone" class="md-check" value="0">
                                                        <input type="checkbox" name="alone" id="checkbox2" class="md-check" value="1" >
                                                        <label for="checkbox2">
                                                            <span></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span><i style="color: red;" id="checkbox2Text"> Oluşturacağınız bu kategorinin alt kategorisi <u style="color: black">olmayacaksa</u> bu bölümü işaretleyiniz. </i> </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group">

                                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <span style="color: red !important;"><?=   permission('shop','category-add') ? '':'Yetkiniz Olmadığı için Ekleme Yapamazsınız.!'; ?></span>

                                                <button <?=   !permission('shop','category-add') ? 'disabled':null; ?>  type="submit" name="main" value="1" class="btn btn-success">Ekle</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                        </div>
                    </div>
                    <div tab-content class="row">


                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="x_title">
                            <h2>Alt Kategori <small>

                                </small></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="subcategory" action="" method="post"  data-parsley-validate class="form-horizontal form-label-left">


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kategori Adı <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text"  name="name" placeholder="Kategori adı giriniz." required class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Üst Kategori <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="table-group-action-input form-control input-xlarge" name="mainCategory">
                                            <?php
                                            $kate = $db->prepare("SELECT id,name FROM shop_menu WHERE  mainmenu = :mainmenu and alone=:alone");
                                            $kate->execute([
                                                    'mainmenu'=>0,
                                                'alone'=>0
                                            ]);
                                            $katet = $kate->fetchAll(PDO::FETCH_ASSOC);
                                            ?>
                                            <?php foreach ($katet as $row):?>
                                                <option value="<?=$row['id']?>"><?=$row['name']?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">

                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <span style="color: red !important;"><?=   permission('shop','category-add') ? '':'Yetkiniz Olmadığı için Ekleme Yapamazsınız.!'; ?></span>
                                        <button <?=   permission('shop','category-add') ? 'enabled':'disabled'; ?>  type="submit" name="sub" value="1" class="btn btn-success">Ekle</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page content -->
    <div class="right_col" role="main" >
        <center>
            <div class="" style="width: 80%">
                <div class="clearfix"></div>

            </div>
        </center>
    </div>

    <!-- /page content -->

<?php require admin_view('static/footer');?>
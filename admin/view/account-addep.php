
<?php require admin_view('static/header');

if (post('addep')){
    $addep = addep();
}
?>
    <!-- page content -->
    <div class="right_col" role="main" >
        <center>
            <div class="" style="width: 60%">
                <div class="clearfix"></div>
                <?php  if ( isset($addep['result']) && $addep['result'] == ''): ?>
                    <div  class=" alert alert-danger" >
                        <?=$addep['message']?>
                    </div>
                <?php endif; ?>
                <?php  if (isset($addep['result']) && $addep['result'] ==true ):  ?>
                    <div class=" alert alert-success" role="alert">
                        <?=$addep['message']?>
                        <script>
                            setTimeout(function(){
                                window.location.assign("<?= admin_url('account?id='. get('id'))?> ");
                                //3 saniye sonra yönlenecek
                            }, 2000);

                        </script>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>
                                    <i class="fa fa-lock font-dark"></i>
                                    Ep Yükle  <span class="caption-subject bold uppercase">  (<?=$info['login'];?>)</span>
                                    </h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br>
                                <form  action="" method="post"  data-parsley-validate class="form-horizontal form-label-left">


                                    <div class="form-group">
                                        <label for="form_control_1">Ep Miktarı :</label>
                                        <div class='input-group date'>
                                            <input type='number' class="form-control" name="count"/>
                                            <input type='hidden' class="form-control" name="id" value="<?=$info['id'];?>"/>
                                            <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-gift"></span>
                                 </span>
                                        </div>
                                    </div>



                                    <div style="padding: 10px;" class="form-group ">


                                            <button name="addep" value="1" type="submit" class="btn btn-danger  btn-block mt-ladda-btn ladda-button" data-style="contract">
                                                <span class="ladda-label">Ep Yükle</span>
                                            </button>

                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>

    <!-- /page content -->

<?php require admin_view('static/footer');

<?php require admin_view('static/header');

if(post('banned')){
    $ban = banned(post('id'));

}elseif (post('perma_banned')){
    $ban= perma_banned(post('id'));
}

?>
<!-- page content -->
<div class="right_col" role="main" >
    <center>
        <div class="" style="width: 80%">
            <div class="clearfix"></div>

            <?php  if ( isset($ban['result']) && $ban['result'] == ''): ?>
                <div  class=" alert alert-danger" >
                    <?=$ban['message']?>
                </div>
            <?php endif; ?>
            <?php  if (isset($ban['result']) && $ban['result'] ==true ):  ?>
                <div class=" alert alert-success" role="alert">
                    <?=$ban['message']?>

                    <script>
                        setTimeout(function(){
                            window.location.assign("<?= admin_url('account?id='. get('id')) ?>");
                            //3 saniye sonra yönlenecek
                        }, 2000);

                    </script>
                </div>
            <?php endif; ?>
            <div class="row" style="width: 50%;display: inline-flex;padding-right: 30px;">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-lock font-dark"></i>
                                <span class="caption-subject bold uppercase"> Sürelİ Ban (<?=$info['login'];?>)</span>
                                <small>

                                </small></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="playerBan" action="" method="post"  data-parsley-validate class="form_datetime form-horizontal form-label-left">

                                <div class="form-group">
                                    <label for="form_control_1">Ban Süresi :</label>
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="banDate"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ban Nedeni :</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="why" required>
                                        <span class="input-group-addon">
                                            <i class="fa fa-edit font-dark"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Varsa Ban Kanıt Linki :</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="evidence">
                                        <span class="input-group-addon">
                                            <i class="fa fa-adjust font-dark"></i>
                                        </span>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="id" value="<?=$info['id'];?>"/>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#datetimepicker1').datetimepicker({
                                            format: 'YYYY-MM-DD HH:mm:ss'
                                        });
                                    });
                                </script>
                                <div class="form-actions noborder">
                                    <!--                        <button type="submit" class="btn blue">Kupon Oluştur</button>-->
                                    <button type="submit" name="banned" value="1" class="btn btn-danger btn-block mt-ladda-btn ladda-button" data-style="contract">
                                        <span class="ladda-label">Süreli Banla</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div><!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
            <div class="row" style="width: 50%;display: inline-flex">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>
                                <i class="fa fa-lock font-dark"></i>
                                <span class="caption-subject bold uppercase"> Süresİz Ban (<?=$info['login'];?>)</span>
                                <small>

                                </small></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form id="playerBan2" action="" method="post"  data-parsley-validate class="form_datetime form-horizontal form-label-left">

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Ban Nedeni :</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="why" required>
                                        <span class="input-group-addon">
                                                        <i class="fa fa-edit font-dark"></i>
                                                    </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Varsa Ban Kanıt Linki :</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="evidence">
                                        <span class="input-group-addon">
                                                        <i class="fa fa-adjust font-dark"></i>
                                                    </span>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" name="id" value="<?=$info['id'];?>"/>
                                <div class="form-actions noborder">
                                    <!--                        <button type="submit" class="btn blue">Kupon Oluştur</button>-->
                                    <br>
                                    <button value="1" name="perma_banned" type="submit" class="btn btn-dark btn-block mt-ladda-btn ladda-button" data-style="contract">
                                        <span class="ladda-label">Süresiz Banla</span>
                                    </button><br>
                                </div>
                            </form>
                        </div>
                    </div><!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>

        </div>
    </center>
</div>



<!-- /page content -->

<?php require admin_view('static/footer');
<?php require admin_view('static/header');

if(post('event_plan')){

    $eventplan = event_plan();


}
?>



<!-- page content -->
<div class="right_col" role="main" >
    <center>
        <div class="" style="width: 80%">
            <div class="clearfix"></div>
            <div class="row">
                <?php if (settings('socket_status') == 0):?>
                    <b style="color: darkred">Bu işlemi gerçekleştirebilmem için <a  href="<?=admin_url('settings')?>">buradan</a> oyununuzun socket bağlantısını gerçekleştirmeniz gerekiyor...</b>
                <?php else:?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Event Planla </h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>

                            <?php if ( isset($eventplan['result']) && $eventplan['result'] == ''): ?>
                                <div style="width: 400px" class=" alert alert-danger" >
                                    <?= $eventplan['message'] ?>
                                </div>
                            <?php endif; ?>
                            <?php  if (isset($eventplan['result']) && $eventplan['result'] ==true ):  ?>
                                <div  style="width: 400px" class=" alert alert-success" role="alert">
                                    <?= $eventplan['message'];
                                    if ($eventplan['result']== true):  ?>
                                        <script>
                                            setTimeout(function(){
                                                window.location.assign("<?= admin_url('event-list') ?>");
                                                //3 saniye sonra yönlenecek
                                            },1500);
                                        </script>
                                    <?php endif;?>
                                </div>
                            <?php endif; ?>
                            <form id="demo-form2" action="" method="post"  data-parsley-validate class="form-horizontal form-label-left">


                                <div class="form-group">
                                    <label  for="form_control_1">Event Tipi</label>
                                    <div class='input-group date col-md-6 col-sm-6 col-xs-12' id='datetimepicker1'>
                                        <select name="event_flag" class="form-control col-md-7 col-xs-12">
                                            <option value="0"> Event Seçiniz...</option>
                                            <?php foreach ($eventplanla as  $event): ?>
                                                <option value="<?= $event['event_flag'] ?>">  <?= $event['event_name'] ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label  for="form_control_1">Event Başlangıç Zamanı</label>
                                    <div class='input-group date col-md-6 col-sm-6 col-xs-12' id=''  >
                                        <input type='text'  class="form-control" name="event_startdate" id="startdate" data-provide="datepicker"/>
                                        <span id="icon_start" class="input-group-addon">
                                    <span  class="glyphicon glyphicon-calendar"></span>
                                 </span>
                                    </div>
                                </div>


                                
                                <div class="form-group">
                                    <label  for="form_control_1">Event Bitiş Zamanı</label>
                                    <div class='input-group date col-md-6 col-sm-6 col-xs-12' id=''>
                                        <input type='text'  class="form-control" name="event_finishdate" id="finishdate" data-provide="datepicker"/>
                                        <span id="icon_end" class="input-group-addon">
                                    <span  class="glyphicon glyphicon-calendar"></span>
                                 </span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                        <button value="1"  type="submit" name="event_plan" class="btn btn-success">Oluştur</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </center>
</div>

<!-- /page content -->

    
<?php require admin_view('static/footer');
?>



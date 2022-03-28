
<?php require admin_view('static/header');

if(post('add_event')){

    $eventac = create_event();


}
?>
<!-- page content -->
<div class="right_col" role="main" >
    <center>
        <div class="" style="width: 80%">
            <?php if (settings('socket_status') == 0):?>
                <b style="color: darkred">Bu işlemi gerçekleştirebilmem için <a  href="<?=admin_url('settings')?>">buradan</a> oyununuzun socket bağlantısını gerçekleştirmeniz gerekiyor...</b>
            <?php else:?>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">

                        <div class="x_title">

                            <h2>Event Aç </h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>

                            <?php if ( isset($eventac['result']) && $eventac['result'] == ''): ?>
                                <div style="width: 400px" class=" alert alert-danger" >
                                    <?= $eventac['message'] ?>
                                </div>
                            <?php endif; ?>
                            <?php  if (isset($eventac['result']) && $eventac['result'] ==true ):  ?>
                                <div  style="width: 400px" class=" alert alert-success" role="alert">
                                    <?= $eventac['message'];
                                    if ($eventac['result']== true):  ?>
                                        <script>
                                            setTimeout(function(){
                                                window.location.assign("<?= admin_url('add-event') ?>");
                                                //3 saniye sonra yönlenecek
                                            },1500);
                                        </script>
                                    <?php endif;?>
                                </div>
                            <?php endif; ?>
                            <form id="demo-form2" action="" method="post"  data-parsley-validate class="form-horizontal form-label-left">


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Event Tipi <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">


                                        <select name="event_flag" class="form-control col-md-7 col-xs-12">
                                            <option value="0"> Event Seçiniz...</option>
                                            <?php foreach ($eventsonuc as  $event): ?>
                                                <option value="<?= $event['event_id'] ?>">  <?= $event['event_name'] ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button  value="1" type="submit" name="add_event" class="btn btn-success">Aç</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Aktif Eventlar <small>
                                </small></h2>

                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Event Adı</th>
                                    <th>Event Kodu</th>
                                    <th>Kapatma</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach(eventList() as $event) : ?>
                                    <?php $sorgu1=  $player->prepare('SELECT * FROM quest WHERE szName = ? AND lValue = 1');
                                           $sorgu1->execute([$event]);
                                           $activeEvent= $sorgu1->fetchAll(PDO::FETCH_ASSOC);?>
                                    <?php if (($sorgu1->rowCount()) > 0):?>
                                        <?php $eventName = $db->prepare("SELECT event_id,event_name FROM event_list WHERE event_flag = ?");
                                        $eventName->execute([$event]);
                                        $eventName = $eventName->fetch(PDO::FETCH_ASSOC);
                                       ?>

                                        <tr class="text-center" style="">
                                            <td width="100px"><?=$eventName['event_name']?> </td>
                                            <td width="150px"> <?= $event ?></td>
                                            <td width="50px">
                                                <?php if(permission('events','active-event-close')): ?>
                                                    <a onclick="return confirm( 'Kapatma işlemine devam etmek istiyor musunuz ?')" href="<?=admin_url('close-event?id='. $eventName['event_id']) ?>"><button class="btn btn-danger">Kapat</button></a>
                                                <?php endif; ?>
                                                <?php if(!permission('events','active-event-close')): ?>
                                                    <span style="color:red;">Kapatma Yetkiniz Bulunmamaktadır !</span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif;?>
                                <?php endforeach;?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
    </center>
</div>

<!-- /page content -->

<?php require admin_view('static/footer');

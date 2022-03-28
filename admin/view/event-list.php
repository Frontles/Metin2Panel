<?php require admin_view('static/header'); ?>
<!-- page content -->
<div class="right_col" role="main" >
    <center>
        <div class="" style="width: 80%">
            <div class="clearfix"></div>
            <div class="row" >
                <?php if (settings('socket_status') == 0):?>
                    <b style="color: darkred">Bu işlemi gerçekleştirebilmem için <a  href="<?=admin_url('settings')?>">buradan</a> oyununuzun socket bağlantısını gerçekleştirmeniz gerekiyor...</b>
                <?php else:?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Event Listesi <small>
                                </small></h2>

                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Event Tipi</th>
                                    <th>Başlangıç Tarihi</th>
                                    <th>Bitiş Tarihi</th>
                                    <th>Durumu</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($eventsonuc as $event) : ?>
                                    <tr class="text-center" style="">
                                        <td width="30%"><?= $event['event_name'] ?></td>
                                        <td width="15%"><?= $event['event_startdate'] ?></td>
                                        <td width="15%"><?= $event['event_finishdate'] ?></td>
                                        <td width="5%"> <?= $event['event_status'] == 0 ? 'Pasif' : 'Aktif' ?></td>
                                        <td width="45%">
                                            <?php if(permission('events','edit')) : ?>
                                                <a href="<?=admin_url('edit-event?id='. $event['event_id'])?>"><button class="btn btn-primary"><i class="fa fa-edit"></i></button> </a>
                                            <?php endif; ?>
                                            <?php if(permission('events','delete')) : ?>
                                                <a onclick="return confirm( 'Silme işlemine devam etmek istiyor musunuz ?')" href="<?=admin_url('delete?table=event_crone&column=event_id&id='. $event['event_id']) ?>"><button class="btn btn-dark"><i class="fa fa-trash"></i></button></a>
                                            <?php endif; ?>
                                            <?php if(!permission('events','delete') && !permission('events','edit') ):  ?>
                                                <span style="color:red;">Düzenleme veya Silme yetkiniz bulunmamaktadır.</span>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>

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
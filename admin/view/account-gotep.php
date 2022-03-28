<?php

require admin_view('/static/header'); ?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>EPI Olan Hesaplar <small>
                                </small></h2>
                            <div align="right">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">



                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th> ID</th>
                                    <th>Kullanıcı Adı</th>
                                    <th>EP Miktarı</th>
                                    <th width="50px">EP Sil</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($goteps as $gotep) : ?>
                                    <tr>
                                        <td><?= $gotep['id'] ?></td>
                                        <td><?= $gotep['login'] ?></td>
                                        <td><?= $gotep['cash'] ?></td>

                                        <td>
                                            <?php if(permission('accounts','ep-delete')): ?>
                                                <a onclick="return confirm( 'Silme işlemine devam etmek istiyor musunuz ?')" href="<?=admin_url('account-epdelete?id='. $gotep['id']) ?>"><button class="btn btn-dark"><i class="fa fa-trash"></i></button></a>
                                            <?php else: ?>
                                                <span>EP Silme Yetkiniz Bulunmamaktadır.</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>

                                <?php endforeach;?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /page content -->

<?php require admin_view('/static/footer'); ?>
<?php

$allaccountlist = allaccountlist(get('id'));
require admin_view('/static/header'); ?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Tüm Hesaplar </h2>
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
                                    <th>E-Mail</th>
                                    <th>Durumu</th>
                                    <th>IP</th>
                                    <th width="50px">İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach($allaccountlist['data'] as $row) : ?>
                                    <tr>
                                        <td><?=$row['id'];?></td>
                                        <td><?=$row['login'];?></td>
                                        <td><?=$row['email'];?></td>
                                        <td><?=$row['status']?></td>
                                        <td><?=$row['ip'];?></td>

                                        <td>
                                            <?php if(permission('accounts','edit')) : ?>
                                                <a href="<?=admin_url('account?id='. $row['id'])?>"><button class="btn btn-primary"><i class="fa fa-edit"></i></button> </a>
                                            <?php endif; ?>
                                            <?php if(permission('accounts','ban')) : ?>
                                                <a onclick="return confirm( 'Banlama işlemine devam etmek istiyor musunuz ?')" href="<?=admin_url('account-ban?id='. $row['id']) ?>"><button class="btn btn-dark"><i class="fa fa-trash"></i></button></a>
                                            <?php endif; ?>
                                            <?php if(!permission('accounts','ban') && !permission('accounts','ban') ):  ?>
                                                <span>İnceleme veya Banlama yetkiniz bulunmamaktadır.</span>
                                            <?php endif; ?>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>
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
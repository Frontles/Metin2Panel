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
                            <h2>Yönetici Hesapları <small>
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
                                    <th>Rütbesi</th>
                                    <th>Durumu</th>
                                    <th width="50px">İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($admins as $admin) : ?>
                                    <tr>
                                        <td><?= $admin['user_id'] ?></td>
                                        <td><?= $admin['user_name'] ?></td>
                                        <td><?= user_ranks($admin['user_rank']) ?></td>
                                        <td><?= $admin['user_status']== 1 ? 'Aktif' : 'Pasif' ?></td>

                                        <td>
                                            <?php if(permission('users','edit')) : ?>
                                            <a href="<?=admin_url('edit-admin?id='. $admin['user_id'])?>"><button class="btn btn-primary"><i class="fa fa-edit"></i></button> </a>
                                            <?php endif; ?>
                                            <?php if(permission('users','delete')) : ?>
                                            <a onclick="return confirm( 'Silme işlemine devam etmek istiyor musunuz ?')" href="<?=admin_url('delete?table=users&column=user_id&id='. $admin['user_id']) ?>"><button class="btn btn-dark"><i class="fa fa-trash"></i></button></a>
                                            <?php endif; ?>
                                            <?php if(!permission('users','delete') && !permission('users','edit') ):  ?>
                                                <span>Düzenleme veya Silme yetkiniz bulunmamaktadır.</span>
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
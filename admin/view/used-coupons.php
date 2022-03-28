<?php
$say=0;
require admin_view('/static/header'); ?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Kullanılmış Kuponlar<small>
                                </small></h2>
                            <div align="right">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">



                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Kupon ID</th>
                                    <th>Key</th>
                                    <th>EP Miktarı</th>
                                    <th>Oluşturulan Tarih </th>
                                    <th>Kullanım Tarihi </th>
                                    <th width="50px">Sil</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php  foreach($coupons as $coupon) :
                                    $say++?>
                                    <tr>
                                        <td width="10%"><?= $coupon['id'] ?></td>
                                        <td><?= $coupon['anahtar'] ?></td>
                                        <td><?= $coupon['ep'] ?></td>
                                        <td><?= $coupon['create_date'] ?></td>
                                        <td><?= $coupon['use_date'] ?></td>
                                        <td>

                                            <?php if(permission('coupon','delete')) : ?>
                                                <a onclick="return confirm( 'Silme işlemine devam etmek istiyor musunuz ?')" href="<?=admin_url('delete?table=coupons&column=id&id='. $coupon['id']) ?>"><button class="btn btn-dark"><i class="fa fa-trash"></i></button></a>
                                            <?php endif; ?>
                                            <?php if(!permission('coupon','delete') ):  ?>
                                                <span> Silme yetkiniz bulunmamaktadır.</span>
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
<?php

require admin_view('/static/header'); ?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <center>
            <div class="row" style="width: 80% !important;">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Çark Eşya Listesi <small>
                                </small></h2>
                            <div align="right">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">



                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th> vnum</th>
                                    <th>Item Adı</th>
                                    <th width="50px">Sil</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($items as $item) : ?>
                                    <tr>
                                        <td><?= $item['vnum'] ?></td>
                                        <td><?= $item['item_name'] ?></td>
                                        <td>

                                            <?php if(permission('shop','wheel-item-delete')) : ?>
                                                <a onclick="return confirm( 'Silme işlemine devam etmek istiyor musunuz ?')" href="<?=admin_url('delete?table=wheel_items&column=id&id='. $item['id']) ?>"><button class="btn btn-dark"><i class="fa fa-trash"></i></button></a>
                                            <?php endif; ?>
                                            <?php if(!permission('shop','wheel-item-delete')) :  ?>
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
            </center>

        </div>
    </div>
    <!-- /page content -->

<?php require admin_view('/static/footer'); ?>
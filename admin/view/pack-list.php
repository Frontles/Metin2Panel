<?php

$say=1;
require admin_view('/static/header'); ?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Pack Listesi <small>
                                </small></h2>
                            <div align="right">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">



                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Pack Adı</th>
                                    <th>Boyutu </th>
                                    <th>Kaynak </th>
                                    <th width="50px">Sil</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  foreach($packs as $pack) : ?>
                                    <tr>
                                        <td><?= $say ?></td>
                                        <td><?= $pack['pack_name'] ?></td>
                                        <td><?= $pack['pack_size'] ?></td>
                                        <td><img width="130px" src="<?= URL . $pack['pack_image'] ?> " alt=""> </td>
                                        <td>

                                            <?php if(permission('packs','delete')) : ?>
                                                <a onclick="return confirm( 'Silme işlemine devam etmek istiyor musunuz ?')" href="<?=admin_url('delete?table=pack&column=id&id='. $pack['id']) ?>"><button class="btn btn-danger">Sil</button></a>
                                            <?php endif; ?>
                                            <?php if(!permission('packs','delete') ):  ?>
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
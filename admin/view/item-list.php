<?php  require admin_view('/static/header'); ?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Nesne Market Eşya Listesi <small>
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
                                    <th>Item Adı</th>
                                    <th>Fiyat</th>
                                    <th>Durumu</th>
                                    <th>Tarihi</th>
                                    <th width="50px">İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($items as $item) : ?>
                                    <tr>
                                        <td><?= $item['vnum'] ?></td>
                                        <td><?= $item['item_name'] ?></td>
                                        <td><?= $item['coins'] ?></td>
                                        <td> <span <?= $item['durum']== 1 ||  $item['durum']== 2 ?' style=" background-color: #337AB7; color: white; padding: 5px; border-radius: 20%;"' :  'style=" background-color: #ED6B75; color: white; padding: 5px;border-radius: 20%;"'?> > <?= $item['durum']== 1 ? 'Aktif' : null; ?> <?= $item['durum']== 2 ? 'EM Market' : null; ?> <?= $item['durum']== 0 ? 'Pasif' : null; ?></span></td>
                                        <td><?= $item['tarih'] ?></td>
                                        <td>
                                            <?php if(permission('shop','item-edit')) : ?>
                                                <a href="<?=admin_url('edit-item?id='. $item['id'])?>"><button class="btn btn-primary">Düzenle</button> </a>
                                            <?php endif; ?>
                                            <?php if(permission('shop','item-delete')) : ?>
                                                <a onclick="return confirm( 'Silme işlemine devam etmek istiyor musunuz ?')" href="<?=admin_url('delete?table=items&column=id&id='. $item['id']) ?>"><button class="btn btn-dark"><i class="fa fa-trash"></i></button></a>
                                            <?php endif; ?>
                                            <?php if(!permission('shop','item-delete') && !permission('shop','item-edit') ):  ?>
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
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
                            <h2>Kategoriler <small>
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
                                    <th>Kategori Adı</th>
                                    <th>Kategori Türü</th>

                                    <th width="50px">Sil</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($categories as $category) : ?>
                                    <tr>
                                        <td><?= $category['id'] ?></td>
                                        <td><?= $category['name'] ?></td>
                                        <td class="text-center"> <?php if ($category['status']){echo '<b style="color: darkred">Alt Menü</b>';}else{echo '<b style="color: darkblue">Ana Menü</b>';}?> </td>
                                        <td>

                                            <?php if(permission('shop','category-delete')) : ?>
                                                <a onclick="return confirm( 'Silme işlemine devam etmek istiyor musunuz ?')" href="<?=admin_url('delete?table=shop_menu&column=id&id='. $category['id']) ?>"><button class="btn btn-dark"><i class="fa fa-trash"></i></button></a>
                                            <?php endif; ?>
                                            <?php if(!permission('shop','category-delete') ):  ?>
                                                <span>Silme yetkiniz bulunmamaktadır.</span>
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
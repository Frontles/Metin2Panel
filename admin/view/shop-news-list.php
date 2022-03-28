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
                            <h2>Haberler Listesi <small>
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
                                    <th>Başlık</th>
                                    <th>İçerik</th>
                                    <th width="50px">Sil</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php  foreach($news as $new) :
                                    $say++?>
                                    <tr>
                                        <td width="10%"><?= $say ?></td>
                                        <td><?= $new['title'] ?></td>
                                        <td><?= $new['content'] ?></td>
                                        <td>

                                            <?php if(permission('news','shop-news-delete')) : ?>
                                                <a onclick="return confirm( 'Silme işlemine devam etmek istiyor musunuz ?')" href="<?=admin_url('delete?table=banner&column=id&id='. $new['id']) ?>"><button class="btn btn-danger">Sil</button></a>
                                            <?php endif; ?>
                                            <?php if(!permission('news','shop-news-delete') ):  ?>
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
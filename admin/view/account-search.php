<?php require admin_view('static/header');


$aramasonuclari = search();

?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-search font-red"></i>
                                <span class="caption-subject text-blue">Arama Sonuçları</span> <small>

                                    <?= $aramasonuclari['count'] ?>  Sonuç Bulundu...

                                </small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <center>

                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kullanıcı Adı</th>
                                        <th>Mail</th>
                                        <th>Durum</th>
                                        <th>IP</th>
                                        <th width="50px">İşlem</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($aramasonuclari['login'] as $arama) :?>
                                        <tr>
                                            <td><?= $arama['id'] ?></td>
                                            <td><?= $arama['login'] ?></td>
                                            <td><?= $arama['email'] ?></td>
                                            <td><?= $arama['status'] ?></td>
                                            <td><?= $arama['ip'] ?></td>
                                            <td>

                                                <?php if(permission('accounts','edit')) : ?>
                                                    <a href="<?=admin_url('account?id='. $arama['id']) ?>"><button class="btn btn-primary"> <i class="fa fa-edit"></i>İncele</button></a>
                                                <?php endif; ?>
                                                <?php if(permission('accounts','ban')) : ?>
                                                    <a onclick="return confirm( '  Bu kullanıcıyı Banlamak istiyor musunuz ?')" href="<?=admin_url('account-ban?id='. $arama['id']) ?>"><button class="btn btn-dark"> <i class="fa fa-lock"></i></button></a>
                                                <?php endif; ?>
                                                <?php if(!permission('accounts','ban') && !permission('accounts','edit') ):  ?>
                                                    <span> Banlama ve İnceleme yetkiniz bulunmamaktadır.</span>
                                                <?php endif; ?>
                                            </td>

                                        </tr>

                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








<?php require admin_view('static/footer');
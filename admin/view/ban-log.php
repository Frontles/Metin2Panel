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
                            <h2> Tüm Banlanan Hesaplar <small>
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
                                    <th> Kullanıcı Adı </th>
                                    <th> Ban Sebebi </th>
                                    <th>Kanıt</th>
                                    <th>Tarih</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($rows as $row) :$say++ ?>
                                    <?php
                                    $id = $row['account_id'];
                                    $namesor = $account->prepare("SELECT login FROM account WHERE id = ?");
                                    $namesor->execute([
                                        $id
                                    ]);
                                    $name = $namesor->fetch(PDO::FETCH_ASSOC);


                                    ?>
                                    <tr>
                                        <td><?= $say ?></td>
                                        <td><?= $name['login'] ?></td>
                                        <td><?= $row['why'] ?></td>
                                        <td><?= $row['evidence'] ?></td>
                                        <td><?= timeConvert($row['date']) ?></td>

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

<?php require admin_view('static/header');

?>
<!-- page content -->
<div class="right_col" role="main" >
    <center>
        <div class="" style="width: 80%">
            <div class="clearfix"></div>
            <div class="row" >
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><?=Functions::utf8($getItemName['locale_name'])?> <small>
                                </small></h2>

                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Eşya Adı</th>
                                    <th>Vnum</th>
                                    <th>Sahibinin ID'si</th>
                                    <th>Nerde</th>
                                    <th>Miktarı</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($items as $item) : ?>
                                    <tr class="text-center" style="">
                                        <td><?= $item['id'] ?></td>
                                        <td><?= Functions::utf8($getItemName['locale_name']) ?></td>
                                        <td><?= $item['vnum'] ?></td>
                                        <td > <?= $item['owner_id'] ?></td>
                                        <td style=" font-size: 15px;font-weight: bold; color: <?= $item['window'] == 'EQUIPMENT' ? 'darkred' : 'darkblue'; ?>;"><?= $item['window']== 'EQUIPMENT' ? 'Depo' : 'Envanter'; ?></td>
                                        <td><?=$item['count'];?></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</div>

<!-- /page content -->

<?php require admin_view('static/footer');
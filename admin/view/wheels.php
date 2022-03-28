<?php
require admin_view('static/header');

$sorgu =$player->prepare('SELECT vnum,locale_name FROM item_proto' );
$sorgu->execute([]);
$rows = $sorgu->fetchAll(PDO::FETCH_ASSOC);
$functions = new Functions();
?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Çark Eşya Ekle <small>


                                </small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <center>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <select class="form-control edited" id="itemList">
                                            <?php foreach ( $rows as $item): ?>
                                                <option value="<?= $item['vnum'] ?>"><?= $functions->utf8($item['locale_name']) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="input-group-btn">
                                            <a id="itemListHref" href="" class="btn btn-dark">Git</a>
                                        </span>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" charset="utf-8">
        $('#itemList').change(function () {
            var data = $(this).val();
            $('#itemListHref').attr('href',"<?=admin_url('add-wheel-item?vnum=')?>" + data);
        });
    </script>





<?php require admin_view('static/footer');
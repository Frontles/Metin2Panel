<?php
require admin_view('static/header');

$sorgu2 =$player->prepare('SELECT vnum,locale_name FROM item_proto LIMIT 2,10000' );
$sorgu2->execute([]);
$row2 = $sorgu2->fetchAll(PDO::FETCH_ASSOC);

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
                            <h2>Nesne Markete Eşya Ekle <small>

                                </small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <center>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <select class="form-control edited" id="itemList">
                                            <?php foreach ( $row2 as $item): ?>
                                                <option value="<?= $item['vnum'] ?>"><?= $functions->utf8($item['locale_name']) ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                        <span class="input-group-btn">
                                            <a id="itemListHref" href="" class="btn btn-dark">Git</a>
                                        </span>
                                    </div>
                                </div>


                                        <div class="col-md-12">
                                            <form action="" method="POST">
                                                <div class="input-group">
                                                    <input required type="number" name="searchValue" class="col-md-12 form-control" placeholder="Vnum ile ara"> </p>
                                                    <span class="input-group-btn">
                                                <button name="search" value="1" class="btn btn-dark" type="submit">Eşya Ara</button>
                                            </span>
                                                </div>
                                            </form>
                                        </div>


                                <div id="gallery">
                                    <?php foreach ($veriler as $product):?>
                                        <div style="width: 150px !important;  float: left !important;display: inline-block !important; " class="item-container col-md-4 col-sm-4 col-xs-4" >

                                            <div class="gallery-item" style=" ">
                                                <a href="<?=admin_url('add-item?vnum='. $product['vnum'])?>">
                                                    <center>
                                                    <div  style="width: 120px !important; height: 120px !important; ">

                                                        <img class="img-responsive" style="height: 32px !important; width: 32px !important; position: absolute !important; top: 60px; left:60px"  src="<?=  data_items( $functions->itemToPng($product['vnum'])) ?>" alt="İnspina Market Paneli" >

                                                    </div>
                                                    </center>

                                                <div  class="description">
                                                    <?=  $functions->utf8($product['locale_name']);?>
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="clearfix"></div>
                                </div>
                            </center>
                        </div>
                        <?php
                        echo '<div style="float: right" class="sayfalama">';
                        if($_GET['sayfa']!=1)
                            echo '<a href="' .admin_url('items?') .'sayfa=' . ($sayfa > 1 ? $sayfa - 1 : 1) . '">Önceki</a>';
                        for ($i = $sol ; $i <= $sag; $i++){
                            if ($i > 0 && $i <= $toplamSayfa){
                                echo '<a ' . ($i == $sayfa ? ' class="aktif"' : '') . ' href="'.admin_url('items?') .'sayfa=' . $i . '">' . $i . '</a>';
                            }
                        }
                        if($_GET['sayfa'] < $toplamSayfa)
                            echo '<a href="' . admin_url('items') . '?sayfa=' . ($sayfa < $toplamSayfa ? $sayfa + 1 : $toplamSayfa) . '">Sonraki</a>';
                        echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" charset="utf-8">
        $('#itemList').change(function () {
            var data = $(this).val();
            $('#itemListHref').attr('href',"<?=admin_url('add-item?vnum=')?>" + data);
        });
    </script>






<?php require admin_view('static/footer');
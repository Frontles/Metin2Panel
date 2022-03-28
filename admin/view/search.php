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



                                <div class="col-md-12">
                                    <form action="" method="GET">
                                        <div class="input-group">
                                            <input value=" <?= get('searchValue') ? get('searchValue') :  null; ?>" type="number" name="searchValue" class="col-md-12 form-control" required placeholder="Vnum ile ara" >

                                            <span class="input-group-btn">
                                                <button name="search" value="1" class="btn btn-dark" type="submit">Eşya Ara</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>


                                <div id="gallery">
                                    <?php if ($aramasonuclari['result'] != 1): ?>
                                    Böyle bir eşya bulunamadı.
                                    <?php elseif ($aramasonuclari['result']==1):?>
                                    <?php  foreach ($aramasonuclari['items'] as $product): ?>
                                        <div style="width: 150px !important; height: 200px !important; margin-right: 50px !important; margin-bottom: 40px !important;  float: left !important;display: inline-block !important; " class="item-container col-md-4 col-sm-4 col-xs-4" >

                                            <div class="gallery-item" style="width: 150px !important; height: 200px !important;">
                                                <a href="<?=admin_url('add-item?vnum='. $product['vnum'])?>">
                                                    <center>
                                                        <div  style="width: 120px !important; height: 120px !important; ">

                                                            <img class="img-responsive" style="height: 32px !important; width: 32px !important; position: absolute !important; top: 60px; left:60px"  src="<?=  data_items( Functions::itemToPng($product['vnum'])) ?>" alt="İnspina Market Paneli" >

                                                        </div>
                                                    </center>

                                                    <div  class="description">
                                                        <?=  Functions::utf8($product['locale_name']);?>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>

                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                    <div class="clearfix"></div>
                                </div>
                            </center>
                        </div>
                        <?php
                        echo '<div style="float: right" class="sayfalama">';
                        if($_GET['sayfa']!=1)
                            echo '<a href="' .admin_url('search') . '?searchValue=' . get('searchValue') .'&sayfa=' . ($aramasonuclari['sayfa'] > 1 ? $aramasonuclari['sayfa'] - 1 : 1) . '">Önceki</a>';
                        for ($i = $sol ; $i <= $sag; $i++){
                            if ($i > 0 && $i <= $aramasonuclari['toplamsayfa']){
                                echo '<a ' . ($i == $aramasonuclari['sayfa'] ? ' class="aktif"' : '') . ' href="'.admin_url('search') . '?searchValue='. get('searchValue') .'&sayfa=' . $i . '">' . $i . '</a>';
                            }
                        }
                        if($_GET['sayfa'] < $aramasonuclari['toplamsayfa'])
                            echo '<a href="' . admin_url('search') . '?searchValue=' . get('searchValue') . '&sayfa=' . ($aramasonuclari['sayfa'] < $aramasonuclari['toplamsayfa'] ? $aramasonuclari['sayfa'] + 1 : $aramasonuclari['toplamsayfa']) . '">Sonraki</a>';
                        echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>








<?php
if (!permission('shop', 'show')){

    permission_page();
}

require admin_view('static/footer');
<?php

require admin_view('/static/header');

if(!permission('index','show')){
    permission_page();
}

$dashboard = dashboard();
$totalaccount = $dashboard['totalAccount']['count'];
$activecount = $dashboard['countActive']['count'];
$bannedcount = $dashboard['countBanned']['count'];
$countcharacter = $dashboard['countCharacter']['count'];
$red = $dashboard['countRed']['count'];
$yellow = $dashboard['countYellow']['count'];
$blue = $dashboard['countBlue']['count'];
$warrior = $dashboard['countWarrior']['count'];
$ninja = $dashboard['countNinja']['count'];
$sura = $dashboard['countSura']['count'];
$shaman = $dashboard['countShaman']['count'];
$lycan = $dashboard['countLycan']['count'];
$epPrice = $dashboard['epPrice'];
$countep = $dashboard['countEp']['count'];
$counttoday = $dashboard['countToday']['count'];
$countpaywant=$dashboard['getTotalPaywant'];
$counttodaypaywant=$dashboard['countPaywant'];

$counttodaylogin = $dashboard['countTodayLogin']['count'];
$countguild = $dashboard['countGuild']['count'];


function convertEp($epList,$ep,$type)
{
    $result = "";
    if ($type == "itemci")
        $commission = settings('itemci_commission');
    foreach ($epList as $key=>$row)
    {
        
        if ($row['ep_miktar'] == $ep)
            $result = intval($row['tl_miktar']) - (intval($row['tl_miktar']) * intval($commission) / 100);
    }
    return $result;
}
$cache = new Cache();

$dataPoints = array(
    array("label"=>"Oxygen", "symbol" => "O","y"=>46.6),
    array("label"=>"Silicon", "symbol" => "Si","y"=>27.7),
    array("label"=>"Aluminium", "symbol" => "Al","y"=>13.9),
    array("label"=>"Iron", "symbol" => "Fe","y"=>5),
    array("label"=>"Calcium", "symbol" => "Ca","y"=>3.6),
    array("label"=>"Sodium", "symbol" => "Na","y"=>2.6),
    array("label"=>"Magnesium", "symbol" => "Mg","y"=>2.1),
    array("label"=>"Others", "symbol" => "Others","y"=>1.5),

);
$say = 0;
$say1=0;
$functions = new Functions();


?>

        <!-- /top navigation -->

        <!-- page content -->
    <div class="right_col" role="main">
        <div class="row top_tiles">
            <?php if(permission('index','statics')) : ?>
                <?php   $cache->open("admin_player_statistic");?>
                <?php  if ($cache->check("admin_player_statistic")):?>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-user fa-2x"></i></div>
                        <div class="count"><?= $totalaccount ?> <small>Kişi</small></div>
                        <h3>Toplam Hesap</h3>
                        <p>Toplam Oyuncu Sayısını Gösterir.</p>
                    </div>
                </div>
                <div  class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                    <div class="tile-stats">
                        <div class="icon"><i><i  class="fa fa-user-check"></i></i></div>
                        <div class="count"><?= $activecount ?> <small>Kişi</small></div>
                        <h3>Aktif Hesap</h3>
                        <p>Banlanmamış Oyuncu Sayısını Gösterir.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-user-times"></i></div>
                        <div class="count"><?= $bannedcount ?> <small>Kişi</small></div>
                        <h3>Banlı Hesap</h3>
                        <p>Banlanmış Oyuncu Sayısını Gösterir.</p>
                    </div>
                </div>

                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-gamepad"></i></div>
                        <div class="count"><?= $countcharacter?> <small>Adet</small> </div>
                        <h3>Toplam Karakter</h3>
                        <p>Oyundaki Toplam Karakter Sayısını Gösterir.</p>
                    </div>
                </div>

                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-store"></i></div>
                        <div class="count"><?= $countep?> <small>Adet</small></div>
                        <h3>Aktif Pazar</h3>
                        <p>Oyundaki Aktif Pazar Sayısını Gösterir.</p>
                    </div>
                </div>

                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="far fa-address-book"></i></div>
                        <div class="count"><?= $counttoday?> <small>Kişi</small></div>
                        <h3>Günlük Kayıt</h3>
                        <p>Oyundaki Kayıt  Sayısını Gösterir.</p>
                    </div>
                </div>

                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fas fa-sign-in-alt"></i></div>
                        <div class="count"><?= $counttodaylogin?> <small>Kişi</small></div>
                        <h3>Günlük Giriş</h3>
                        <p>Günlük Oyuncu  Sayısını Gösterir.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fab fa-guilded"></i></div>
                        <div class="count"><?= $countguild?> <small>Adet</small></div>
                        <h3>Toplam Lonca</h3>
                        <p>Toplam Lonca  Sayısını Gösterir.</p>
                    </div>
                </div>

                <?php endif;?>
                <?php $cache->close("admin_player_statistic"); ?>
            
            
                <div class="col-md-6 col-sm-6 col-xs-12"  >
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Bayrak Diagramı</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div id="donutchart" style="height: 350px;">

                        </div>
                    </div>
                </div>

           
                <div class="col-md-6 col-sm-6 col-xs-12"  >
                    <div class="x_panel">
                        <div class="x_title">

                            <h2 >Karakter Diagramı</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div id="donutchart2" style="height: 350px;"></div>
                    </div>
                </div>
            
            
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <h2>Günlük Satış İstatistikleri</h2>
                    <div class="clearfix"></div>

                    <div class="portlet-body">
                        <div class="row">
                            <div style="width:" class="animated flipInY col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="tile-stats">
                                    <div class="image">
                                        <br> 
                                        <center>
                                            <img src="<?=URL.'/data/upload/paywant.png'?>" width="175px;">
                                        </center>
                                    </div>
                                    <center>
                                        <br>
                                        <h4>PAYWANT</h4>
                                        <p>Günlük Paywant Kazanç Miktarı</p>
                                        <br>
                                    </center>

                                    <div  style="padding-bottom: 0px;width: 100%" class=" btn-group  btn-group btn-group-justified">
                                        <a style="border-top:1px solid #E7ECF1 !important;color: #6798DC !important; :" href="javascript:;" class=" satis btn  btn-block mt-ladda-btn ladda-button">
                                            <?php
                                            $gunlukpaywant=0;
                                            $gunlukpaywant+=$counttodaypaywant
                                            ?>
                                            <i class="fas fa-shopping-bag"></i> <?= $gunlukpaywant ?> TL</a>
                                    </div>
                                </div>
                            </div>
                            <div style="width:" class="animated flipInY col-lg-6 col-md-6 col-sm-12 col-xs-12"><div class="tile-stats">
                                    <div class="image">
                                        <br> 
                                        <center>
                                            <img src="<?=URL.'/data/upload/itemci.png'?>" width="200px;">
                                        </center>
                                    </div>
                                    <center>
                                        <h4>E-Pin</h4>
                                        <p>Günlük E-Pin Kazanç Miktarı</p>
                                        <br>
                                    </center>

                                    <div  style="padding-bottom: 0px;width: 100%" class=" btn-group  btn-group btn-group-justified">
                                        <a style="border-top:1px solid #E7ECF1 !important;color: #6798DC !important; :" href="javascript:;" class=" satis btn  btn-block mt-ladda-btn ladda-button">
                                            <?php
                                            $itemci = null;
                                            foreach ($dashboard['countEpin'] as $row){
                                                $itemci += convertEp($epPrice,$row['gain'],"itemci");
                                            }
                                            $itemci = ($itemci == null) ? 0 : $itemci
                                            ?>
                                            <i class="fas fa-shopping-bag"></i> <?=$itemci?> TL</a>
                                    </div>
                                </div>
                            </div>
                            <!--end: widget 1-3 -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <h2>Toplam Satış İstatistikleri</h2>
                    <div class="clearfix"></div>

                    <div class="portlet-body">
                        <div class="row">
                            <div style="width:" class="animated flipInY col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="tile-stats">
                                    <div class="image">
                                        <br> 
                                        <center>
                                            <img src="<?=URL.'/data/upload/paywant.png'?>" width="175px;">
                                        </center>
                                    </div>
                                    <center>
                                        <br> 
                                        <h4>PAYWANT</h4>
                                        <p>Toplam Paywant Kazanç Miktarı</p>
                                        <br>
                                    </center>

                                    <div  style="padding-bottom: 0px;width: 100%" class=" btn-group  btn-group btn-group-justified">
                                        <a style="border-top:1px solid #E7ECF1 !important;color: #6798DC !important; :" href="javascript:;" class=" satis btn  btn-block mt-ladda-btn ladda-button">
                                            <?php
                                            $toplampaywant=0;
                                            $toplampaywant+=$countpaywant
                                            ?>
                                            <i class="fas fa-shopping-bag"></i> <?=$toplampaywant?> TL</a>
                                    </div>
                                </div>
                            </div>
                            <div style="width:" class="animated flipInY col-lg-6 col-md-6 col-sm-12 col-xs-12"><div class="tile-stats">
                                    <div class="image">
                                        <br> 
                                        <center>
                                            <img src="<?=URL.'/data/upload/itemci.png'?>" width="200px;">
                                        </center>
                                    </div>
                                    <center>
                                        <h4>E-Pin</h4>
                                        <p>Toplam E-Pin Kazanç Miktarı</p>
                                        <br>
                                    </center>

                                    <div  style="padding-bottom: 0px;width: 100%" class=" btn-group  btn-group btn-group-justified">
                                        <a style="border-top:1px solid #E7ECF1 !important;color: #6798DC !important; :" href="javascript:;" class=" satis btn  btn-block mt-ladda-btn ladda-button">
                                            <?php
                                            $itemci1 = 0;
                                          
                                        
                                            foreach ($dashboard['getTotalEpin'] as $row)
                                            {
                                                $itemci1 += convertEp($epPrice,$row['gain'],"itemci");
                                                
                                          
                                            }
                                            $itemci1 = ($itemci1 == null) ? 0 : $itemci1;
                                             
                                            ?>
                                            <i class="fas fa-shopping-bag"></i> <?=$itemci1?> TL</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
            
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>CHANNEL BOOT LOG <small>Son 10 Kayıt</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>KANAL</th>
                                        <th>KANAL ADI</th>
                                        <th>TARİH</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($dashboard['coreLog'] as $row):$say1++?>
                                        <tr>
                                            <td> <?=$say1;?> </td>
                                            <td> <?=$row['channel']?> </td>
                                            <td> <?=$row['hostname']?> </td>
                                            <td>
                                                <?=timeConvert($row['time']);?>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>COMMAND LOG <small>Son 10 Kayıt</small></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ADI</th>
                                        <th>KOMUT </th>
                                        <th>IP</th>
                                        <th>TARİH</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($dashboard['commandLog'] as $row):$say++?>
                                        <tr>
                                            <td> <?=$say;?> </td>
                                            <td> <?=$row['username']?> </td>
                                            <td> <?=$functions->replace_tr(substr($row['command'], 0, 15));?> </td>
                                            <td> <?=$row['ip']?> </td>
                                            <td><?=timeConvert($row['date']);?></td>
                                        </tr>
                                    <?php endforeach;?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else:  ?>
                <h4>Üzgünüm... Anasayfayı Görüntüleme İzniniz yok !</h4>
            <?php endif;?>
        </div>
    </div>



    <!-- /page content -->

    <!-- charts -->
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Mavi', <?= $blue; ?> ],
                ['Kırmızı',<?= $red; ?>],
                ['Sarı',    <?= $yellow ?>]


            ]);

            var options = {
                x: '50%',
                width: '50%',
                funnelAlign: 'center',
                max: 1548,
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Sura', <?= $sura; ?> ],
                ['Ninja',<?= $ninja; ?>],
                ['Savaşçı',<?= $warrior; ?>],
                ['Şaman',    <?= $shaman ?>]
            ]);

            var options = {

                x: '50%',
                width: '50%',
                funnelAlign: 'center',
                max: 1548,
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
            chart.draw(data, options);
        }
    </script>

<?php require admin_view('/static/footer');
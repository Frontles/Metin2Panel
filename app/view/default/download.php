<?php require view('static/header');

$download = download();
$say = 0;
?>
<style>
    .bg-light {
        width: 95%;
        display: block;
        overflow: auto;
        padding-right: 15px;
        padding-left: 15px;
    }
    .col-50 {
        float: left;
        width: 50%;
    }
    .bg-light h3{
        font-size: 16px;
        text-align: center;
        color: #A07332;
        margin-bottom: 15px;
    }
    .central{
        text-align: center;
    }
</style>

<aside id="right">
    <div id="content_ajax">
        <article class="page_article">
            <h2 class="head"><?=$lng[0]?></h2>
            <div class="body">
                <table id="large" cellspacing="0" class="tablesorter">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th><?=$lng[52]?></th>
                        <th><?=$lng[53]?></th>
                        <th><?=$lng[54]?></th>
                        <th><?=$lng[55]?></th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach ($download as  $val): $say++?>
                    <tr>
                        <td><?=$say?></td>
                        <td><?=$val['pack_name'];?></td>
                        <td><?=$val['pack_size'];?></td>
                        <td><img src="<?= URL .$val['pack_image']?>" alt="<?=settings('settings_gamename')?>" width="70px;"></td>
                        <td><a href="<?=$val['pack_url']?>" target="_blank"><?=$lng[175]?></a></td>
                    </tr>
					<?php endforeach;?>
                    </tbody>
                </table>
                <div class="ucp_divider m2"></div>
                <div class="bg-light">
                    <h3><?=$lng[56]?></h3>
                    <div class="col-50 central">
                        <strong class="wheat"><?=$lng[57]?></strong><br><br>
                        <strong><?=$lng[58]?>:</strong> Windows Vista, 7<br>
                        <strong>CPU:</strong> Pentium 3 800MHz or higher<br>
                        <strong>RAM:</strong> 256MB<br>
                        <strong>VGA:</strong> 3D GeForce2 or ATI 9000<br>
                        <strong>HDD:</strong> 1,5 GB<br><br>
                    </div>
                    <div class="col-50 central">
                        <strong class="wheat"><?=$lng[59]?></strong><br><br>
                        <strong><?=$lng[58]?>:</strong> Windows Vista, 7<br>
                        <strong>CPU:</strong> Pentium 4 2.4GHz or higher<br>
                        <strong>RAM:</strong> 512MB<br>
                        <strong>VGA:</strong> 3D GeForce FX 5600 or ATI9500<br>
                        <strong>HDD:</strong> 2 GB<br><br>
                    </div>
                </div>
            </div>
        </article>
    </div>
</aside>

<?php require view('sidebar');require view('static/footer') ?>
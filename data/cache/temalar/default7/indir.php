<div id="content">
	<div id="box1">
		<div class="title1">
			<h1></h1>
		</div>

		<div class="box-style1" style="margin-bottom: 20px;">
			<div class="entry">
				<table class="ranking-table"> </table>
				<br/>
				<table class="ranking-table" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<thead>
								<tr class="main-tr">
									<th>#</td>
									<td style="text-align: center;">Sunucu</th>
									<td style="text-align: center;">Boyut</th>
									<td style="text-align: center;">İNDİR</th>
								</tr>
							</thead>
							<?php if($paketler = $this->model->getir_paketker()) foreach ($paketler as $key => $paket):?>
							<tbody>
								<td><?php echo ($key + 1);?></td>
								<td style="text-align: center;"><?php echo $paket->baslik;?></td>
								<td style="text-align: center;"><?php echo $paket->boyut;?></td>
								<td style="text-align: center;"><a href="<?php echo $paket->link;?>" target="_blank" class="blue-a green-a">TIKLA İNDİR</a></td>
							</tbody>
							<?php endforeach;?>
						</tr>
					</tbody>
				</table>
			</div>
        </div>
    </div>
</div>
<div id="sistemozellikleri" class="content-block-info">
<div class="news-block" style="width: 100%;">
<div class="content-title c-title"></div>
<i class="fal fa-info-circle"></i> Minimum Sistem Gereksinimleri (Oyunu akıcı ve sorunsuz oynamak için lütfen dikkate alınız)
<div class="content-title c-title"></div><table class="download-table" border="0" style="font-size: 13px;width: 100% !important;">

<tbody>
<tr>
<td style="color: #74c564;">İşletim Sistemi</td>
<td>Windows XP SP3 ve üstü</td>
</tr>
<tr>
<td style="color: #74c564;">CPU</td>
<td>Pentium 4 1.5 GHz</td>
</tr>
<tr>
<td style="color: #74c564;">Ram</td>
<td>2GB Ram</td>
</tr>
<tr>
<td style="color: #74c564;">Yeterli Alan</td>
<td>2GB</td>
</tr>
<tr>
<td style="color: #74c564;">Ekran Kartı</td>
<td>128MB ve üstü</td>
</tr>
</tbody>
</table>
</div>
</div>
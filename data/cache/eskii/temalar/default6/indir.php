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
									<th>Sunucu</th>
									<th>Boyut</th>
									<th>URL</th>
								</tr>
							</thead>
							<?php if($paketler = $this->model->getir_paketker()) foreach ($paketler as $key => $paket):?>
							<tbody>
								<td style="text-align: center;"><?php echo ($key + 1);?></td>
								<td style="text-align: center;"><?php echo $paket->baslik;?></td>
								<td style="text-align: center;"><?php echo $paket->boyut;?></td>
								<td style="text-align: center;"><a href="<?php echo $paket->link;?>" class="button button-blue">Hemen İndir</a></a></td>
							</tbody>
							<?php endforeach;?>
						</tr>
					</tbody>
				</table>
			</div>
        </div>
    </div>
</div>
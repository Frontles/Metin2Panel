<div id="content">
	<div id="box1">
		<div class="title1">
			<h1></h1>
		</div>
		<div id="content_center">
			<table class="ranking-table" style="margin-top: -1px;">
				
				<thead>
					<tr class="main-tr">
						<th style="text-align:center;">#</th>
						<th style="text-align:center;">İsim</th>
						<th style="text-align:center;">Seviye</th>
						<th style="text-align:center;">Sınıf</th>
						<th style="text-align:center;" class="end">Oyun Süresi</th>
					</tr>
				</thead>
				<tbody>
					<?php if($oyuncular = $this->model->getir_oyuncu_siralama_genel(20)) foreach ($oyuncular AS $key => $oyuncu): ?>
					<tr>
						<td style="text-align:center;"><?php echo ($key+1);?></td>
						<td><a href="javascript:void(0);"><?php echo $oyuncu->name;?></a></td>
						<td style="text-align:center;"><?php echo $oyuncu->level;?></td>
						<td><img src="<?php echo base_url('temalar/market/assets/images/chrs/'.$oyuncu->job.'.png');?>" height="35"></td>
						<td class="end"><?php echo $oyuncu->playtime;?></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
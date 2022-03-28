		<h1 class="mb-4 d-inline">EN İYİ OYUNCULAR</h1>
		<br><br>
			
			<!-- Bu veri önbellekten gösterilmektedir. --> 

<div class="siralamaBigTable"><div class="siralama-top">
		<div id="content_center">
			<table class="ranking-table" style="margin-top: -1px;">
				
				<thead>
					<tr class="main-tr">
						<th><i class="fal fa-list"></i></th>
						<th style="text-align:center;">İsim</th>
						<th style="text-align:center;">Seviye</th>
						<th style="text-align:center;">Sınıf</th>
						<th style="text-align:center;" class="end">Son Giriş</th>
					</tr>
				</thead>
				<tbody>
					<?php if($oyuncular = $this->model->getir_oyuncu_siralama_genel(25)) foreach ($oyuncular AS $key => $oyuncu): ?>
					<tr>
						<td>
						<? if($key == 0)
							echo ($i = '<img src="/temalar/default3/images/highscore/1.png"/>');
						else if($key == 1)
							echo ($i = '<img src="/temalar/default3/images/highscore/2.png"/>');
						else if($key == 2)
							echo ($i = '<img src="/temalar/default3/images/highscore/3.png"/>');
						else
							echo ($key+1);
						?></td>
						<td style="text-align:center;"><?php echo $oyuncu->name;?></td>
						<td style="text-align:center;"><?php echo $oyuncu->level;?><sup>Lv</sup></td>
						<td style="text-align:center;"><img src="<?php echo base_url('temalar/market/assets/images/chrs/'.$oyuncu->job.'.png');?>" height="35"></td>
						<td style="text-align:center;"><?php echo $this->model->gecenZaman(strtotime($oyuncu->last_play));?></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
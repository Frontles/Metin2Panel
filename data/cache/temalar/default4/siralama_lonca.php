<div id="content">
	<div id="box1">
		<div class="title1">
			<h1></h1>
		</div>
		<div id="content_center">
			<table class="ranking-table" style="margin-top: -1px;">
				
				<thead>
					<tr class="main-tr">
						<th><i class="fal fa-list"></i></th>
						<th style="text-align:center;">Lonca Adı</th>
						<th style="text-align:center;">Puanı</th>
						<th style="text-align:center;">Seviyesi</th>
						<th style="text-align:center;" class="end">Winner / Loss</th>
					</tr>
				</thead>
				<tbody>
					<?php if($loncalar = $this->model->getir_lonca_siralama_genel(25)) foreach ($loncalar AS $key => $lonca): ?>
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
						<th style="text-align:center;"><?php echo $lonca->name;?></td>
						<td style="text-align:center;"><?php echo $lonca->ladder_point;?></td>
						<th style="text-align:center;"><?php echo $lonca->level;?></</td>
						<th style="text-align:center;"><?php echo $lonca->win;?>/<?php echo $lonca->loss;?></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
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
						<th style="text-align:center;">Lonca Adı</th>
						<th style="text-align:center;">Puanı</th>
						<th style="text-align:center;">Seviyesi</th>
						<th style="text-align:center;" class="end">Winner / Loss</th>
					</tr>
				</thead>
				<tbody>
					<?php if($loncalar = $this->model->getir_lonca_siralama_genel(25)) foreach ($loncalar AS $key => $lonca): ?>
					<tr>
						<td style="text-align:center;"><?php echo ($key+1);?></td>
						<td><a href="javascript:void(0);"><?php echo $lonca->name;?></a></td>
						<td style="text-align:center;"><?php echo $lonca->ladder_point;?></td>
						<td><?php echo $lonca->level;?></</td>
						<td class="end"><?php echo $lonca->win;?>/<?php echo $lonca->loss;?></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
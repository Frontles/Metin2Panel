    <div class="panel-heading">Lonca Sıralaması
    </div>
    <div class="panel-body">
		<div class="Info-Box">Sıralamada ilk 25 Lonca Gösterilmektedir.</div>
	
        <table id="RankingTable" class="table table-striped table-full-ranking sidebar_rank">
			<thead>
				<tr>
					<th style="text-align:center;">#</th>
					<th style="text-align:center;">Lonca Adı</th>
					<th style="text-align:center;">Puanı</th>
					<th style="text-align:center;">Seviyesi</th>
					<th style="text-align:center;">Winner / Loss</th>
				</tr>
			</thead>
			<tbody>
								<?php if($loncalar = $this->model->getir_lonca_siralama_genel(25)) foreach ($loncalar AS $key => $lonca): ?>
            <tr><td style="text-align:center;"><?php echo ($key+1);?></td><th style="text-align:center;"><a href="#"><?php echo $lonca->name;?></a></td>	
						<td style="text-align:center;"><?php echo $lonca->ladder_point;?> </td>
						<td style="text-align:center;"><?php echo $lonca->level;?></td>
						<td style="text-align:center;"><?php echo $lonca->win;?>/<?php echo $lonca->loss;?></td>
					</tr>
					<tr>
					<?php endforeach;?>
					
						</tbody>
        </table>
		<small class="pull-left"><small>Yukarıdaki veriler 30 dakikada bir güncellenmektedir.</small></small>
    </div>


    <div class="panel-heading">Karakter Sıralaması
    </div>
    <div class="panel-body">
		<div class="Info-Box">Sıralamada ilk 25 Karakter Gösterilmektedir.</div>
	
        <table id="RankingTable" class="table table-striped table-full-ranking sidebar_rank">
			<thead>
				<tr>
					<th style="text-align:center;">#</th>
					<th>İsim</th>
					<th style="text-align:center;">Seviye <sup>Lv</sup></th>
					<th style="text-align:center;">Krallık</th>
					<th style="text-align:center;">Oyun Süresi</th>
				</tr>
			</thead>
			<tbody>
								<?php if($oyuncular = $this->model->getir_oyuncu_siralama_genel(25)) foreach ($oyuncular AS $key => $oyuncu): ?>
            <tr><td style="text-align:center;"><?php echo ($key+1);?></td><td><a href="#"><?php echo $oyuncu->name;?></a></td>	
						<td style="text-align:center;"><?php echo $oyuncu->level;?> <sup>Lv</sup></td>
						<td style="text-align:center;"><img height="20px" src="/temalar/default5/images/bayrak/<?php echo $oyuncu->empire;?>.png"/></td>
						<td style="text-align:center;"><?php echo $oyuncu->playtime;?></td>
					</tr>
					<tr>
					<?php endforeach;?>
					
						</tbody>
        </table>
		<small class="pull-left"><small>Yukarıdaki veriler 30 dakikada bir güncellenmektedir.</small></small>
    </div>


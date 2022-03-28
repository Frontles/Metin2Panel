   <div class="panel-heading">Bilgilendirme Mesajı
    </div>
    <div class="panel-body">	
		<div class="Warning-Box">Lütfen sıkıntısız oyuna girmek için aşşağıda bulunan <b>Full Client</b> dosyalarından herhangi birtanesini indirin.<br>Full Client dosyalarını başka bir metin2 dosyasının içine atmanıza gerek yoktur direkt giriş yapabilirsiniz.</div>
	</div>
</div>
<div class="panel panel-buyuk Renk-2">
    <div class="panel-heading">Full Client Listesi
    </div>
    <div class="panel-body">		
        <table class="sidebar_rank">
			<thead>
				<tr>
					<th width="15%" style="text-align:center;">#</th>
					<th width="70%" style="text-align:left;">Pack Adı</th>
					<th style="text-align:center;">Link</th>
				</tr>
			</thead>
			<tbody>
            <?php if($paketler = $this->model->getir_paketker()) foreach ($paketler as $key => $paket):?>
					<tr>
						<td style="text-align:center;"><?php echo ($key + 1);?></td>
						<td><a href="<?php echo $paket->link;?>" target="_new"><?php echo $paket->baslik;?></a></td>
						<td style="text-align:center;">
							<a href="<?php echo $paket->link;?>" target="_new" class="btn btn-giris btn-xs" style="padding-left: 10px;padding-right: 10px;">İndirmek için tıklayın</a>
						</td>
					</tr>
					<?php endforeach;?>
						
			</tbody>
        </table>
	</div>
	<br>
	<br>

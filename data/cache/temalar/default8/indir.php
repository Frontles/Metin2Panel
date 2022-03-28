<div id="content">
	<div id="box1">
		<div class="title1">
			<h1></h1>
		</div>

		<div class="box-style1" style="margin-bottom: 20px;">
			<div class="en		<main class="content">
					

					

<br><br><br>
		<table class="table table-striped table-hover">
						<?php if($paketler = $this->model->getir_paketker()) foreach ($paketler as $key => $paket):?>
						<tr>
								<div class="oyun-indir-box">
								<div class="alert-box warning">
								<span><?php echo $paket->baslik;?></span></div>
								<div class="oyun-indir-aciklama"></div>
								<div class="oyun-indir-button"><a href="<?php echo $paket->link;?>" target="_blank" rel="nofollow"><div class="indirButton"></div></a></div>
								<div class="oyun-indir-boyut">Dosya Boyutu : <?php echo $paket->boyut;?>
								<div class="oyun-indir-destek"><span> Kurulum ile ilgili sorun yaşıyorsanız <a href="<?php echo base_url('destek');?>" target="_blank" rel="nofollow">destek sayfamızı</a> ziyaret edin.</span>
						</tr>
						<?php endforeach;?>
						</table><!-- Ön bellek gösterimi burada sona ermektedir. --> 							</tr> 
			</tbody>
			</table>
 
													

						
			
		</main>

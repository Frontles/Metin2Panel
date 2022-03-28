<div id="content">
	<div id="box1">

		<div class="title1"><?php echo $row->baslik;?></div>
		
		<div id="content_center">
			<div class="box-style1" style="margin-bottom:25px;">
				<div class="entry">
					<div style="width:600px;">
						<div id="content_center">
							<div style="padding: 0 30px 0px 50px;">
								<div class="i_note" style="margin-left: -40px;">
									<?php echo $row->icerik;?>
									<br><br>
									<p class="tags">Tarih : <?php echo strftime('%e %B %Y %H:%M', strtotime($row->olusumTarihi));?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		
<div id="content">
	<div id="box1">
		<div class="title1">
			<h1></h1>
		</div>
		<center>
			<div id="content_center">
				<div class="box-style1" style="margin-bottom: 20px;">
					<div class="entry">
						<br>				
							<table id="character-info">
							<tbody>
								<tr>
									<td>
										<div style="padding: 10px 20px 10px 20px;">
										<p style="margin-bottom: 5px;"><a>Kategori : </a><?php echo $destek->konu; ?></p>
										<p style="margin-bottom: 5px;"><a>Oluşturma tarihi : </a></a><?php echo strftime('%e %B %Y %H:%M', strtotime($destek->olusumTarihi));?></p>
										</div>
									</td>
								</tr>
								
								<tr style="height:40px;"></tr>

								<?php foreach ($mesajlar as $mesaj): ?>
								<tr>
									<td>
										<div style="padding: 10px 20px 10px 20px;">
											<p style="margin-bottom: 5px;"><a><?php echo ($mesaj->account_id) ? $this->account->login : 'DESTEK EKİBİ'; ?></a> <?php echo strftime('%e %B %Y %H:%M', strtotime($mesaj->olusumTarihi));?></p>
											<?php echo nl2br($mesaj->mesaj); ?>
										</div>
									</td>
								</tr>
								<?php endforeach;?>
								
								<?php if($destek->durum != 2):?>
								<tr>
									<td>
										<div class="form">
											<form action="" autocomplete="off" method="post" class="ajax-form-json register-form">
												<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
												<div class="inner-form-border">
													<div class="inner-form-box">
														<form id="registerForm" accept-charset="UTF-8" action="" method="POST">
															<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('mesaj').'</small>', 'mesaj', ['style'=>'width: 100%;']);?>
															<?php echo form_input(['name'=>'mesaj', 'value'=>null, 'class'=>'form-control', 'cols'=>'40', 'rows'=>'10', 'placeholder'=>'Cevabınızı buraya yazınız', 'style'=>'width:calc(100% - 20px); margin-top:10px;']);?>
															<br>
															<button type="submit" style="font-weight: bold; font-size: 13px; padding: 12px 0px;">&emsp;&emsp;&emsp;&emsp;&emsp;CEVAPLA&emsp;&emsp;&emsp;&emsp;&emsp;</button>
														</form>
													</div>
												</div>
											</form>
										</div>
									</td>
								</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</center>
	</div>
</div>
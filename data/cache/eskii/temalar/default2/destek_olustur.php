<div id="content">
	<div id="box1">
		<div class="title1">
			<h1></h1>
		</div>
		<center>
			<div id="content_center">
				<div class="box-style1" style="margin-bottom:55px;">
					<br>
					<h2 class="title"></h2>
					<div class="entry">
						<div class="form">
							<form action="" autocomplete="off" method="post" class="ajax-form-json register-form">
								<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
								<table>
									<tbody>
										<center>
										<tr>

											<td>
												<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('konu').'</small>', 'konu', ['style'=>'width: 100%;']);?>
												<?php echo form_dropdown('konu', [''=>'Kategori Seçiniz'] + $this->model->enum_degerleri('destek','konu',true), null, ['class'=>'', 'placeholder'=>'Kategori Seçiniz', 'autocomplete'=>'off',  'autofocus']);?>
												<br><br>
											</td>
										</tr>

										<tr>
											<td>
												<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('mesaj').'</small>', 'mesaj', ['style'=>'width: 100%;']);?>
												<?php echo form_textarea(['name'=>'mesaj', 'placeholder'=>'Cevabınızı buraya yazınız', 'maxlength'=>'6000', 'value'=>null, 'class'=>'form-control', 'cols'=>'40', 'rows'=>'10']);?>
											</td>
										</tr>

										<tr>
											<td>
												<br><button type="submit" style=" width: 260px; font-weight: bold; font-size: 13px; padding: 12px 0px;">&emsp;&emsp;&emsp;&emsp;&emsp;GÖNDER&emsp;&emsp;&emsp;&emsp;<i class="read-more"></i></button></br>
											</td>
										</tr>
										</center>
									</tbody>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</center>
	</div>
</div>
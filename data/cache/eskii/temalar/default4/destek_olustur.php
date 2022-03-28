<body class="RegisterClass">
<div class="login-page">
<div class="form">
						<?php if($this->account->status == 'OK'):?>
						<?php if(!$banDurum):?>
<h1>Destek Talebi Oluştur</h1>
<br><br>
		<div class="callout callout-info"><h4>Açıklama</h4>Hile bildirimleri bu kategori altından yapılmaktadır.</div>			
		<form action="" autocomplete="off" method="post" class="ajax-form-json register-form"><center>
		<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">Kategori<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('konu').'</small>', 'konu', ['style'=>'width: 100%;']);?>
</label>
						<div class="col-sm-6">
								<?php echo form_dropdown('konu', [''=>'Kategori Seçiniz'] + $this->model->enum_degerleri('destek','konu',true), null, ['class'=>'', 'placeholder'=>'Kategori Seçiniz', 'autocomplete'=>'off',  'autofocus']);?>
						</div>
					</div>
															<div class="form-group">
						<label for="inputEmail3" class="col-sm-4 control-label">Mesajınız<?php echo form_label('<small style="color:red; display:block; text-align: center;" >'.form_error('mesaj').'</small>', 'mesaj', ['style'=>'width: 100%;']);?>
</label>
						<div class="col-sm-6">
								<?php echo form_input(['name'=>'mesaj', 'placeholder'=>'Cevabınızı buraya yazınız', 'maxlength'=>'6000', 'value'=>null, 'class'=>'form-control', 'cols'=>'40', 'rows'=>'10']);?>
						</div>
					</div>

					
					<div class="form-group">
						<div class="col-sm-6">
						</div>
					</div>

				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-4">
								<br><button type="submit" style=" width: 260px; font-weight: bold; font-size: 13px; padding: 12px 0px;">&emsp;&emsp;&emsp;&emsp;&emsp;GÖNDER&emsp;&emsp;&emsp;&emsp;<i class="read-more"></i></button></br>

			
					</div>
				</div>
			</form>
					<div>
					<?php endif; ?>
					<?php endif; ?>
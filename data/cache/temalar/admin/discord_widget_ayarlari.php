<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Discord Widget Ayarları</span>
							</div>
						</div>
					</div>
				<style type="text/css">
.responsive {
  width: 100%;
  height: auto;
}
</style>
                    <!-- tab start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Discord Ayarları</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Nasıl Kurulur ?</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-neise-tab" data-toggle="pill" href="#pills-neise" role="tab" aria-controls="pills-neise" aria-selected="false">Ne İşe Yarar ?</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Durum<small class="text-danger float-right">'.form_error('discord_durum').'</small>', 'discord_durum', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('discord_durum', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('discord_durum'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Discord ID<small class="text-danger float-right">'.form_error('discord_id').'</small>', 'discord_id', ['style'=>'width: 100%;']);?>
							<?php echo form_input('discord_id', html_entity_decode(htmlspecialchars_decode(@$this->config->item('discord_id'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>
						
						<div class="form-group">
							<?php echo form_label('Discord Davet Linki<small class="text-danger float-right">'.form_error('davet_link').'</small>', 'davet_link', ['style'=>'width: 100%;']);?>
							<?php echo form_input('davet_link', html_entity_decode(htmlspecialchars_decode(@$this->config->item('davet_link'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>
						
						<div class="form-group">
							<?php echo form_label('Discord Tema<small class="text-danger float-right">'.form_error('discord_tema').'</small>', 'discord_tema', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('discord_tema', [1=>'Tema-1', 2=>'Tema-2' , 3=>'Tema-3' , 4=>'Tema-4'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('discord_tema'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>
						
						<div class="form-group">
							<?php echo form_label('Efekt Türü <small class="text-danger float-right">'.form_error('efekt_turu').'</small>', 'efekt_turu', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('efekt_turu', ["pulse" => "Pulse", "flash"=>'Flash' , "tada"=>'Tada' , "bounce"=>'Bounce' , "swing"=>'Swing' , "bounceIn"=>'BounceIn' , "fadeInDown"=>'FadeInDown' , "flip"=>'Flip'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('efekt_turu'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>
						<div class="form-group">
							<?php echo form_label('Efekt Tekrarı <small class="text-danger float-right">'.form_error('efekt_tekrar').'</small>', 'efekt_tekrar', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('efekt_tekrar', ["infinite" => "Sürekli Tekrar", "active"=>'Birkez Göster'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('efekt_tekrar'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>
						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
										</p>
</p>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <p>Siteye kayıt olup üye girişi yaptıktan sonra solda yer alan <b>Yönetici > Mülk Ayarları</b> kısmından aşağıdaki kodu yazmanız gerekmektedir. <br><br>
										Kayıt Olmak İçin : <a href="https://dashboard.tawk.to/signup"><b>TIKLA</b></a><br>
										Giriş Yapmak İçin : <a href="https://dashboard.tawk.to/"><b>TIKLA</b></a>
										<center><h3>Site İD Kısmı</h3><br>
										<img height="300" width="600" src="https://i.hizliresim.com/odDmVR.jpg"></center>
										</p>
                                    </div>
                                    <div class="tab-pane fade" id="pills-neise" role="tabpanel" aria-labelledby="pills-neise-tab">
                                        <p>Tawk.to bir canlı destek sistemidir. Bu sistemi kullanarak oyuncularınıza canlı destek hizmeti sunabilirsiniz.
										</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- tab end -->
				</div>
			</div>
		</div>
	</div>
</div>
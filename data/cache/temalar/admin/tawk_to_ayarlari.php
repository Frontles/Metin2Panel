<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Tawk.to Ayarı</span>
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
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Tawk.to Ayarları</a>
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
							<?php echo form_label('Durum<small class="text-danger float-right">'.form_error('tawkto_durum').'</small>', 'tawkto_durum', ['style'=>'width: 100%;']);?>
							<?php echo form_dropdown('tawkto_durum', [1=>'Açık', 0=>'Kapalı'], html_entity_decode(htmlspecialchars_decode(@$this->config->item('tawkto_durum'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>

						<div class="form-group">
							<?php echo form_label('Site ID<small class="text-danger float-right">'.form_error('tawkto_key').'</small>', 'tawkto_key', ['style'=>'width: 100%;']);?>
							<?php echo form_input('tawkto_key', html_entity_decode(htmlspecialchars_decode(@$this->config->item('tawkto_key'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
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
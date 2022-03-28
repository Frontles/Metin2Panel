<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="col-12">
								<ul class="nav nav-pills" id="pills-tab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="genel-tab" data-toggle="pill" href="#genel" role="tab" aria-controls="genel" aria-selected="true">
										Genel Özellikleri
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="efsun-ve-taslar-tab" data-toggle="pill" href="#efsun-ve-taslar" role="tab" aria-controls="efsun-ve-taslar" aria-selected="false">
										Efsun ve Taşlar 
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
					<form action="<?php echo current_url();?>" method="post" enctype="multipart/form-data" class="ajax-form-json">
					<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="genel" role="tabpanel" aria-labelledby="genel-tab">
								
								<div class="form-group">
									<?php echo form_label('Eşya Resmi (PNG veya JPG formatında olmalıdır.)<small class="text-danger float-right">'.form_error('logo').'</small>', 'logo', ['style'=>'width: 100%;']);?>
									<div class="row">
										<div class="col-1">
											<input name="logo" id="logo" onchange="" type="file" class="filestyle" data-input="false" data-badge="false" data-buttonName="btn btn-flat btn-secondary mb-3" data-buttontext="Logo Değiştir">
										</div>
										<div class="col-11">
											<img id="img-preview" src="<?php echo (is_file($img)) ? base_url($img) : '';?>" class="img-fluid" style="max-height: 50px; margin-left: 20px;">
										</div>
									</div>
								</div>


								<div class="form-group">
									<?php echo form_label('Eşya Adı<small class="text-danger float-right">'.form_error('isim').'</small>', 'isim', ['style'=>'width: 100%;']);?>
									<?php echo form_input('isim', $esya->isim, ['class'=>'form-control', 'autocomplete'=>'off'])?>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<?php echo form_label('Birim Fiyatı<small class="text-danger float-right">'.form_error('cash').'</small>', 'cash', ['style'=>'width: 100%;']);?>
											<?php echo form_input('cash', $esya->cash, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
										<div class="col-6">
											<?php echo form_label('Değeri<small class="text-danger float-right">'.form_error('deger').'</small>', 'deger', ['style'=>'width: 100%;']);?>
											<?php echo form_input('deger', $esya->deger, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<?php echo form_label('Birim Miktarı<small class="text-danger float-right">'.form_error('adet_1').'</small>', 'adet_1', ['style'=>'width: 100%;']);?>
											<?php echo form_input('adet_1', $esya->adet_1, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
										<div class="col-6">
											<?php echo form_label('İndirim (%)<small class="text-danger float-right">'.form_error('indirim_1').'</small>', 'indirim_1', ['style'=>'width: 100%;']);?>
											<?php echo form_input('indirim_1', $esya->indirim_1, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<?php echo form_label('Birim Miktarı<small class="text-danger float-right">'.form_error('adet_2').'</small>', 'adet_2', ['style'=>'width: 100%;']);?>
											<?php echo form_input('adet_2', $esya->adet_2, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
										<div class="col-6">
											<?php echo form_label('İndirim (%)<small class="text-danger float-right">'.form_error('indirim_2').'</small>', 'indirim_2', ['style'=>'width: 100%;']);?>
											<?php echo form_input('indirim_2', $esya->indirim_2, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<?php echo form_label('Birim Miktarı<small class="text-danger float-right">'.form_error('adet_3').'</small>', 'adet_3', ['style'=>'width: 100%;']);?>
											<?php echo form_input('adet_3', $esya->adet_3, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
										<div class="col-6">
											<?php echo form_label('İndirim (%)<small class="text-danger float-right">'.form_error('indirim_3').'</small>', 'indirim_3', ['style'=>'width: 100%;']);?>
											<?php echo form_input('indirim_3', $esya->indirim_3, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<?php echo form_label('Birim Miktarı<small class="text-danger float-right">'.form_error('adet_4').'</small>', 'adet_4', ['style'=>'width: 100%;']);?>
											<?php echo form_input('adet_4', $esya->adet_4, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
										<div class="col-6">
											<?php echo form_label('İndirim (%)<small class="text-danger float-right">'.form_error('indirim_4').'</small>', 'indirim_4', ['style'=>'width: 100%;']);?>
											<?php echo form_input('indirim_4', $esya->indirim_4, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-6">
											<?php echo form_label('Birim Miktarı<small class="text-danger float-right">'.form_error('adet_5').'</small>', 'adet_5', ['style'=>'width: 100%;']);?>
											<?php echo form_input('adet_5', $esya->adet_5, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
										<div class="col-6">
											<?php echo form_label('İndirim (%)<small class="text-danger float-right">'.form_error('indirim_5').'</small>', 'indirim_5', ['style'=>'width: 100%;']);?>
											<?php echo form_input('indirim_5', $esya->indirim_5, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
									</div>
								</div>

								<div class="form-group">
									<?php echo form_label('Kategori<small class="text-danger float-right">'.form_error('KID').'</small>', 'KID', ['style'=>'width: 100%;']);?>
									<?php echo form_dropdown('KID', $this->model->dropdown_urun_kategoriler(), $esya->KID, ['class'=>'form-control', 'autocomplete'=>'off'])?>
								</div>

								<div class="form-group">
									<?php echo form_label('Durumu<small class="text-danger float-right">'.form_error('durum').'</small>', 'durum', ['style'=>'width: 100%;']);?>
									<?php echo form_dropdown('durum', [1=>'Aktif', 0=>'Pasif', 2=>'EM Market'], $esya->durum, ['class'=>'form-control', 'autocomplete'=>'off'])?>
								</div>

								<div class="form-group">
									<?php echo form_label('Süreli Eşya<small class="text-danger float-right">'.form_error('sureli').'</small>', 'sureli', ['style'=>'width: 100%;']);?>
									<div class="form-check">
										<?php echo form_checkbox('sureli', false, $esya->sureli, ['class'=>'form-check-input', 'id'=>'sureli'])?>
										<label class="form-check-label" for="sureli">Ekleyeceğiniz eşya süreli ise bunu işaretleyiniz.</label>									
									</div>
								</div>
								<div class="form-group">
									<?php echo form_label('Süreli Eşya Sorunu<small class="text-danger float-right">'.form_error('sureli').'</small>', 'sureli', ['style'=>'width: 100%;']);?>
									<div class="form-check">
										<?php echo form_checkbox('surelisorunu', false, $esya->surelisorunu, ['class'=>'form-check-input', 'id'=>'surelisorunu'])?>
										<label class="form-check-label" for="surelisorunu">Eklediğiniz eşyada süre sorunu var ise bunu işaretleyiniz !</label>									
									</div>
								</div>

								<div class="form-group">
									<?php echo form_label('Efsun Seçimi<small class="text-danger float-right">'.form_error('efsun').'</small>', 'efsun', ['style'=>'width: 100%;']);?>
									<div class="form-check">
										<?php echo form_checkbox('efsun', false, $esya->efsun, ['class'=>'form-check-input', 'id'=>'efsun'])?>
										<label class="form-check-label" for="efsun">Oyuncuların bu eşyayı satın alırken efsun seçmesini istiyorsanız işaretleyiniz.</label>									
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-4">
											<?php echo form_label('Süre (Gün)<small class="text-danger float-right">'.form_error('gun').'</small>', 'gun', ['style'=>'width: 100%;']);?>
											<?php echo form_input('gun', $esya->gun, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
										<div class="col-4">
											<?php echo form_label('Süre (Saat)<small class="text-danger float-right">'.form_error('saat').'</small>', 'saat', ['style'=>'width: 100%;']);?>
											<?php echo form_input('saat', $esya->saat, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
										<div class="col-4">
											<?php echo form_label('Süre (Dakika)<small class="text-danger float-right">'.form_error('dakika').'</small>', 'dakika', ['style'=>'width: 100%;']);?>
											<?php echo form_input('dakika', $esya->dakika, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
									</div>
								</div>

								<div class="form-group">
								<div class="row">
									<div class="col-4">
									<?php echo form_label('Sevilen Ürün<small class="text-danger float-right">'.form_error('sevilen').'</small>', 'sevilen', ['style'=>'width: 100%;']);?>
									<div class="form-check">
										<?php echo form_checkbox('sevilen', false, false, ['class'=>'form-check-input', 'id'=>'sevilen'])?>
										<label class="form-check-label" for="sevilen">Sevilen ürün olarak seçmek için işaretleyiniz(Anasayfada gözükür).</label>									
									</div></div>
									<div class="col-4">
									<?php echo form_label('Value0 Süreli itemler Sorunu(item_proto)<small class="text-danger float-right">'.form_error('valuesuresorun').'</small>', 'valuesuresorun', ['style'=>'width: 100%;']);?>
									<div class="form-check">
										<?php echo form_checkbox('valuesuresorun', false, false, ['class'=>'form-check-input', 'id'=>'valuesuresorun'])?>
										<label class="form-check-label" for="valuesuresorun">Önemli!: itemler için geçerlidir yukarıdaki seçenekleri seçmenize rağmen item kayboluyorsa ve iteminizin süresi item protoda value0 üzerinde yer alıyor ve socket3 e yazıyor ise ise ise seçiniz.</label>									
									</div></div>
										<div class="col-4">
											<?php echo form_label('Value0 Sorunu Olan eşyanın süresi (dakika cinsinden yazınız)<small class="text-danger float-right">'.form_error('valueoran').'</small>', 'valueoran', ['style'=>'width: 100%;']);?>
											<?php echo form_input('valueoran', $esya->valueoran, ['class'=>'form-control', 'autocomplete'=>'off'])?>
										</div>
								</div>
							</div>
								<div class="form-group">
									<?php echo form_label('Eşya Açıklaması<small class="text-danger float-right">'.form_error('aciklama').'</small>', 'aciklama', ['style'=>'width: 100%;']);?>
									<?php echo form_textarea(['name'=>'aciklama', 'value'=>$esya->aciklama, 'class'=>'form-control', 'cols'=>'40', 'rows'=>'3']);?>
								</div>

								<div class="form-group">
									<?php echo form_label('Eşya Bilgisi<small class="text-danger float-right">'.form_error('bilgi').'</small>', 'bilgi', ['style'=>'width: 100%;']);?>
									<?php echo form_textarea(['name'=>'bilgi', 'value'=>$esya->bilgi, 'class'=>'form-control', 'cols'=>'40', 'rows'=>'3']);?>
								</div>

								<br>

								<button class="btn btn-primary" type="submit">Kaydet</button>
							</div>
							<div class="tab-pane fade" id="efsun-ve-taslar" role="tabpanel" aria-labelledby="efsun-ve-taslar-tab">
								<div class="data-tables">
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<?php echo form_label('Efsun #1<small class="text-danger float-right">'.form_error('attrtype0').'</small>', 'attrtype0', ['style'=>'width: 100%;']);?>
												<?php echo form_dropdown('attrtype0', $this->model->dropdown_item_attrtype(), $esya->attrtype0, ['class'=>'form-control', 'autocomplete'=>'off'])?>
											</div>
											<div class="col-6">
												<?php echo form_label('Türü #1<small class="text-danger float-right">'.form_error('attrvalue0').'</small>', 'attrvalue0', ['style'=>'width: 100%;']);?>
												<?php echo form_input('attrvalue0', $esya->attrvalue0, ['class'=>'form-control', 'autocomplete'=>'off'])?>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<?php echo form_label('Efsun #2<small class="text-danger float-right">'.form_error('attrtype1').'</small>', 'attrtype1', ['style'=>'width: 100%;']);?>
												<?php echo form_dropdown('attrtype1', $this->model->dropdown_item_attrtype(), $esya->attrtype1, ['class'=>'form-control', 'autocomplete'=>'off'])?>
											</div>
											<div class="col-6">
												<?php echo form_label('Türü #2<small class="text-danger float-right">'.form_error('attrvalue1').'</small>', 'attrvalue1', ['style'=>'width: 100%;']);?>
												<?php echo form_input('attrvalue1', $esya->attrvalue1, ['class'=>'form-control', 'autocomplete'=>'off'])?>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<?php echo form_label('Efsun #3<small class="text-danger float-right">'.form_error('attrtype2').'</small>', 'attrtype2', ['style'=>'width: 100%;']);?>
												<?php echo form_dropdown('attrtype2', $this->model->dropdown_item_attrtype(), $esya->attrtype2, ['class'=>'form-control', 'autocomplete'=>'off'])?>
											</div>
											<div class="col-6">
												<?php echo form_label('Türü #3<small class="text-danger float-right">'.form_error('attrvalue2').'</small>', 'attrvalue2', ['style'=>'width: 100%;']);?>
												<?php echo form_input('attrvalue2', $esya->attrvalue2, ['class'=>'form-control', 'autocomplete'=>'off'])?>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<?php echo form_label('Efsun #4<small class="text-danger float-right">'.form_error('attrtype3').'</small>', 'attrtype3', ['style'=>'width: 100%;']);?>
												<?php echo form_dropdown('attrtype3', $this->model->dropdown_item_attrtype(), $esya->attrtype3, ['class'=>'form-control', 'autocomplete'=>'off'])?>
											</div>
											<div class="col-6">
												<?php echo form_label('Türü #4<small class="text-danger float-right">'.form_error('attrvalue3').'</small>', 'attrvalue3', ['style'=>'width: 100%;']);?>
												<?php echo form_input('attrvalue3', $esya->attrvalue3, ['class'=>'form-control', 'autocomplete'=>'off'])?>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<?php echo form_label('Efsun #5<small class="text-danger float-right">'.form_error('attrtype4').'</small>', 'attrtype4', ['style'=>'width: 100%;']);?>
												<?php echo form_dropdown('attrtype4', $this->model->dropdown_item_attrtype(), $esya->attrtype4, ['class'=>'form-control', 'autocomplete'=>'off'])?>
											</div>
											<div class="col-6">
												<?php echo form_label('Türü #5<small class="text-danger float-right">'.form_error('attrvalue4').'</small>', 'attrvalue4', ['style'=>'width: 100%;']);?>
												<?php echo form_input('attrvalue4', $esya->attrvalue4, ['class'=>'form-control', 'autocomplete'=>'off'])?>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<?php echo form_label('Efsun #6<small class="text-danger float-right">'.form_error('attrtype5').'</small>', 'attrtype5', ['style'=>'width: 100%;']);?>
												<?php echo form_dropdown('attrtype5', $this->model->dropdown_item_attrtype(), $esya->attrtype5, ['class'=>'form-control', 'autocomplete'=>'off'])?>
											</div>
											<div class="col-6">
												<?php echo form_label('Türü #6<small class="text-danger float-right">'.form_error('attrvalue5').'</small>', 'attrvalue5', ['style'=>'width: 100%;']);?>
												<?php echo form_input('attrvalue5', $esya->attrvalue5, ['class'=>'form-control', 'autocomplete'=>'off'])?>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-6">
												<?php echo form_label('Efsun #7<small class="text-danger float-right">'.form_error('attrtype6').'</small>', 'attrtype6', ['style'=>'width: 100%;']);?>
												<?php echo form_dropdown('attrtype6', $this->model->dropdown_item_attrtype(), $esya->attrtype6, ['class'=>'form-control', 'autocomplete'=>'off'])?>
											</div>
											<div class="col-6">
												<?php echo form_label('Türü #7<small class="text-danger float-right">'.form_error('attrvalue6').'</small>', 'attrvalue6', ['style'=>'width: 100%;']);?>
												<?php echo form_input('attrvalue6', $esya->attrvalue6, ['class'=>'form-control', 'autocomplete'=>'off'])?>
											</div>
										</div>
									</div>
									<div class="form-group">
										<?php echo form_label('Slot #1<small class="text-danger float-right">'.form_error('socket0').'</small>', 'socket0', ['style'=>'width: 100%;']);?>
										<?php echo form_dropdown('socket0', $this->model->dropdown_item_socket(), $esya->socket0, ['class'=>'form-control', 'autocomplete'=>'off'])?>
									</div>
									<div class="form-group">
										<?php echo form_label('Slot #2<small class="text-danger float-right">'.form_error('socket1').'</small>', 'socket1', ['style'=>'width: 100%;']);?>
										<?php echo form_dropdown('socket1', $this->model->dropdown_item_socket(), $esya->socket1, ['class'=>'form-control', 'autocomplete'=>'off'])?>
									</div>
									<div class="form-group">
										<?php echo form_label('Slot #3<small class="text-danger float-right">'.form_error('socket2').'</small>', 'socket2', ['style'=>'width: 100%;']);?>
										<?php echo form_dropdown('socket2', $this->model->dropdown_item_socket(), $esya->socket2, ['class'=>'form-control', 'autocomplete'=>'off'])?>
									</div>
									<div class="form-group">
										<?php echo form_label('Slot #4<small class="text-danger float-right">'.form_error('socket3').'</small>', 'socket3', ['style'=>'width: 100%;']);?>
										<?php echo form_dropdown('socket3', $this->model->dropdown_item_socket(), $esya->socket3, ['class'=>'form-control', 'autocomplete'=>'off'])?>
									</div>
									<div class="form-group">
										<?php echo form_label('Slot #5<small class="text-danger float-right">'.form_error('socket4').'</small>', 'socket4', ['style'=>'width: 100%;']);?>
										<?php echo form_dropdown('socket4', $this->model->dropdown_item_socket(), $esya->socket4, ['class'=>'form-control', 'autocomplete'=>'off'])?>
									</div>
									<div class="form-group">
										<?php echo form_label('Slot #6<small class="text-danger float-right">'.form_error('socket5').'</small>', 'socket5', ['style'=>'width: 100%;']);?>
										<?php echo form_dropdown('socket5', $this->model->dropdown_item_socket(), $esya->socket5, ['class'=>'form-control', 'autocomplete'=>'off'])?>
									</div>
									<div class="form-group">
										<?php echo form_label('Slot #7<small class="text-danger float-right">'.form_error('socket6').'</small>', 'socket6', ['style'=>'width: 100%;']);?>
										<?php echo form_dropdown('socket6', $this->model->dropdown_item_socket(), $esya->socket6, ['class'=>'form-control', 'autocomplete'=>'off'])?>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


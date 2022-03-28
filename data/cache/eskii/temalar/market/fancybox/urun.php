<?php
	$cokluSatis = 0;
	$indirim    = 0;
    if($esya['adet_1'] > 0) $cokluSatis++;
    if($esya['adet_2'] > 0) $cokluSatis++;
    if($esya['adet_3'] > 0) $cokluSatis++;
    if($esya['adet_4'] > 0) $cokluSatis++;
    if($esya['adet_5'] > 0) $cokluSatis++;
    if($esya['indirim_1'] > 0) $indirim++;
    if($esya['indirim_2'] > 0) $indirim++;
    if($esya['indirim_3'] > 0) $indirim++;
    if($esya['indirim_4'] > 0) $indirim++;
    if($esya['indirim_5'] > 0) $indirim++;
    $esya['cash'] = ($esya['indirim_1'] > 0) ? floor($esya['cash'] - ($esya['cash'] * $esya['indirim_1'] / 100)) : $esya['cash']; 
?>
<div id="item-fancybox" class="scrollable_container_fancy">
	<div id="itemDetails" class="contrast-box row-fluid contrast-box">
		<!--sale-->
		<div class="span12">
			<div class="meta-infos clearfix">
				<h2 id="name" class="left ">
					<span id="selectionNameMain"><?php echo $esya['isim']; ?></span>
				</h2>
				<div class="meta-prop">
					<div class="price">
						<span class="price-label">Fiyat:</span>
						<span class="amount js_currency">
							<span class="block-price">
								<?php if($esya['durum'] == 1):?>
			                    	<img src="<?php echo base_url('temalar/market/assets/images/coins.png');?>"/>
			                    <?php else:?>
			                        <img src="<?php echo base_url('temalar/market/assets/images/em_coins.png');?>"/>
			                    <?php endif;?>
								<span id="end-price" class="end-price old-price"><?php echo $esya['cash']; ?></span>
							</span>
						</span>
					</div>
					<?php if($esya['durum'] == 1):?>
						<p class="bill_mileage text-success">
						<span class="block-price">
							<img class="ttip" tooltip-content="Ejderha Markası" src="<?php echo base_url('temalar/market/assets/images/em_coins.png');?>" alt="Ejderha Markası"/>
							<span id="end-mileage" class="end-mileage"><?php echo $esya['cash']; ?></span>
						</span>
							hesabına geçecek.
						</p>
                    <?php endif;?>
				</div>
				<div class="breadcrumb">
					<span><a href="<?php echo base_url('market');?>">Anasayfa</a>&rsaquo;</span>
					<span><a href="<?php echo base_url('market/urunler/'.$esya['KID']);?>"><?php echo $esya['kategoriAdi'];?></a>&rsaquo;</span>
					<span class="active"><?php echo $esya['isim'];?></span>
				</div>
			</div>
			<div id="pictureShowcase"zzz>
				<div class="item-info clearfix">
					<div class="item-showcase grey-box  span4">
						<div id="image" class="picture_wrapper">
							<img id="selectionImageMain" class="image" src="<?php echo base_url($esya['resim']);?>" onerror="this.src='<?php echo base_url('temalar/items/60001.png');?>'" alt="<?php echo $esya['isim'];?>"/>
						</div>
					</div>
					<div class="tabbable item-description span8">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#info" data-toggle="tab">
									<?php if ($esya['efsun'] === "1"):?>
										Efsun Seçimi
									<?php else:?>
										Bilgi
									<?php endif;?>
								</a>
							</li>
							<li><a href="#description" data-toggle="tab">Açıklama</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane scrollable_container_fancy grey-box active" id="info">
								<p id="selectionShortMain">
								<?php if ($esya['efsun'] === "1"):?>
									<form action="">
										<span class="form-title">1.Efsun : </span>
										<select id="faq-1" name="ticket_title">
											<option value="0" selected>Efsun Seçiniz...</option>
											<?php foreach ($applysTr as $apply => $attr_1):?>
												<?php if ($this->model->get_item_attr_name($apply) !== false):?>
													<?php if (
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype0'] && 
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype1'] && 
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype2']): ?>
														<option value="<?=$this->model->get_item_attr_name($apply)[0]?>"><?=$this->model->get_item_attr_name($apply)[1]?></option>
													<?php endif;?>
												<?php endif;?>
											<?php endforeach;?>
										</select>
										<br>
										<span class="form-title">2.Efsun : </span>
										<select id="faq-2" name="ticket_title">
											<option value="0" selected>Efsun Seçiniz...</option>
											<?php foreach ($applysTr as $apply => $attr_1):?>
												<?php if ($this->model->get_item_attr_name($apply) !== false):?>
													<?php if (
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype0'] && 
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype1'] && 
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype2']): ?>
														<option value="<?=$this->model->get_item_attr_name($apply)[0]?>"><?=$this->model->get_item_attr_name($apply)[1]?></option>
													<?php endif;?>
												<?php endif;?>
											<?php endforeach;?>
										</select>
										<br>
										<span class="form-title">3.Efsun : </span>
										<select id="faq-3" name="ticket_title">
											<option value="0" selected>Efsun Seçiniz...</option>
											<?php foreach ($applysTr as $apply => $attr_1):?>
												<?php if ($this->model->get_item_attr_name($apply) !== false):?>
													<?php if (
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype0'] && 
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype1'] && 
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype2']): ?>
														<option value="<?=$this->model->get_item_attr_name($apply)[0]?>"><?=$this->model->get_item_attr_name($apply)[1]?></option>
													<?php endif;?>
												<?php endif;?>
											<?php endforeach;?>
										</select>
										<br>
										<span class="form-title">4.Efsun : </span>
										<select id="faq-4" name="ticket_title">
											<option value="0" selected>Efsun Seçiniz...</option>
											<?php foreach ($applysTr as $apply => $attr_1):?>
												<?php if ($this->model->get_item_attr_name($apply) !== false):?>
													<?php if (
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype0'] && 
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype1'] && 
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype2']): ?>
														<option value="<?=$this->model->get_item_attr_name($apply)[0]?>"><?=$this->model->get_item_attr_name($apply)[1]?></option>
													<?php endif;?>
												<?php endif;?>
											<?php endforeach;?>
										</select>
										<br>
										<span class="form-title">5.Efsun : </span>
										<select id="faq-5" name="ticket_title">
											<option value="0" selected>Efsun Seçiniz...</option>
											<?php foreach ($applysTr as $apply => $attr_1):?>
												<?php if ($this->model->get_item_attr_name($apply) !== false):?>
													<?php if (
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype0'] && 
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype1'] && 
														$this->model->get_item_attr_name($apply)[0] !== $esya['applytype2']): ?>
														<option value="<?=$this->model->get_item_attr_name($apply)[0]?>"><?=$this->model->get_item_attr_name($apply)[1]?></option>
													<?php endif;?>
												<?php endif;?>
											<?php endforeach;?>
										</select>
										<br>
									</form>
								<?php else:?>
									<?php echo $esya['bilgi'];?>
								<?php endif;?>
								</p>
							</div>

							<?php if($esya['aciklama'] != null): ?>
								<div class="tab-pane scrollable_container_fancy grey-box " id="description">
									<?php echo $esya['aciklama'];?>
								</div>
							<?php else: ?>
								<div class="tab-pane scrollable_container_fancy grey-box" id="description">
									<p>Açıklama yok.</p>
								</div>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- itemBuy -->
	<div id="itemBuy" class="contrast-box volume_discount contrast-box">
		<div class="grey-box clearfix">
			<div class=" dark-grey-box clearfix">
				<div class="contrast-box 1 ">
					<div class="amount clearfix js_currency" data-currency="1" style="padding: 20px;">
						<?php if ($cokluSatis > 1):?>
							<label>Miktar seç:</label>
							<ul id="js_button_container" class="clearfix ">
								<?php for ($i=0;$i<$cokluSatis;$i++):?>
									<li onclick="changePrice(<?php echo $esya['EID'];?>,<?php echo $i+1?>);">
										<?php if ($i === 0):?>
											<button id="btn-active-<?php echo $i+1?>" type="button" class="btn-discount _<?php echo $i+1?> btn-active"><?php echo $esya['adet_'.($i+1)]?></button>
										<?php else:?>
											<button id="btn-active-<?php echo $i+1?>" type="button" class="btn-discount _<?php echo $i+1?>"><?php echo $esya['adet_'.($i+1)]?></button>
										<?php endif;?>
										<?php if ($indirim > 0):?>
											<div class="discount_percentage js_currency">
												<span><?php echo $esya['indirim_'.($i+1)]?>%</span>
											</div>
										<?php endif;?>
									</li>
								<?php endfor;?>
							</ul>
						<?php else:?>
							<label>Bu ürün için çoklu miktar seçim özelliği yoktur.</label>
							<ul id="js_button_container" class="clearfix ">
								<li>
									<button type="button" class="btn-discount _5 btn-active">1</button>
								</li>
							</ul>
						<?php endif;?>
					</div>
					<div class="arrow"></div>
				</div>

				<?php if ($esya['efsun'] === "1"):?>
				<div id="buy" class="">
					<form id="faq_buy" action="<?php echo base_url('market/satin_al/'.$esya['EID'].'/1');?>">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
						<input id="faq_input_1" name="faq_1" type="hidden" value="0">
						<input id="faq_input_2" name="faq_2" type="hidden" value="0">
						<input id="faq_input_3" name="faq_3" type="hidden" value="0">
						<input id="faq_input_4" name="faq_4" type="hidden" value="0">
						<input id="faq_input_5" name="faq_5" type="hidden" value="0">
						<p>Şu anki fiyatı:</p>
						<p class="bill_price block-price">
							<?php if($esya['durum'] == 1):?>
		                    	<img src="<?php echo base_url('temalar/market/assets/images/coins.png');?>"/>
		                    <?php else:?>
		                        <img src="<?php echo base_url('temalar/market/assets/images/em_coins.png');?>"/>
		                    <?php endif;?>							
							<span id="end-price_1" class="end-price"><?php echo $esya['cash']; ?></span>
						</p>
						<div class="buy-btn-box clearfix">
							<div class="btn-group ">
								<button type="submit" class="btn-price">Satın al</button>
							</div>
						</div>
					</form>
					<script>
					    $('#faq-1').change(function () {
							document.getElementById('faq_input_1').value = $(this).val();
					    });
					    $('#faq-2').change(function () {
					       document.getElementById('faq_input_2').value = $(this).val();
					    });
					    $('#faq-3').change(function () {
					        document.getElementById('faq_input_3').value = $(this).val();
					    });
					    $('#faq-4').change(function () {
					        document.getElementById('faq_input_4').value = $(this).val();
					    });
					    $('#faq-5').change(function () {
					        document.getElementById('faq_input_5').value = $(this).val();
					    });
					    $('#faq_buy').submit(function (event) {
					        event.preventDefault(event);
					        var url  = $(this).attr('action');
					        var data = $(this).serialize();
					        $.post(url, data, function (result) {
					        	if(result.alert){
					        		alert(result.alert);
					        	}else if(result.fancybox){
						            $.fancybox({
						                tpl: {
						                    closeBtn: '<button title="Close" class="fancybox-item fancybox-close btn-default" href="javascript:;"></button>'
						                },
						                href: result.fancybox,
						                type: 'ajax',
						                autoDimensions: false,
						                width: "auto",
						                height: "auto",
						                overlayOpacity: 0.6,
						                showCloseButton: true,
						                enableEscapeButton: false,
						                hideOnOverlayClick: false,
						                hideOnContentClick: false,
						                padding: 10,
						                ajax: {
						                    type: 'POST',
						                    data: {arg:result.arg}
						                },
						                beforeShow: function() {}
						            });					        		
					        	}
					        },"json");
					    });
					</script>
				</div>
				<?php else: ?>
					<div id="buy" class="">
                        <form>
                        	<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                            <p>Şu anki fiyatı:</p>
                            <p class="bill_price block-price">
                                <?php if($esya['durum'] == 1):?>
			                    	<img src="<?php echo base_url('temalar/market/assets/images/coins.png');?>"/>
			                    <?php else:?>
			                        <img src="<?php echo base_url('temalar/market/assets/images/em_coins.png');?>"/>
			                    <?php endif;?>
                                <span id="end-price_1" class="end-price"><?php echo $esya['cash']; ?></span>
                            </p>
                            <div class="buy-btn-box clearfix">
                                <div class="btn-group ">
                                    <a id="buyItem" href="<?php echo base_url('market/satin_al/'.$esya['EID'].'/1/');?>" class="fancybox fancybox.ajax">
                                    	<button type="button" class="btn-price">Satın al</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    	<script>
						    function changePrice(item_id, num) {
						        var url  = "<?php echo base_url('market/ajax_ucret_hesapla2');?>";
						        var data = {item_id:item_id, num:num};
						        $.post(url, data, function (rsp) {
						            if (rsp.status === true)
						            {
						                for (var i=1;i<=rsp.multi;i++)
						                {
						                    if(num === i)
						                        $("#btn-active-"+i).addClass("btn-active");
						                    else
						                        $("#btn-active-"+i).removeClass("btn-active");
						                }
						                $('#end-price').text(rsp.price);
						                $('#end-price_1').text(rsp.price);
						                $('#end-mileage').text(rsp.price);
						                var buyUrl = "<?php echo base_url('market/satin_al/'.$esya['EID']);?>/" + rsp.count + "/" ;
						                $('#buyItem').attr('href',buyUrl);
						            }
						        }, "json");
						    }
						</script>
				<?php endif; ?>
			</div>
		</div> <!-- grey-box closed -->
	</div> <!-- item-buy closed -->
</div>
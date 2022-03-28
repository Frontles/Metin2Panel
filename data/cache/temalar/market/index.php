<div class="content clearfix" id="wt_refpoint">
		    <div id="landing" class="scrollable_container">
		        <div class="row-fluid">
		            <div class="span12">
		                <div class="row-fluid">
		                    <div id="prmo-area" class="span12">
		                        <div id="zs-prmo-slider" class="span8">
		                            <div id="prmoSlider" class="royalSlider rsMinW">
										<?php if($markethaberler = $this->model->getir_market_haber()) foreach ($markethaberler as $key => $markethaber):?>
		                                                                    <div class="rsContent slide">
		                                        <div class="bContainer">
		                                            <img src="<?php echo $markethaber->resim;?>">
		                                            <div class="slider_banner">
		                                                <h3><?php echo $markethaber->baslik;?></h3>
		                                                <p><?php echo $markethaber->metin;?></p>
		                                            </div>
		                                        </div>
		                                    </div>
											<?php endforeach;?>

		                                                            </div>
		                        </div>
								                            <div id="zs-prmo-ad" class="span4">
		                                <div class="call-to-action contrast-box">
		                                    <img src="https://gf2.geo.gfsrv.net/cdn78/26c8a254118d6bbbd8ae871744024e.jpg">
		                                    <div class="slider_banner">
		                                        <h3>Metin2 Nesne Marketi</h3>
		                                        <p>Ejderhalara layık kampanya ürünleri</p></div>
		                                </div>
		                            </div>
								                    </div>
		                </div>
		            </div>
		            <!-- Main CallToAction for a primary calltoaction message-->
		            <br class="clearfloat">
		            <div class="row-fluid">
		                <div class="item-sample span12">
		                    <h2 class="heading-cat">Sevilen Ürünler</h2>
		                    <div class="carousell royalSlider contentslider rsDefault visibleNearby card">
		                        <?php 
			                        foreach ($esyalar as $key => $row):
			          
			                            $row['cash'] = ($row['indirim_1'] > 0) ? floor($row['cash'] - ($row['cash'] * $row['indirim_1'] / 100)) : $row['cash'];
		                        ?>
		                        <div class="span4 list-item quickbuy">
	                                <div class="contrast-box  item-box inner-content clearfix">
		                                <div class="desc row-fluid">
		                                    <div class="item-description">
		                                        <p class="item-status js_currency_default">
		                                            <?php if ($row['sureli'] == 1):?>
		                                                <i class="zicon-hd-time-ingame ttip" tooltip-content="Süre : XX gün"></i>
		                                            <?php endif;?>
		                                            
		                                            <?php // if ($row['discount_status'] == 1):?>
		                                            <?php if ($row['indirim_1'] > 0):?>
		                                                <i class="zicon-hd-discount ttip" tooltip-content="Miktar İndirimi"></i>
		                                            <?php endif;?>
		                                        </p>
		                                        <h4 class="fancybox fancybox.ajax" href="<?php echo base_url('market/urun/'.$row['EID']);?>">
		                                            <a class="card-heading" title="<?php echo $row['isim'];?>">
		                                                <?php echo $row['isim'];?>
		                                            </a>
		                                        </h4>
		                                        <div class="item-shortdesc clearfix">
		                                            <a class="item-thumb fancybox fancybox.ajax" href="<?php echo base_url('market/urun/'.$row['EID']);?>">
		                                                <div class="item-thumb-container">
		                                                    <div id="image" class="picture_wrapper_2">
		                                                        <img class="item-thumb-63" src="<?php echo base_url($row['resim']);?>" onerror="this.src='<?php echo base_url('temalar/items/60001.png');?>'" alt="<?php echo $row['isim'];?>">
		                                                    </div>
		                                                </div>
		                                            </a>
		                                            <span class="category-link"></span>
		                                            <div class="fancybox fancybox.ajax" href="<?php echo base_url('market/urun/'.$row['EID']);?>">
		                                                <p class="item-box-description">
		                                                    <?php echo $row['aciklama'];?>
		                                                </p>
		                                            </div>
		                                        </div>
		                                    </div>
		                                    <!-- Buttons -->
		                                    <div class="item-footer price_desc row-fluid js_currency_default">
		                                        
		                                        <div class="action-box right">
		                                            <button class="span5 right btn-price">
		                                                <span class="block-price">
		                                                    <?php if($row['durum'] == 1):?>
		                                                    <img src="<?php echo base_url('temalar/market/assets/images/coins.png');?>"/>
		                                                    <?php else:?>
		                                                        <img src="<?php echo base_url('temalar/market/assets/images/em_coins.png');?>"/>
		                                                    <?php endif;?>
		                                                    <span id="item_price_<?php echo $row['EID'];?>" class="end-price" data-value="<?php echo $row['cash'];?>"><?php echo $row['cash'];?></span>
		                                                </span>
		                                            </button>
		                                            <button class="span5 right btn-buy fancybox fancybox.ajax" href="<?php echo base_url('market/urun/'.$row['EID']);?>">Satın al</button>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
	                            </div>
	                        	<?php endforeach;?>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
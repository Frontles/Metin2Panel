<?php
$item = product_ajax(get('id'))['item'];
$category = product_ajax(get('id'))['category'];
$aId = session_get('user_id');
$pId = session_get('player_id');
$itemId = $item['item_id'];
$vnum = $item['vnum'];
$faq_status = $item['faq_status'];
$wear_flag = $item['wear_flag'];
$tokenKey = settings('tokenkey');
$hashh = new Hash();
$hash = $hashh->create('sha256',$aId.$itemId.$vnum.'1',$tokenKey);

$item['coins'] = ($item['discount_status'] == 1 && $item['discount_1'] > 0) ? floor($item['coins'] - ($item['coins'] * $item['discount_1'] / 100)) : $item['coins'];
$getItemAttrsor = $player->prepare('SELECT apply,lv5 FROM item_attr WHERE ' . $wear_flag . '=:' . $wear_flag );
$getItemAttrsor->execute([
    $wear_flag => '5'
]);

$getItemAttr = $getItemAttrsor->fetchAll(PDO::FETCH_ASSOC);

$functions = new Functions();

?>
<?php if ($faq_status === '1'):?>
    <div id="item-fancybox" class="scrollable_container_fancy">
        <div id="itemDetails" class="contrast-box row-fluid contrast-box">
            <!--sale-->
            <div class="span12">
                <div class="meta-infos clearfix">
                    <h2 id="name" class="left ">
                        <span id="selectionNameMain"><?= $item['item_name'] ?></span>
                    </h2>
                    <div class="meta-prop">
                        <div class="price">
                            <span class="price-label">Fiyat:</span>
                            <span class="amount js_currency">
                    <span class="block-price">
                        <img class="ttip" tooltip-content="Ejderha Parası" src="<?=shop_public_url('/images/coins.png')?>" alt="Ejderha Parası"/>
                        <span id="end-price" class="end-price old-price"><?= $item['coins']; ?></span>
                    </span>
                        </span>
                        </div>
                        <p class="bill_mileage text-success">
                        <span class="block-price">
                            <img class="ttip" tooltip-content="Ejderha Markası" src="<?=shop_public_url('/images/em_coins.png')?>" alt="Ejderha Markası"/>
                            <span id="end-mileage" class="end-mileage"><?= $item['coins']; ?></span>
                        </span>
                            hesabına geçecek.
                        </p>
                    </div>
                    <div class="breadcrumb">
                        <span><a href="<?=shop_url('index')?>">Anasayfa</a>&rsaquo;</span>
						<?php $tokenI = md5($aId.$pId.$category['id']); ?>
                        <span><a href="<?=shop_public_url('product-view?id='.$category['id'].'&token='.$tokenI)?>"><?=$category['name']?></a>&rsaquo;</span>
                        <span class="active"><?=$item['item_name']?></span>
                    </div>
                </div>
                <div id="pictureShowcase">
                    <div class="item-info clearfix">
                        <div class="item-showcase grey-box  span4">
                            <div id="image" class="picture_wrapper">
                                <img id="selectionImageMain" class="image" src="<?=  URL . '/' .$item['item_image']; ?>" onerror="this.src='<?=URL.'/data/items/60001.png'?>'" alt="<?=$item['item_name']?>"/>

                            </div>
                        </div>
                        <div class="tabbable item-description span8">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#info" data-toggle="tab">
										<?php if ($faq_status === "1"):?>
                                            Efsun Seçimi
										<?php else:?>
                                            Bilgi
										<?php endif;?>
                                    </a></li>
                                <li ><a href="#description" data-toggle="tab">Açıklama</a></li>
                            </ul>
                            <div class="tab-content ">
                                <div class="tab-pane scrollable_container_fancy grey-box active" id="info">
                                    <p id="selectionShortMain">
										<?php if ($faq_status === "1"):?>
                                    <form action="">
                                        <span class="form-title">1.Efsun : </span>
                                        <select id="faq-1" name="ticket_title">
                                            <option value="0" selected>Efsun Seçiniz...</option>
											<?php foreach ($getItemAttr as $attr_1):?>
												<?php if ($functions->item_attr_name($attr_1['apply']) !== false):?>
													<?php if ($functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype0'] && $functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype1'] && $functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype2']):?>
                                                        <option value="<?=$functions->item_attr_name($attr_1['apply'])[0]?>"><?=$functions->item_attr_name($attr_1['apply'])[1]?></option>
													<?php endif;?>
												<?php endif;?>
											<?php endforeach;?>
                                        </select><br>
                                        <span class="form-title">2.Efsun : </span>
                                        <select id="faq-2" name="ticket_title">
                                            <option value="0" selected>Efsun Seçiniz...</option>
											<?php foreach ($getItemAttr as $attr_1):?>
												<?php if ($functions->item_attr_name($attr_1['apply']) !== false):?>
													<?php if ($functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype0'] && $functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype1'] && $functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype2']):?>
                                                        <option value="<?=$functions->item_attr_name($attr_1['apply'])[0]?>"><?=$functions->item_attr_name($attr_1['apply'])[1]?></option>
													<?php endif;?>
												<?php endif;?>
											<?php endforeach;?>
                                        </select><br>
                                        <span class="form-title">3.Efsun : </span>
                                        <select id="faq-3" name="ticket_title">
                                            <option value="0" selected>Efsun Seçiniz...</option>
											<?php foreach ($getItemAttr as $attr_1):?>
												<?php if ($functions->item_attr_name($attr_1['apply']) !== false):?>
													<?php if ($functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype0'] && $functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype1'] && $functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype2']):?>
                                                        <option value="<?=$functions->item_attr_name($attr_1['apply'])[0]?>"><?=$functions->item_attr_name($attr_1['apply'])[1]?></option>
													<?php endif;?>
												<?php endif;?>
											<?php endforeach;?>
                                        </select><br>
                                        <span class="form-title">4.Efsun : </span>
                                        <select id="faq-4" name="ticket_title">
                                            <option value="0" selected>Efsun Seçiniz...</option>
											<?php foreach ($getItemAttr as $attr_1):?>
												<?php if ($functions->item_attr_name($attr_1['apply']) !== false):?>
													<?php if ($functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype0'] && $functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype1'] && $functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype2']):?>
                                                        <option value="<?=$functions->item_attr_name($attr_1['apply'])[0]?>"><?=$functions->item_attr_name($attr_1['apply'])[1]?></option>
													<?php endif;?>
												<?php endif;?>
											<?php endforeach;?>
                                        </select><br>
                                        <span class="form-title">5.Efsun : </span>
                                        <select id="faq-5" name="ticket_title">
                                            <option value="0" selected>Efsun Seçiniz...</option>
											<?php foreach ($getItemAttr as $attr_1):?>
												<?php if ($functions->item_attr_name($attr_1['apply']) !== false):?>
													<?php if ($functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype0'] && $functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype1'] && $functions->item_attr_name($attr_1['apply'])[0] !== $item['applytype2']):?>
                                                        <option value="<?=$functions->item_attr_name($attr_1['apply'])[0]?>"><?=$functions->item_attr_name($attr_1['apply'])[1]?></option>
													<?php endif;?>
												<?php endif;?>
											<?php endforeach;?>
                                        </select><br>
                                    </form>
									<?php else:?>
										<?=$item['information'];?>
									<?php endif;?>
                                    </p>
                                </div>
								<?php if($item['information'] != null): ?>
                                    <div class="tab-pane scrollable_container_fancy grey-box " id="description">
										<?=$item['information'];?>
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
        <div id="itemBuy" class="contrast-box volume_discount contrast-box">
            <div class="grey-box clearfix">
                <div class=" dark-grey-box clearfix">
                    <div class="contrast-box 1 ">
                        <div class="amount clearfix js_currency" data-currency="1" style="padding: 20px;">
							<?php if ($item['multi_count'] > 1):?>
                                <label>Miktar seç:</label>
                                <ul id="js_button_container" class="clearfix ">
									<?php for ($i=0;$i<$item['multi_count'];$i++):?>
                                        <li onclick="changePrice(<?=$item['id']?>,<?=$i+1?>);">
											<?php if ($i === 0):?>
                                                <button id="btn-active-<?=$i+1?>" type="button" class="btn-discount _<?=$i+1?> btn-active"><?=$item['count_'.($i+1)]?></button>
											<?php else:?>
                                                <button id="btn-active-<?=$i+1?>" type="button" class="btn-discount _<?=$i+1?>"><?=$item['count_'.($i+1)]?></button>
											<?php endif;?>
											<?php if ($item['discount_status']):?>
                                                <div class="discount_percentage js_currency">
                                                    <span><?=$item['discount_'.($i+1)]?>%</span>
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
                    <div id="buy" class="">
                        <form id="faq_buy" action="<?=shop_url('product-buy_faq?id='.$itemId.'&count=1&hash='.$hash)?>">
                            <input id="faq_input_1" name="faq_1" type="hidden" value="0">
                            <input id="faq_input_2" name="faq_2" type="hidden" value="0">
                            <input id="faq_input_3" name="faq_3" type="hidden" value="0">
                            <input id="faq_input_4" name="faq_4" type="hidden" value="0">
                            <input id="faq_input_5" name="faq_5" type="hidden" value="0">
                            <p>Şu anki fiyatı:</p>
                            <p class="bill_price block-price">
                                <img class="ttip" tooltip-content="Ejderha Parası" src="<?=shop_public_url('/images/coins.png')?>" alt="Ejderha Parası" />
                                <span id="end-price_1" class="end-price"><?= $item['coins']; ?></span>
                            </p>
                            <div class="buy-btn-box clearfix">
                                <div class="btn-group ">
                                    <button type="submit" class="btn-price">Satın al</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- grey-box closed -->
        </div> <!-- item-buy closed -->
    </div>
    <script>
        $('#faq-1').change(function () {
           var value = {faq:$(this).val(),hash:"<?=$hash?>",item_id:"<?=$itemId?>",vnum:"<?=$vnum?>"};
           var url = "<?=shop_url('product-select_faq')?>";
           var buttonUrl = $('#buyItem').attr('href');
            $.post(url,value,function (data) {
                document.getElementById('faq_input_1').value = data.data;
            },"json");
        });
        $('#faq-2').change(function () {
            var value = {faq:$(this).val(),hash:"<?=$hash?>",item_id:"<?=$itemId?>",vnum:"<?=$vnum?>"};
            var url = "<?=shop_url('product-select_faq')?>";
            $.post(url,value,function (data) {
                document.getElementById('faq_input_2').value = data.data;
            },"json");
        });
        $('#faq-3').change(function () {
            var value = {faq:$(this).val(),hash:"<?=$hash?>",item_id:"<?=$itemId?>",vnum:"<?=$vnum?>"};
            var url = "<?=shop_url('product-select_faq')?>";
            $.post(url,value,function (data) {
                document.getElementById('faq_input_3').value = data.data;
            },"json");
        });
        $('#faq-4').change(function () {
            var value = {faq:$(this).val(),hash:"<?=$hash?>",item_id:"<?=$itemId?>",vnum:"<?=$vnum?>"};
            var url = "<?=shop_url('product-select_faq')?>";
            $.post(url,value,function (data) {
                document.getElementById('faq_input_4').value = data.data;
            },"json");
        });
        $('#faq-5').change(function () {
            var value = {faq:$(this).val(),hash:"<?=$hash?>",item_id:"<?=$itemId?>",vnum:"<?=$vnum?>"};
            var url = "<?=shop_url('product-select_faq')?>";
            $.post(url,value,function (data) {
                document.getElementById('faq_input_5').value = data.data;
            },"json");
        });
        $('#faq_buy').submit(function (event) {
            event.preventDefault(event);
            var url = $(this).attr('action');
            var data = $(this).serialize();
            $.post(url,data,function (result) {
                $.fancybox({
                    tpl: {
                        closeBtn: '<button title="Close" class="fancybox-item fancybox-close btn-default" href="javascript:;"></button>'
                    },
                    href: "<?=shop_url('product-faq_buy')?>",
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
                        data: {result:result.result,data:result.data,message:result.message}
                    },
                    beforeShow: function() {}
                });
            },"json");
        });
    </script>
<?php else:?>
    <div id="item-fancybox" class="scrollable_container_fancy">
        <div id="itemDetails" class="contrast-box row-fluid contrast-box">
            <!--sale-->
            <div class="span12">
                <div class="meta-infos clearfix">
                    <h2 id="name" class="left ">
                        <span id="selectionNameMain"><?= $item['item_name'] ?></span>
                    </h2>
                    <div class="meta-prop">
                        <div class="price">
                            <span class="price-label">Fiyat:</span>
                            <span class="amount js_currency">
                    <span class="block-price">
                        <img class="ttip" tooltip-content="Ejderha Parası" src="<?=shop_public_url('/images/coins.png')?>" alt="Ejderha Parası"/>
                        <span id="end-price" class="end-price old-price"><?= $item['coins']; ?></span>
                    </span>
                        </span>
                        </div>
                        <p class="bill_mileage text-success">
                        <span class="block-price">
                            <img class="ttip" tooltip-content="Ejderha Markası" src="<?=shop_public_url('/images/em_coins.png')?>" alt="Ejderha Markası"/>
                            <span id="end-mileage" class="end-mileage"><?= $item['coins']; ?></span>
                        </span>
                            hesabına geçecek.
                        </p>
                    </div>
                    <div class="breadcrumb">
                        <span><a href="<?=shop_url('index')?>">Anasayfa</a>&rsaquo;</span>
						<?php $tokenI = md5($aId.$pId.$category['id']); ?>
                        <span><a href="<?=shop_url('product-view?id='.$category['id'].'&token='.$tokenI)?>"><?=$category['name']?></a>&rsaquo;</span>
                        <span class="active"><?=$item['item_name']?></span>
                    </div>
                </div>
                <div id="pictureShowcase">
                    <div class="item-info clearfix">
                        <div class="item-showcase grey-box  span4">
                            <div id="image" class="picture_wrapper">
                                <img id="selectionImageMain" class="image" src="<?=URL . '/' . $item['item_image']; ?>" onerror="this.src='<?=URL.'/data/items/60001.png'?>'" alt="<?=$item['item_name']?>"/>
                            </div>
                        </div>
                        <div class="tabbable item-description span8">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#info" data-toggle="tab">
										<?php if ($faq_status === "1"):?>
                                            Efsun Seçimi
										<?php else:?>
                                            Bilgi
										<?php endif;?>
                                    </a></li>
                                <li ><a href="#description" data-toggle="tab">Açıklama</a></li>
                            </ul>
                            <div class="tab-content ">
                                <div class="tab-pane scrollable_container_fancy grey-box active" id="info">
                                    <p id="selectionShortMain">
										<?=$item['information'];?>
                                    </p>
                                </div>
								<?php if($item['information'] != null): ?>
                                    <div class="tab-pane scrollable_container_fancy grey-box " id="description">
										<?=$item['information'];?>
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
        <div id="itemBuy" class="contrast-box volume_discount contrast-box">
            <div class="grey-box clearfix">
                <div class=" dark-grey-box clearfix">
                    <div class="contrast-box 1 ">
                        <div class="amount clearfix js_currency" data-currency="1" style="padding: 20px;">
							<?php if ($item['multi_count'] > 1):?>
                                <label>Miktar seç:</label>
                                <ul id="js_button_container" class="clearfix ">
									<?php for ($i=0;$i<$item['multi_count'];$i++):?>
                                        <li onclick="changePrice(<?=$item['id']?>,<?=$i+1?>);">
											<?php if ($i === 0):?>
                                                <button id="btn-active-<?=$i+1?>" type="button" class="btn-discount _<?=$i+1?> btn-active"><?=$item['count_'.($i+1)]*$item['unit_price']?></button>
											<?php else:?>
                                                <button id="btn-active-<?=$i+1?>" type="button" class="btn-discount _<?=$i+1?>"><?=$item['count_'.($i+1)]*$item['unit_price']?></button>
											<?php endif;?>
											<?php if ($item['discount_status']):?>
                                                <div class="discount_percentage js_currency">
                                                    <span><?=$item['discount_'.($i+1)]?>%</span>
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
                    <div id="buy" class="">
                        <form>
                            <p>Şu anki fiyatı:</p>
                            <p class="bill_price block-price">
                                <img class="ttip" tooltip-content="Ejderha Parası" src="<?=shop_public_url('/images/coins.png')?>" alt="Ejderha Parası" />
                                <span id="end-price_1" class="end-price"><?= $item['coins']; ?></span>
                            </p>
                            <div class="buy-btn-box clearfix">
                                <div class="btn-group ">
                                    <a id="buyItem" href="<?=shop_url('product-buy?id='.$itemId.'&count=1&hash='.$hash)?>" class="fancybox fancybox.ajax"><button type="button" class="btn-price">Satın al</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- grey-box closed -->
        </div> <!-- item-buy closed -->
    </div><!-- item-fancy closed -->
    <script>
        function changePrice(item_id,num) {
            var url = "<?=shop_url('product-price_change2')?>";
            var data = {item_id:item_id,num:num};
            $.post(url,data,function (rsp) {
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
                    var buyUrl = "<?=shop_url('product-buy?id='.$itemId.'&count=')?>" + rsp.count + "&hash=" + rsp.hash;
                    $('#buyItem').attr('href',buyUrl);
                }
            },"json");
        }
    </script>
<?php endif;?>


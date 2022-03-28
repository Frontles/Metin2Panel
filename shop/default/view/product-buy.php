<?php

$productbuy = product_buy();
$result = $productbuy['result'];
?>
<div id="notEnoughCash" class="contrast-box sys-message">
	<?php if ($result == false): ?>
		<?php if ($productbuy['message'] == 'coins'): ?>
        <div class="dark-grey-box clearfix">
            <div class="clearfix">
                <div class="item-showcase   span2">
                    <div id="image" class="picture_wrapper ">
                        <img class="item-thumb" src="<?=URL . '/' .$productbuy['data'][2] ?>" onerror="this.src='<?=URL.'/data/items/60001.png'?>'" width="98" height="98" alt=""/>
                    </div>
                </div>
                <div class="money-showcase  span5 ">
                    <h2>Ejderha Parası yetersiz mi?</h2>
                    <div class="currency_status_box" style="float: left; margin-right: 5%;">
                        <p>Şu anki hesap durumum:</p>
                        <ul class="currency_status clearfix">
                            <li>
                                <span>
                                    <img class="ttip" tooltip-content="Ejderha Parası" src="<?= shop_public_url('/images/coins.png') ?>" width="16" height="16" alt="Ejderha Parası"/>
                                    <span class="end-price" data-currency="<?= $productbuy['data'][1] ?>"><?= $productbuy['data'][1] ?></span>
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="currency_status_box">
                        <p>Gerekli ejderha parası miktarı:</p>
                        <ul class="currency_status clearfix">
                            <li>
                                <span>
                                    <img class="ttip" tooltip-content="Ejderha Parası" src="<?= shop_public_url('/images/coins.png') ?>" width="16" height="16" alt="Ejderha Parası"/>
                                    <span class="end-price" data-currency="<?= $productbuy['data'][0] ?>"><?= $productbuy['data'][3] * ($productbuy['data'][0] - $productbuy['data'][1]) ?></span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="alternativ_payment clearfix">
            <div class="alternativ_payment_head">
                <h3>Ne yapabilirsin?</h3>
                <div class="clearfix">

                    <script type="text/javascript">
                        function openPaymentLink() {
                            location.href = ("<?=shop_url('buy-index')?>");
                        }
                    </script>
                    <button class="btn-price premium" href="javascript:void(0)" onClick="openPaymentLink()" title="">
                        <img class="ttip" tooltip-content="Ejderha Parası" src="<?=shop_public_url('/images/479d2a18c634f5772a66d11e35f9f9.png')?>" alt=""/>
                        <span class="premium-name">EP SATIN AL</span>
                    </button>
                </div>
            </div>
        </div>
	<?php elseif ($productbuy['message'] == 'depo'): ?>
        <div class="dark-grey-box clearfix">
            <div class="clearfix">
                <div class="item-showcase   span2">
                    <div id="image" class="picture_wrapper ">
                        <img class="item-thumb" src="<?= URL . '/' . $productbuy['data'][2] ?>" onerror="this.src='<?=URL.'/data/items/60001.png'?>'" width="98" height="98" alt=""/>
                    </div>
                </div>
                <div class="money-showcase  span5 ">
                    <h2>Nesne market deponda hiç yer yok!</h2>
                    <div class="currency_status_box" style="float: left; margin-right: 5%;">
                        <p>Şu anki hesap durumum:</p>
                        <ul class="currency_status clearfix">
                            <li>
                                <span>
                                    <img class="ttip" tooltip-content="Ejderha Parası"
                                         src="//gf1.geo.gfsrv.net/cdn06/479d2a18c634f5772a66d11e35f9f9.png" width="16"
                                         height="16" alt="Ejderha Parası"/>
                                    <span class="end-price"
                                          data-currency="<?= $productbuy['data'][1] ?>"><?= $productbuy['data'][1] ?></span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="alternativ_payment clearfix">
            <div class="alternativ_payment_head">
                <h3>Nesne Market Deponu Boşaltmalısın...</h3>
                <div class="clearfix">
                </div>
            </div>
        </div>
	<?php elseif ($productbuy['message'] == "error"): ?>
        <div class="dark-grey-box clearfix">
            <div class="clearfix">
                <div class="money-showcase  span5 ">
                    <h2>[<?= $productbuy['data'][0] ?>] İşem sırasında bir hata oluştu!</h2>
                    <div class="currency_status_box" style="float: left; margin-right: 5%;">
                        <p>Hatanın sebebi aşağıdakilerden bir tanesi olabilir :</p>
                        <ul>
                            <li>3. parti yazılım kullanarak kontrol sistemini geçmeye çalışıyor olabilirsiniz.</li>
                            <li>Aktif olmayan bir bölüme girmeye çalışıyor olabilirsiniz.</li>
                            <li>Hatalı bir işlem yapmış olabilirsiniz.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	<?php elseif ($productbuy['message'] == "same"): ?>
        <div class="dark-grey-box clearfix">
            <div class="clearfix">
                <div class="money-showcase  span5 ">
                    <h2>[<?= $productbuy['data'][0] ?>] İşem sırasında bir hata oluştu!</h2>
                    <div class="currency_status_box" style="float: left; margin-right: 5%;">
                        <ul>
                            <li>Lütfen sayfayı yenileyerek tekrar deneyiniz.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	<?php endif; ?>
	<?php elseif ($result == true): ?>
        <div class="dark-grey-box clearfix">
            <div class="clearfix">
                <div class="item-showcase   span2">
                    <div id="image" class="picture_wrapper ">
                        <img class="item-thumb" src="<?=  URL . '/' .$productbuy['data'][1] ?>" onerror="this.src='<?=URL.'/data/items/60001.png'?>'" width="98" height="98" alt=""/>
                    </div>
                </div>
                <div class="money-showcase  span5 ">
                    <h2><i class="fa fa-check"></i>İşlem Başarılı (<?= $productbuy['data'][0] ?>)</h2>
                    <div class="currency_status_box" style="float: left; margin-right: 5%;">
                        <p>Şu anki hesap durumum:</p>
                        <ul class="currency_status clearfix">
                            <li>
                                <span>
                                    <img class="ttip" tooltip-content="Ejderha Parası"
                                         src="<?= shop_public_url('/images/coins.png') ?>" width="16" height="16"
                                         alt="Ejderha Parası"/>
                                    <span class="end-price"
                                          data-currency="<?= $productbuy['data'][2] ?>"><?= $productbuy['data'][2] ?></span>
                                </span>
                            </li>
                            <li>
                                <span>
                                    <img class="ttip" tooltip-content="Ejderha Parası"
                                         src="<?= shop_public_url('/images/em_coins.png') ?>" width="16" height="16"
                                         alt="Ejderha Parası"/>
                                    <span class="end-price"
                                          data-currency="<?= $productbuy['data'][2] ?>"><?= $productbuy['data'][3] ?></span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="alternativ_payment clearfix">
            <div class="alternativ_payment_head">
                <h3>Lütfen Nesne Market Deponuzu Kontrol Ediniz...</h3>
                <div class="clearfix">
                </div>
            </div>
        </div>
	<?php
	$newCoins = $productbuy['data'][2];
	$newEm = $productbuy['data'][3];
	?>
        <script>
            $(document).ready(function () {
                $('#balances1').text("<?=$newCoins?>");
                $('#balances2').text("<?=$newEm?>");
            });
        </script>
	<?php endif; ?>
</div>



<?php require shop_view('static/header');

$epprice = buy_index();
?>
<div class="content clearfix" id="wt_refpoint">

    <div class="scrollable_container" style="margin-top: 30px;">
        <style>
            .center > a:hover, .center > a:active {
                text-decoration: none;
            }
            .center {
                display: flex;
                flex-wrap: wrap;
                width: 49%;
                float: left;
            }

            .amount {
                font-size: 14px;
                font-family: 'Concert One', cursive;
                padding: 5px;
            }

            table .tr-odd {
                background: rgba(165, 154, 114, 0.15);
            }
            .buy-box{
                background-image: url(<?= shop_public_url('/images/ltr-box2.png') ?>);
                background-repeat: no-repeat;
                width: 385px;
                height: 67px;
            }
            .buy-box:hover {
                -ms-transform: scale(1.05);
                -moz-transform: scale(1.05);
                -webkit-transform: scale(1.05);
                -o-transform: scale(1.05);
                transform: scale(1.05);
            }
            .buy-box img{
                margin-left: auto;
                margin-right: auto;
                display: block;
                padding: 17px;
            }
        </style>
        <div class="inside_scrollable_container">
            <div class="center">
				<?php if (settings('sanalpay_status')):?>
                    <a href="<?= shop_url('buy-sanalpay') ?>" style="margin: 5px;">
                        <div class="buy-box">
                            <img src="<?= shop_public_url('/images/sanalpay.png')?>" title="sanalpay">
                        </div>
                    </a>
				<?php endif;?>
				<?php if (settings('paywant_status')):?>
                <a href="<?= shop_url('buy-paywant') ?>" style="margin: 5px;">
                    <div class="buy-box">
                        <img src="<?= shop_public_url('/images/paywant.png') ?>" title="teckcard">
                    </div>
                </a>
				<?php endif;?>
				<?php if (settings('max_epin_status')):?>
                <a href="<?= shop_url('buy-maxepin') ?>" style="margin: 5px;">
                    <div class="buy-box">
                        <img src="<?= shop_public_url('/images/maxepin.png') ?>" title="maxepin">
                    </div>
                </a>
				<?php endif;?>
				<?php if (settings('itemci_status')):?>
                    <a id="itemci" href="<?=settings('itemci_link')?>" target="_blank" style="margin: 5px;">
                        <div class="buy-box">
                            <img src="<?= shop_public_url('/images/itemci.png') ?>" title="itemci">
                        </div>
                    </a>
				<?php endif;?>
				<?php if (settings('gameshop_status')):?>
                    <a id="itemci" href="<?=settings('gameshopping_link')?>" target="_blank" style="margin: 5px;">
                        <div class="buy-box">
                            <img src="<?= shop_public_url('/images/oyunalisveris_logo.png') ?>" title="oyunalisveris">
                        </div>
                    </a>
				<?php endif;?>
				<?php if (settings('itemsultan_status')):?>
                    <a id="itemci" href="<?=settings('itemsultan_link')?>" target="_blank" style="margin: 5px;">
                        <div class="buy-box">
                            <img src="<?= shop_public_url('/images/itemsultan.png') ?>" title="itemsultan">
                        </div>
                    </a>
				<?php endif;?>
            </div>
            <table class="ep-list table table-hover" style="background:#eade9e repeat scroll 0 0/cover;width:33%;display: block;float: right;">
                <tbody>
                <?php if(settings('shop_happyhourstatus')):?>
                    <tr style="background: white;">
                        <th colspan="2">
                            <small style="display:block; text-align:center;color: red">
                                Mutlu Saatler Etkinliği kapsamında alacağınız ejderha parasına ek %<?=settings('shop_happyhour')?> ejderha parası hediye
                            </small>
                        </th>
                    </tr>
                <?php endif;?>
                <tr style="background: white;">
                    <th style="width: 50%;">
                        <center>TUTAR</center>
                    </th>
                    <th>
                        <center>EJDERHA PARASI</center>
                    </th>
                </tr>
				<?php foreach ($epprice['ep_price'] as $val): ?>
                    <tr>
                        <td>
                            <center><?= $val['tl_miktar'] ?> TL</center>
                        </td>
                        <td>
                            <center>
                                <?= $val['ep_miktar'] ?>
								<?php if(settings('shop_happyhourstatus')):?>
                                +
                                <?=ceil(intval($val['ep_miktar']) * intval(settings('shop_happyhour')) / 100);?>
								<?php endif;?>
                                EP
                            </center>
                        </td>
                    </tr>
				<?php endforeach; ?>
                <tr style="background: white;">
                    <th colspan="2">
                        <small style="display:block; text-align:center;">
                            Ödeme yöntemine göre fiyat ya da EP miktarı değişebilmektedir.
                        </small>
                    </th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require shop_view('static/footer')?>

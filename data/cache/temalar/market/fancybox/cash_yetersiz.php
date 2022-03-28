<div id="notEnoughCash" class="contrast-box sys-message">
    <div class="dark-grey-box clearfix">
        <div class="clearfix">
            <div class="item-showcase   span2">
                <div id="image" class="picture_wrapper ">
                    <img class="item-thumb" src="<?php echo base_url($esya['resim']);?> width="98" height="98" alt="">
                </div>
            </div>
            <div class="money-showcase  span5 ">
                <h2>Ejderha Parası yetersiz mi?</h2>
                <div class="currency_status_box" style="float: left; margin-right: 5%;">
                    <p>Şu anki hesap durumum:</p>
                    <ul class="currency_status clearfix">
                        <li>
                            <span>
                                <img class="ttip" tooltip-content="Ejderha Parası" src="<?php echo base_url('temalar/market/assets/images/coins.png');?>" width="16" height="16" alt="Ejderha Parası">
                                <span class="end-price" data-currency="<?php echo $cash;?>"><?php echo $cash;?></span>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="currency_status_box">
                    <p>Gerekli ejderha parası miktarı:</p>
                    <ul class="currency_status clearfix">
                        <li>
                            <span>
                                <img class="ttip" tooltip-content="Ejderha Parası" src="<?php echo base_url('temalar/market/assets/images/coins.png');?>" width="16" height="16" alt="Ejderha Parası">
                                <span class="end-price" data-currency="<?php echo $gerekliCash;?>"><?php echo $gerekliCash;?></span>
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
                        location.href = ("<?php echo base_url('market/ep_al');?>");
                    }
                </script>
                <button class="btn-price premium" href="javascript:void(0)" onclick="openPaymentLink()">
                    <span class="premium-name">EP SATIN AL</span>
                </button>
            </div>
        </div>
    </div>
</div>
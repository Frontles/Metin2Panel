<div id="notEnoughCash" class="contrast-box sys-message">
        <div class="dark-grey-box clearfix">
        <div class="clearfix">
            <div class="item-showcase   span2">
                <div id="image" class="picture_wrapper ">
                    <img class="item-thumb" src="<?php echo base_url($esya['resim']);?>" width="98" height="98" alt="">
                </div>
            </div>
            <div class="money-showcase  span5 ">
                <h2><i class="fa fa-check"></i><?php echo $esya['isim'];?></h2>
                <div class="currency_status_box" style="float: left; margin-right: 5%;">
                    <p>Şu anki hesap durumum:</p>
                    <ul class="currency_status clearfix">
                        <li>
                            <span>
                                <img class="ttip" tooltip-content="Ejderha Parası" src="<?php echo base_url('temalar/market/assets/images/coins.png');?>" width="16" height="16" alt="Ejderha Parası">
                                <span class="end-price" data-currency="<?php echo $cash;?>"><?php echo $cash;?></span>
                            </span>
                        </li>
                        <li>
                            <span>
                                <img class="ttip" tooltip-content="Ejderha Parası" src="<?php echo base_url('temalar/market/assets/images/em_coins.png');?>" width="16" height="16" alt="Ejderha Parası">
                                <span class="end-price" data-currency="<?php echo $cash_em;?>"><?php echo $cash_em;?></span>
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
        <script>
        $(document).ready(function () {
            $('#balances1').text("<?php echo $cash;?>");
            $('#balances2').text("<?php echo $cash_em;?>");
        });
    </script>
</div>
<link rel="stylesheet" href="https://super.paywant.com/tema/remodal/jquery.remodal.css?v=1">
<script type="text/javascript" src="https://super.paywant.com/tema/remodal/jquery.remodal.js"></script>
	<link rel="stylesheet" href="/temalar/market/assets/css/iziModal.min.css">
	<script src="/temalar/market/assets/js/iziModal.min.js" type="text/javascript"></script>


                <div class="content clearfix" id="wt_refpoint">
                    <div id="landing" class="scrollable_container">
						<div class="row-fluid">
							<!-- MASTER PAGE -->
							<div class="ep_yukle"><br>
	<h3>Ödeme Yöntemi Seçiniz</h3><br>Size uygun olan ödeme yöntemini seçerek EP yükleyebilirsiniz. Web sitemiz üzerinden bu işlemi yapmanızı tavsiye ederiz.<br><br>
	<!-- <a href="index.php?to_page=pay_tr" class="yontem_btn" style="filter: hue-rotate(92145deg) !important;">PAYTR [Tüm Kartlar/Masrafsız]</a> -->

    <?php if($payrill != false):?>
	<a href="#" data-izimodal-open="#modal" data-izimodal-transitionin="fadeInDown" class="yontem_btn" style="filter: hue-rotate(166deg) !important;">PAYRİLL [Tüm Ödeme İşlemleri]</a>	
    <?php endif;?>
    <?php if($itemtr != false):?>
	   <a href="<?php echo $itemtr;?>" class="yontem_btn" target="_blank" style="filter: hue-rotate(166deg) !important;">İTEMTR [Tüm Ödeme İşlemleri]</a>	
    <?php endif;?>    
    <?php if($paywant != false):?>
       <a href="<?php echo $paywant;?>"target="_blank" class="yontem_btn" style="filter: hue-rotate(1815deg) !important;">PAYWANT</a>
    <?php endif;?>    
	
	<?php if($this->config->item('itemci_durum') == true):?>
	<a href="<?php echo $this->config->item('itemci_link');?>"target="_new" class="yontem_btn" style="filter: hue-rotate(1815deg) !important;">İTEMCİ [Kupon Kodu]</a>
	<?php endif;?> 
    <?php if($this->config->item('oyunalisveris_durum') == true):?>
	<a href="<?php echo $this->config->item('oyunalisveris_link');?>" target="_new" class="yontem_btn" style="filter: hue-rotate(1815deg) !important;">OyunAlışveriş [Kupon Kodu]</a>
    <?php endif;?>    
	<!-- <a href="#"target="_new" class="yontem_btn" style="filter: hue-rotate(195deg) !important;">OYUNALIŞVERİŞ [Faturalı Hat]</a> -->
	<a href="<?php echo base_url('market/kupon_kullan');?>" class="yontem_btn">KUPON KODUNU GİR</a>
</div>

<center>
	<!--<a <button type="submit" class="yontem_btn2 fancybox fancybox.ajax" href="pages/coins_price.php">Ejderha Parası Fiyatları</button></a>-->
</center>
    <script type="text/javascript">

        // click on currency dropdown
        $('a[data-selected-currency]').click(function (ev) {
            ev.preventDefault();

            var currency = $(this).data('selectedCurrency');
            if ('' !== currency) {
                // user has clicked on "currency anzeigen und merken"

                // hide or show "In der gemerkten Währung gibt es keine Artikel" text
                $('#category h2.js_currency').hide();
                $('#category h2[data-currency=' + currency + ']').show();

                // hide all articles
                $('#category li.js_currency').hide().removeClass('shown');
                // show articles of selected currency
                $('#category li[data-currency*="' + currency + '"]').show().addClass('shown');

                // hide all quickbuy buttons
                $('#category li.js_currency > div > div > div.price_desc').hide().removeClass('currency-show');
                // show quickbuy button of selected currency, remove "Artikel gibt es nicht in der gewünschten Währung" title
                $('#category li.js_currency > div > div > div.price_desc[data-currency=' + currency + ']').show().addClass('currency-show').find('a').removeAttr('title');

                // hide all banderoles
                $('#category li.js_currency > p.item-status').hide().removeClass('currency-show');
                // show banderole of selected currency
                $('#category li.js_currency > p.item-status[data-currency=' + currency + ']').show().addClass('currency-show');

                // change image and text of "Sie haben folgende Währung gewählt: "
                /*
                 $('p.selected-currency img').attr('src', zs.data.currencies[currency]['image']);
                 $('p.selected-currency img').attr('alt', zs.data.currencies[currency]['loca']);
                 $('p.selected-currency img').attr('title', zs.data.currencies[currency]['loca']);
                 $('p.selected-currency span').text(zs.data.currencies[currency]['loca']);
                 */

                /*
                 // update currecy icons on header
                 $('#header .currency_status li.selected-currency')
                 .removeClass('selected-currency')
                 .attr('data-toggle', 'popover');
                 $('#header .currency_status li[data-currency=' + currency + ']')
                 .addClass('selected-currency')
                 .attr('data-toggle', '');
                 */

            } else {
                // user has clicked on "alle Währungen anzeigen"

                // hide "In der gemerkten Währung gibt es keine Artikel" text
                $('h2.js_currency').hide();

                // show all articles
                $('li.js_currency').show().addClass('shown');

                // remove all "Artikel gibt es nicht in der gewünschten Währung" titles
                $('li.js_currency > div > div > div.price_desc > a').removeAttr('title');
                // hide all quickbuy buttons
                $('li.js_currency > div > div > div.price_desc').hide();

                // hide all banderoles
                $('li.js_currency > p.item-status').hide();

                // show the last selected currency banderole and quickbuy button if it exists,
                // the default currency banderole and quickbuy button otherwise
                $('li.js_currency').each(function (i, li) {
                    if ($(li).find('div.price_desc.currency-show').size() > 0) {
                        $(li).find('.currency-show').show();
                    }
                    else {
                        $(li).find('.js_currency_default').show();
                        $(li).find('div.price_desc.js_currency_default > a').attr('title', "Bu eşya seçilen birimde mevcut değil.");
                    }
                });
            }

            // recalculate article card margins
            cardMargin();

            // replace dropdown text with selected text
            $('#currencydropdown span:first').html($(this).html());

            // recalculate amount of shown vs. total article count
            // for breadcrumb
            var breadcrumbtext = zs.data.categoryArticleCount.total;
            var shownarticles = $('#category .card li.span4.shown').size();
            if (shownarticles != breadcrumbtext) {
                breadcrumbtext = '(' + shownarticles + '/' + breadcrumbtext + ')';
            } else {
                breadcrumbtext = '(' + breadcrumbtext + ')';
            }
            $('ul.breadcrumb li:last .item_count').text(breadcrumbtext);

            // and for every subcategory
            var subcategorytext = 0;
            $(zs.data.subcategoryIds).each(function (i, id) {
                subcategorytext = zs.data.categoryArticleCount[id];
                shownarticles = $('#ul_sub_' + id + ' li.span4.shown').size();
                if (shownarticles != subcategorytext) {
                    subcategorytext = '(' + shownarticles + '/' + subcategorytext + ')';
                }
                else {
                    subcategorytext = '(' + subcategorytext + ')';
                }
                $('#h3_sub_' + id + ' .item_count').text(subcategorytext);
            });
        });


        $('.article-limit-counter').each(function () {
            var elem = $(this),
                seconds = elem.data('seconds');

            elem.countdown({
                until: seconds,
                format: 'dHMS',
                compact: true,
                onExpiry: function () {
                    window.location.href = window.location.href;
                }
            });
        });

        // load the article images
        window.onload = function () {
            var images = document.querySelectorAll('img.lazy-loading[lazy-src]');

            if (images && images.length > 0) {
                for (var i = 0, len = images.length; i < len; i = i + 1) {
                    var img = images[i];
                    img.setAttribute('src', img.getAttribute('lazy-src'));

                    // debug lazy loaded images
                    //img.style.border = '2px solid #FF0A5B';
                }
            }
        };

    </script>
								<script>
                                    $("#modal").iziModal({
                                        iframe: true,
                                        iframeHeight: 500,
                                        width: 800,
                                        iframeURL: '<?php echo $payrill;?>',
                                        title: 'Payrill Sanal Mağaza',
                                        headerColor: '#88A0B9',
                                        openFullscreen: true,

                                    });
                                    $(document).on('click', '#trigger', function (event) {
                                        event.preventDefault();
                                        // $('#modal').iziModal('setZindex', 99999);
                                        // $('#modal').iziModal('open', { zindex: 99999 });
                                        $('#modal').iziModal('open');
                                    });
								</script>
</div>

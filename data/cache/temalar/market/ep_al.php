<link rel="stylesheet" href="/temalar/market/assets/css/extra.css">
	<link rel="stylesheet" href="/temalar/market/assets/css/iziModal.min.css">
	<script src="/temalar/market/assets/js/iziModal.min.js" type="text/javascript"></script>
<div class="content">
    <div class="row">
            <div class="col-xs-7">
    <div id="category">
        <h2>
            <ul class="breadcrumb">
                <li>
                    <a title="Ödeme Seçenekleri">Ödeme Seçenekleri</a>
                    <span class="item_count"></span>
                </li>
            </ul></div>
			<?php if($this->config->item('payrill_odeme') == true):?>
            	<a href="payrill"  class="buy-box-parent">
                <div class="buy-box">
                        <img class="logo" src="/temalar/market/assets/images/payrill.png" width="200">
					</div>
			<?php endif;?> 
			<?php if($this->config->item('itemtr_odeme') == true):?>
            	<a href="itemtr"  class="buy-box-parent">
                <div class="buy-box">
                        <img class="logo4" src="/temalar/market/assets/images/itemtr.png" width="200">
					</div>
			<?php endif;?> 
			<?php if($this->config->item('paywant_durum') == true):?>
            	<a href="paywant"  class="buy-box-parent">
                <div class="buy-box">
                        <img class="logo2" src="/temalar/market/assets/images/paywant.png" width="50">
					</div>
			<?php endif;?> 
			<?php if($this->config->item('itemci_durum') == true):?>
            	<a href="<?php echo $this->config->item('itemci_link');?>"  class="buy-box-parent">
                <div class="buy-box">
                        <img class="logo2" src="/temalar/market/assets/images/itemci.png" width="50">
					</div>
			<?php endif;?> 
			<?php if($this->config->item('oyunalisveris_durum') == true):?>
            	<a href="<?php echo $this->config->item('oyunalisveris_link');?>"  class="buy-box-parent">
                <div class="buy-box">
                        <img class="logo3" src="/temalar/market/assets/images/oyunalisveris.png" width="50">
					</div> <?php endif;?> 
					
					<a href="kupon_kullan" class="yontem_btn2">Kupon Bozdur</a>
                </a>
        	</div>	
			
        <div class="col-xs-4">
         	<table class="ep-list table table-hover" style="font-size:12px;">
            	<tr>
				
                  	<th>TUTAR</th>
                    <th>EJDERHA PARASI</th>
                </tr>
				<?php if($fiyatlar = $this->model->getir_fiyatlar(16)) foreach ($fiyatlar as $key => $fiyat):?>
				<td><?php echo $fiyat->fiyat;?> TL</td>
				<td><?php echo $fiyat->miktar;?> EP</td>
				</tr>
			<?php endforeach;?>		
	
                <tr>  
                	<th colspan="2">
                        <small style="display:block; text-align:center;">
                            Ödeme şekline göre fiyat değişebilmektedir. 
                        </small>
                    </th>
                </tr>
            </table>
        </div>
    </div>
</div>
<center>
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

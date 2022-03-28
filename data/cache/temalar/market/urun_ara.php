
<div class="content clearfix" id="wt_refpoint">

    <div id="category">
        <h2>
            <ul class="breadcrumb">
                <li>
                    <a href="javascript:void(0);" title="En gözdeler">Arama Sonuçları (<?php echo count($esyalar);?>)</a>
                    <span class="item_count"></span>
                </li>
            </ul>

            <!-- BEGIN FORM ARTICLES SORT -->
            <div class="drop-sort-by">
                <form method="post" id="formArticlesSort" action="#">
                    <label> Sırala:</label>
                    <div id="searchDropdown" class="dropdown">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="buttonText">İlgiye göre</span>
                            <span class="btn-default"><span class="caret"></span></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">
                                <i class="icon-loop3"></i>Sırala
                            </li>
                            <li>
                                <a class="sort-option" href="javascript:void(0);" data-value="standardArticleSort">İlgiye göre </a>
                            </li>
                            <li>
                                <a class="sort-option" href="javascript:void(0);" data-value="upNameArticleSort">İsim (artan) </a>
                            </li>
                            <li>
                                <a class="sort-option" href="javascript:void(0);" data-value="downNameArticleSort">İsim (azalan) </a>
                            </li>
                            <li>
                                <a class="sort-option" href="javascript:void(0);" data-value="upPriceArticleSort">Fiyat (artan) </a>
                            </li>
                            <li>
                                <a class="sort-option" href="javascript:void(0);" data-value="downPriceArticleSort">Fiyat (azalan) </a>
                            </li>
                        </ul>
                    </div>
                    <input type="hidden" name="selectComboName" id="selectComboName_hidden" value="standardArticleSort">
                    <input type="hidden" name="filterOption" id="filterOptionHidden" value="">
                </form>

                <script type="text/javascript">
                    $(document).ready(function () {
                        var sortValue = 'standardArticleSort';
                        $('#searchDropdown').find('.dropdown-menu a.sort-option[data-value=' + sortValue + ']').addClass('active');
                        $('#searchDropdown .dropdown-toggle').dropdown();
                        $('#searchDropdown').find('.dropdown-menu').find('a.sort-option').click(function () {
                            sortArticlesBy($(this).data('value'));
                            $('li.list-item.last-in-line').each(function () {
                                $(this).removeClass('last-in-line');
                            });
                            cardMargin();
                            var anchor = $(this);
                            anchor.parents('#searchDropdown').find('.active').each(function () {
                                $(this).removeClass('active');
                            });
                            anchor.addClass('active');
                            anchor.parents('#searchDropdown').find('.buttonText').text($.trim(anchor.text()));
                        });
                        $('#searchDropdown').find('.dropdown-menu').find('a.filter-option').click(function () {
                            var value = $(this).data('value');
                            var elem = $('#filterOptionHidden');
                            elem.val(value);
                            $(this).closest('form').trigger('submit');
                            setTimeout(function () {
                                window.location.href = window.location.href;
                            }, 500);
                        });
                        $('#searchDropdown').find('.dropdown-menu').find('a.filter-option').each(function () {
                            if ($('#filterOptionHidden').val() == $(this).data('value')) {
                                $(this).find('i').removeClass('icon-radio-unchecked').addClass('icon-radio-checked');
                            }
                        });
                        setSortDropdownText();
                    });
                    function setSortDropdownText() {
                        var selectedValue = $('#selectComboName_hidden').val();
                        $('#searchDropdown').find('.dropdown-menu').find('a.sort-option').each(function () {
                            var val = $(this).data('value');
                            if (!val) {
                                return;
                            }
                            if (val === selectedValue) {
                                var dropdownText = $.trim($(this).text());
                                $('#searchDropdown').find('button.dropdown-toggle').find('.buttonText').text(dropdownText);
                            }
                        });
                    }
                </script>
            </div>
        </h2>
        <!-- tabbable -->
        <div class="tabbable tabs-left">
            <ul id="subnavi" class="nav nav-tabs">
                <?php foreach ($menu as $key => $row):?>
                    <li class="has-subnavi" >
                        <a href="<?php echo base_url('market/urunler/'.$row->KID);?>" class="btn-catitem btn-catitem">
                            <img width="32" height="32" src="<?php echo $row->ikon;?>" class="icon">
                            <br><?php echo $row->isim;?>
                        </a>
                        <?php if($altMenuler = $this->db->where('UKID', $row->KID)->get('kategoriler')->result()):?>
                            <ul class="dropdown-menu ">
                                <?php foreach ($altMenuler as $row2):?>
                                    <li class="has-subnavi">
                                        <a href="<?php echo base_url('market/urunler/'.$row2->KID);?>" class="btn-catitem btn-catitem-active" ><?php echo $row2->isim;?></a>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                    </li>
                <?php endforeach;?>
            </ul>
            <div class="tab-content">
                <div class="scrollable_container row-fluid">
                   <ul class="item-list card clearfix">
                    <?php if($esyalar) foreach ($esyalar as $key => $row): ?>
                        <?php
                            $cokluSatis = 0;

                            if($row['adet_1'] > 0) $cokluSatis++;
                            if($row['adet_2'] > 0) $cokluSatis++;
                            if($row['adet_3'] > 0) $cokluSatis++;
                            if($row['adet_4'] > 0) $cokluSatis++;
                            if($row['adet_5'] > 0) $cokluSatis++;
                            $cokluSatis = 0;
                            // $row['cash'] = ($row['discount_status'] == 1 && $row['discount_1'] > 0) ? floor($row['cash'] - ($row['cash'] * $row['discount_1'] / 100)) : $row['cash']; 
                            // $itemToken = md5($aId.$row['item_id'].$row['vnum'].$tokenKey);
                        ?>
                        <li class="list-item shown js_currency quickbuy" data-sort-price="<?php echo $row['cash'];?>" data-sort-name="<?php echo $row['isim'];?>">
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
                                                        <img class="item-thumb-63" src="<?php echo base_url($row['resim']);?>" alt="<?php echo $row['isim'];?>">
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
                                        <div class="action-box left">
                                            <?php if ($cokluSatis > 1):?>
                                                <div class="zs-dropdown">
                                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                                        <span class="dropdown-selection"><?=$row['count_1']*$row['cash']?></span>
                                                        <span class="btn-default"><span class="caret"></span></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <?php for ($i=0;$i<$cokluSatis;$i++):?>
                                                            <li onclick="changePrice2(<?php echo $row['EID'];?>,<?=$i+1?>);">
                                                                <a class="dropdown-option" data-count="<?=$row['adet_'.($i+1)]*$row['cash'];?>" data-text="<?=$row['adet_'.($i+1)]*$row['cash'];?>">
                                                                    <span><?=$row['adet_'.($i+1)]*$row['cash'];?></span>
                                                                    <?php if ($row['indirim_'.($i+1)] > 0):?>
                                                                        <span class="extra-info">%<?=$row['indirim_'.($i+1)]?> İndirim</span>
                                                                    <?php endif;?>
                                                                </a>
                                                            </li>
                                                        <?php endfor;?>
                                                    </ul>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                        <div class="action-box right">
                                            <button class="span5 right btn-price">
                                        <span class="block-price">
                                            <img class="ttip" tooltip-content="Ejderha Parası" src="<?php echo base_url('temalar/market/assets/images/coins.png');?>" alt="Ejderha Parası"/>
                                            <span id="item_price_<?php echo $row['EID'];?>" class="end-price" data-value="<?php echo $row['cash'];?>"><?php echo $row['cash'];?></span>
                                        </span>
                                            </button>
                                            <button class="span5 right btn-buy fancybox fancybox.ajax" href="<?php echo base_url('market/urun/'.$row['EID']);?>">Satın al</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach;?>
                </ul>
      
                <br class="clearfloat">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changePrice2(item_id,num) {
        var url = "";
        var data = {item_id:item_id,num:num};
        $.post(url,data,function (rsp) {
            console.log(rsp);
            if (rsp.status === true)
            {
                $("#item_price_" + item_id).text(rsp.price);
                $("#item_price_" + item_id).attr("data-value",rsp.price);
            }
        },"json");
    }
</script>
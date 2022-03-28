<?php
    $menus = product_view(get('id'))['menus'];
    $items = product_view(get('id'))['items'];
    $menu = product_view(get('id'))['menu'][0];
    $count = count($items);
    $tokenKey = settings('tokenkey');

    $menuId = get('id');
    $getMenuWho = $db->prepare("SELECT who,alone FROM shop_menu WHERE id = :id");
    $getMenuWho->execute(array(':id'=>$menuId));
    $getMenuWho->setFetchMode(PDO::FETCH_ASSOC);
    $getMenuWhos = $getMenuWho->fetch();
    if($getMenuWhos['alone'] == 0){
        $getMenuId = get('id');
    }else{
        $getMenuId = $getMenuWhos['who'];
    }
require shop_view('static/header');
    ?>

<div class="content clearfix" id="wt_refpoint">
    <div id="category">
        <h2>
            <ul class="breadcrumb">
                <li>
                    <a href="#" title="<?=$menu['name']?>"><?=$menu['name']?></a>
                    <span class="item_count">(<?=$count?>)</span>
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

        <div class="tabbable tabs-left">
            <ul id="subnavi" class="nav nav-tabs">
				<?php foreach ($menus as $key=>$val):?>
					<?php $token = md5($aId.$pId.$val['id']) ?>
					<?php  ?>
                    <li class="has-subnavi" >
                        <a class="btn-catitem btn-catitem<?php if($getMenuId == $val['who']){echo '-active';}?>" href="<?php if($val['alone'] == 0){echo shop_url('product-views?id='.$val['id']);} else{echo shop_url('product-view?id='.$val['id']);} ?>">
							<?php if ($val['icon_type'] == 1):?>
                                <img width="32" height="32" src="<?=$val['icon']?>" class="icon">
							<?php elseif ($val['icon_type'] == 0):?>
                                <i class="fa fa-<?=$val['icon']?>"></i>
							<?php endif;?>
                            <br><?=$val['name']?>
                        </a>
						<?php
						$id = $val['id'];
						$getSubMenu = $db->prepare("SELECT * FROM shop_menu WHERE mainmenu = :mainmenu");
						$getSubMenu->execute(array('mainmenu' => $id));
						$getSubMenu->setFetchMode(PDO::FETCH_ASSOC);
						$subMenu = $getSubMenu->fetchAll();
						?>
						<?php if ($getSubMenu->rowCount() > 0):?>
                            <ul class="dropdown-menu ">
								<?php foreach ($subMenu as $keys=>$vals):?>
                                    <li class="has-subnavi">
                                        <a class="btn-subcatitem" href="<?=shop_url('product-view?id='.$vals['id'])?>"><?=$vals['name'];?></a>
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
						<?php foreach ($items as $key=>$val):?>
                        <?php $itemToken = md5($aId.$val['item_id'].$val['vnum'].$tokenKey);?>
						<?php $val['coins'] = ($val['discount_status'] == 1 && $val['discount_1'] > 0) ? floor($val['coins'] - ($val['coins'] * $val['discount_1'] / 100)) : $val['coins']; ?>
                            <li class="list-item shown js_currency quickbuy" data-sort-price="<?=$val['coins']?>" data-sort-name="<?=$val['item_name']?>">
                            <div class="contrast-box  item-box inner-content clearfix">
                                <div class="desc row-fluid">
                                    <div class="item-description">
                                        <p class="item-status js_currency_default">
											<?php if ($val['item_time'] == 1):?>
                                                <i class="zicon-hd-time-ingame ttip" tooltip-content="<?=$functions->secondsToDay($val['socket0'])?>"></i>
											<?php endif;?>
											<?php if ($val['discount_status'] == 1):?>
                                                <i class="zicon-hd-discount ttip" tooltip-content="Miktar İndirimi"></i>
											<?php endif;?>
                                        </p>
                                        <h4 class="fancybox fancybox.ajax" href="<?= shop_url('product-ajax?id='.$val['item_id'].'&token='.$itemToken)?>">
                                            <a class="card-heading" title="<?=$val['item_name']?>">
                                                <?=$val['item_name']?>
                                            </a>
                                        </h4>
                                        <div class="item-shortdesc clearfix">
                                            <a class="item-thumb fancybox fancybox.ajax" href="<?=shop_url('product-ajax?id='.$val['item_id'].'&token='.$itemToken)?>">
                                                <div class="item-thumb-container">
                                                    <div id="image" class="picture_wrapper_2">
                                                        <img class="item-thumb-63" src="<?= URL . '/' .$val['item_image']?>" alt="<?=$val['item_name']?>" onerror="this.src='<?=URL.'/data/items/60001.png'?>'">

                                                    </div>
                                                </div>
                                            </a>
                                            <span class="category-link"></span>
                                            <div class="fancybox fancybox.ajax" href="<?=shop_url('product-ajax?id='.$val['item_id'].'&token='.$itemToken)?>">
                                                <p class="item-box-description">
													<?=$val['description']?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Buttons -->
                                    <div class="item-footer price_desc row-fluid js_currency_default">
                                        <div class="action-box left">
											<?php if ($val['multi_count'] > 1):?>
                                                <div class="zs-dropdown">
                                                    <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                                        <span class="dropdown-selection"><?=$val['count_1']*$val['unit_price']?></span>
                                                        <span class="btn-default"><span class="caret"></span></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
														<?php for ($i=0;$i<$val['multi_count'];$i++):?>
                                                            <li onclick="changePrice2(<?=$val['id']?>,<?=$i+1?>);">
                                                                <a class="dropdown-option" data-count="<?=$val['count_'.($i+1)]*$val['unit_price'];?>" data-text="<?=$val['count_'.($i+1)]*$val['unit_price'];?>">
                                                                    <span><?=$val['count_'.($i+1)]*$val['unit_price'];?></span>
																	<?php if ($val['discount_'.($i+1)] > 0):?>
                                                                        <span class="extra-info">%<?=$val['discount_'.($i+1)]?> İndirim</span>
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
                                                    <img class="ttip" tooltip-content="Ejderha Parası" src="<?=shop_public_url('/images/coins.png')?>" alt="Ejderha Parası"/>
                                                    <span id="item_price_<?=$val['id']?>" class="end-price" data-value="<?=$val['coins']?>"><?=$val['coins']?></span>
                                                </span>
                                            </button>
                                            <button class="span5 right btn-buy fancybox fancybox.ajax" href="<?=shop_url('product-ajax?id='.$val['item_id'].'&token='.$itemToken)?>">Satın al</button>
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
        var url = "<?=shop_url('product-price_change')?>";
        var data = {item_id:item_id,num:num};
        $.post(url,data,function (rsp) {
            if (rsp.status === true)
            {
                $("#item_price_" + item_id).text(rsp.price);
                $("#item_price_" + item_id).attr("data-value",rsp.price);
            }
        },"json");
    }
</script>

<?php  require shop_view('static/footer');
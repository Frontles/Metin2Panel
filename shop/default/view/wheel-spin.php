<?php
require shop_view('static/header');
$wheelspin = wheel_spin(get('token'));
$wheelCoins = settings('settings_wheel_coins');
$randNum = $wheelspin['random'];
$hashh = new Hash();
function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
session_set('gift_key',generateRandomString());
$giftInfo = $wheelspin['gift_info'];

$createToken = $hashh->create('md5',session_get('user_id').$giftInfo['id'].$giftInfo['vnum'],$_SESSION['gift_key']);
$giftLink = shop_url('wheel-gift?id='.$giftInfo['id'].'&token='.$createToken);
?>
<script>
    function buyFancyBox() {
        var videourl = '<?=$giftLink?>';
        $.fancybox.open({
            tpl: {closeBtn: '<button title="Kapat" class="fancybox-item fancybox-close btn-default" href="javascript:;"></button>'},
            href: videourl,
            type: 'ajax',
            autoDimensions: false,
            width: 340,
            height: "auto",
            overlayOpacity: 0.6,
            showCloseButton: true,
            enableEscapeButton: false,
            hideOnOverlayClick: false,
            hideOnContentClick: false,
            padding: 10,
            beforeShow: function () {
                initRoyalSlider(".carousell-reward", zs.module.small ? 0.52 : 0.46)
            }
        });
    }
</script>
<script type="text/javascript">var dir = zs.data.dir || {};</script>
<link rel="stylesheet" id="gameStyle" href="<?= shop_public_url('css/wheel.min.css') ?>" type="text/css"/>
<script type="text/javascript" src="<?= shop_public_url('js/wheel-2.js') ?>"></script>
<div class="content clearfix" id="wt_refpoint">
    <div class="mg-breadcrumb-container row-fluid">
        <h2>
            <ul class="breadcrumb">
                <li>Çark</li>
            </ul>
        </h2>
        <a class="wheel-help minigames-help ttip" href="javascript:void(0)"><i class="icon-book"></i>Yardım ve bilgi</a>
    </div>
    <div id="wheel-game" class=" wheel lvl-1">
        <div id="wheel-container" class="span8">
            <div id="wheel" class="_wl-sprite clockwise">
                <!-- Keys Rendering -->
                <div class="wheel-keys">
                    <i id="key-3" class="key icon-key-wheel _wl-sprite"><i class="before"></i></i>
                    <i id="key-7" class="key icon-key-wheel _wl-sprite"><i class="before"></i></i>
                    <i id="key-11" class="key icon-key-wheel _wl-sprite"><i class="before"></i></i>
                    <i id="key-15" class="key icon-key-wheel _wl-sprite"><i class="before"></i></i>
                </div>
                <!-- Keys Rendering -->
                <div class="wheel-ring _wl-sprite"></div>
                <!-- Before Play  -->
                <div id="spinner-pointer" style="background-position: -872px 0px;">
                    <div id="wheel-spinner" style="background-position: 0px 0px;">
                        <div class="wheel-btn">
                            <a id="spinButton" class="play">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td><span class="pulse2"> Dönüyor... </span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="wheel-items" style="top: 50px;">
                    <script>
                        spin(1, <?=$randNum?>, 10000);
                    </script>
                    <?php foreach ($wheelspin['items'] as $key => $val):?>
                        <div id="pos<?=$key+1?>" class="reward wheel-item-<?=$key+1?>">
                            <img src="<?=  URL . '/' .  $val['item_image']  ?>" onerror="this.src='<?=URL.'/data/items/60001.png'?>'" >
                        </div>
                    <?php endforeach;?>
                </div>
                <a href="<?=shop_url('wheel-index')?>">
                    <div id="again-play-btn" class="again-play-btn" style="display:none;">Geri Dön</div>
                </a>
                <div id="again-play-bg" class="again-play-bg" style="display:none;"></div>
            </div>
        </div>
        <div id="wheel-info" class="span2 small">
            <p>Çark şuanda dönüyor. Pencereyi kapattığınız dönme işlemi sonlanır ve herhangi bir ödül kazanmazsınız !</p>
        </div>
        <div id="fancybox-help" class="fancyboxContentContainer">
            <div id="wheel-help" class="contrast-box">
                <h2><i class="icon-info"></i>&nbsp;Yardım ve bilgi</h2>
                <div class="grey-box ">
                    <h3>Çark nedir?</h3>
                    <p>Kader Çarkı, çarkıfelek gibi işlev görür: Bir kere çevirmek için genelde belirli bir miktar Ejder Parası ödenir (kazanılan Ejderha Markası otomatik olarak hesabına geçirilir). Çarkın ortasındaki "Şimdi çevir" yazılı butona bir kere tıkladığında görüntülenen miktar hesabından çekilir. Mekanizma bu şekilde harekete geçer. Dış alanlarda şimdi kazanabileceğin ödüller görüntülenir ve şansın kadere bırakılır. Çarkın durduğu yerdeki eşya da senin ödülün olur.</p>
                    <h3>Bu kattan çıkılsın mı?</h3>
                    <p>"Bu kattan çıkılsın mı?" butonunu tıklayarak doğrudan 1.kata ışınlanırsın. Ama bir sonraki kata giden kapı kapanır ve tekrar açabilmen için tüm anahtarları yeniden toplaman gerekir.</p>
                </div>
            </div>
        </div>>
    </div>
</div>

<?php  require shop_view('static/footer');
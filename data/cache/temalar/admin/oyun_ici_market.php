<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Oyun İçi Market Ayarları</span>
							</div>
						</div>
					</div>
                                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                            <strong>Uyarı</strong> cmd_general.cpp dosyanız içerisinde buluna GF9001 varsayılan kodunuzu değiştirmeniz önerilmektedir. Market sistemini aktif etmek için /usr/game/channel dosyalarınız içerisindeki CONFİG dosyalarını açarak MALL_URL: kısmını aşağıdaki gibi doldurunuz.<br>
											<b>MALL_URL: <?php $sozler = array('http://', 'https://');
$metin = base_url('ishop');;
$metin = str_replace($sozler, '', $metin);
echo $metin; ?>
                                            </button>
                                        </div>
					<form action="" method="post" class="ajax-form-json">
						<?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

						<div class="form-group">
							<?php echo form_label('Market KEY<small class="text-danger float-right">'.form_error('shop_key').'</small>', 'shop_key', ['style'=>'width: 100%;']);?>
							<?php echo form_input('shop_key', html_entity_decode(htmlspecialchars_decode(@$this->config->item('shop_key'),ENT_QUOTES),ENT_QUOTES,'UTF-8'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
						</div>						
						 
						<button class="btn btn-primary" type="submit">Kaydet</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
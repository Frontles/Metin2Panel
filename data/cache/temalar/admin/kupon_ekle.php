<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="main-content-inner">
	<div class="row">
		<div class="col-12 mt-5">
			<div class="card">
				<div class="card-body">
					<div class="invoice-head">
						<div class="row">
							<div class="iv-left col-12">
								<span>Haber Oluştur</span>
							</div>
						</div>
					</div>
					<form action="" method="post" class="ajax-form-json">
                        <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>

                        <div class="form-group">
                            <?php echo form_label('Oluşturulacak Adet<small class="text-danger float-right">'.form_error('adet').'</small>', 'adet', ['style'=>'width: 100%;']);?>
                            <?php echo form_input('adet', set_value('adet'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
                        </div>

                        <div class="form-group">
                            <?php echo form_label('Adet Başı Kredi Miktarı<small class="text-danger float-right">'.form_error('kredi').'</small>', 'kredi', ['style'=>'width: 100%;']);?>
                            <?php echo form_input('kredi', set_value('kredi'), ['class'=>'form-control', 'autocomplete'=>'off'])?>
                        </div>

                        <button class="btn btn-primary" type="submit">Oluştur</button>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
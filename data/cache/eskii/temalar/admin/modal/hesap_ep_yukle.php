<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title"><?php echo (isset($title)?$title:str_ireplace('www.', '', parse_url(base_url(), PHP_URL_HOST)));?></h4>
			<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">×</span>
				<span class="sr-only">close</span>
			</button>
		</div>
		<div class="modal-body">
			<form action="<?php echo current_url();?>" method="post" class="ajax-form-json">
				
				<div class="form-group">
					<?php echo form_label('Hesaba Yüklenecek Ep Miktarı<small class="text-danger float-right">'.form_error('cash').'</small>', 'cash', ['style'=>'width: 100%;']);?>
					<?php echo form_input('cash', null, ['class'=>'form-control'])?>
				</div>
				<button class="btn btn-primary" type="submit">Kaydet</button>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">$( document ).ready( readyFn );</script>
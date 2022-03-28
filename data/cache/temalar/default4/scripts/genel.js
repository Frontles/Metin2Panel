(function ($) {


	$(".ajax-form-json").submit(function(e){
		e.preventDefault();

		/* Yeri Önemli Değiştirme */
		if( typeof(CKEDITOR) !== "undefined"){
			var instance;
			for (instance in CKEDITOR.instances) {
				CKEDITOR.instances[instance].updateElement();
			}
		}

		var formData = new FormData($(this)[0]);
		var $form    = $(this);

		/* Tıklanan Buttonun değeri formdata'ya eklenir */
		var $submitActors = $form.find('[type=submit]:focus');

		if($submitActors.attr('name') != undefined && $submitActors.val()){
			formData.append($submitActors.attr('name'),$submitActors.val());
		}

		$.ajax({
			dataType : "json",
			type : "POST",
			url : $form.attr('action'),
			data : formData,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(jqXHR, options) {
				$form.find('label > small').html("");

				var btn = $form.find(':submit');
				var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i>';
				if (btn.html() !== loadingText) {
					btn.data('original-text', btn.html());
					btn.attr("disabled", true).html(loadingText);
				}
			},
			success:function(data, textStatus, jqXHR) {
				if(data.noty){
					noty({text: data.noty, type: 'success', timeout: 10000, layout: 'topRight', theme: 'relax', killer:true});
				}

				if(data.redirect){
					setTimeout(function() {
						window.location.href = data.redirect;
					}, 2000);
				}

				if(data.modal_close){
					$(data.modal_close).modal('hide');
				}

				if(data.dt_reload){
					setTimeout(function() {
						$(data.dt_reload).dataTable().api().ajax.reload(null, false);
					}, 500);
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				if(jqXHR.status == 403){
					noty({text: 'Oturum sonlandırıldı. Lütfen sayfayı yenileyin.', type: 'error', timeout: 10000, layout: 'topRight', theme: 'relax', killer:true});
				}else if(jqXHR.responseJSON == undefined){
					noty({text: jqXHR.responseText, type: 'error', timeout: 10000, layout: 'topRight', theme: 'relax', killer:true});
				}else{
					if(jqXHR.responseJSON.errors !== undefined){
						var focusElement = false;
						$.each(jqXHR.responseJSON.errors, function(key, value) {
							$form.find('label[for="'+key+'"] > small').html(value).show('slow');

							if(focusElement === false && value !== ""){
								focusElement = true;
								if($('label[for="'+key+'"]').length){
									$('html, body').animate({scrollTop: $('label[for="'+key+'"]').offset().top - 15}, 500);
								}
							}
						});
					}

	});

})(jQuery);
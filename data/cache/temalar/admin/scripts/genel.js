function readyFn( jQuery ) {
	$(document).ready(function(){ 
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
			$submitActors = $form.find('[type=submit]:focus');
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
						var audio = new Audio('/temalar/admin/scripts/sound/success.wav');
						audio.play();
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
						var audio = new Audio('/temalar/admin/scripts/sound/error.wav');
						audio.play();
					}else{
						if(jqXHR.responseJSON.errors !== undefined)
						{
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

						if(jqXHR.responseJSON.error !== undefined)
                        {
                            noty({text: jqXHR.responseJSON.error, type: 'error', timeout: 10000, layout: 'topRight', theme: 'relax', killer:true});
                        }else if(jqXHR.responseJSON.warning !== undefined){
                            noty({text: jqXHR.responseJSON.warning, type: 'warning', timeout: 10000, layout: 'topRight', theme: 'relax', killer:true});
						var audio = new Audio('/temalar/admin/scripts/sound/error.wav');
						audio.play();
                        }
					}
				},
				complete:function(jqXHR, textStatus){
					setTimeout(function() {
						$form.find(':submit').attr("disabled", false).html($form.find(':submit').data('original-text'));
					}, 500);
				},
			});
		});
	});
}

$(document).ready(readyFn);

$(document).ready(function(){ 
	if($('.data-table-ajax').length){

		var searching = ($('.data-table-ajax').attr('search') == 'true') ? true : false;
		var buttons   = ($('.data-table-ajax').attr('buttons') == 'true') ? true : false;

		var table = $('.data-table-ajax').DataTable({
			dom:
			"<'row'<'col-sm-4'l><'col-sm-8 text-right'Bf>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>",
			lengthChange: true,
			fixedHeader: {
				header: true
			},
			processing: true,
			serverSide: true,
			autoWidth: false,
			iDisplayLength: 10,
			responsive: {
				details: {
					type: 'column'
				}
			},
			lengthMenu: [
				[10, 20, 30, 40, 50],
				[10, 20, 30, 40, 50]
			],
			ajax: {
				url: $('.data-table-ajax').attr('url'),
				type: "POST",
				data: function( data ) {
					var ajaxParams = {};
					var filter     = false;

					$('textarea.form-filter, select.form-filter, input.form-filter:not([type="radio"],[type="checkbox"])', $('#table-filter')).each(function() {
						ajaxParams[$(this).attr("name")] = $(this).val();
					});

					$.each(ajaxParams, function(key, value) {
						data[key] = value;
						if (value != "" && value != null ){ filter=true; }
					});

					if(filter) {
						$("#filter-clean").show();
					}else{
						$("#filter-clean").hide();
					}
				},
				error: function(jqXHR, textStatus, errorThrown){
					noty({text: jqXHR.responseText, type: 'error', timeout: 10000, layout: 'topRight', theme: 'relax', killer:true});
				},
				complete: function(response){
					if(typeof response.responseJSON.tabData != "undefined"){
						$.each(response.responseJSON.tabData, function(key, value) {
							$("#" + key).text(value);
						});
					}

					/* Tooltip */
					if (!$().tooltip) {
						console.log('tooltip: tooltip plugin is missing.');
						return true;
					}
					var $tooltip = $('[data-toggle="tooltip"]');
					if ($tooltip.length > 0) {
						$('[data-toggle="tooltip"]').tooltip();
					}

					/* Tooltip */
					if (!$().popover) {
						console.log('popover: popover plugin is missing.');
						return true;
					}
					var $popover = $('[data-toggle="popover"]');
					if ($popover.length > 0) {
						$('[data-toggle="popover"]').popover();
					}
				}
			},
			searching:searching,
			order: [],
			pagingType: "full",
			orderCellsTop: true,
			columnDefs: [
				{"targets": 'no-sort', "orderable": false},
				{"targets": 'text-center', "className": 'text-center'}
			],
			buttons: {
				buttons: [
					{
						text: '<i class="fa fa-search"></i> Filtrele',
						title: $('h1').text(),
						exportOptions: {columns: ':not(.no-print)'}, 
						footer: true,
						action: function ( e, dt, node, config ) {
							$("#table-filter").modal('show');
						}
					},
					{text: '<i class="fa fa-refresh"></i> Yenile', action: function ( e, dt, node, config ) { table.ajax.reload(null, false); }}
				],
				dom: {
					container: {
						className: 'dt-buttons'
					},
					button: {
						className: 'btn btn-primary btn-xs'
					}
				}
			},
			language: {
				sDecimal:        ",",
				sEmptyTable:     "Tabloda herhangi bir veri mevcut değil",
				sInfo:           "_TOTAL_ kayıttan _START_ - _END_ arası gösteriliyor",
				sInfoEmpty:      "- Kayıt yok -",
				sInfoFiltered:   "<br>(_MAX_ kayıt arasında)",
				sInfoPostFix:    "",
				sInfoThousands:  ".",
				sLengthMenu:     "_MENU_ kayıt",
				sLoadingRecords: "Yükleniyor...",
				sProcessing:     "<div class='loader'></div>",
				sSearch:         "",
				searchPlaceholder:"Ara...",
				sZeroRecords:    "Eşleşen kayıt bulunamadı",
				oPaginate: {
					sFirst:    "<i class='fa fa-angle-double-left'></i>",
					sLast:     "<i class='fa fa-angle-double-right'></i>",
					sNext:     "<i class='fa fa-angle-right'></i>",
					sPrevious: "<i class='fa fa-angle-left'></i>"
				},
				oAria: {
					sSortAscending:  ": artan sütun sıralamasını aktifleştir",
					sSortDescending: ": azalan sütun soralamasını aktifleştir"
				}
			}
		});

		$( ".filter-submit" ).click(function(e){
			e.preventDefault();
			table.draw();
			$('.modal').modal('hide');
		});

		$( ".filter-cancel" ).click(function(e){
			e.preventDefault();
			filter_clear();
			table.ajax.reload();
			$('.modal').modal('hide');
		});

		$(document).on('click', '[data-status]', function(e) {
			e.preventDefault();
			filter_clear();
			$('input[name="ara[status]"]:hidden').val($(this).data('status'));
			table.draw();
		});

		function filter_clear(){
			$('textarea.form-filter, select.form-filter, input.form-filter', $('#table-filter')).each(function() {
				$(this).val("");
			});
			$('#table-filter').find("select").trigger("change");
		}
	}

	if($('.data-table').length){
		var table = $('.data-table').DataTable({
			dom:
			"<'row'<'col-sm-4'l><'col-sm-8 text-right'Bf>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>",
			responsive: true,
			processing: true,
			autoWidth: false,
			iDisplayLength: 10,
			lengthMenu: [
				[10, 25, 50, 100, 250, 500],
				[10, 25, 50, 100, 250, 500]
			],
			initComplete: function( settings, json ) {
				$("#example_paginate").appendTo($("#example tfoot td"));
				$("#example_length").appendTo($("#example tfoot td"));
			},
			columnDefs: [
				{targets: 'no-sort', orderable: false},
				{targets: 'text-center', className:'text-center'}
			],
			searching:true,
			order: [],
			orderCellsTop: true,
			pagingType: "full",
			language: {
				sDecimal:        ",",
				sEmptyTable:     "Tabloda herhangi bir veri mevcut değil",
				sInfo:           "_TOTAL_ kayıttan _START_ - _END_ arası gösteriliyor",
				sInfoEmpty:      "- Kayıt yok -",
				sInfoFiltered:   "<br>(_MAX_ kayıt arasında)",
				sInfoPostFix:    "",
				sInfoThousands:  ".",
				sLengthMenu:     "_MENU_ kayıt",
				sLoadingRecords: "Yükleniyor...",
				sProcessing:     "<div class='loader'><i class='fa fa-spinner fa-spin'></i></div>",
				sSearch:         "",
				searchPlaceholder: "Ara..",
				sZeroRecords:    "Eşleşen kayıt bulunamadı",
				oPaginate: {
					sFirst:    "<i class='fa fa-angle-double-left'></i>",
					sLast:     "<i class='fa fa-angle-double-right'></i>",
					sNext:     "<i class='fa fa-angle-right'></i>",
					sPrevious: "<i class='fa fa-angle-left'></i>"
				},
				oAria: {
					sSortAscending:  ": artan sütun sıralamasını aktifleştir",
					sSortDescending: ": azalan sütun soralamasını aktifleştir"
				}
			}
		});
	}
});

$(document).on('click', "[data-toggle='ajax-confirm']", function(e) {
    e.preventDefault();
    var href = $(this).attr("href");
    var text = $(this).data("text");
    var redirect = $(this).data("redirect");

    if (confirm((text) ? text : 'Emin misiniz?')) {
        $.ajax({
        	// dataType : "json",
            type: 'GET',
            url: href,
            success:function(data, textStatus, jqXHR) {
				if(data.noty){
					noty({text: data.noty, type: 'success', timeout: 10000, layout: 'topRight', theme: 'relax', killer:true});
				}
			},
            error: function(jqXHR, textStatus, errorThrown){
				noty({text: jqXHR.responseText, type: 'error', timeout: 10000, layout: 'topRight', theme: 'relax', killer:true});
			},
			complete: function(jqXHR, textStatus){
				console.log(jqXHR.responseJSON.redirect);
				if(jqXHR.responseJSON.redirect){
					setTimeout(function() {
						window.location.href = jqXHR.responseJSON.redirect;
					}, 1000);
				}else if(redirect){
					setTimeout(function() {
						window.location.href = redirect;
					}, 1000);
				}

				if(jqXHR.responseJSON.modal_close){
					$(jqXHR.responseJSON.modal_close).modal('hide');
				}

				if(jqXHR.responseJSON.dt_reload){
					setTimeout(function() {
						$(jqXHR.responseJSON.dt_reload).dataTable().api().ajax.reload(null, false);
					}, 500);
				}

                if(jqXHR.responseJSON.reset){
                    $(jqXHR.responseJSON.reset)[0].reset();
                }
			}
        });
    } else {
      
    }
});

//----------------------------------------------------/
// Profile Image Preview
//----------------------------------------------------/

$("input[name='logo']:file").on('change',function(e){
	e.preventDefault();

	var file = this.files[0];
	var name = file.name;
	var size = file.size;
	var type = file.type;

	if(file.name.length < 1) {
		$.toast({text: 'Dosya Bulunamadı.', position: 'top-right', loaderBg: '#bf441d', icon: 'error', hideAfter: 3000, stack: 1});
		noty({text: 'Dosya Bulunamadı.', type: 'error', timeout: 10000, layout: 'topRight', theme: 'relax', killer:true});
		$(":file").filestyle('clear');
	} else if(file.size > 2097152){
		noty({text: 'Dosya boyutu en fazla 1mb olmalıdır.', type: 'error', timeout: 10000, layout: 'topRight', theme: 'relax', killer:true});
		$(":file").filestyle('clear');
	} else if(file.type != 'image/jpeg' && file.type != 'image/png' && file.type != 'image/x-png') {
		noty({text: 'Sadece JPG, JPEG ve PNG dosya uzantıları desteklenmektedir.', type: 'error', timeout: 10000, layout: 'topRight', theme: 'relax', killer:true});
		$(":file").filestyle('clear');
	} else {
		
		
		if (file) {
			var img    = document.createElement("img");
			var reader = new FileReader();

			reader.onload = function(e) {
				img.src    = e.target.result;
				var canvas = document.createElement("canvas");
				var ctx    = canvas.getContext("2d");
				ctx.drawImage(img, 0, 0);

				img.onload = function() {
					var width      = img.naturalWidth  || img.width;
					var height     = img.naturalHeight || img.height;
					var MAX_WIDTH  = 240;
					var MAX_HEIGHT = 45;

					if(width > MAX_WIDTH){
						ratio = MAX_WIDTH / width;
						height = height * ratio;
						width = width * ratio;
					}

					// Check if current height is larger than max
					if(height > MAX_HEIGHT){
						ratio = MAX_HEIGHT / height; // get ratio for scaling image
						width = width * ratio;    // Reset width to match scaled image
						height = height * ratio;    // Reset height to match scaled image
					}

					/*
					if (width > height) {
						if (width > MAX_WIDTH) {
							height *= MAX_WIDTH / width;
							width = MAX_WIDTH;
						}
					} else {
						if (height > MAX_HEIGHT) {
							width *= MAX_HEIGHT / height;
							height = MAX_HEIGHT;
						}
					}
					*/
					
					canvas.width = width;
					canvas.height = height;
					var ctx = canvas.getContext("2d");
					ctx.drawImage(img, 0, 0, width, height);

					dataurl = canvas.toDataURL(file.type);
					
					document.getElementById('img-preview').src = dataurl;
				}
			}
			reader.readAsDataURL(file);
		}

	}
});


//----------------------------------------------------/
// Mail Taslak CK
//----------------------------------------------------/

if($('.mail-taslak-ck').length){
	$('.mail-taslak-ck').ckeditor({
		skin: 'bootstrapck',
		toolbar: '*',
		extraPlugins: 'autogrow,wordcount,notification,justify,panelbutton,colorbutton,widget,lineutils,button,font,colordialog,youtube',
		height: 350,
		allowedContent: true,
		disableNativeSpellChecker: false,
		extraAllowedContent : '*',
		filebrowserBrowseUrl: '/temalar/admin/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
		filebrowserUploadUrl: '/temalar/admin/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
		filebrowserImageBrowseUrl: '/temalar/admin/plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
	});
}

//----------------------------------------------------/
// Ajax Modal - Mail Preview
//----------------------------------------------------/

$(document).on('click', ".mail-onizleme", function(ev){
	ev.preventDefault();

	$('[data-toggle="tooltip"]').tooltip("hide");

	$( "body" ).append( '<div id="preloader"><div class="loader"></div></div>' );

	var modal = $('#ajax-modal').load($(this).data("href"), {
		'tema'   : $('select[name="tema"]').val(),
		'konu'   : $('input[name="konu"]').val(),
		'sablon' : $('textarea[name="sablon"]').val(),
	}, function(e, status, xhr){
		if(status == "error"){
			$('#preloader').fadeOut('slow', function() { $(this).remove(); });
			noty({text: xhr.responseText, type: 'error', timeout: 10000, layout: 'topRight', theme: 'relax', killer:true});
		}else{
			$('#preloader').fadeOut('slow', function() { $(this).remove(); });
			setTimeout(function(){ 
				$('#ajax-modal').modal("show"); 
			}, 1000);
		}
	}).on('shown.bs.modal', function(e) {

		
	}).on('hidden.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});
});

//----------------------------------------------------/
// Ajax Modal
//----------------------------------------------------/

$(document).on('click', ".ajax-modal", function(ev){
	ev.preventDefault();

	$('[data-toggle="tooltip"]').tooltip("hide");

	$( "body" ).append( '<div id="preloader"><div class="loader"></div></div>' );

	var modal = $('#ajax-modal').load($(this).data("href"), function(e, status, xhr){
		if(status == "error"){
			$('#preloader').fadeOut('slow', function() { $(this).remove(); });
			noty({text: xhr.responseText, type: 'error', timeout: 10000, layout: 'topRight', theme: 'relax', killer:true});
		}else{
			$('#preloader').fadeOut('slow', function() { $(this).remove(); });
			setTimeout(function(){ 
				$('#ajax-modal').modal("show"); 
			}, 1000);
		}
	}).on('shown.bs.modal', function(e) {

		
	}).on('hidden.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});
});

if($('#mail-onizleme-frame-2').length){
	iFrameResize({
		log:true,
		interval:64
	}, "#mail-onizleme-frame-2");
}
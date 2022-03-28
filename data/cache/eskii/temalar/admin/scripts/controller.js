$(document).on('click', "#ep-yuklu-hesaplar", function(ev){
	ev.preventDefault();
	
	$('textarea.form-filter, select.form-filter, input.form-filter', $('#table-filter')).each(function() {
		$(this).val("");
	});

	$('input[name="ep-yuklu"]:hidden').val('ok');
	$(".data-table-ajax").dataTable().api().ajax.reload();
});

$(document).on('click', "#banli-hesaplar", function(ev){
	ev.preventDefault();

	$('textarea.form-filter, select.form-filter, input.form-filter', $('#table-filter')).each(function() {
		$(this).val("");
	});
	
	$('input[name="banli"]:hidden').val('ok');
	$(".data-table-ajax").dataTable().api().ajax.reload();
});
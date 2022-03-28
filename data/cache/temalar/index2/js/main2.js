$(document).ready(function(){
	$(function () {
		$('[data-toggle="tooltip"]').tooltip({
			container: 'body',
			html: true,
		})
	});
	$('#aramaKutusu').on('keyup',function(){
		var kelime = $(this).val();
		var url = $(this).data('url');
		if (kelime.length>3) {
			$.ajax({
				type: 'post',
				url: url+'/inc/arama.php',
				data: {go:"kelime",kelime},
				success: function(bilgi){
					$('#aramaSonuc').html(bilgi.sonuc);
					$('#aramaSonuc').fadeIn();
				},
				dataType: 'json'
			});
		}else {
			$('#aramaSonuc').fadeOut();
		}
	});
});


$(document).ready(function() { 
  var id = '#dialog';
  var maskHeight = $(document).height();
  var maskWidth = $(window).width();
  $('#mask').css({'width':maskWidth,'height':maskHeight}); 
  $('#mask').fadeIn(500); 
  $('#mask').fadeTo("slow",0.9); 
        var winH = $(window).height();
  var winW = $(window).width();
        $(id).css('top',  winH/2-$(id).height()/2);
  $(id).css('left', winW/2-$(id).width()/2);
     $(id).fadeIn(2000);  
     $('.window .close').click(function (e) {
  e.preventDefault();
  $('#mask').hide();
  $('.window').hide();
     });  
     $('#mask').click(function () {
  $(this).hide();
  $('.window').hide();
 });  
 
});
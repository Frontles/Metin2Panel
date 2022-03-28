/////////////////////////Char/////////////////////////////////
	 $(document).ready(function(){
		$('.char').click(function () {
			$(this).toggleClass('small');
			});
		});
/////////////////////////carouselbrn/////////////////////////////////	
	    var width = 173; 
	    var count = 3; 

	    var carouselbrn = document.getElementById('carouselbrn');
	    var list = carouselbrn.querySelector('ul');
	    var listElems = carouselbrn.querySelectorAll('li');

	    var position = 0;

	    carouselbrn.querySelector('.bprev').onclick = function() {
	      position = Math.min(position + width * count, 0)
	      list.style.marginLeft = position + 'px';
	    };

	    carouselbrn.querySelector('.anext').onclick = function() {
	      position = Math.max(position - width * count, -width * (listElems.length - count));
	      list.style.marginLeft = position + 'px';
	    };	
/////////////////////////To Top Button/////////////////////////////////	 	
		$(function() {
			$(window).scroll(function() {
				if($(this).scrollTop() != 0) {
				$('#toTop').fadeIn();
				} else {
				$('#toTop').fadeOut();
			}
			});
				$('#toTop').click(function() {
				$('body,html').animate({scrollTop:0},800);
			});
		});

/////////////////////////aslider/////////////////////////////////			
  	$(document).ready(function() { 
						   
	var cslides = $(".aslider .cslides").children(".fslide"); 
	var width = $(".aslider .cslides").width(); 
	var i = cslides.length; 
	var offset = i * width; 
	var cheki = i-1;
	
	$(".aslider .cslides").css('width',offset); 
	
	for (j=0; j < cslides.length; j++) {
		if (j==0) {
			$(".aslider .knavigation").append("<div class='dotc sactive'></div>");
		}
		else {
			$(".aslider .knavigation").append("<div class='dotc'></div>");
		}
	}
	
	var dotcs = $(".aslider .knavigation").children(".dotc");
	offset = 0;
	i = 0; 
	
	$('.aslider .knavigation .dotc').click(function(){
		$(".aslider .knavigation .sactive").removeClass("sactive");								  
		$(this).addClass("sactive");
		i = $(this).index();
		offset = i * width;

		$('.fslide').removeClass('sactive');
		var index=offset/width+1;
		$('.aslider .fslide:nth-child('+(index)+')').addClass('sactive');
		
		$(".aslider .cslides").css("transform","translate3d(-"+offset+"px, 0px, 0px)"); 
	});
	
	
	
	$("body .aslider .anext").click(function(){	
		if (offset < width * cheki) {	
			offset += width; 

			$('.fslide').removeClass('sactive');
			var index=offset/width+1;
			$('.aslider .fslide:nth-child('+(index)+')').addClass('sactive');
		
			$(".aslider .cslides").css("transform","translate3d(-"+offset+"px, 0px, 0px)"); 
			$(".aslider .knavigation .sactive").removeClass("sactive");	
			$(dotcs[++i]).addClass("sactive");
		}
	});


	$("body .aslider .bprev").click(function(){	
		if (offset > 0) { 
			offset -= width;

			$('.fslide').removeClass('sactive');
			var index=offset/width+1;
			$('.aslider .fslide:nth-child('+(index)+')').addClass('sactive');
		
			$(".aslider .cslides").css("transform","translate3d(-"+offset+"px, 0px, 0px)"); 
			$(".aslider .knavigation .sactive").removeClass("sactive");	
			$(dotcs[--i]).addClass("sactive");
		}
	});
	function autoSlide(){
		 if ($(".aslider .knavigation .sactive").index() < $(".aslider .cslides").children(".fslide").length-1) {
		  $("body .aslider .anext").click();
		 } else {
		  $('.aslider .knavigation .dotc:first-child').click();
		 }
		}
	setInterval(function(){ autoSlide(); }, 7000);
});
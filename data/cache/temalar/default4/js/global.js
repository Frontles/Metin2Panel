function webpost(){ 
	var veriler = $('#webpost').serialize();
	$.ajax({ 
		type: "POST", 
		url: "/inc/web.post.php", 
		data: veriler, 
		success:function(cevap){ 
			$("#sonuc").html(""+cevap);
		} 
	})
};

function webpost_login(){ 
	var veriler = $('#webpost_login').serialize(); 
	$.ajax({ 
	type: "POST", 
	url: "/inc/web.post.php", 
	data: veriler, 
	success:function(cevap){ 
		$("#sonuc_giris").html(""+cevap); 

	} 
})};

function webpost_quit(){ 
	var veriler = $('#webpost_quit').serialize(); 
	$.ajax({ 
	type: "POST", 
	url: "/inc/web.post.php", 
	data: veriler, 
	success:function(cevap){ 
		$("#sonuc_cikis").html(""+cevap); 

	} 
})};
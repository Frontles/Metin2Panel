
// Þifre Oluþturma Fonksiyonu
// 06.01.2017
function SifreOlustur(sl) {  
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";  
	var string_length = sl - 1;  
	var randomstring = '';  
	for (var i=0; i<string_length; i++) 		
	{  
		var rnum = Math.floor(Math.random() * chars.length);  
		randomstring += chars.substring(rnum,rnum+1);  
	}
	randomstring += Math.floor((Math.random() * 10) + 1);
	
	document.getElementById("sifre").value = randomstring; 
	document.getElementById("sifre2").value = randomstring;  
}  

// Karakter Silme Kodu Oluþturma Fonksiyonu
// 06.01.2017
function KodOlustur(sl) {  
	var chars = "0123456789";  
	var string_length = sl;  
	var randomstring = '';  
	for (var i=0; i<string_length; i++) 
	{  
		var rnum = Math.floor(Math.random() * chars.length);  
		randomstring += chars.substring(rnum,rnum+1);  
	}  
	
	document.getElementById("pin").value = randomstring; 
}  
// Karakter Silme Kodu Oluþturma Fonksiyonu
// 06.01.2017
function pinOlustur(sl) {  
	var chars = "0123456789";  
	var string_length = sl;  
	var randomstring = '';  
	for (var i=0; i<string_length; i++) 
	{  
		var rnum = Math.floor(Math.random() * chars.length);  
		randomstring += chars.substring(rnum,rnum+1);  
	}  
	
	document.getElementById("kod").value = randomstring; 
}  

// Þifre Göster / Gizle Fonksiyonu
// 06.01.2017
var sifredurum = 0;
function sifregoster()
{
	if(sifredurum == 0)
	{
		document.getElementById('sifre').type = 'text';
		document.getElementById('sifre2').type = 'text';
		document.getElementById('gosterbtn').className = 'glyphicon glyphicon-eye-close';
		sifredurum = 1;
	}
	else
	{
		document.getElementById('sifre').type = 'password';
		document.getElementById('sifre2').type = 'password';
		document.getElementById('gosterbtn').className = 'glyphicon glyphicon-eye-open';
		sifredurum = 0;
	}
}
// pin Göster / Gizle Fonksiyonu
// 06.01.2017
var pindurum = 0;
function pingoster()
{
	if(sifredurum == 0)
	{
		document.getElementById('pin').type = 'text';
		document.getElementById('gosterbtn').className = 'glyphicon glyphicon-eye-close';
		sifredurum = 1;
	}
	else
	{
		document.getElementById('pin').type = 'password';
		document.getElementById('sifre2').type = 'password';
		document.getElementById('gosterbtn').className = 'glyphicon glyphicon-eye-open';
		sifredurum = 0;
	}
}

// Uptime Sayacý
// 08.01.2017
var benimSayac = setInterval(UptimeSayac, 1000);
var SureBaslangic = document.getElementById("UptimeSure").innerHTML;
function UptimeSayac() {
	var Tarih = new Date();
	var SayacSurem = Math.floor(Tarih.getTime() / 1000) - SureBaslangic;
    var Mesaj = "";
	var Saat = Math.floor(SayacSurem / 3600);
	var Dakika = Math.floor((SayacSurem / 60) % 60);
	var Saniye = SayacSurem % 60; 
	
	if(Saat > 0)
		Mesaj += Saat + " saat ";
	if(Dakika > 0)
		Mesaj += Dakika + " dk. ";
	if(Saniye > 0)
		Mesaj += Saniye + " sn. ";
	
    document.getElementById("UptimeSayac").innerHTML = Mesaj;
}
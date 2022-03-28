<?php

function item_ad_cevir($veri, $ters=false){
	if($ters){
		$yeni = array('ý', 'þ', 'ð' , 'Ý' , 'Þ');
		$eski = array('ı', 'ş' , 'ğ' , 'I' , 'Ş');
		return str_replace($eski, $yeni, $veri);
	}else{
		$eski = array('ý', 'þ', 'ð' , 'Ý' , 'Þ');
		$yeni = array('ı', 'ş' , 'ğ' , 'I' , 'Ş');
		return str_replace($eski, $yeni, iconv("latin1", "UTF-8", $veri));
	}
}

function split_name($name) {

    $parts = array();
    // $name = mb_strtolower($name);
    while ( strlen( trim($name)) > 0 ) {
        $name = trim($name);
        
        $string = preg_replace('/.*\s([\w-]*)$/isu', '$1', $name);
        $parts[] = $string;
        $name = trim( preg_replace('/'.$string.'/isu', '', $name ) );
    }

    if (empty($parts)) {
        return false;
    }

    $parts = array_reverse($parts);
    $name = array();
    $name['first_name'] = $parts[0];
    $name['middle_name'] = (isset($parts[2])) ? $parts[1] : '';
    $name['last_name'] = (isset($parts[2])) ? $parts[2] : ( isset($parts[1]) ? $parts[1] : '');

    return mb_substr($name['first_name'], 0, 1, "UTF-8").mb_substr($name['last_name'], 0, 1, "UTF-8");
}

if(!function_exists('active')){
	function active($rotalar=array(), $cls = "active"){
		$CI  =& get_instance();
		$rol = NULL;
		$res = FALSE;
		if(!is_array($rotalar)) $rotalar = array($rotalar);
		foreach ($rotalar AS $key => $rota) {
			$rota_array = explode("/", $rota);
			foreach ($rota_array AS $key => $rot){
				$key++;
				if( $rot == "-" ){
					if(count($rota_array)-1 == count($CI->router->uri->rsegments)){
						$res = TRUE;
					}else { $res = FALSE; break; }
				}else{
					if($CI->router->uri->rsegments[$key] == $rot){
						$res =  TRUE;
					}else{ $res =  FALSE; break; }
				}
			}
			if($res==TRUE) break;
		}
		echo ($res==TRUE)?$cls:NULL;
	}
}

if(!function_exists('yuzde')){
	function yuzde($sayi, $yuzde_deger, $yuzdeOrani=100, $secenek=1){
		# Division by zero hatası için...
		$yuzdeOrani = ($yuzdeOrani <= 0) ? 1 : $yuzdeOrani;

		$yuzdemiz   = ( $sayi * $yuzde_deger ) / $yuzdeOrani;
		$fark       = $sayi - $yuzdemiz;
		$topla      = $sayi + $yuzdemiz;
		$carp       = $sayi * $yuzdemiz;

		# Yüzde hesaplar
		if($secenek == 1){
			return $yuzdemiz;
		}
		# Yüzde miktarını çıkarır
		elseif($secenek == 2){
			return $fark;
		}
		# Yüzde miktarını ekler
		elseif($secenek == 3){
			return $topla;
		}
		# Yüzde miktarını çarpar
		elseif($secenek == 4){
			return $carp;
		}
		# Yüzde miktarını böler.
		elseif($secenek == 5){
			$yuzdemiz = ($yuzdemiz <= 0) ? 1 : $yuzdemiz;
			$bol = $sayi / ($yuzdemiz);
			return $bol;
		}else{
			return $yuzdemiz;
		}
	}
}

if(!function_exists('noty')){
	function noty($text=NULL, $type="success", $timeout=5000, $layout="top"){    
		$CI    =& get_instance();
		$text  =  preg_replace('/[^A-Za-z0-9\/ıİüÜöÖğĞşŞçÇ@<>,?!#.-]/', ' ', strip_quotes($text));
		$noty  =  ("setTimeout(function() {noty({text: '$text', type: '$type', timeout: $timeout, layout: 'topRight', theme: 'relax', killer:true});}, 500);");
		$CI->session->set_flashdata('noty',$noty);
	}
}

if(!function_exists('noty_g')){
	function noty_g($text=NULL, $type="success", $timeout=10000, $layout="top"){
		$CI    =& get_instance();
		$text  =  preg_replace('/[^A-Za-z0-9\/ıİüÜöÖğĞşŞçÇ@<>,?!#.-]/', ' ', strip_quotes($text));
		$noty  =  ("setTimeout(function() {noty({text: '$text', type: '$type', timeout: $timeout, layout: 'topRight', theme: 'relax', killer:true});}, 500);");
		$GLOBALS['noty'] = $noty;
	}
}

if(!function_exists('noty_run')){
	function noty_run(){
		$CI   =& get_instance();
		$noty = ( isset($GLOBALS['noty']) ) ? $GLOBALS['noty'] : $CI->session->flashdata('noty');
		return $noty;
	}
}

if( ! function_exists('TR_strtoupper'))
{
	function TR_strtoupper($str)
	{
		$kucuk = array('ç', 'ğ', 'i', 'ı', 'ö', 'ş', 'ü');
		$buyuk = array('Ç', 'Ğ', 'İ', 'I', 'Ö', 'Ş', 'Ü');
		return mb_strtoupper(str_replace($kucuk, $buyuk, $str), "UTF-8");
	}
}

if( ! function_exists('TR_strtolower'))
{
	function TR_strtolower($str)
	{
		$kucuk = array('ç', 'ğ', 'i', 'ı', 'ö', 'ş', 'ü');
		$buyuk = array('Ç', 'Ğ', 'İ', 'I', 'Ö', 'Ş', 'Ü');
		return mb_strtolower(str_replace($buyuk, $kucuk, $str), "UTF-8");
	}
}

if( ! function_exists('TR_ucwords'))
{
	function TR_ucwords($str)
	{
		$lower_arr = array("I"=>"ı","i"=>"İ");
		$str = strtr($str,$lower_arr);
		$str = mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
		return $str;
	}
}
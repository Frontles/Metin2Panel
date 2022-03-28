<?php
if (settings('multi_languages'))
{
	$siteLang = isset($_SESSION['language']) ? $_SESSION['language'] : null;
	if ($siteLang === null)
		$_SESSION['language'] = settings('default_language');
	require_once "app/language/".$_SESSION['language'].".php";
}
else
	require_once "app/language/tr.php";
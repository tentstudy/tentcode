<?php
	require_once __DIR__ . '/../lib/curl.php';
	function checkLogin()
	{
		$token = '';
		if(!empty($_COOKIE['token'])){
			$token = $_COOKIE['token'];
		}
		$url = "https://graph.facebook.com/v2.3/me?access_token={$token}";
		$json = getJSON($url);

		if(empty($json->id) || empty($json->name)){
			return false;
		}
		return true;
	}
	$login = checkLogin();
?>
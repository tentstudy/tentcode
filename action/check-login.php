<?php
  session_start();
	require_once __DIR__ . '/../lib/curl.php';
	function checkLogin()
	{
    if (!empty($_SESSION['id'])) {
      return true;
    }
		if(empty($_COOKIE['token'])){
			return false;
		}

		$url = "https://graph.facebook.com/v2.3/me?access_token={$_COOKIE['token']}";
		$json = getJSON($url);

		if(empty($json->id) || empty($json->name)){
			return false;
		}
    $_SESSION['id'] = $json->id;
    $_SESSION['name'] = $json->name;
		return true;
	}
	$login = checkLogin();
?>

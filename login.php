<?php
	session_start();
	if(!empty($_GET['action'])){
		$_SESSION['action'] = 'save';
	}
	require_once __DIR__ . '/lib/curl.php';
	require_once __DIR__ . '/db/connect.php';
	define('client_id','111239596202717');
	define('client_secret','b1464b01303b3cb278fc6833d0e81450');
	define('redirect_uri', 'http://tentcode.dev/login.php');
	
	function login()
	{
		$permission = array(
			'public_profile',
			'user_friends',
			'email'
		);
		$scope = implode($permission, ',');
		$param = array(
			'client_id' => client_id,
			'redirect_uri' => redirect_uri,
			'scope' => $scope,
		);
		$url = 'https://www.facebook.com/dialog/oauth';
		header("Location: {$url}?".http_build_query($param));
	}
	function getTokenFromCode(){
		$param = array(
			'client_id'     => client_id,
			'redirect_uri'  => redirect_uri,
			'client_secret' => client_secret,
			'code'          => $_GET['code'],
		);
		$url  = 'https://graph.facebook.com/v2.3/oauth/access_token';
		$json = getJSON($url, $param);
		if(isset($json->error))
		{
			echo("<pre>" . json_encode($json, JSON_PRETTY_PRINT) . "</pre>");
			exit();
		}
		return $json->access_token;
	}
	function saveUser($token)
	{
		$url = "https://graph.facebook.com/v2.3/me?access_token={$token}";
		$json = getJSON($url);
		if(!empty($json->error)){
			echo('<pre>' . json_encode($json, JSON_PRETTY_PRINT) . '</pre>');
			exit();
		}
		echo('<pre>' . json_encode($json, JSON_PRETTY_PRINT) . '</pre>');
	
		$timeLive = 60*60*24*60; /*60 ngày*/
		setcookie('id',  $json->id, time() + $timeLive);
		setcookie('token', $token, time() + $timeLive);
		setcookie('name',  $json->name, time() + $timeLive);
		}

	if(!empty($_GET['code'])){
		$token = getTokenFromCode();
		saveUser($token);
	}

	if(!empty($_COOKIE['token'])){
		$token = $_COOKIE['token'];
	}

	if(empty($token)){ // nếu chưa đăng nhập thì đăng nhập
		return login();
	}
	
	/*set user 0 giả quyền cho nó*/
	if(!empty($_SESSION['tempId']) && !empty($_SESSION['action']) && $_SESSION['action'] == 'save'){
		$url  = "https://graph.facebook.com/v2.3/me?access_token={$_COOKIE['token']}";
		$json = getJSON($url);
		$id = $json->id;
		$idCode = $_SESSION['tempId'];
		$sql = "UPDATE code SET id_user='{$id}' WHERE id_code='{$idCode}'";
		$conn->query($sql);
		$conn->close();
		header("Location: ./{$idCode}");
		exit();
	}
	header('Location: ./');
	// echo "đăng nhập thành công <br> {$token}";
?>
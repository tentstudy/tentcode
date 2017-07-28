<?php
	session_start();
	if(!empty($_GET['action'])){
		$_SESSION['action'] = $_GET['action'];
	}
  if(!empty($_GET['prev'])){ //lưu lại trang phía trước để đăng nhập xong điều hướng lại đó
		$_SESSION['prev'] = $_GET['prev'];
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
	function saveUser($conn, $token, &$id)
	{
		$url = "https://graph.facebook.com/v2.3/me?access_token={$token}";
		$json = getJSON($url);
		if(!empty($json->error)){
			echo('<pre>' . json_encode($json, JSON_PRETTY_PRINT) . '</pre>');
			exit();
		}
		echo('<pre>' . json_encode($json, JSON_PRETTY_PRINT) . '</pre>');
	
		$timeLive = 60*60*24*60; /*60 ngày*/
    $_SESSION['id'] = $json->id;
    $_SESSION['name'] = $json->name;
		setcookie('token', $token, time() + $timeLive);
    $sql = "SELECT id FROM user where id_user = '{$id}'";
    $result = $conn->query($sql);
    if ($result->num_rows === 0) { //kiểm tra đã có ngườ dùng chưa
      $sql = "INSERT INTO user (id_user, name, token)
              VALUES ('{$_SESSION['id']}', '{$_SESSION['name']}', 'dont't save user token')";
      $conn->query($sql);
    } else { //có rồi thì cập lại tên
      $sql = "UPDATE user SET name = '{$_SESSION['name']}'";
      $conn->query($sql);
    }
	}

	if(!empty($_GET['code'])){
		$token = getTokenFromCode();
		saveUser($conn, $token, $id); //lấy id ra để lát sử dụng cập nhật quyền cho code
	}

	if(!empty($_COOKIE['token'])){
		$token = $_COOKIE['token'];
	}

	if(empty($token)){ // nếu chưa đăng nhập thì đăng nhập
		return login();
	}
  $conn->close();

  //cập nhật quyền cho code nếu người dùng chọn Đăng nhập để lưu
  if (!empty($_SESSION['tempId']) && !empty($_SESSION['action']) && $_SESSION['action'] == 'save'){
		// $url  = "https://graph.facebook.com/v2.3/me?access_token={$_COOKIE['token']}";
		// $json = getJSON($url);
		// $id = $json->id;
		$idCode = $_SESSION['tempId'];
    $_SESSION['tempId'] = '';
    unset($_SESSION['tempId']);
		$sql = "UPDATE code SET id_user='{$_SESSION['id']}' WHERE id_code='{$idCode}'";
    echo $sql;
		$conn->query($sql);
		$conn->close();
		header("Location: ./{$idCode}");
		exit();
	}
  //không có trang phía trước thì điều hướng về trang chủ
  $location = empty($_SESSION['prev']) ? '/' : $_SESSION['prev'];
  unset($_SESSION['prev']);
	header("Location: {$location}");
?>

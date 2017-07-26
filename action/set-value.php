<?php 
	function g($target)
	{
		global $s;
		if(!empty($s[$target])){
			echo $s[$target];	
		}
		
	}
	$s = array();
	/*default*/
	$s['btn-login'] = '<a href="login.php">Đăng nhập</a>';
	if($login){
		$id    = $_COOKIE['id'];
		$name  = $_COOKIE['name'];
		$token = $_COOKIE['token'];
		$s['btn-login'] = "<a href=\"https://fb.com/{$id}\">{$name}</a>";
	}
	if($idCode !== 'new-code'){
		$s['btn-download'] = "<button class=\"btn btn-default\"><span class=\"glyphicon glyphicon-download-alt\"></span> Download</button>";
		$s['code'] = file_get_contents("code-store/1905472106359672_Untitled.js");
	}
?>
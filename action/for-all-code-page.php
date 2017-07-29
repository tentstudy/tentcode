<?php
  $s['browser-title'] = 'All code - TentCode - TentStudy'; //title mặc định
	$s['btn-login']     = "<a href=\"login.php?prev={$_SERVER['REQUEST_URI']}\">Login with Facebook</a>";
	if($login){
		$id    = $_SESSION['id'];
		$name  = $_SESSION['name'];
		$s['btn-login'] = "<a href=\"https://fb.com/{$id}\">{$name}</a>";
	}
  $conn->close();

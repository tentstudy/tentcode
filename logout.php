<?php
  session_start();
  unset($_SESSION);
  session_destroy();
	$timeLife = 60 * 60 *24 * 60; // 60 ngày
	setcookie('token',  '', time() - 5184000);
	header('Location: /');
?>

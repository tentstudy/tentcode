<?php
	$timeLife = 60 * 60 *24 * 60; // 60 ngày
	setcookie('token',  '', time() - 5184000);
	header('Location: ./');
?>
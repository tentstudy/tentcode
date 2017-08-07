<?php
	session_start();
	if (isset($_POST['code'])) {
		$_SESSION['forked'] = $_POST['code'];
		die(json_encode(array('success' => true)));
	}
	echo json_encode(array('success' => false));
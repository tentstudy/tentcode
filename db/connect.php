<?php 
	require_once __DIR__ . '/configdb.php';
	$conn = new mysqli(host, username, password, database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
  $conn->set_charset("utf8");
?>
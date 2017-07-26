<?php 
	require_once __DIR__ . '/config.php';
	$conn = new mysqli(host, username, password, database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>
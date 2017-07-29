<?php 
	// $idCode = $_GET['idCode'];
	$file_url = '../code-store/1905472106359672_Untitled.js';
	$filename = basename($file_url);
	$contentType= mime_content_type($filename);
	header("Content-Type: {$contentType}");
	header("Content-Transfer-Encoding: Binary"); 
	header("Content-disposition: attachment; filename=\"" . $filename . "\""); 
	readfile($file_url); // do the double-download-dance (dirty but worky)
?>

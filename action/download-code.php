<?php
		$contentTypes=array(
		"txt" => "text/plain",
		"html"=> "text/html",
		"htm" => "text/html",
		"php" => "text/plain",

		"exe" => "application/octet-stream",
		"pdf" => "application/pdf",
		"csv" => "application/csv",
		"zip" => "application/zip",
		"doc" => "application/msword",
		"xls" => "application/vnd.ms-excel",
		"ppt" => "application/vnd.ms-powerpoint",

		"gif" => "image/gif",
		"png" => "image/png",
		"jpeg"=> "image/jpg",
		"jpg" => "image/jpg",
		
		"mp4" => "video/mp4",
		"3gp" => "video/3gp"
	);
	$id = $_GET['i'];
	$file = "../code-store/{$id}";
	$filename = $_GET['n'];
	// $ext = $_GET['e'];
	// $file = $_GET['url'];
	$format = explode('.', $filename);
	$format = array_pop($format);
	$contentType = array_key_exists($format, $contentTypes) ? $contentTypes[$format] : 'application/javascript';
	header("Content-Description: File Transfer"); 
	header("Content-Type: {$contentType}"); 
	header("Content-Disposition: attachment; filename='" . $filename . "'"); 
	readfile ($file);
	exit();
	/*http://tentcode.dev/action/download-code.php?i=rvXehrw4&n=test.js*/
?>
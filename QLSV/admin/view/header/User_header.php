<?php 
	if(!isset($_SESSION['userId'])){
		header('location: admin.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>index</title>
</head>
<body>
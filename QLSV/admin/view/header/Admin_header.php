<?php 
	session_start();
	if(isset($_SESSION['userId'])){
		header('location: admin.php?c=user&a=render');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	
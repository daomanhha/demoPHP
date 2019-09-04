<?php 
	if(!isset($_SESSION['userId'])){
		header('location: login.php');
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>detail</title>
 </head>
 <body>
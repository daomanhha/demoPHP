<?php 
	$userName = $_REQUEST["userName"];
	$password = $_REQUEST["password"];
	$thong_bao = ($userName == "ha21121998" && $password == "123456")?"đăng nhập thành công" : "không thành công";
	echo $thong_bao	;
?>
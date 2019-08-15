<meta charset="utf-8">
<?php 
	$conn = mysqli_connect('localhost','root','','demodktk');

	if(!$conn){
		echo 'kết nối db thất bại';
	}
	else mysqli_set_charset($conn,'utf8');

	
 ?>
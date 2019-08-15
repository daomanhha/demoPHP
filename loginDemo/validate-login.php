<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LoginForm</title>
</head>
<body>
	<?php 
	if(filter_var($_POST['username'], FILTER_VALIDATE_EMAIL) && $_POST['password'] !==''){
		$userName = $_POST['username'];
		$passWord = $_POST['password'];
		$data = explode("|", parse_ini_file('./data.ini')[$userName]);
		$name = $data[2];
		if($userName == $data[0] && $passWord == $data[1]){
			session_start();
			$_SESSION['username'] = $userName;
			$_SESSION['password'] = $passWord;
			$_SESSION['name'] = $name;
			$_SESSION['flag'] = true;

			echo $name . ' is login';
			echo '<a href = "./log-out.php"> log out</a>';


		}else{
			header('location: index.php');
		}
		

	}else{
		header('location: index.php');
	}

 ?>


</body>
</html>
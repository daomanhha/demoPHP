<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LoginForm</title>
</head>
<body>
	<?php 
		session_start();
		if(isset($_SESSION['flag']) && $_SESSION['flag'] == true){
			echo 'xin chao ' . $_SESSION['name'];
			echo '<a href = "./log-out.php"> log out</a>';
		}else {
			echo '<form method = "POST" action = "./validate-login.php" name = "login-form" >
					<input type = "text" name = "username" placeholder = "username">
					<input type = "password" name = "password" placeholder = "password">
					<input type = "submit" name = "" value = "Login">
				  </form>';
		}

	?>

</body>
</html>
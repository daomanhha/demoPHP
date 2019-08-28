<?php 
	session_start();
	if(isset($_SESSION['userId'])){
		header('location: index.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<?php
	//connect sql 
	$conn = mysqli_connect('localhost','root','','qlsv');
	if(!$conn){
		die('cannot connect sql');
	}else mysqli_set_charset($conn, 'utf8');
	
	if(isset($_POST['submit'])){
		$email = isset($_POST['email']) ? trim($_POST['email']) : '';
		$passWord = isset($_POST['password']) ? trim($_POST['password']) : '';
		$password = md5($passWord);
		$ERROR = array();
		//query du lieu
		$query = "SELECT * FROM admin WHERE email = '$email'";
		$result = mysqli_query($conn, $query) or die('ket noi that bai');
		if(mysqli_num_rows($result) > 0){
			$user = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$user_Id = $user['id'];
			$user_Email = $user['email'];
			$user_Password = trim($user['password']);
			if($password != $user_Password){
				$ERROR['pass'] = 'sai mat khau';
			}else{
				$_SESSION['userId'] = $user_Id;
				header('location: index.php');
			}
		}else if(mysqli_num_rows($result) == 0){
			$ERROR['tk'] = 'sai tai khoan';
		}
		//validate dn
		if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
			$ERROR['tk'] = 'moi nhap tai khoan';
		}
		if(empty($passWord)){
			$ERROR['pass'] = 'moi nhap mat khau';
		}
		
	}


 ?>
	<form action="" method="POST" style="
		display: flex; 
		flex-direction: column;" >
		<input type="text" name="email" placeholder="email" value="<?php if(isset($email)) echo $email ?>">
		<p><?php if(isset($ERROR) && isset($ERROR['tk'])) echo $ERROR['tk'] ?></p>
		<input type="password" name="password" placeholder="password">
		<p><?php if(isset($ERROR) && isset($ERROR['pass'])) echo $ERROR['pass'] ?></p>
		<input type="submit" name="submit" value="dang nhap" >
	</form>

</body>
</html>
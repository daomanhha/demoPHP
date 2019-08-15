<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<meta charset="utf-8">
</head>
<body>
	<?php 
		require_once('./connect.php');
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$error = array();
			$hoten = $_POST['hoten'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$repassword = $_POST['repassword'];
			if(empty($hoten)){
				$error[] = 'hoten';
			}
			if(empty($username)){
				$error[] = 'username';
			}
			if(empty($password)){
				$error[] = 'password';
			}
			if(empty($repassword)){
				$error[] = 'repassword';
			}
			if(empty($error)){
				if($password == $repassword ){
				$query = "INSERT INTO tk(hoten, username , password) VALUES ('$hoten' , '$username' , '$password')";
				$result = mysqli_query($conn , $query) or die ('lỗi');
				if(mysqli_affected_rows($conn) == 1){
					echo 'thành công';
				}else echo 'thất bại';
				}
				else echo 'repassword khong chinh xac';
			}
			else {
				echo "moi nhap lai";
			}
		}
		 ?>
	<form action="Create.php" method="post">
		<input type="text" name="hoten" placeholder="hoten" value = 
			<?php if(isset($_POST['hoten'])) echo $_POST['hoten']; ?>>
		 <?php 
		 	if (isset($error) && in_array('hoten', $error) ) {
			echo "mời nhập lại họ tên";
			}
		 ?>
		<input type="text" name="username" placeholder="email"  value = 
			<?php if(isset($_POST['username'])) echo $_POST['username']; ?> >
		<?php 
		 	if (isset($error) && in_array('username', $error) ) {
			echo "mời nhập lại email";
			}
		 ?>	
		<input type="text" name="password" placeholder="password"  value = 
			<?php if(isset($_POST['password'])) echo $_POST['password']; ?>>
		<?php 
		 	if (isset($error) && in_array('password', $error) ) {
			echo "mời nhập lại password";
			}
		 ?>	
		<input type="text" name="repassword"  placeholder="nhap lai password"  value = 
			<?php if(isset($_POST['repassword'])) echo $_POST['repassword']; ?>>
		<input type="submit" name="" value="tao tk">
		<?php 
		 	if (isset($error) && in_array('repassword', $error) ) {
			echo "mời nhập lại họ tên";
			}
		 ?>			
	</form>

</body>
</html>
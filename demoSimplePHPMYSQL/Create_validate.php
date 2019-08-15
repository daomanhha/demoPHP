<?php 
		require_once('./connect.php');
			
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
			}
			else {
				header('location: Create.php');
			}


	 ?>
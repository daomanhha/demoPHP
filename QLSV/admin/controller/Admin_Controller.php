<?php
	if( ! defined('IN_SITE')) die('BAD REQUEST!');
	/**
	 * 
	 */
	class Admin_Controller
	{
		
		// function __construct(argument)
		// {
		// 	# code...
		// }
		public function loginAction(){
			//connect mysqli
			require_once(ROOT_PATH.'system/library/DB.php');
				$DB = new Database();
				$DB -> db_connect();
			if(isset($_POST['submit'])){
				$email = isset($_POST['email']) ? trim($_POST['email']) : '';
				$passWord = isset($_POST['password']) ? trim($_POST['password']) : '';
				$password = md5($passWord);
				$ERROR = array();
				//query du lieu
				$query = "SELECT * FROM admin WHERE email = '$email'";
				$result = $DB -> db_execute($query);
				if(mysqli_num_rows($result) > 0){
					$user = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$user_Id = $user['id'];
					$user_Email = $user['email'];
					$user_Password = trim($user['password']);
					if($password != $user_Password){
						$ERROR['pass'] = 'sai mat khau';
					}else{
						session_start();
						$_SESSION['userId'] = $user_Id;
						header('location: admin.php?c=user&a=render');
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
			require_once(ROOT_PATH.'admin/view/Admin_View.php');
		}
		public function logoutAction() {
				session_start();
				session_unset();
				header('location: admin.php');
		}
	}
 ?>
<?php 
	if( ! defined('IN_SITE')) die('BAD REQUEST!');
	/**
	 * 
	 */
	require_once (ROOT_PATH . 'admin/model/User_model.php');
	class User_Controller
	{
		
		function __construct()
		{
			# code...
		}

		public function renderAction(){
			$userModel = new User_model();
			session_start();
			$query_admin = 'SELECT * FROM admin WHERE id = '.$_SESSION['userId'].'';
			$dataAdmin = $userModel ->render($query_admin);
			$admin_name = $dataAdmin[0]['name'];
			$query_sv = "SELECT * FROM sinhvien";
			$SV = $userModel->render($query_sv);
			require_once (ROOT_PATH.'admin/view/User_View.php');
		}
		public function detailAction(){
			$userModel = new User_model();
			session_start();
			$query_admin = 'SELECT * FROM admin WHERE id = '.$_SESSION['userId'].'';
			$dataAdmin = $userModel ->render($query_admin);
			$admin_name = $dataAdmin[0]['name'];
			//detail
			if(isset($_GET['id'])){
				$id_search = $_GET['id'];
				$query_id = "SELECT * FROM sinhvien WHERE id = '$id_search'";
				$SV = $userModel->render($query_id);
				require_once (ROOT_PATH . 'admin/view/User_Detail.php');
			}
		}
		public function searchAction(){
			$userModel = new User_model();
			session_start();
			$query_admin = 'SELECT * FROM admin WHERE id = '.$_SESSION['userId'].'';
			$dataAdmin = $userModel ->render($query_admin);
			$admin_name = $dataAdmin[0]['name'];
			//submit
			if($_POST['submit']){
				$name_search = isset($_POST['search']) ? $_POST['search']: '';
				$query_search = "SELECT * FROM sinhvien WHERE ten LIKE '%$name_search%'";
				$SV = $userModel->render($query_search);
				require_once (ROOT_PATH . 'admin/view/User_Detail.php');
			}
		}
		public function insertAction(){
			$userModel = new User_model();
			session_start();
			$query_admin = 'SELECT * FROM admin WHERE id = '.$_SESSION['userId'].'';
			$dataAdmin = $userModel ->render($query_admin);
			$admin_name = $dataAdmin[0]['name'];
			//insert
			if(isset($_REQUEST['submit'])){
				$ERROR = Array();
	 			$newName = isset($_POST['Name']) ? trim($_POST['Name']) : '';
	 			$newAge = isset($_POST['Age']) ? trim($_POST['Age']) : '';
	 			$newClass = isset($_POST['Class']) ? trim($_POST['Class']) : '';
	 			if(empty($newName)){
 				$ERROR['Name'] = 'moi nhap ten';
	 			}
	 			if(empty($newAge)){
	 				$ERROR['Age'] = 'moi nhap Tuoi';
	 			}
	 			if(empty($newClass)){
	 				$ERROR['Class'] = 'moi nhap Lop';
	 			}
	 			if(count($ERROR) == 0){
	 				$query_Insert = "INSERT INTO sinhvien (Ten, Tuoi ,Lop)
								 VALUES ('$newName', '$newAge', '$newClass')";
					$userModel ->insert($query_Insert);
					header('location: admin.php?c=user&a=render');
	 			}
			}
			//render
			require_once (ROOT_PATH.'admin/view/User_insert.php');
		}
		public function updateAction(){
			$userModel = new User_model();
			session_start();
			$query_admin = 'SELECT * FROM admin WHERE id = '.$_SESSION['userId'].'';
			$dataAdmin = $userModel ->render($query_admin);
			$admin_name = $dataAdmin[0]['name'];
			//update
			$indexId = isset($_GET['id']) ? $_GET['id'] : 0;
			if(isset($_REQUEST['submit'])){
				$ERROR = array();
				$newName = isset($_POST['Name']) ? trim($_POST['Name']) : '';
	 			$newAge = isset($_POST['Age']) ? trim($_POST['Age']) : '';
	 			$newClass = isset($_POST['Class']) ? trim($_POST['Class']) : '';
	 			if(empty($newName)){
	 				$ERROR['Name'] = 'moi nhap ten';
	 			}
	 			if(empty($newAge)){
	 				$ERROR['Age'] = 'moi nhap Tuoi';
	 			}
	 			if(empty($newClass)){
	 				$ERROR['Class'] = 'moi nhap Lop';
	 			}
	 			if(count($ERROR) == 0){
	 				$query_Update = "UPDATE sinhvien 
								 SET Ten = '$newName', Tuoi = '$newAge', Lop = '$newClass'
								 WHERE id = '$indexId'";
					$userModel ->update($query_Update);
					header('location: admin.php?c=user&a=render');
	 			}
			}
			require_once(ROOT_PATH.'admin/view/User_update.php');
		}
		public function deleteAction(){
			$userModel = new User_model();
			session_start();
			if(!isset($_SESSION['userId'])){
				header('location: admin.php');
			}
			//delete
			$indexId = isset($_GET['id']) ? $_GET['id'] : 0;
			$query_Delete = "DELETE FROM sinhvien WHERE id = $indexId";
			$userModel->delete($query_Delete);
			header('location: admin.php?c=user&a=render');
		}
	}
 ?>
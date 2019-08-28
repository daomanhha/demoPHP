<?php 
	session_start();
	if(!isset($_SESSION['userId'])){
		header('location: login.php');
	}
	$indexId = isset($_GET['id']) ? $_GET['id'] : 0;
	$conn = mysqli_connect('localhost','root','','qlsv');
	if(!$conn){
		die('cannot connect sql');
	}else mysqli_set_charset($conn, 'utf8');
	//query
	$query_Delete = "DELETE FROM sinhvien WHERE id = $indexId";
	$result_Delete = mysqli_query($conn, $query_Delete) or die ('that bai');
	header('location: index.php');
 ?>
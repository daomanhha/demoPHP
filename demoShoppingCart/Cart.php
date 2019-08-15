<?php 
	$conn = mysqli_connect('localhost','root','','demoshoppingcart');
	mysqli_set_charset($conn, 'utf8' );
	if($_GET['id'] && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('range'=>1))){
		$id = $_GET['id'];
		$query = "SELECT * FROM product WHERE id = $id";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) == 1){
			$kq = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$query_add = 'INSERT INTO cart (idSP) VALUES('.$kq['id'].')';
			$result_add = mysqli_query($conn,$query_add);
			if(mysqli_affected_rows($conn) == 1){
				header('location: index.php');
			}
		}
	}



 ?>
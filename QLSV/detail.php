<?php 
session_start();
	if(!isset($_SESSION['userId'])){
		header('location: login.php');
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>detail</title>
 </head>
 <body>
 	<?php 
		//connect sql 
		$conn = mysqli_connect('localhost','root','','qlsv');
		if(!$conn){
			die('cannot connect sql');
		}else mysqli_set_charset($conn, 'utf8');
		//query du lieu
		$query_admin = 'SELECT * FROM admin WHERE id = '.$_SESSION['userId'].'';
		$result_admin = mysqli_query($conn, $query_admin) or die('ket noi that bai');
		$admin = mysqli_fetch_array($result_admin, MYSQLI_ASSOC);
		$admin_name = $admin['name'];
	 ?>
	<div class="header">
		<p style="display: inline;">xin chao <?php if(isset($admin_name)) echo $admin_name;?></p>
		<a href="./logout.php">Logout</a>
	</div>
 	<table cellspacing="5" cellpadding="10" border="1">
		<tr>
			<th>Id</th>
			<th>Ten</th>
			<th>Tuoi</th>
			<th>Lop</th>
		</tr>
		<?php
			if(isset($_GET['id'])){ 
			$id_search = $_GET['id'];
			$query_id = "SELECT * FROM sinhvien WHERE id = '$id_search'";
			$result_id = mysqli_query($conn, $query_id) or die('ket noi that bai');
			if(mysqli_num_rows($result_id) > 0){
				while($SV = mysqli_fetch_array($result_id,MYSQLI_ASSOC)){
				echo '<tr>';
				echo '<td>'.$SV['id'].'</td>';
				echo '<td>'.$SV['Ten'].'</td>';
				echo '<td>'.$SV['Tuoi'].'</td>';
				echo '<td>'.$SV['Lop'].'</td>';
				echo '</tr>';
			}
			}else{
				echo 'ko co ket qua';
			}
		 }
		?>
	</table>
 </body>
 </html>
<?php 
session_start();
	if(!isset($_SESSION['userId'])){
		header('location: login.php');
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
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
			if(isset($_REQUEST['submit'])){ 
			$name_search = isset($_POST['search']) ? $_POST['search']: '';
			$query_search = "SELECT * FROM sinhvien WHERE Ten LIKE '%$name_search%'";
			$result_search = mysqli_query($conn, $query_search) or die('ket noi that bai');
			if(mysqli_num_rows($result_search) > 0){
				while($SV = mysqli_fetch_array($result_search,MYSQLI_ASSOC)){
				echo '<tr>';
				echo '<td>'.$SV['id'].'</td>';
				echo '<td>';
				echo '<a href = "./detail.php?id='.$SV['id'].' ">'.$SV['Ten'].'</a>';
				echo '</td>';
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
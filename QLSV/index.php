<?php 
	session_start();
	if(!isset($_SESSION['userId'])){
		header('location: login.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>index</title>
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
	<form action ="search.php" method="POST">
		<input type="text" name="search">
		<input type="submit" name="submit" value="search">
	</form>
	<table cellspacing="5" cellpadding="10" border="1">
		<tr>
			<th>Id</th>
			<th>Ten</th>
			<th>Tuoi</th>
			<th>Lop</th>
			<th>Sua</th>
			<th>Xoa</th>
		</tr>
		<?php 
			$query_sv = "SELECT * FROM sinhvien";
			$result_sv = mysqli_query($conn, $query_sv) or die('ket noi that bai');
			while($SV = mysqli_fetch_array($result_sv,MYSQLI_ASSOC)){
				echo '<tr>';
				echo '<td>'.$SV['id'].'</td>';
				echo '<td>';
				echo '<a href = "./detail.php?id='.$SV['id'].' ">'.$SV['Ten'].'</a>';
				echo '</td>';
				echo '<td>'.$SV['Tuoi'].'</td>';
				echo '<td>'.$SV['Lop'].'</td>';
				echo '<td>';
				echo '<a href = "./suaIndex.php?id='.$SV['id'].'">Sua</a>';
				echo '</td>';
				echo '<td>';
				echo '<a href = "./deleteIndex.php?id='.$SV['id'].'">Delete</a>';
				echo '</td>';
				echo '</tr>';
				
			}
		?>
	</table>
	<a href="./insert.php">Insert</a>

</body>
</html>
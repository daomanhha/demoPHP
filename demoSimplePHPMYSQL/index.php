<!DOCTYPE html>
<html>
<head>
	<title>	Index</title>
</head>
<body>
	<table>
		<tr>
			<th>id</th>
			<th>hoten</th>
			<th>username</th>
			<th>password</th>
		</tr>
		<?php 
			require_once ('./connect.php');
			$query = " SELECT * from tk ";
			$result = mysqli_query($conn, $query) or die('wrong');
			while($data = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				echo '<tr>
						<th>'.$data['id'].'</th>
						<th>'.$data['hoten'].'</th>
						<th>'.$data['username'].'</th>
						<th>'.$data['password'].'</th>
					  </tr>';
			}


		 ?>
	</table>

</body>
</html>
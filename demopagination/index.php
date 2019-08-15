<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		$conn = mysqli_connect('localhost','root','','demopagination');
		if(!$conn){
			echo 'wrong connect';
		}else mysqli_set_charset($conn, 'utf8');
	 ?>
	<table>
		<tr>
			<th>id</th>
			<th>name</th>
		</tr>
		<?php 
			$limit = 2;
			if(isset($_GET['s'])){
				$start = $_GET['s'];
			}else $start = 0;
			if(isset($_GET['p'])){
				$per_page = $_GET['p'];
			}else{
				$query_page = "SELECT COUNT(id) FROM product";
				$result_page = mysqli_query($conn,$query_page);
				if(mysqli_num_rows($result_page) == 1){
				   list($count) = mysqli_fetch_array($result_page,MYSQLI_NUM);
				   if($count > $limit){
				   	$per_page = ceil($count/$limit);
				   }else{
				   	$per_page = 1;
				   }
				}else echo 'wrong';

			}
			$query = "SELECT * FROM product LIMIT {$start},{$limit}";
			$result = mysqli_query($conn,$query);
			while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				echo '<tr>';
					echo '<td>';
					echo $data['id'];
					echo '</td>';
					echo '<td>';
					echo $data['name'];
					echo '</td>';
				echo '</tr>';
			}
			?>
	</table>
	<ul>
		<?php 
		if($per_page > 1){
			$current_page = $start/$limit+1;
		if($current_page != 1 )
			echo '<li><a href = "index.php?s='.($start-$limit).'&p='.$per_page.'">back</a></li>';
		}
		for($i = 1; $i <= $per_page; $i++){
			echo '<li><a href = "index.php?s='.($limit*($i-1)).'&p='.$per_page.'">'.$i.'</a></li>';
		}
		if($current_page != $per_page){
			echo '<li><a href = "index.php?s='.($start+$limit).'&p='.$per_page.'">next</a></li>';
		}

	 ?>
	</ul>
</body>
</html>
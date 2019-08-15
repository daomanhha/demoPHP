<!DOCTYPE html>
<html>
<head>
	<title>	ShoppingCart</title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
</head>
<body>
	<?php 
		$conn = mysqli_connect('localhost','root','','demoshoppingcart');
		mysqli_set_charset($conn, 'utf8' );
	 ?>
	<div class="container">
		<div class="cart">
			<p>Cart(<?php 
				$query_SLSP = "SELECT count(id) FROM CART";
				$result_SLSP = mysqli_query($conn, $query_SLSP);
				list($count_SLSP) = mysqli_fetch_array($result_SLSP,MYSQLI_NUM);

				echo $count_SLSP

			 ?>)</p>
		</div>
		<div class="row">
			<?php 
				$limit = 6;
				if(isset($_GET['s'])){
					$start = $_GET['s'];
				}else{
					$start = 0;
				}
				if(isset($_POST['p'])){
					$per_page = $_GET['p'];
				}else{
					$query_pp = "SELECT COUNT(*) FROM product";
					$result_pp = mysqli_query($conn, $query_pp);
					list($count) = mysqli_fetch_array($result_pp,MYSQLI_NUM);
					if($count > $limit){
						$per_page = ceil($count/$limit);
					}else{
						$per_page = 0;
					}
				}
				$query = "SELECT * FROM product LIMIT $start,$limit";
				$result = mysqli_query($conn, $query);
				while ($data = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			 ?>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<div class="card" style="width: 18rem;">
				   <img src= "<?php echo $data['anh']; ?>" class="card-img-top" alt="...">
					<div class="card-body">
					   <h5 class="card-title"><?php echo $data['name']; ?></h5>
					   <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					   <a href="Cart.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Go somewhere</a>
				  </div>
				</div>
			</div>
			<?php 
				}
			 ?>
		</div>

		<nav aria-label="Page navigation example">
			<?php 
				if($per_page > 1 ){
					echo '<ul class="pagination">';
					$current_page = $start/$limit +1;
					if($current_page != 1){
						echo '<li class="page-item">
							     <a class="page-link" href="index.php?s='.($start - $limit).'&p='.$per_page.'" aria-label="Previous">
							       <span aria-hidden="true">&laquo;</span>
							     </a>
							   </li>';
					}
					for($i = 1; $i <= $per_page; $i ++){
						if($current_page !== $i){
							echo '<li class="page-item"><a class="page-link" href="index.php?s='.($limit*($i-1)).'&p='.$per_page.'">'.$i.'</a></li>';
						}else{
							echo '<li class="page-item"><a class="page-link active" href="">'.$i.'</a></li>';
						}
					}
					if($current_page != $per_page){
						echo '<li class="page-item">
							      <a class="page-link" href="index.php?s='.($start + $limit).'&p='.$per_page.'" aria-label="Next">
							        <span aria-hidden="true">&raquo;</span>
							      </a>
							   </li>';
					}

				}

			 ?>
		  </ul>
		</nav>
	</div>

</body>
</html>
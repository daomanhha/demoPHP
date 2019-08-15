<!DOCTYPE html>
<html>
<head>
	<title>ATM</title>
	<link rel="stylesheet" type="text/css" href="./index.css">
</head>
<body>
	<?php 
		$money = 0;
		$FIVE_00SL = 0;
		$TWO_00SL = 0;
		$FIVE_0SL = 0;
		$ONE_00SL = 0;
		define("FIVE_0", 50000);
			define("ONE_00", 100000);
			define("TWO_00", 200000);
			define("FIVE_00", 500000);
		if(isset($_REQUEST["Money"])) $money = $_REQUEST["Money"];

		if(is_numeric($money)){
			while ($money >= FIVE_00) {
				++$FIVE_00SL;
				$money = $money - FIVE_00;
			}
			while ($money >= TWO_00) {
				++$TWO_00SL;
				$money = $money - TWO_00;
			}
			while ($money >= ONE_00) {
				++$FIVE_00SL;
				$money = $money - ONE_00;
			}
			while ($money >= FIVE_0) {
				++$FIVE_00SL;
				$money = $money - FIVE_0;
			}
		}
		else{
			$money = 0;
		}


	 ?>
	<div class="container">
		<div class="rut-Tien">
			<form method="post" action="index.php">
				<input type="text" name="Money" <?php echo 'value = "' . number_format($money). '"'  ?>>
				<button type="submit">Rút tiền</button>
			</form>
		</div>
		<div class="control-money">
			<!-- <div class="control-header">
				<p>mệnh giá </p>
				<p>số lượng </p>
				<p>thành tiền </p>
			</div>
			<div class="control-tien">
				<p>500000 </p>
				<p>5 </p>
				<p>2500000 </p>
			</div> -->
			<table class="control-table">
				<tr>
					<th>mệnh giá </th>
					<th>số lượng</th>
					<th>thành tiền </th>
				</tr>
				<?php 
					if(isset($FIVE_00SL) && $FIVE_00SL > 0) echo 
					'<tr>
						<td>' .number_format(FIVE_00) .'</td>
						<td>'. number_format($FIVE_00SL) .'</td>
						<td>'.number_format($FIVE_00SL* FIVE_00).'</td>
					</tr>'
				 ?>
				 <?php 
					if(isset($TWO_00SL) && $TWO_00SL > 0) echo 
					'<tr>
						<td>' .number_format(TWO_00) .'</td>
						<td>'. number_format($TWO_00SL) .'</td>
						<td>'.number_format($TWO_00SL* TWO_00).'</td>
					</tr>'
				 ?>
				 <?php 
					if(isset($ONE_00SL) && $ONE_00SL > 0) echo 
					'<tr>
						<td>' .number_format(ONE_00) .'</td>
						<td>'. number_format($ONE_00SL) .'</td>
						<td>'.number_format($ONE_00SL* ONE_00).'</td>
					</tr>'
				 ?>
				 <?php 
					if(isset($FIVE_0SL) && $FIVE_0SL > 0) echo 
					'<tr>
						<td>' .number_format(FIVE_0) .'</td>
						<td>'. number_format($FIVE_0SL) .'</td>
						<td>'.number_format($FIVE_0SL* FIVE_0).'</td>
					</tr>'
				 ?>
				<tr>
					<td>Tổng tiền Rút : <?php echo number_format($FIVE_0SL*FIVE_0 + $FIVE_00SL*FIVE_00+ $TWO_00SL*TWO_00+$ONE_00SL*ONE_00) ?> </td>
				</tr>
				<tr>
					<td>Số Dư : <?php echo number_format($money) ?> </td>
				</tr>
			</table>
		</div>
	</div>

</body>
</html>
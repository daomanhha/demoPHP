<!DOCTYPE html>
<html>
<head>
	<title>Cung Hoàng Đạo</title>
	<link rel="stylesheet" type="text/css" href="./index.css">
</head>
<body>
	<?php
		$day = "";
		$month = "";
		$img = "";
		$nameEng = "";
		$nameViet = "";
		if(isset($_POST["NgaySinh"]) && isset($_POST["ThangSinh"])){
			$day = $_POST["NgaySinh"];
			$month = $_POST["ThangSinh"];
		}
		$flag = true;
		if(is_numeric($day) && is_numeric($month)){
			switch ($month) {
				case 01:
				case 1:
					if($day >= 1 && $day <=19 ){
						$img = "Capricorn.jpg";
						$nameEng = "(Capricorn 23/12-19/01)";
						$nameViet = "Ma kết";
					}
					if($day >19 ){
						$img = "Aquarius.jpg";
						$nameEng = "(Aquarius 20/01-19/02)";
						$nameViet = "Bảo Bình";
					}
					if($day > 31 || $day < 1) $flag = false;
					break;
				case 02:
				case 2:
					if($day >= 1 && $day <=19 ){
						$img = "Aquarius.jpg";
						$nameEng = "(Aquarius 20/01-19/02)";
						$nameViet = "Bảo Bình";
					}
					if($day > 19 ){
						$img = "Pisces.jpg";
						$nameEng = "(Pisces 20/02-21/03)";
						$nameViet = "Song Ngư";
					}
					if($day > 31 || $day < 1) $flag = false;
					break;
				case 03:
				case 3:
					if($day >= 1 && $day <=20 ){
						$img = "Pisces.jpg";
						$nameEng = "(Pisces 20/02-21/03)";
						$nameViet = "Song Ngư";
					}
					if($day > 20){
						$img = "Aries.jpg";
						$nameEng = "(Aries 22/03-20/04)";
						$nameViet = "Bạch Dương";
					}
					if($day > 31 || $day < 1) $flag = false;
					break;
				case 04:
				case 4:
					if($day >= 1 && $day <=22 ){
						$img = "Aries.jpg";
						$nameEng = "(Aries 22/03-20/04)";
						$nameViet = "Bạch Dương";
					}
					if($day > 22){
						$img = "Taurus.jpg";
						$nameEng = "(Taurus 21/04-21/05)";
						$nameViet = "Kim Ngưu";
					}
					if($day > 31 || $day < 1) $flag = false;
					break;
				case 05:
				case 5:
					if($day >= 1 && $day <=21 ){
						$img = "Taurus.jpg";
						$nameEng = "(Taurus 21/04-21/05)";
						$nameViet = "Kim Ngưu";
					}
					if($day > 21){
						$img = "Gemini.jpg";
						$nameEng = "(Gemini 22/05-22/06)";
						$nameViet = "Song Tử";
					}
					if($day > 31 || $day < 1) $flag = false;
					break;
				case 06:
				case 6:
					if($day >= 1 && $day <=22 ){
						$img = "Gemini.jpg";
						$nameEng = "(Gemini 22/05-22/06)";
						$nameViet = "Song Tử";
					}
					if($day > 22){
						$img = "Cancer.jpg";
						$nameEng = "(Cancer 23/06-23/07)";
						$nameViet = "Cự Giải";
					}
					if($day > 31 || $day < 1) $flag = false;
					break;
				case 07:
				case 7:
					if($day >= 1 && $day <=23 ){
						$img = "Cancer.jpg";
						$nameEng = "(Cancer 23/06-23/07)";
						$nameViet = "Cự Giải";
					}
					if($day > 23){
						$img = "Leo.jpg";
						$nameEng = "(Leo 24/07-23/08)";
						$nameViet = "Sư Tử";
					}
					if($day > 31 || $day < 1) $flag = false;
					break;
				case 8:
					if($day >= 1 && $day <=23 ){
						$img = "Leo.jpg";
						$nameEng = "(Leo 24/07-23/08)";
						$nameViet = "Sư Tử";
					}
					if($day > 23){
						$img = "Virgo.jpg";
						$nameEng = "(Virgo 24/08-23/09)";
						$nameViet = "Xử Nữ";
					}
					if($day > 31 || $day < 1) $flag = false;
					break;
				case 9:
					if($day >= 1 && $day <=23 ){
						$img = "Virgo.jpg";
						$nameEng = "(Virgo 24/08-23/09)";
						$nameViet = "Xử Nữ";
					}
					if($day > 23){
						$img = "Libra.jpg";
						$nameEng = "(Libra 24/09-23/10)";
						$nameViet = "Thiên Bình";
					}
					if($day > 31 || $day < 1) $flag = false;
					break;
				case 10:
					if($day >= 1 && $day <=23 ){
						$img = "Libra.jpg";
						$nameEng = "(Libra 24/09-23/10)";
						$nameViet = "Thiên Bình";
					}
					if($day > 23){
						$img = "Scorpio.jpg";
						$nameEng = "(Scorpio 24/10-22/11)";
						$nameViet = "Thần Nông";
					}
					if($day > 31 || $day < 1) $flag = false;
					break;
				case 11:
					if($day >= 1 && $day <=22 ){
						$img = "Scorpio.jpg";
						$nameEng = "(Scorpio 24/10-22/11)";
						$nameViet = "Thần Nông";
					}
					if($day > 22){
						$img = "Sagittarius.jpg";
						$nameEng = "(Sagittarius 23/11-22/12)";
						$nameViet = "Nhân Mã";
					}
					if($day > 31 || $day < 1) $flag = false;
					break;
				case 12:
					if($day >= 1 && $day <=22 ){
						$img = "Sagittarius.jpg";
						$nameEng = "(Sagittarius 23/11-22/12)";
						$nameViet = "Nhân Mã";
					}
					if($day > 22){
						$img = "Capricorn.jpg";
						$nameEng = "(Capricorn 23/12-19/01)";
						$nameViet = "Ma kết";
					}
					if($day > 31 || $day < 1) $flag = false;
					break;																									
				
				default:
					$flag = false;
					break;
			}
		}
		else{
			$flag = false;
		}
		
	?>
	<div class="container">
		<form method="post" action="index.php" name="content-form">
			<div class="row">
				<label>Ngày Sinh:</label>
				<input type="text" name="NgaySinh">
			</div>
			<div class="row">
				<label>Tháng Sinh:</label>
				<input type="text" name="ThangSinh">
			</div>
			<button type="submit">Xem kết quả</button>
		</form>
		<div class="result">
			<?php if(  $flag == true)echo "<img src = './img/"."$img'></img>"?>
			<p><?php if(  $flag == true) echo $nameViet ?></p>
			<p><?php if(  $flag == true) echo $nameEng ?></p>
			<p><?php if(  $flag == false) echo "Du lieu khong hop le"; ?></p>
		</div>
	</div>

</body>
</html>
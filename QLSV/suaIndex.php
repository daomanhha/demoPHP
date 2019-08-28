<?php 
	session_start();
	if(!isset($_SESSION['userId'])){
		header('location: login.php');
	}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Sua</title>
 </head>
 <body>
 	<?php 
 		$indexId = isset($_GET['id']) ? $_GET['id'] : 0;
 		if(isset($_REQUEST['submit'])){
 			//khai bao
 			$ERROR = Array();
 			$newName = isset($_POST['Name']) ? trim($_POST['Name']) : '';
 			$newAge = isset($_POST['Age']) ? trim($_POST['Age']) : '';
 			$newClass = isset($_POST['Class']) ? trim($_POST['Class']) : '';
 			if(empty($newName)){
 				$ERROR['Name'] = 'moi nhap ten';
 			}
 			if(empty($newAge)){
 				$ERROR['Age'] = 'moi nhap Tuoi';
 			}
 			if(empty($newClass)){
 				$ERROR['Class'] = 'moi nhap Lop';
 			}
 			//db 
 			$conn = mysqli_connect('localhost','root','','qlsv');
			if(!$conn){
				die('cannot connect sql');
			}else mysqli_set_charset($conn, 'utf8');
			//query
			if(count($ERROR) == 0){
				$query_Update = "UPDATE sinhvien 
								 SET Ten = '$newName', Tuoi = '$newAge', Lop = '$newClass'
								 WHERE id = '$indexId'";
				$result_Update = mysqli_query($conn, $query_Update) or die(' that bai ');
				header('location: ./index.php');			 
			}

 		}

 	 ?>
 	 <form action = "" method="POST">
 	 	<p>Ten</p>
 	 	<input type="text" name="Name" value=" <?php if(isset($newName)) echo $newName ?>">
 	 	<?php 
 	 		if(isset($ERROR['Name'])) echo '<p>'.$ERROR['Name'].'</p>';
 	 	 ?>
 	 	<p>Tuoi</p>
 	 	<input type="text" name="Age" value=" <?php if(isset($newAge)) echo $newAge ?>">
 	 	<?php 
 	 		if(isset($ERROR['Age'])) echo '<p>'.$ERROR['Age'].'</p>';
 	 	 ?>
 	 	<p>Lop</p>
 	 	<input type="text" name="Class" value=" <?php if(isset($newClass)) echo $newClass ?>">
 	 	<?php 
 	 		if(isset($ERROR['Class'])) echo '<p>'.$ERROR['Class'].'</p>';
 	 	 ?>
 	 	<p></p>
 	 	<input type="submit" name="submit" value="ClickMe">
 	 </form>
 
 </body>
 </html>
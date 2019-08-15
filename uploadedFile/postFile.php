<?php
	$file = $_FILES['file-Upload'];
	if($file['size'] !== 0){
		$destination = 'C:\xampp\htdocs\php\uploadedFile\img/'  . $file['name'];
		move_uploaded_file($file['tmp_name'], $destination);
		echo '<img src = "./img/'.$file['name'].'">';
	}
	else echo 'chưa tạo file'

  ?>
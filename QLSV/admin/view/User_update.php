<?php 
	require_once(ROOT_PATH. 'admin/view/header/User_update_header.php');
 ?>
 	<div class="header">
		<p style="display: inline;">xin chao <?php if(isset($admin_name)) echo $admin_name;?></p>
		<a href="admin.php?c=admin&a=logout">Logout</a>
	</div>
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
 <?php 
	require_once(ROOT_PATH. 'admin/view/footer/User_update_footer.php')
 ?>
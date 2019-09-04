<?php 
if( ! defined('IN_SITE')) die('BAD REQUEST!');
 ?>
<?php 
	require_once(ROOT_PATH. 'admin/view/header/Admin_header.php');
 ?>
 <form action="" method="POST" style="
		display: flex; 
		flex-direction: column;" >
		<input type="text" name="email" placeholder="email" value="<?php if(isset($email)) echo $email ?>">
		<p><?php if(isset($ERROR) && isset($ERROR['tk'])) echo $ERROR['tk'] ?></p>
		<input type="password" name="password" placeholder="password">
		<p><?php if(isset($ERROR) && isset($ERROR['pass'])) echo $ERROR['pass'] ?></p>
		<input type="submit" name="submit" value="dang nhap" >
</form>
<?php 
	require_once(ROOT_PATH. 'admin/view/footer/Admin_footer.php');
 ?>

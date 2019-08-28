<?php 
	define('PATH_SYSTEM', './system/');
	require_once (PATH_SYSTEM."config/config.php");
	require_once(PATH_SYSTEM."core/FT_Controller.php");
	$controller = (isset($_GET['c'])) ? $_GET['c'] : CONTROLLER_DEFAULT;
	$action = (isset($_GET['a'])) ? $_GET['a'] : ACTION_DEFAULT;

	load($controller, $action);


	
 ?>
<?php 
	//set biến in_site
	define('IN_SITE', true);
	//require config
	require_once ('./system/config/config.php');
	require_once ('./system/FT_Loader.php');

	$controller = isset($_GET['c']) ? trim($_GET['c']) : DEFAULT_CONTROLLER;
	$action = isset($_GET['a']) ? trim($_GET['a']) : DEFAULT_ACTION;

	$ft_load = new FT_Load();
	$ft_load -> load($controller, $action);
 ?>
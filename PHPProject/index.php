<?php 
	require_once('./config/config.php');
	require_once CorePath.'FT_Controller.php';
	$controller = (isset($_GET['c'])) ? $_GET['c'] : DEFAULT_CONTROLLER;
	$action = (isset($_GET['a'])) ? $_GET['a'] : DEFAULT_ACTION;

	load($controller, $action);

 ?>
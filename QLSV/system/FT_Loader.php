<?php 
	if( ! defined('IN_SITE')) die('BAD REQUEST!');
	/**
	 * 
	 */
	class FT_Load
	{
		
		function __construct()
		{
		}
		public function load($controller, $action){
			// Chuyển đổi tên controller vì nó có định dạng là {Name}_Controller
			$controller = ucfirst(strtolower($controller)) . '_Controller';
			// chuyển đổi tên action vì nó có định dạng {name}Action
			$action = strtolower($action) . 'Action';
			//kiểm tra tồn tại folder đó không
			if(!file_exists(ROOT_PATH .'admin/controller/'.$controller.'.php')){
				die("không có thư mục");
			}
			require_once(ROOT_PATH .'admin/controller/'.$controller.'.php');
			$controllerClass = new $controller();
			//kiểm tra có method action không
			if(!method_exists($controllerClass, $action)){
				die('không tìm thấy action');
			}
			$controllerClass->$action();
		} 
	}

 ?>
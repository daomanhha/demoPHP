<?php 
	function load($controller, $action){
		//gọi model tổng
		require_once(PATH_SYSTEM.'core/FT_model.php'); //vì khi gọi trong admin.php thì đường dẫn nó tính từ root
		//gọi controller tương ứng
		if($controller == 'home')  require_once('./admin/controller/'.$controller.'_controller.php');
		else require_once('./site/controller/'.$controller.'_controller.php');
		// //gọi view tổng
		require_once('FT_view.php');
	}

 ?>
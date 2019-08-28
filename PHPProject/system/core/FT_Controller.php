 <?php 
 		//loader
 	function load($controller, $action){
 		
 		//call view
 		switch ($controller) {
 			case 'Backend':
 				require_once CorePath.'FT_viewBE.php';
 				break;
 			
 			default:
 				require_once CorePath.'FT_viewFE.php';
 				break;
 		}
 	}

 ?>
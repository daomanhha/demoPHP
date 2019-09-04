<?php 
	/**
	 * 
	 */
	class Admin_model
	{
		
		function __construct(argument)
		{
			# code...
		}

		public function login(){
			//connect mysqli
			require_once(ROOTPATH . 'system/library/DB.php');
			$DB = new Database();
			$DB -> db_connect();
		}
	}
 ?>
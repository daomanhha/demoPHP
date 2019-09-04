<?php 
	/**
	 * 
	 */
	require_once(ROOT_PATH . 'system/library/DB.php');
	class User_model
	{
		
		function __construct()
		{
			# code...
		}
		public function render($sql){
			$DB = new Database();
			$DB -> db_connect();
			$result = $DB -> db_get_list($sql);
			return $result;
		}
		public function insert($sql){
			$DB = new Database;
			$DB -> db_connect();
			$result = $DB->db_execute($sql);
			return $result;
		}
		public function update($sql){
			$DB = new Database;
			$DB -> db_connect();
			$result = $DB->db_execute($sql);
			return $result;
		}
		public function delete($sql){
			$DB = new Database;
			$DB -> db_connect();
			$result = $DB->db_execute($sql);
			return $result;
		}
	}
 ?>
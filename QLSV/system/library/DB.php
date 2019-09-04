<?php 
	if( ! defined('IN_SITE')) die('BAD REQUEST!');
	/**
	 * 
	 */
	class Database
	{
		private $hostName = 'localhost';
		private $userName = 'root';
		private $passWord = '';
		private $database = 'qlsv';
		private $conn = null;
		function __construct()
		{
			# code...
		}
		//connect
		public function db_connect(){
			if(!$this ->conn){
				$this ->conn = new mysqli($this->hostName, $this->userName, $this->passWord, $this->database);
				mysqli_set_charset($this ->conn, 'UTF-8');
			}
		}
		//disconnect
		public function db_disconnect(){
			if($this ->conn){
				$this->conn -> close();
			}
		}

		//execute
		public function db_execute($sql){
			$this -> db_connect();
			$result = $this->conn->query($sql);
			return $result;
		}
		//get list
		public function db_get_list($sql){
			$this -> db_connect();
			$result = $this -> db_execute($sql);
			$data = array();
			while($dataQuery = $result -> fetch_array(MYSQLI_ASSOC)){
				$data[] = $dataQuery;
			};
			return $data;
		}
	}
 ?>
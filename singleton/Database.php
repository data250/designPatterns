<?php

class Database {
	private static $instance;
	private $connection;
	private $host = "127.0.0.1";
	private $username = "user";
	private $password = "pass";
	private $database = "database";
 
	public static function getInstance() {
		if(!self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}
 
	private function __construct() {
		$this->connection = new mysqli($this->host, $this->username, 
			$this->password, $this->database);
	
		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
				 E_USER_ERROR);
		}
	}
 
	public function getConnection() {
		return $this->connection;
	}
}

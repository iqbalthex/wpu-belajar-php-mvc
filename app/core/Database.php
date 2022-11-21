<?php

class Database{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $name = DB_NAME;

	private $dbh;  // database handler
	private $stmt; // statement (query)

	public function __construct(){
		// data source name
		$dsn = "mysql:host={$this->host};dbname={$this->name}";

		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		];

		try{
			// similar to mysqli_connect()
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type=null){
		if( is_null($type) ){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT; break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL; break;
				case is_null($value):
					$type = PDO::PARAM_NULL; break;
				default:
					$type = PDO::PARAM_STR;
			}
		}

		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
		$this->stmt->execute();
	}

	// fetch multi data
	public function result_set(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	// fetch single data
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
}

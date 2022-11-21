<?php

class Mahasiswa_Model{
	private $dbh;  // database handler
	private $stmt; // statement (query)

	public function __construct(){
		// data source name
		$dsn = 'mysql:host=localhost;dbname=phpmvc';

		try{
			$this->dbh = new PDO($dsn, 'root', ''); // similar to mysqli_connect()
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	public function get_all_mahasiswa(){
		// similar to mysqli_query() but in 2 step
		$this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
		$this->stmt->execute();

		return $this->stmt->fetchAll(PDO::FETCH_ASSOC); // similar to mysqli_fetch_assoc()
	}
}

<?php

class Mahasiswa_Model{
	private $table = 'mahasiswa';
	private $db;


	public function __construct(){
		$this->db = new Database;
	}


	public function get_all_mahasiswa(){
		$this->db->query("SELECT * FROM {$this->table}");
		return $this->db->result_set();
	}


	public function get_mahasiswa_by_id($id){
		$this->db->query("SELECT * FROM {$this->table} WHERE id=:id");
		$this->db->bind('id', $id);
		return $this->db->single();
	}


	public function add_mahasiswa($data){
		$query = "INSERT INTO mahasiswa VALUES(
			'', :name, :nim, :email, :study
		)";

		$this->db->query($query);
		$this->db->bind('name', $data['name']);
		$this->db->bind('nim', $data['nim']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('study', $data['study']);

		$this->db->execute();
		return $this->db->row_count();
	}


	public function delete_mahasiswa($id){
		$query = "DELETE FROM mahasiswa WHERE id=:id";

		$this->db->query($query);
		$this->db->bind('id', $id);
		
		$this->db->execute();
		return $this->db->row_count();
	}


	public function edit_mahasiswa($data){
		$query = "UPDATE mahasiswa SET
			name = :name,
			nim = :nim,
			email = :email,
			study = :study
		WHERE id = :id";

		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->bind('name', $data['name']);
		$this->db->bind('nim', $data['nim']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('study', $data['study']);

		$this->db->execute();
		return $this->db->row_count();
	}


	public function search_mahasiswa($keyword){
		$query = "SELECT * FROM mahasiswa WHERE name LIKE :keyword";

		$this->db->query($query);
		$this->db->bind('keyword', "%$keyword%");
		return $this->db->result_set();
	}

}

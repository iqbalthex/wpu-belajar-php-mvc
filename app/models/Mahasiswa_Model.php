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
}

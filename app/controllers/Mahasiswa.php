<?php

class Mahasiswa extends Controller{
	public function index(){
		$data = [
			'title' => 'Daftar Mahasiswa',
			'mhs' => $this->model('Mahasiswa_model')->get_all_mahasiswa() // get data from model (db)
		];

		$this->view('templates/header', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
	}

	public function detail($id){
		$data = [
			'title' => 'Detail Mahasiswa',
			'mhs' => $this->model('Mahasiswa_model')->get_mahasiswa_by_id($id)
		];

		$this->view('templates/header', $data);
		$this->view('mahasiswa/detail', $data);
		$this->view('templates/footer');
	}
}

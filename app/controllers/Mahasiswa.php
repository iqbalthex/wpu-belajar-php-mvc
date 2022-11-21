<?php

class Mahasiswa extends Controller{
	public function index(){
		$data = [
			'title' => 'Daftar Mahasiswa',
			'mhs' => $this->model('Mahasiswa_model')->get_all_mahasiswa()
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

	public function tambah(){
		if( $this->model('Mahasiswa_model')->add_mahasiswa($_POST) > 0){
			Flasher::set_flash('berhasil', 'ditambahkan', 'success');
		} else {
			Flasher::set_flash('gagal', 'ditambahkan', 'danger');
		}

		header('Location: ' . BASEURL . '/mahasiswa');
		exit;
	}
}

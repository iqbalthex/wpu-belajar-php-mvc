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


	public function add(){
		if( $this->model('Mahasiswa_model')->add_mahasiswa($_POST) > 0){
			Flasher::set_flash('berhasil', 'ditambahkan', 'success');
		} else {
			Flasher::set_flash('gagal', 'ditambahkan', 'danger');
		}

		header('Location: ' . BASEURL . '/mahasiswa');
		exit;
	}


	public function delete($id){
		if( $this->model('Mahasiswa_model')->delete_mahasiswa($id) > 0){
			Flasher::set_flash('berhasil', 'dihapus', 'success');
		} else {
			Flasher::set_flash('gagal', 'dihapus', 'danger');
		}

		header('Location: ' . BASEURL . '/mahasiswa');
		exit;
	}


	public function edit(){
		if( $this->model('Mahasiswa_model')->edit_mahasiswa($_POST) > 0){
			Flasher::set_flash('berhasil', 'diubah', 'success');
		} else {
			Flasher::set_flash('gagal', 'diubah', 'danger');
		}

		header('Location: ' . BASEURL . '/mahasiswa');
		exit;
	}


	public function get_data($id){
		echo json_encode($this->model('Mahasiswa_model')->get_mahasiswa_by_id($id));
	}


	public function search($keyword=''){
		$data = [
			'title' => 'Daftar Mahasiswa',
			'mhs' => $keyword !== '' ?
				$this->model('Mahasiswa_model')->search_mahasiswa($keyword) :
				$this->model('Mahasiswa_model')->get_all_mahasiswa()
		];

		echo json_encode($data['mhs']);
	}

}

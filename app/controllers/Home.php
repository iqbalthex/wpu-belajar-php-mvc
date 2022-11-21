<?php

class Home extends Controller{
	public function index(){
		$data = [
			'title' => 'Home',
			'name' => $this->model('User_model')->get_user() // get data from model (db)
		];

		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}
}

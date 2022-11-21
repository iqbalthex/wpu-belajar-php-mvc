<?php

class Home extends Controller{
	public function index(){
		$data['title'] = 'Home';

		// calling view
		$this->view('templates/header', $data); # + send data
		$this->view('home/index');
		$this->view('templates/footer');
	}
}

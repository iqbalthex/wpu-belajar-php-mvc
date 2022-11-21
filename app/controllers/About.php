<?php

class About extends Controller{
	public function index($name='Iqbal', $job='Mahasiswa', $age=21){
		$data = [
			'title' => 'About - Index',
			'name' => $name,
			'job' => $job,
			'age' => $age,
		];

		// calling view
		$this->view('templates/header', $data); # + send data
		$this->view('about/index', $data);
		$this->view('templates/footer');
	}

	public function page(){
		$data = [
			'title' => 'About - Page',
		];

		$this->view('templates/header', $data);
		$this->view('about/page', $data);
		$this->view('templates/footer');
	}
}

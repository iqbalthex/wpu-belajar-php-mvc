<?php

class About{
	// base_url/about || base_url/about/index
	public function index($name='Iqbal', $job='Mahasiswa'){
		echo "Halo, nama saya $name, saya seorang $job";
	}

	// base_url/about/page
	public function page(){
		echo 'about/page';
	}
}

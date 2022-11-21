<?php

// main app's class
class App{
	public function __construct(){
		var_dump($this->parseURL());
	}

	public function parseURL(){
		if( isset($_GET['url']) ){
			$url = rtrim($_GET['url'], '/'); # delete the last slash
			$url = filter_var($url, FILTER_SANITIZE_URL); # sanitize from weird characters
			$url = explode('/', $url); # make an array of url
			return $url;
		}
	}
}

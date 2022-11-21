<?php

class App{
	// default controller, method and params
	protected $controller = 'Home';
	protected $method = 'index';
	protected $params = [];

	public function __construct(){
		// use default if needed
		$url = $this->parseURL() ?? [$this->controller, $this->method];


		// change the controller if exists
		if( file_exists('../app/controllers/' . $url[0] . '.php') ){
			$this->controller = $url[0];
			unset($url[0]);
		}

		require_once '../app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller;


		// change the method if exists
		if( isset($url[1]) ){
			if( method_exists($this->controller, $url[1]) ){
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		// filling params
		if( !empty($url) ){
			$this->params = array_values($url);
		}

		// execute requests
		call_user_func_array([$this->controller, $this->method], $this->params);
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

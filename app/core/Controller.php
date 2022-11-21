<?php

// app's main class
class Controller{
	public function view($view, $data=[]){
		require_once "../app/views/$view.php";
	}
}

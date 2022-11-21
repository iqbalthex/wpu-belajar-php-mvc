<?php
if( !session_id() ) session_start();

// entry point
require_once '../app/init.php';

$app = new App;

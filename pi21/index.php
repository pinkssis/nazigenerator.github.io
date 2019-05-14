<?php
	error_reporting(1);
	define('DS',DIRECTORY_SEPARATOR);
	define('ROOT', dirname(dirname(__FILE__)) . DS . 'ApplicationPI21' . DS);
	
	require_once(ROOT . 'app.php');
	$app = new Application();
	
	header('Content-Type: application/json');
	header('Content-type: charset=utf-8');
	
	echo json_encode($app->answer($_GET));
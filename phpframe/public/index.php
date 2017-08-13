<?php

define("DD", realpath("../"));

require DD . "/wpa27/functions.php";
require  DD . "/app/controller/controllers.php";

$request_uri = explode("/", $_SERVER['REQUEST_URI']);
$script_name = explode("/", $_SERVER['SCRIPT_NAME']);

$uri = array_diff($request_uri, $script_name);
$a_uri = array_values($uri);
// var_dump($a_uri);
// die();

// if(isset($_GET['page'])) {
// 	$page = $_GET['page'];
// } else {
// 	$page = "home";
// }

if(empty($a_uri)) {
	$page = "home";
} else {
	$page = $a_uri[0];
}

$controller = ucfirst($page) . "Controller";
if(function_exists($controller)) {
	array_shift($a_uri);
	$func_reflection = new ReflectionFunction($controller);
	$num_of_params = $func_reflection->getNumberOfParameters();
	if(count($a_uri) == $num_of_params) {
		call_user_func_array($controller, $a_uri);
	} else {
		echo "404! Not Found! Idiot!";	
	}
} else {
	echo "404! Not Found! Idiot!";
}







?>
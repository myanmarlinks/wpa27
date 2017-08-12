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
	call_user_func($controller);
} else {
	echo "404! Not Found! Idiot!";
}
?>
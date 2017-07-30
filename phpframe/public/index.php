<?php

define("DD", realpath("../"));

require "../controller/controllers.php";

if(isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = "home";
}

$controller = ucfirst($page) . "Controller";

call_user_func($controller);
/* 
blog = Blog + Controller
*/



















 ?>
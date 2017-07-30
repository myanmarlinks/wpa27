<?php 

if(isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = "index";
}

$file = "../view/" . $page . ".php";
/*
Want to add variables to specific view
*/



if(file_exists($file)) {
	if($page == "blog") {
		$title = "Myanmar Links";
		$another = "Testing";	
	} elseif($page=="index") {
		$foo = "Bar";
	}
	
	$foo = "Bar";
	require $file;

} else {
	echo "404! Not Found! Idiot!";
}

















 ?>
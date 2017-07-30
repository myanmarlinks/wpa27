<?php 

function BlogController() {
	$title = "Myanmar Links";
	$another = "Test";
	require "../view/blog.php";  
}

function HomeController() {
	$foo = "Bar";
	require "../view/index.php";
}

 ?>
<?php 

function BlogController() {
	$data = [
		'title'	=> 'Myanmar Links',
		"another"	=> 'Test'
	];
	load_view("blog", $data);
}

function HomeController() {
	$data = [
		'foo'	=> 'Bar'
	];
	load_view("index", $data);
}














 ?>
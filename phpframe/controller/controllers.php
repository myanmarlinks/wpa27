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

function load_view($view, $data) {
	extract($data);
	require DD . "/view/" . $view . ".php"; 
		
}













 ?>
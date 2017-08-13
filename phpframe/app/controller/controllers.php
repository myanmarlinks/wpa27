<?php 

function BlogController($category, $id) {

	$data = [
		'title'		=> 'Myanmar Links',
		"another"	=> 'Test',
		'category'	=> $category,
		'id'		=> $id
	];
	_load_view("blog", $data);
}

function HomeController() {
	$data = [
		'foo'	=> 'Bar'
	];
	_load_view("index", $data);
}

function FooController($test) {
	$data = [
		'test'	=> $test
	];
	_load_view("test", $data);
}














 ?>
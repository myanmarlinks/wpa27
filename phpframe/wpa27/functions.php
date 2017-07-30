<?php 

function load_view($view, $data) {
	extract($data);
	require DD . "/app/view/" . $view . ".php"; 
}
?>
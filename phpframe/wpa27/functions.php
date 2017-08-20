<?php 

function _load_view($view, $data) {
	ob_start("ob_gzhandler");
	extract($data);
	require DD . "/app/view/" . $view . ".php"; 
	ob_end_flush();
}

function _configGet($value) {
	$e_value = explode(".", $value);
	$file = DD . "/app/config/" . $e_value[0] . ".php";
	if(file_exists($file)) {
		$data = require($file);
		if(array_key_exists($e_value[1], $data)) {
			return $data[$e_value[1]];	
		} else {
			trigger_error( $e_value[1] . " key does not exist", E_USER_ERROR);	
		}
		
	} else {
		trigger_error("database.php required in config folder", E_USER_ERROR);
	}
	
}
?>
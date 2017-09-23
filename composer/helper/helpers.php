<?php 

function dump($value, $die = false) {
	var_dump($value);
	if($die == true) {
		die();
	}
}

 ?>
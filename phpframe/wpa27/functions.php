<?php 

function _load_view($view, $data) {
	ob_start("ob_gzhandler");
	extract($data);
	require DD . "/app/view/" . $view . ".php"; 
	ob_end_flush();
}
?>
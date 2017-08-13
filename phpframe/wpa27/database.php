<?php 

function _getDataById($id) {

	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = mysqli_connect($servername, $username, $password);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully";

	mysqli_close($conn);
	die();
	return [];
}

?>
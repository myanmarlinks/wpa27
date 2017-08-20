<?php 

function _getAllData($table_name) {

	$servername = _configGet("database.servername");
	$username = _configGet("database.username");
	$password = _configGet("database.password");
	$dbname = _configGet("database.dbname");

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$sql = "SELECT * FROM " . $table_name;
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		$return_result = mysqli_fetch_all($result, MYSQLI_ASSOC);
	} else {
		$return_result = null;
	}


	mysqli_close($conn);
	return $return_result;
}

function _getDataById($table_name, $id) {
	$servername = _configGet("database.servername");
	$username = _configGet("database.username");
	$password = _configGet("database.password");
	$dbname = _configGet("database.dbname");

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	// SELECT * FROM students WHERE id = 1;DROP TABLE students;

	$sql = "SELECT * FROM " . $table_name . " WHERE id = ?";

	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, $sql);
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);

	$return_result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

	mysqli_close($conn);
	return $return_result;	
}

?>
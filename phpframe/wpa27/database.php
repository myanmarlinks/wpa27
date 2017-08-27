<?php 

function _dbConnect() {

	$servername = _configGet("database.servername");
	$username = _configGet("database.username");
	$password = _configGet("database.password");
	$dbname = _configGet("database.dbname");

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	return $conn;

}


function _getAllData($table_name) {

	$conn = _dbConnect();

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
	
	$conn = _dbConnect();

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

function _getByIdWhere($table_name, array $query) {
		$conn = _dbConnect();

		$sql = "SELECT id FROM " . $table_name . 
				" WHERE ";
		$keys = array_keys($query);
		$values = array_values($query);

		if(count($keys) > 0) {
			foreach($keys as $k) {
				$sql .= $k . " = :". $k ." AND ";
			}
		} else {
			trigger_error("FOO", E_USER_ERROR);
		}

		$new_sql = substr($sql, 0, -4);



		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		$bind_key_string = "";
		foreach ($values as $v) {
			$type = gettype($v);
			switch ($type) {
				case 'integer':
					$bind_key_string .= "i";
					break;
				case 'string':
					$bind_key_string .= "s";
					break;
			}
		}

		
		// // mysqli_stmt_bind_param($stmt, "s", $password);

		mysqli_stmt_execute($stmt, $query);

		$return_result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

		return $return_result;
}





















?>
<?php 

function _dbConnect() {

	$servername = _configGet("database.servername");
	$username = _configGet("database.username");
	$password = _configGet("database.password");
	$dbname = _configGet("database.dbname");

	try {
		$conn = new PDO("mysql:host=$servername;dbname=" . $dbname, $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}

}


function _getAllData($table_name) {

	$conn = _dbConnect();

	$sql = "SELECT * FROM " . $table_name;
	$result = $conn->query($sql);

	if ($result->rowCount() > 0) {
		$return_result = $result->fetchAll(PDO::FETCH_ASSOC);
	} else {
		$return_result = null;
	}
	unset($conn);
	return $return_result;
}

function _getDataById($table_name, $id) {
	
	$conn = _dbConnect();


	$sql = "SELECT * FROM " . $table_name . " WHERE id = :id";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":id", $id);
	$stmt->execute();

	$return_result = $stmt->fetch(PDO::FETCH_ASSOC);

	unset($conn);
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

	$stmt = $conn->prepare($new_sql);

	$stmt->execute($query);
	$return_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	unset($conn);

	return $return_result;
}





















?>
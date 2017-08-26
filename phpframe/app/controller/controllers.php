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
	if(_is_logged_in()) {
		$data = [
		'foo'	=> 'Bar'
		];
		_load_view("index", $data);	
	}
}

function FooController($test) {
	$data = [
	'test'	=> $test
	];
	_load_view("test", $data);
}

function DataController() {
	$data = [
	'students' => _getAllData("students")
	];
	_load_view("data", $data);
}

function StudentController($id) {
	$data = [
	'student'	=> _getDataById("students", $id)
	];

	_load_view("student", $data);
}

function LoginController() {
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		session_start();

		$servername = _configGet("database.servername");
		$username = _configGet("database.username");
		$password = _configGet("database.password");
		$dbname = _configGet("database.dbname");

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$hash_pass = md5($password);


		$sql = "SELECT id FROM users WHERE email = ? AND password = ?";

		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, "ss", $email, $hash_pass);
		mysqli_stmt_execute($stmt);

		$return_result = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
		
		$count = count($return_result);

		if($count == 1) {
			
			$_SESSION['email'] = $email;

			header("location: home");
		}else {
			$error = "Your Login Name or Password is invalid";
		}
		mysqli_close($conn);
	}

	_load_view("login");
}

function LogoutController() {
	session_start();
   
   if(session_destroy()) {
      header("Location: login");
   }
}













?>
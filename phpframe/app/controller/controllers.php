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
	
	// if($_SERVER["REQUEST_METHOD"] == "POST") {

		// session_start();

		// $email = $_POST['email'];
		// $password = $_POST['password'];
		$email = "aung@gmail.com";
		$hash_pass = md5('123456');

		$return_result = _getByIdWhere('users', [
			'email' => $email, 
			'password' =>  $hash_pass]);

		
		$count = count($return_result);

		if($count == 1) {
			
			$_SESSION['email'] = $email;

			header("location: home");
		}else {
			$error = "Your Login Name or Password is invalid";
		}
		mysqli_close($conn);
	// }

	// _load_view("login");
}

function LogoutController() {
	session_start();
   
   if(session_destroy()) {
      header("Location: login");
   }
}













?>
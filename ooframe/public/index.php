<?php 

define("DD", realpath("../"));

// Singleton Pattern

$students = DB::table("students")->get(); // method chain
$classes = DB::table("classes")->get();
$products = DB::table("products")->get();

class DB {

	private static $_instance;

	public function __construct() {
		echo "Constructor! <br>";
	}

	public function __destruct() {
		echo "Destructor! <br>";
	}

	public static function table(string $table_name) {
		if(!self::$_instance instanceof DB) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	public function get() {
		echo "GETTER <br>";
	}


}

 ?>
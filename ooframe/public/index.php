<?php 

define("DD", realpath("../"));

// Singleton Pattern

$students = DB::table("students")->get(); // method chain
$student  = DB::table("students")->where(["id"=> 1])->get();
$users = DB::table("users")->get();
var_dump($students);
var_dump($student);
var_dump($users);
// $classes = DB::table("classes")->get();
// $products = DB::table("products")->get();

class DB extends PDO {

	private $engine; 
	private $host; 
	private $database; 
	private $user; 
	private $pass; 

	private static $_instance;
	private $table_name;
	private $where_statement = null;
	private $where_value = null;
	private $where_trigger = false;

	public function __construct(){ 
		echo "DB Object Constructed<br>";
		$this->engine = 'mysql'; 
		$this->host = 'localhost'; 
		$this->database = 'wpa27'; 
		$this->user = 'root'; 
		$this->pass = ''; 
		$dns = $this->engine.':dbname='.$this->database.";host=".$this->host; 
		parent::__construct( $dns, $this->user, $this->pass ); 
	}

	public function __destruct() {
		echo "Destructor! <br>";
	}

	public static function table(string $table_name) {
		if(!self::$_instance instanceof DB) {
			self::$_instance = new DB();
		}
		self::$_instance->table_name = $table_name;
		return self::$_instance;
	}

	public function where(array $where_data) {
		$this->where_trigger = true;
		$where_statement = " WHERE ";
		foreach ($where_data as $key => $value) {
			$where_statement .= $key . " = :" . $key . " AND ";
		}
		$result_statement = substr($where_statement, 0, -4);
		$this->where_statement = $result_statement;
		$this->where_value = $where_data;
		return $this;
	}

	public function get() {
		if($this->where_trigger == false) {
			$sql = "SELECT * FROM " . $this->table_name;
			$prep = $this->prepare($sql);
			$prep->execute();
			return $prep->fetchAll(PDO::FETCH_ASSOC);	
		} else {

			$sql = "SELECT * FROM " . $this->table_name . $this->where_statement;
			$prep = $this->prepare($sql);
			$prep->execute($this->where_value);
			$this->where_statement = null;
			$this->where_value = null;
			$this->where_trigger = false;
			return $prep->fetchAll(PDO::FETCH_ASSOC);	
		}
		
	}


}

?>
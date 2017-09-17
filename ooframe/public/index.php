<?php 

define("DD", realpath("../"));

// Singleton Pattern

$stu = [
	'name' => "Maung Maung",
	'address'	=> 'Pazuntaung',
	'email'	=> 'maung@gmail.com'
];
DB::table("students")->insert($stu);

$students = DB::table("students")->get(); 
$student  = DB::table("students")->where(["id"=> 1])->get();
$foo_students = DB::table("students")->select(['id', 'name'])->where(["id" => 1])->get();
$bar_students = DB::table("students")->select(["name"])->get();

$users = DB::table("users")->get();
var_dump($students);
var_dump($student);
var_dump($users);




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
	private $select_trigger = false;
	private $select_statement = null;

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

	public function select(array $select_data) {
		$this->select_trigger = true;
		$select_state = "";
		foreach($select_data as $data) {
			$select_state .= $data . ", ";
		}

		$sub_select = substr($select_state, 0, -2);
		$this->select_statement = $sub_select;
		return $this;
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
		if($this->select_trigger == true && $this->where_trigger == true) {
			$sql = "SELECT " . $this->select_statement . " FROM " . $this->table_name . $this->where_statement;

			$prep = $this->prepare($sql);
			$prep->execute($this->where_value);
			$this->setToDefault();
			return $prep->fetchAll(PDO::FETCH_ASSOC);	
		} elseif($this->select_trigger == true && $this->where_trigger == false) {
			$sql = "SELECT " . $this->select_statement . " FROM " . $this->table_name;
			$prep = $this->prepare($sql);
			$prep->execute();
			$this->setToDefault();
			return $prep->fetchAll(PDO::FETCH_ASSOC);	
		} elseif($this->select_trigger == false && $this->where_trigger == true) {
			$sql = "SELECT * FROM " . $this->table_name . $this->where_statement;
			$prep = $this->prepare($sql);
			$prep->execute($this->where_value);
			$this->setToDefault();
			return $prep->fetchAll(PDO::FETCH_ASSOC);	
		} else {
			$sql = "SELECT * FROM " . $this->table_name;
			$prep = $this->prepare($sql);
			$prep->execute();
			$this->setToDefault();
			return $prep->fetchAll(PDO::FETCH_ASSOC);				
		}
	}

	public function insert() {
		$args = func_get_args();
    	for($i=0; $i<count($args); $i++){
    		$arr = $args[$i];
			$this->columns = implode(",", array_keys($arr));
	    	$this->values = "'".implode("','", array_values($arr))."'";
	 		$sql = "insert into ".$this->table_name." (".$this->columns.") value (".$this->values.")";
	 		$this->exec($sql);
    	}
    	return $this;
	}

	private function setToDefault() {
		$this->where_statement = null;
		$this->where_value = null;
		$this->where_trigger = false;
		$this->select_statement = null;
		$this->select_trigger = false;
	}


}

?>
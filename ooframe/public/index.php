<?php 

define("DD", realpath("../"));

// Singleton Pattern

$students = DB::table("students")->get(); // method chain
$classes = DB::table("classes")->get();
$products = DB::table("products")->get();

class DB extends PDO {

	private $engine; 
    private $host; 
    private $database; 
    private $user; 
    private $pass; 

    private static $_instance;
    
    public function __construct(){ 
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
		return self::$_instance;
	}

	public function get() {
		var_dump($this);
	}


}

 ?>
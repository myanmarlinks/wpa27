<?php 
class Dog {
	public function __construct() {
		var_dump("DOG");
	}

	public function bark() {
		var_dump("BARK!");
	}
}

class Cat {
	public function __construct() {
		var_dump("CAT");
	}

	public function meow() {
		var_dump("MEOW!");
	}
}

Registry::add(new Dog(), "dog");
Registry::add(new Cat());

$dog = Registry::get("dog");
$dog->bark();


$dog2 = Registry::get("dog");
$dog2->bark();


$cat = Registry::get("cat");
$cat->meow();
class Registry  {

	static private $_store = array();
	
	static public function add($object, $name = null)
	{	
		var_dump(get_class($object));
		$name = is_null($name) ? get_class($object) : $name;

		$name = strtolower($name);

		$return = null;
		if (isset(self::$_store[$name])) {
			$return = self::$_store[$name];
		}

		self::$_store[$name]= $object;
		return $return;
	}
	
	static public function get($name)
	{
		if (!self::contains($name)) {
			throw new Exception("Object does not exist in registry");
		}

		return self::$_store[$name];
	}


	static public function contains($name)
	{
		if (!isset(self::$_store[$name])) {
			return false;
		}

		return true;
	}

	static public function remove($name)
	{
		if (self::contains($name)) {
			unset(self::$_store[$name]);
		}
	}

}

 ?>
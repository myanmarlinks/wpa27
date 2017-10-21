<?php 


class Animal {
	public function eat() {
		var_dump("EATING");
	}
}

trait Foo {
	public $name = "Aung Net";

	public function __call($name, $arguments) {
		var_dump($name);
		var_dump($arguments);
	}

	public function __construct() {
		var_dump("Foo Constructor!");
	}
	public function bar() {
		var_dump("BAR");
	}
}

class Dog extends Animal {
	use Foo;

}

$dog = new Dog();
$dog->eat();
$dog->bar();
echo $dog->name;

$dog2 = new Dog();
$dog2->bar();
$dog2->sleep("very good");



 ?>
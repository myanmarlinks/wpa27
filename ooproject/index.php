<?php 

interface DogContract {
	public function dance();
	public function howl();
}

interface BullDogContract {
	public function bark();
}

 abstract class Animal {
	public $name;

	public function __construct($name) {
		$this->name = $name;
	}

	public function __destruct() {
		var_dump("DESTRUCT!");
	}

	public function run($act) {
		var_dump("DOG " . $act);
	}
	public function eat($thing) {
		var_dump("DOG EAT " . $thing);
	}
}

class Dog extends Animal implements DogContract, BullDogContract {

	private $data = [];

	public function __construct($name) {
		parent::__construct($name);
	} 

	public function dance() {
		var_dump("Dog Dance!");
	}

	public function __set($key, $value) {
		$this->data[$key] = $value;
	}

	public function __get($key)	{
		return $this->data[$key];
	}

	public function __call($name, $arguments) {
		var_dump($name);
		var_dump($arguments);
	}

	public static function __callStatic($name, $arguments) {
		var_dump($name);
		var_dump($arguments);	
	}

	public function howl() {
		var_dump("HOWL!");
	}

	public static function warning() {
		var_dump("WARNING!");
	}

	public function bark() {
		var_dump("BARK!");
	}

}


class Cat extends Animal {
	public function __construct($name) {
		parent::__construct($name);
	}

	public function meow() {
		var_dump("MEOW!");
	}
}

Dog::warning();
Dog::teasing("GOO");

$dog = new Dog("Aung Net");
$dog->color = "red";
var_dump($dog->color);

$dog->boo("WOO");

var_dump($dog->name);
$dog->run("FAST");
$dog->eat("BONE");
$dog->dance();
$dogTwo = new Dog("Puppy");
$dogTwo->eat("RICE");
 ?>
 <script>
 	function Dog(dogName) {
 		this.dogName = dogName,
 		this.color = "BLACK",
 		this.run = function(act) {
 			console.log("DOG " + act);
 		},
 		this.eat = function(thing) {
 			console.log("DOG EAT " + thing);
 		}
 	};

 	// no destructor
 	// no abstract class
 	// no interface

 	var dog = new Dog("Aung Net")
 	console.log(dog.dogName)
 	dog.run("FAST")
 	dog.eat("BONE")

 	class Animal {
 		constructor(name) {
 			this.name = name
 		}

 		run(act) {
 			console.log("Foo " + act)
 		}
 		eat(thing) {
 			console.log("Bar " + thing)
 		}

 	}

 	class Cat extends Animal {
		constructor(name) {
			super(name)
		}

		static foo() {
 			console.log("FOO")
 		}

		dance() {
			console.log("DANCE")
		} 		
 	}

 	Cat.foo() // static method

 	var cat = new Cat("Shwe War")
 	cat.color = "Black"
 	cat.boo = function(sound) {
 		console.log(sound)
 	}

 	cat.boo("WOO")
 	console.log(cat.color)
 	console.log(cat.name)
 	cat.run("FAST")
 	cat.eat("FISH")
 	cat.dance()
 	cat = null

















 </script>
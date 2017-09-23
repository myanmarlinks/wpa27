<?php 

require "vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('name');
$log->pushHandler(new StreamHandler(__DIR__ .'/log/project.log', Logger::WARNING));
$log->addWarning('You site has been under attacked!');

$dog = new Dog();
$cat = new Cat();

dump($dog, true);

 ?>
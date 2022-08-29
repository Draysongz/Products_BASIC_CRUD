<?php

require_once 'Person.php';
require_once 'Student.php';



// $p= new Person('Brad', 'traversy');
// $p2= new Person('Ayomide', 'Gidigbi');



// echo '<pre>';
// var_dump($p). '<br>';
// echo '</pre>';

// echo $p->getAge();
// echo Person::$counter;

$student= new Student('John', 'Brad', '123');
echo '<pre>';
var_dump($student). '<br>';
echo '</pre>'

?>
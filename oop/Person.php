<?php

class Person{
    public  $name;
    public  $surname;
    private  $age;
    public static $counter;

    #constructors in php
    public function __construct($name, $surname){
        echo $name .' '.$surname. '<br>';
        $this->name= $name;
        $this->surname= $surname;
        self::$counter++;
    }

    #setters(setting values for private properties)
    public function setAge($age){
        $this->age= $age;
    }

    #getters(getting values for private properties)
    public function getAge(){
        return $this->age;
    }

    public static function getCounter(){
        return self::$counter;
    }
}




?>
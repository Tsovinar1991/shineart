<?php

require_once "person.php";


$person = new Person("Someone", "Grigoryan", "26");
echo $person->SetName("Tsovinar");
echo "<pre>";
var_dump($person);
echo "</pre>";







/*

class Person {


    public $firstname;
    public $lastname;
    public  $birth_date;
    public $age;

    public function __construct($a,$b,$c)
    {
        $this->firstname = $a;
        $this->lastname = $b;
        $this->birth_date = $c;

    }

    public function getFirstName(){
        return $this->firstname;
    }

    public function setFirstName($new_name){
        $this->firstname = $new_name;

    }

    public function getAge(){
        $today = date("Y-m-d");
        $diff = date_diff(date_create($this->birth_date), date_create($today));


        $this->age =  $diff->format('%y');
    }




}


$obj = new Person('poxos','poxosyan','2014-01-01');

echo "<pre>";
print_r($obj);

$obj->setFirstName('petros');

echo"<pre>";
print_r($obj);

$age = $obj->getAge();
echo"<pre>";print_r($obj);




*/
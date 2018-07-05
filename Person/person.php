<?php
class Person{
    public $name;
    public $surname;
    public $age;



    public function __construct($a,$b,$c)
    {
        $this->name = $a;
        $this->surname = $b;
        $this->age = $c;

    }


    public function getName(){
        return $this->name;
    }

    public function SetName($name){
       $this->name=$name;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function SetSurname($surname){
         $this->surname=$surname;
    }

    public function getAge(){
        return $this->age;
    }

    public function SetAge($age){
         $this->age=$age;
    }

}


//STEXCEL STUDENT CLASS VOR@ KJARANGI PERSONI HATKUTYUNNER EV KUNENA EVS EREQ  HATKUTYUN U METOD

//set and get superglobals



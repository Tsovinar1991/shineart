<?php
require "person.php";

class User extends Person{
    public $gender;
    public $address;
    public $email;


    public function __construct($a,$b,$c, $d, $e, $f)
    {
        parent::__construct($a, $b, $c);
        $this->gender = $d;
        $this->address = $e;
        $this->email = $f;

    }

    public function setGender($gender){
        $this->gender = $gender;
    }

    public function getGender(){
        return $this->gender;
    }

    public function setAddress($address){
        $this->address = $address;
    }

    public function getAddress(){
        return $this->address;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail($email){
        return $this->$email;
    }



}
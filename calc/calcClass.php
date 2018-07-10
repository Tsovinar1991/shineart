<?php

//MariaDB
//SqL- also lern

//MySQL-n e petq sovorel

//MySQLI and PDO- learn



//mysql user// mysql server

//username -root, password = "  "  , host = localhost

//3306-mysqle port

//amen bazayi hamar stexcel user, ayd user@ inch karox e anel
//mysqli tiper

//varchar(255), text (mec texteri hamar) hamarya nuin banern en   (text@ mec info- hamar e petq )
//50 simvol name-i hamar, ete inch vor ban vstah ches varchar(255)


//primery-key forin tarberakner@ nayel


// distinct mysql hraman - chkrknvox informaci
//Normalizacia
//Join haskacoxutyun
// Sql fail@ import anel uxarkel





class Numbers {
    public $num_1;
    public $num_2;

//    public function __construct($x,$y)
//    {
//        $this->num_1 = $x;
//        $this->num_2 = $y;
//    }

    public function GetSum(){
        return  $this->num_1 + $this->num_2;
    }
    public function Getmultiplicat(){
        return $this->num_1 * $this->num_2;
    }
    public function Getdevision(){
        return $this->num_1 / $this->num_2;
    }
    public function Getsubstraction(){
        return $this->num_1 - $this->num_2;
    }
    public function CompareNums(){
        if($this->num_1 > $this->num_2){
            return $this->num_1;
        }
        else{
            return $this->num_2;
        }

    }
}

$add = new Numbers();
//$add = new Numbers(50, 15);
$add->num_1 = (rand(10,1000));
$add->num_2 = (rand(10,1000));
echo "<pre>";
var_dump($add);
echo "</pre>";

echo "Addition result is: " . $add->GetSum();
echo "<br>";
echo "Multiplication result is: " . $add->Getmultiplicat();
echo "<br>";
echo "Substraction result is: " . $add->Getsubstraction();
echo "<br>";
echo "Devision result is: " . $add->Getdevision();
echo "<br>";
echo "Comparision result is: " . $add->CompareNums();











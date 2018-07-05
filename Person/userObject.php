<?php
require_once "user.php";
$user = new User("Art", "V_yan", "30","male", "Gyumri", "something@mail.ru");
$user->setEmail("tsovinar.grigoryan@mail.ru");
echo "<pre>";
var_dump($user);
echo "</pre>";



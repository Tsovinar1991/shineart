<?php


class url_managment
{

public static function run(){


   $params = explode('/',$_SERVER['REQUEST_URI']);

    $controller = $params[1].'Controller';

    $action = $params[2];
    $arrAction = explode('?',$action);




    if(isset($arrAction[1])){
        $action = $arrAction[0];
    }

    if($params[2] == ""){
        $action = 'index';
    }
/*

    if(isset($controller)) {
        require "controller/" . $controller . ".php";
    }
    else{
        echo "controller part is nor included";
    }

    var_dump($controller);


   $cobj = new $controller();
    $cobj->$action();
*/


    echo " i am running";

}

}
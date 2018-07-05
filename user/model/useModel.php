<?php

/**
 * Created by PhpStorm.
 * User: Sasha Stepanyaan
 * Date: 6/30/2018
 * Time: 5:28 PM
 */
class useModel
{
 function getUserData($id){
     $arrUsers = $this->getUserList();

     return $arrUsers[$id];
 }
    function getUserList(){
        return [
           [

               'name'=>'Sergey',
               'last_name'=>'Galstyan'
           ],
            [

                'name'=>'Anna',
                'last_name'=>'Grigoryan'
            ],


        ];
    }
}
<?php
require '../model/useModel.php';
/**
 * Created by PhpStorm.
 * User: Sasha Stepanyaan
 * Date: 6/30/2018
 * Time: 5:08 PM
 */
class userController
{

    public function index(){
        $objUser = new useModel();
        $arrUser = $objUser->getUserList();
        include '../view/user/index.php';
    }
    public function view(){
         $objUser = new useModel();
         $userData = $objUser->getUserData($_GET['id']);
        include '../view/user/view.php';
    }


}
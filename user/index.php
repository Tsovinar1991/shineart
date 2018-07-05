<?php
require 'config/url_managment.php';
url_managment::run();


function debug($par){
    echo "<pre>";
    var_dump($par);
    echo"<pre>";
    exit();
}

$url = new url_managment;




var_dump( DIRECTORY_SEPARATOR);
var_dump( getcwd());
var_dump(PHP_EOL);
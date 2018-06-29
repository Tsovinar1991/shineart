<?php

class Framework
{
    public static function run()
    {
        echo "runTest()";


        self::init();
        self::autoload();
        self::dispatch();
    }


    private static function init()
    {
        define("DS", DIRECTORY_SEPARATOR);
        define("ROOT", getcwd() . DS);
        define("APP_PATH", ROOT . "application" . DS);
        define("FRAMEWORK_PATH", ROOT . "framework" . DS);
        define("PUBLIC_PATH", ROOT . "public" . DS);


        define("CONFIG_PATH", APP_PATH . "config" . DS);
        define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
        define("MODEL_PATH", APP_PATH . "models" . DS);
        define("VIEW_PATH", APP_PATH . "view" . DS);

        define("CORE_PATH", FRAMEWORK_PATH . "core" . DS);
        define("DB_PATH", FRAMEWORK_PATH . "database" . DS);
        define("HELPER_PATH", FRAMEWORK_PATH . "helpers" . DS);
        define("LIB_PATH", FRAMEWORK_PATH . "libraries" . DS);
        define("UPLOAD_PATH", PUBLIC_PATH . "uploads" . DS);


        define("PLATFORM", isset($_REQUEST['p']) ? $_REQUEST['p'] : 'home');
        define("CONTROLLER", isset($_REQUEST['c']) ? $_REQUEST['c'] : 'Main');
        define("ACTION", ISSET($_REQUEST['a']) ? $_REQUEST['a'] : 'main');


        define("CURR_CONTROLLER_PATH", CONTROLLER_PATH . PLATFORM . DS);
        define("CURR_VIEW_PATH", VIEW_PATH . PLATFORM . DS);


        require CORE_PATH . "Controller.class.php";

        require CORE_PATH . "Loader.class.php";

        require DB_PATH . "Mysql.class.php";

        require CORE_PATH . "Model.class.php";




        $GLOBALS['config'] = include CONFIG_PATH . "config.php";//again


        session_start();





    }







    private static function autoload()
    {
        spl_autoload_register(array(__CLASS__, 'load'));
    }

    private static function load($classname)
    {
        if (substr($classname, -10) == "Controller") {
            require_once CURR_CONTROLLER_PATH . "$classname.class.php";
        } elseif (substr($classname, -5) == "Model") {
            require_once CURR_CONTROLLER_PATH . "$classname.class.php";
        }
    }






    private static function dispatch()
    {
       $controller_name = CONTROLLER . "Controller";
       $action_name = ACTION . "Action";
       $controller = new $controller_name;
       $controller->$action_name;
    }


}


?>
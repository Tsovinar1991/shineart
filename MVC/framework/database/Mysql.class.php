<?php

class Mysql
{

    protected $conn = false;
    protected $sql;


    public function __construct($config = array())
    {
        $host = isset($config['host']) ? $config['host'] : 'localhost';
        $user = isset($config['user']) ? $config['user'] : 'root';
        $password = isset($config['password']) ? $config['password'] : '';
        $dbname = isset($config['dbname']) ? $config['dbname'] : '';
        $port = isset($config['port']) ? $config['port'] : '3306';
        $charset = isset($config['charset']) ? $config['charset'] : '3306';


        $this->conn = mysqli_connect("$host:$port", $user, $password) or die('Database connection error.');
        mysql_select_db($dbname) or die('Database selection error');
        $this->setChar($charset);
    }


    private function setChar($charest)
    {
        $sql = 'set names' . $charest;
        $this->query($sql);
    }

    public function query($sql)
    {
        $this->sql = $sql;
        $str = $sql . " [" . date("Y-m-d h:i:s") . "]" . PHP_EOL;
        file_put_contents("log.txt", $str, FILE_APPEND);
        $result = mysql_query($this->sql, $this->conn);
        if (!$result) {
            die($this->errno() . ':' . $this->error() . '<br/> Error SQL statment is ' . $this->sql . '<br />');
        }
        return $result;
    }


    public function getOne($sql)
    {
        $result = $this->query($sql);
        $row = mysql_fetch_row($result);
        if ($row) {
            return $row[0];
        } else {
            return false;
        }
    }


    public function getRow($sql)
    {
        if ($result = $this->query($sql)) {
            $row = mysql_fetch_assoc($result);
            return $row;
        } else {
            return false;
        }
    }

    public function getAll($sql)
    {
        $result = $this->query($sql);
        $list = [];
        while ($row = mysql_fetch_assoc($sql)) {
            $list[] = $row;
        }
        return $list;
    }
    public function getCol($sql){
        $result = $this->query($sql);
        $list = [];
        while($row = mysql_fetch_row($result)){
            return $list[]= $row[0];
        }
        return $list;
}

    public function errno(){
        return mysql_errno($this->conn);
    }

    public function error(){
        return mysql_error($this->conn);
    }




}






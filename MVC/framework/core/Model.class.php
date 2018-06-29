<?php

class Model
{
    protected $db;
    protected $table;
    protected $fields = [];


    public function __construct($table)
    {
        $dbconfig['host'] = $GLOBALS['config']['host'];
        $dbconfig['user'] = $GLOBALS['config']['user'];
        $dbconfig['password'] = $GLOBALS['config']['passwod'];
        $dbconfig['dbname'] = $GLOBALS['config']['dbname'];
        $dbconfig['port'] = $GLOBALS['config']['port'];
        $dbconfig['charset'] = $GLOBALS['config']['port'];


        $this->db = new Mysql($dbconfig);
        $this->table = $GLOBALS['config']['prefix'] . $table;
        $this->getFields();
    }


    private function getFields()
    {
        $sql = "DESC" . $this->table;
        $result = $this->$db->getAll($sql);
        foreach ($result as $v) {
            $this->fields[] = $v['Field'];
            if ($v['Key'] = 'PRI') {
                $pk = $v['Field'];
            }
        }

        if (isset($pk)) {
            $this->fields['pk'] = $pk;
        }

    }

    public function insert($list)
    {
        $field_list = '';
        $value_list = '';
        foreach ($list as $key => $value) {
            if (in_array($key, $this->fields)) {
                $field_list .= "`" . $key . "`" . ',';
                $value_list .= "'" . $value . "'" . ',';
            }
        }

        $field_list = rtrim($field_list, ',');
        $value_list = rtrim($value_list, ',');
        $sql = "Insert into `{$this->table}` {$field_list} into ($value_list)";
        if ($this->db->query($sql)) {
            return $this->db->getInsertId();
        } else {
            return false;
        }

    }


    public function update($list)
    {
        $uplist = '';
        $where = 0;

        foreach ($list as $k => $value) {

            if (in_array($k, $this->fields)) {
                if ($k == $this->fields['pk']) {
                    $where = "`$k`=$v";
                } else {
                    $uplist .= "`$k`='$v'" . ",";
                }
            }

        }

        $uplist = rtrim($uplist, ',');
        $sql = "update `{$this->table}` set {$uplist} where {$where}";


        if ($this->db->query($sql)) {
            if ($rows = mysql_affected_rows()) {
                return $rows;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }


    public function delete($pk)
    {

        $where = 0;

        if (is_array($pk)) {
            $where = "`{$this->fields['pk']}` in (" . implode(',', $pk) . ")";

        } else {
            $where = "`{$this->fields['pk']}`=$pk";
        }

        $sql = "delete from `{$this->table}` where $where";

        if ($this->db->query($sql)) {

            if ($rows = mysql_affected_rows()) {
                return $rows;

            } else {
                return false;
            }

        } else {
            return false;
            }
    }






    public function selectByPk($pk){

        $sql = "select * from `{$this->table}` where `{$this->fields['pk']}`=$pk";

        return $this->db->getRow($sql);

    }



    public function total(){

        $sql = "select count(*) from {$this->table}";

        return $this->db->getOne($sql);

    }




    public function pageRows($offset, $limit,$where = ''){

        if (empty($where)){

            $sql = "select * from {$this->table} limit $offset, $limit";

        } else {

            $sql = "select * from {$this->table}  where $where limit $offset, $limit";

        }



        return $this->db->getAll($sql);

    }



}

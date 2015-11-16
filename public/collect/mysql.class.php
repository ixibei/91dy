<?php
class mysql {
    public $dbhost = '';
    public $passwd = '';
    public $user = '';
    public $dbname = '';
    public $link = false;
    public $lastsql;

    public function __construct($dbhost, $user, $passwd,$table) {
        $this->dbhost = $dbhost;
        $this->user = $user;
        $this->passwd = $passwd;
        $this->run();
        $this->settable($table);
    }

    public function run() {
        $this->link = @mysql_connect($this->dbhost, $this->user, $this->passwd);
        if (!$this->link) die('cant connect mysql');
        mysql_query('set names utf8');
    }

    public function settable($table) {
        $select_table = mysql_select_db($table, $this->link);
        if (!$select_table) die('没有' . $table . '这个表');
    }

    public function query($sql) {
        $this->lastsql = $sql;
        $query = mysql_query($sql);
        if ($query) return $query;
        return false;

    }

    public function fetch_assoc($sql) {
        $this->lastsql = $sql;
        $query = $this->query($sql);
        if ($query) {
            $data = array();
            while ($result = mysql_fetch_assoc($query)) {
                $data[] = $result;
            }
            return $data;
        }
        return false;
    }

    public function fetch_row($sql) {
        $this->lastsql = $sql;
        $query = $this->query($sql);
        if ($query) {
            $data = array();
            while ($result = mysql_fetch_row($query)) {
                $data[] = $result;
            }
            return $data;
        }
        return false;
    }

    public function get_one($sql) {
        $query = $this->query($sql);
        if ($query) {
            $result = mysql_fetch_assoc($query);
            return $result;
        }
        return false;
    }

    public function getLastId(){
        if(function_exists('msyql_insert_id')){
            $id = msyql_insert_id();
        } else{
            $ids = $this->get_one("select last_insert_id() as id");
            $id = $ids['id'];
        }
        return $id;
    }

}
?>
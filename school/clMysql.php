<?php

//include $_SERVER['DOCUMENT_ROOT'] . '/ChromePhp.php';

//Класс для управления Mysql базой данных.
class clMysql
{
    var $DBHost, $DBLogin, $DBPass, $DBBase, $DBPort, $conn;

    function __construct()
    {
        $this->DBHost = 'mysql';
        $this->DBLogin = getenv('MYSQL_USER');
        $this->DBPass = getenv('MYSQL_PASSWORD');
        $this->DBBase = getenv('MYSQL_DATABASE');
        $this->DBPort = getenv('MYSQL_PORT');

        $this->conn = new mysqli('mysql', getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'),
            getenv('MYSQL_DATABASE'), getenv('MYSQL_PORT'));
        if ($this->conn->connect_error) {
            die("Ошибка соединения: " . $this->conn->connect_error);
        }
    }

    function _link($newLink = false)
    {
        static $link;
        if ($newLink) $link = $newLink;
        return $link;
    }

    function _fixSql($args)
    {
        $sql = array_shift($args);
        if (count($args)) {
            $data = array_map(array('clMysql', 'esc'), $args);
            $sql = str_replace(array('%', '?'), array('%%', '%s'), $sql);
            $sql = vsprintf($sql, $data);
        }
        return $sql;
    }

    function _error($errMsg, $sql = '')
    {
        $str = '<br /><b>' . $errMsg . '</b>: <tt>' . mysql_error() . '</tt>';
        if ($sql) $str .= '  [' . $sql . ']';
        die($str);
    }

    function count($increment = false)
    {
        static $count = 0;
        if ($increment) $count++;
        return $count;
    }

    function connect()
    {
        mysqli_query($this->conn, "SET NAMES 'utf8'");
        mysqli_query($this->conn, "SET CHARACTER SET 'utf8'");
        mysqli_query($this->conn, "SET character_set_results = 'utf8', 
                                             character_set_client = 'utf8', 
                                             character_set_connection = 'utf8', 
                                             character_set_database = 'utf8', 
                                             character_set_server = 'utf8'");
    }

    function disconnect()
    {
        mysql_close(clMysql::_link());
    }

    function query($query)
    {
        return mysqli_query($this->conn, $query);
    }

    function esc($str)
    {
        return addslashes(stripslashes($str));
    }

    function ConnectedDefaultBase()
    {
        $this->connect($this->DBHost, $this->DBLogin, $this->DBPass, $this->DBBase, $this->DBPort);
    }
}

class mysqlResultSet
{

    var $q;

    function mysqlResultSet($query)
    {
        $this->q = $query;
    }

    function getRow()
    {
        return mysql_fetch_object($this->q);
    }

    function getVar()
    {
        return ($row = mysql_fetch_row($this->q)) ? $row[0] : false;
    }

    function getVarPar($par)
    {
        return ($row = mysql_fetch_row($this->q)) ? $row[$par] : false;
    }

    function getVarArray()
    {
        return ($row = mysql_fetch_row($this->q)) ? $row : false;
    }

    function getAll()
    {
        $all = false;
        while ($row = $this->getRow()) $all[] = $row;
        return $all;
    }

    function getCol()
    {
        $col = false;
        while ($var = $this->getVar()) $col[] = $var;
        return $col;
    }

    function rowCount()
    {
        return mysql_num_rows($this->q);
    }

    function insertId()
    {
        return mysql_insert_id($this->q);
    }
}

?>
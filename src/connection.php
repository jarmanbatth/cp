<?php

class database {

    public $con;

    public function __construct() {
        $this->con = mysqli_connect("localhost", "root", 'root', "cardprint") or die("could not connect to server");
    }

    public function fetchData($table_name, $field = '*', $condition = '', $limit = '') {

        $query = "select " . $field . " from " . $table_name;
        if ($condition) {
            $query .= ' where ' . $condition;
        }
        if ($limit) {
            $query .= ' limit ' . $limit;
        }
       
       
        $result = mysqli_query($this->con, $query) or die('error in query');        
        $returnData = array();        
        while ($row = mysqli_fetch_assoc($result)) {
            $returnData[] = $row;
        }
        return $returnData;
    }

    public function query($query) {
        $result = mysqli_query($this->con, $query);        
        $returnData = array();
        
        while ($row = mysqli_fetch_array($result)) {
            $returnData[] = $row;
        }
        return $returnData;
        
    }

    public function insertData($table_name, $data) {
        //$con = getDBConnection();
        $columnNames = implode(',', array_keys($data));
        $columnValues = implode("','", $data);
        $values = "'" . $columnValues . "'";
        $query = 'INSERT INTO ' . $table_name . '(' . $columnNames . ') VALUES ( ' . $values . ')';
        mysqli_query($this->con, $query);
    }

    public function updateData($table_name, $field, $condition) {
        //$con = getDBConnection();
        $query = "update " . $table_name . " set " . $field . ' where ' . $condition;
        mysqli_query($this->con, $query);
        return;
    }

    public function deleteData($table_name, $condition) {
        $query = "delete from " . $table_name . ' where ' . $condition;
        mysqli_query($this->con, $query);
        return;
    }

    
    
    public function errorMessage() {

        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
            echo "<span style='color:red;'>" . $_SESSION['error'] . "</span>";
            unset($_SESSION['error']);
        }
    }

}

function debug($data = '', $die = false) {
    echo "<pre>";
    print_r($data);

    if ($die) {
        die;
    }
    echo "</pre>";
}

?>
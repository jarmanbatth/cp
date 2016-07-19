<?php

require 'include.php';

class EmployeeClass extends database {

    public function __construct() {
        parent::__construct();
    }

    public function addEmployee($values) {
        $this->insertData('employees', $values);
    }

    public function updateEmployee($field, $id) {
        return $this->updateData('employees', $field, "id='" . $id . "'");
    }

    public function deleteEmployee($id) {
        return $this->deleteData('employees', "id='" . $id . "'");
    }

    public function getEmployeeDataById($user_id) {
        $conditions = 'id = ' . $user_id;
        return $this->fetchData('employees', '*', $conditions)[0];
    }

    public function getEmployeeDataByEmail($email) {
        $conditions = 'email = "' . $email . '" AND status=1';
        return $this->fetchData('employees', '*', $conditions)[0];
    }

    public function checkEmployee($email) {
        $q = ("SELECT * FROM `employees`");
        $result = mysqli_query($this->con, $q);
        $flag = 0;
        while ($row = mysqli_fetch_array($result)) {
            if (strtoupper($row['email']) == strtoupper($email)) {
                $flag = 1;
                return $flag;
            }
        }
    }

    public function checkPassword($email, $old_pass) {
        $q = ("SELECT * FROM `employees`");
        $result = mysqli_query($this->con, $q);
        $flag = 0;
        while ($row = mysqli_fetch_array($result)) {
            if ($email == $row['email'] && $old_pass == $row['password']) {
                $flag = 1;
                return $flag;
            }
        }
    }

    public function listingEmployees($conditions = null, $fields = null, $limit = null) {
        return $this->fetchData('employees');
    }

    public function editEmployees($id) {
        $rows = $this->fetchData('employees', '*', "id='" . $id . "'");
        return $rows[0];
    }

    public function getUsersListArray($conditions = null, $fields = array('id', 'name'), $limit = null) {
        //return $this->fetchData('users', implode(',',$fields), );
        
       array('id' => 'name');
    }

}

?>

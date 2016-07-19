<?php

require 'include.php';

class UserClass extends database {

    public function __construct() {
        parent::__construct();
    }

    public function addUser($values) {
        $this->insertData('users', $values);
    }

    public function updateUser($field, $id) {
        return $this->updateData('users', $field, "id='" . $id . "'");
    }

    public function deleteUser($id) {
        return $this->deleteData('users', "id='" . $id . "'");
    }

    public function getUserDataById($user_id) {
        $conditions = 'id = ' . $user_id;
        return $this->fetchData('users', '*', $conditions)[0];
    }

    public function getUserDataByEmail($email) {
        $conditions = 'email = "' . $email . '"';
        return $this->fetchData('users', '*', $conditions)[0];
    }

    public function checkUser($email) {
        $q = ("SELECT * FROM `users`");
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
        $q = ("SELECT * FROM `users`");
        $result = mysqli_query($this->con, $q);
        $flag = 0;
        while ($row = mysqli_fetch_array($result)) {
            if ($email == $row['email'] && $old_pass == $row['password']) {
                $flag = 1;
                return $flag;
            }
        }
    }

    public function listingUsers($conditions = null, $fields = null, $limit = null) {
        return $this->fetchData('users');
    }

    public function editUsers($id) {
        $rows = $this->fetchData('users', '*', "id='" . $id . "'");
        return $rows[0];
    }

    public function getUsersListArray($conditions = null, $fields = array('id', 'name'), $limit = null) {
        //return $this->fetchData('users', implode(',',$fields), );
        
       array('id' => 'name');
    }

}

?>

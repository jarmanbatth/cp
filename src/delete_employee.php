<?php
require 'include.php';
include 'EmployeeClass.php';
$id=$_REQUEST['q'];
$Employee = new EmployeeClass();
$Employee ->deleteEmployee($id);
//$query="delete from `admin` where id='".$id."'";
//mysqli_query($con,$query);
header("location: employees.php");
?>

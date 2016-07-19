<?php
require 'include.php';
include 'UserClass.php';
$id=$_REQUEST['q'];
$User = new UserClass();
$User ->deleteUser($id);
//$query="delete from `admin` where id='".$id."'";
//mysqli_query($con,$query);
header("location: users.php");
?>

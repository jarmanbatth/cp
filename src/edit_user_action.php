<?php
require 'include.php';
include 'UserClass.php';
//echo 'fdfsdfsd';
//print_r($_POST);exit;

$name = ucwords(trim($_POST['name']));
$email = trim($_POST['email']);
$status = trim($_POST['status']);
$id=$_POST['id'];
$field = "name='".$name."',status='".$status."'";
//$id = "id='".$id."'";
$User = new UserClass();
$User -> updateUser($field,$id);

//$query="update admin set first_name='".$f_name."',last_name='".$l_name."'where id='".$id."'";
//mysqli_query($con, $query); 

/*$query = "update employee set ";
foreach($_POST as $k => $post){
    $query.= $k.'="'.$post.'", ';
}
$query = substr($query,0, -8);
$query.= ' where company_id= "'.$id.'"';
echo $query;*/

$_SESSION['update_message'] = 'Employee Details Updated successfully';
header("location: users.php");

?>
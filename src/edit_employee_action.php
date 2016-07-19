<?php
require 'include.php';
include 'EmployeeClass.php';
//echo 'fdfsdfsd';
//print_r($_POST);exit;
    $templateId = $_POST['template_id'];
    $firstName = ucwords(trim($_POST['first_name']));
    $middleName = trim($_POST['middle_name']);
    $lastName = ucwords(trim($_POST['last_name']));
    $designation = ucwords(trim($_POST['designation']));
    $email = trim($_POST['email']);
    $deskNumber = trim($_POST['phone1']);
    $mobileNumber = trim($_POST['phone2']);
    $faxNumber = trim($_POST['fax']);
    $status = trim($_POST['status']);
    $id=$_POST['id'];
    $field = "first_name='".$firstName."',middle_name='".$middleName."',last_name='".$lastName."',designation='".$designation."',"
            . "phone1='".$deskNumber."',phone2='".$mobileNumber."',fax='".$faxNumber."',template_id='".$templateId."',status='".$status."'";
//$id = "id='".$id."'";
$Employee = new EmployeeClass();
$Employee ->updateEmployee($field,$id);

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
header("location: employees.php");

?>
<?php
require 'include.php';
include 'TemplateClass.php';
//echo 'fdfsdfsd';
//print_r($_POST);exit;

$temp_name = ucwords(trim($_POST['template_name']));
$temp_design = trim($_POST['design']);
$status = $_POST['status'];
$id=$_POST['id'];
$field = "template_name='".$temp_name."',design='".$temp_design."',status='".$status."'";
//$id = "id='".$id."'";
$Template = new TemplateClass();
$Template -> updateTemplate($field,$id);

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
header("location: templates.php");

?>
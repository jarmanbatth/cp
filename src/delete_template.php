<?php
require 'include.php';
include 'TemplateClass.php';
$id=$_REQUEST['q'];
$Template = new TemplateClass();
$Template ->deleteTemplate($id);
//$query="delete from `admin` where id='".$id."'";
//mysqli_query($con,$query);
header("location: templates.php");
?>

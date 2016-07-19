<?php
require 'include.php';
include 'UserClass.php';
$id = $_POST['id'];
$email = $_POST['email'];
$old_pass = $_POST['old_password'];
$new_pass = $_POST['new_password'];
$con_pass = $_POST['confirm_password'];

$User = new UserClass;
$flag = $User->checkPassword($email,$old_pass);


//$query="select * from admin";
//$result=mysqli_query($con,$query);
//$flag=0;
//while($row=mysqli_fetch_array($result))
//{
//    if($email==$row['email'] && $old_pass==$row['password'])
//    {
//        $flag=1;
//        break;
//    }
//}
if($flag==1)
{
    if($new_pass == $con_pass)
    {
        $field = "password='".$new_pass."'";
        $User = new UserClass();
        $User ->updateUser($field,$id);

//        $query="update `employee` set password='".$new_pass."' where email='".$email."'";
//        mysqli_query($con,$query);
        $_SESSION['pass_message'] = 'Password changed successfully please relogin with new password';
        header("location: login.php");
    }
    else
    {
        $_SESSION['pass_error'] = '* Password and Confirm password doesnot matches ';
        header("location: change_password.php");
    }
}
else
{
    $_SESSION['pass_error1'] = '* Email and old password does not matches ';
    header("location: change_password.php");
}

?>

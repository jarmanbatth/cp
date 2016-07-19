<?php
require 'include.php';
require 'UserClass.php';
$id=$_REQUEST['q'];
$User = new UserClass();
$row = $User->editUsers($id);
//$query="select * from admin where id='".$id."'";
//$result=mysqli_query($con,$query);
//$row=mysqli_fetch_array($result);
include "header.php";
?>
<body>
    <form action="edit_user_action.php" method="post">

    <h1>Edit User Details</h1>

    <fieldset>
        <legend> Basic Information</legend><br>
        
        <input type="hidden" name="id" required value="<?php echo $row['id']?>">
           
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required value="<?php echo $row['name'] ?>">

        <label for="email">Email:</label>
        <input type="email" id="mail" name="email" readonly="" required value="<?php echo $row['email'];  ?>">
        
<!--        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required value="<?php echo $row['status'];?>">-->
         <label for="status">Status:</label>
            <select id="name" name="status" required >
            
                <option value="1" <?php echo ($row['status']) ? "selected" :''; ?>>Active</option>
                
                <option value="0" <?php echo (!$row['status']) ? "selected" :''; ?>>Inactive</option>
       
            </select>
    </fieldset>    
    <button type="submit">Submit</button>
    
</form>

</body>
<?php
require 'include.php';
require 'EmployeeClass.php';
include 'TemplateClass.php';
$id=$_REQUEST['q'];
$Employee = new EmployeeClass();
$row = $Employee->editEmployees($id);
//$query="select * from admin where id='".$id."'";
//$result=mysqli_query($con,$query);
//$row=mysqli_fetch_array($result);
include "header.php";
?>
<body>
    <form action="edit_employee_action.php" method="post">

    <h1>Edit User Details</h1>

    <fieldset>
        <legend> Basic Information</legend><br>
        
        <input type="hidden" name="id" required value="<?php echo $row['id']?>">
      
        <label for="email">Email:</label>
        <input type="email" id="mail" name="email" readonly="" required value="<?php echo $row['email'];  ?>">
        
         <label for="template">Select Template :</label>
        <select id="template" name="template_id" required>
            <option value="">*****Select*****</option>
            <?php $Template = new TemplateClass();
                  $templates = $Template ->listingTemplates();
                  
            foreach ($templates as $template) { ?>
            <option value="<?=$template['id']?>" <?php echo ($row['template_id']== $template['id']) ? 'selected' :'';?>><?= $template['template_name']?></option>
            <?php } ?>
        </select>
        
         <label for="name">First Name:</label>
        <input type="text" id="name" name="first_name" placeholder="First Name" required value="<?php echo $row['first_name'] ?>" >
        
        <label for="name">Middle Name:</label>
        <input type="text" id="name" name="middle_name" placeholder="Middle Name" value="<?= $row['middle_name'] ?>" >
        
        <label for="name">Last Name:</label>
        <input type="text" id="name" name="last_name" placeholder="Last Name" required value="<?= $row['last_name'] ?>">
        
        <label for="code">Designation:</label>
        <input type="text" id="code" name="designation" placeholder="Designation" required value="<?= $row['designation'] ?>">
        
        <label for="number">Desk Number:</label>
        <input type="number" id="phone" name="phone1" placeholder="Desk Number" required value="<?= $row['phone1'] ?>">

        <label for="number">Mobile Number:</label>
        <input type="number" id="phone" name="phone2" placeholder="Mobile Number" value="<?= $row['phone2'] ?>">
        
         <label for="number">Fax:</label>
        <input type="number" id="fax" name="fax" required placeholder="Fax Number" required value="<?= $row['fax'] ?>">
        
        
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
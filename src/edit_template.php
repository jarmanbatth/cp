<?php
require 'include.php';
require 'TemplateClass.php';
$id=$_REQUEST['q'];
$Template = new TemplateClass();
$row = $Template->editTemplate($id);
//$query="select * from admin where id='".$id."'";
//$result=mysqli_query($con,$query);
//$row=mysqli_fetch_array($result);
include "header.php";
?>
<body>
    <form action="edit_template_action.php" method="post">

    <h1>Edit Template Details</h1>

    <fieldset>
       
        <input type="hidden" name="id" required value="<?php echo $row['id']?>">
           
        <label for="name">Name:</label>
        <input type="text" id="name" name="template_name" required value="<?php echo $row['template_name'] ?>">

       <dl>Template (Please enter html templates)</dl>
            <div>                
                &lt;body&gt;
                
                <textarea name="design" rows="25" cols="200" required><?php echo $row['design'];?></textarea>
    
                &lt;&#47;body&gt;
                
            </div> 
      
        <dl>Status :</dl>
        <dt><input type="radio" name="status" required value="1" <?php echo ($row['status']) ? "checked" :''; ?>>Enable </dt>
        <dt><input type="radio" name="status" required value="0" <?php echo (!$row['status']) ? "checked" :''; ?>>Disable</dt>
        
        </fieldset>
 <button type="submit">Submit</button>   
    
</form>

   
    You need to use following source in template:<br>
        <ul style="list-style-type: circle">
            <li>First Name : {{first_name}}</li><br>
            <li>Middle Name : {{middle_name}}</li><br>
            <li>Last Name : {{last_name}}</li><br>
            <li>Designation : {{designation}}</li><br>
            <li>Email : {{email}}</li><br>
            <li>Phone : {{phone}}</li><br>
            <li>Mobile : {{mobile}}</li><br>
                <li>Fax : {{fax}}</li> 
            </ul>   
            
</body>
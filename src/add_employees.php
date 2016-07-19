<?php
require 'include.php';
include 'header.php';
include 'EmployeeClass.php';
include 'TemplateClass.php';

if (!empty($_POST)) {
    $template_id = $_POST['template_id'];
    $firstName = ucwords(trim($_POST['first_name']));
    $middleName = trim($_POST['middle_name']);
    $lastName = ucwords(trim($_POST['last_name']));
    $designation = ucwords(trim($_POST['designation']));
    $email = trim($_POST['email']);
    $deskNumber = trim($_POST['phone1']);
    $mobileNumber = trim($_POST['phone2']);
    $faxNumber = trim($_POST['fax']);
    $pass = trim($_POST['password']);
    $c_pass = trim($_POST['confirm_password']);
    $status = $_POST['status'];
    $companyId = 1;
    $created_by = $_SESSION['User']['id'];
    $created_time = date(DATE_ATOM);
    
//    echo 'jj'.$first_name;
//    if ($name == "") {
//        $error = 1;
//        if ($error == 1) {
//            header("location:add_users.php");
//        }
//    }

    $Employee = new EmployeeClass;
    $flag = $Employee->checkEmployee($email);

    if ($flag == 1) {
        header("location: add_employees.php");
    } else {
        if ($pass == $c_pass) {
            $data = array('first_name' => $firstName,'middle_name' => $middleName,'last_name' => $lastName,'designation' => $designation,
                          'email' => $email,'password' => $pass, 'phone1' => $deskNumber,'phone2' => $mobileNumber,'fax' => $faxNumber,
                          'company_id' => $companyId,'template_id' => $template_id,'created_by' => $created_by,'created' => $created_time,'status' => $status);
                      
            $Employee->addEmployee($data);
            
            $_SESSION['message'] = 'Account created successfully';
            header("location:index.php");
        } else {

            header("location:add_employees.php");
        }
    }
}

?>
<html>
    <head>
        
    </head>
<body>
    <form action="add_employees.php" method="post" >

    <h1>Add New Employee</h1>

    <fieldset>
        <legend></span> Employee Details</legend>
        <br>
        
         <label for="template">Select Template :</label>
        <select id="temp_id" name="template_id" required >
            <optgroup label="Templates">
                <option value="***Select***">***Select***</option>
                <?php $Template = new TemplateClass();
                      $templates = $Template->listingTemplates(); 
                      foreach ($templates as $template){
                      ?> 
                <option value="<?php echo $template['id'];?>"><?php echo $template['template_name']; ?></option>
                      <?php } ?>
            </optgroup>
            
        </select>
        
        <label for="name">First Name:</label>
        <input type="text" id="name" name="first_name" placeholder="First Name" required >
        
        <label for="name">Middle Name:</label>
        <input type="text" id="name" name="middle_name" placeholder="Middle Name"  >
        
        <label for="name">Last Name:</label>
        <input type="text" id="name" name="last_name" placeholder="Last Name" required >
        
        <label for="code">Designation:</label>
        <input type="text" id="code" name="designation" placeholder="Designation" required >
        
        <label for="number">Desk Number:</label>
        <input type="number" id="phone" name="phone1" placeholder="Desk Number" required >

        <label for="number">Mobile Number:</label>
        <input type="number" id="phone" name="phone2" placeholder="Mobile Number" >
        
        <label for="number">Fax:</label>
        <input type="number" id="fax" name="fax" required placeholder="Fax Number" >
        
        <label for="number">Email:
            <?php
            if (isset($_SESSION['email_error']) && !empty($_SESSION['email_error'])) {
            echo "<span style='color:red;'>" . $_SESSION['email_error'] . "</span>";
            unset($_SESSION['email_error']);}
            ?>
        </label>
        <input type="email" id="email" name="email" placeholder="Email"  required >
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="******" required >
        
        <label for="password">Confirm Password:</label>
        <input type="password" id="password" name="confirm_password" placeholder="******" required >
        
        <label for="name">Status:</label>
            <select id="status" name="status" required >
            
                <option value="1">Active</option>
                <option value="0">Inactive</option>
       
            </select>
    <button type="submit">Submit</button>
</form>
</body>
</html>
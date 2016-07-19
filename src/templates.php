<?php
require 'include.php';
include 'header.php';
include 'TemplateClass.php';
include 'UserClass.php';
?>
<center><br/><br/>
                                                                                                                                                                                                                                                               
<h1>Welcome To Business Card</h1>
    <?php
    $Template = new TemplateClass();
    $templates = $Template->listingTemplates();
    $User = new UserClass();
   
    ?>  
<?php
if (isset($_SESSION['flash']) && !empty($_SESSION['flash'])) {
    echo '<div class="flash-message"><span class="' . $_SESSION['flash']['type'] . '">' . $_SESSION['flash']['message'] . '</span></div>';
    unset($_SESSION['flash']);
}
?> 
        <table border='1'>
        <tr>
            <th colspan='6'><h2 style="text-align: center">View Templates</h2></th>
        </tr>
        <tr style='color:#000;'>
            <th>Sr. no</th>
            <th>Name</th>
            <th>Status</th>
            <th>Created By</th>
            <th>Created Time</th>            
            <th>Action</th>
        </tr>

        <?php
        $count = 1;
        foreach ($templates as $template) {
            ?>

            <tr style='color:#000;'>
                <td><?php echo $count; ?></td>
                <td><?php echo $template['template_name']; ?></td>
                <td><?php if($template['status']==1){
                    echo 'Enable';
                }  else {
                    echo 'Disable';    
                }; ?></td>
                <td><?php $userId = $template['created_by'];
                 $userData = $User->getUserDataById($userId);
                 echo $userData['name']?></td>
                <td><?= $template['created']; ?></td>
                <td> <div class='header'>
                    <?php echo "<a href='edit_template.php?q=" . $template['id'] . "'>Edit</a>  |  <a href='delete_template.php?q=" . $template['id'] . "'>Delete</a> | "
                            . "<a href='view_template.php?q=" . $template['id'] . "'>View</a>" ?></div></td>
            </tr>
            <?php
            $count++;
        }
        ?>
    </table>
    </center>
   
<?php include 'footer.php';?>


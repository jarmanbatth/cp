<?php
require 'include.php';
include 'header.php';
include 'UserClass.php';
?>
<center><br><br>
<div style="width: 1000px;min-height:50px">
<h1>Welcome To Business Card</h1>
</div>

 
    <?php
    $User = new UserClass();
    $tableRows = $User->listingUsers();
    ?>    
        <table border='1'>
        <tr>
            <th colspan='10'><h2 style="text-align: center">View All Admins</h2></th>
        </tr>
        <tr style='color:#000;'>
            <th>Sr. no</th><th>Name</th><th>E-Mail</th><th>Status</th><th>Action</th>
        </tr>

        <?php
        $count = 1;
        foreach ($tableRows as $rows) {
            ?>

            <tr style='color:#000;'>
                <td><?php echo $count; ?></td>
                <td><?php echo $rows['name']; ?></td>
                <td><?= $rows['email']; ?></td>
                <td><?php if($rows['status']==1){echo 'Active';}else { echo 'Inactive' ;} ; ?></td>
                <td> <div class='header'><?php echo "<a href='edit_user.php?q=" . $rows['id'] . "'>Edit</a>  |  <a href='delete_user.php?q=" . $rows['id'] . "'>Delete</a>" ?></td>
            </tr>
            <?php
            $count++;
        }
        ?>
    </table>
    </center>
<?php
if (isset($_SESSION['flash']) && !empty($_SESSION['flash'])) {
    echo '<div class="flash-message"><span class="' . $_SESSION['flash']['type'] . '">' . $_SESSION['flash']['message'] . '</span></div>';
    unset($_SESSION['flash']);
}
?>    
<?php include 'footer.php';?>


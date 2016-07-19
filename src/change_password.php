<?php
require 'include.php';
include 'header.php';
?>
<head>
    <script>
        $(document).ready(function () {

            $("#AddUser").validate({
                rules: {
                    name: "required",
                   
                     new_password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                  
                        },
                messages: {
                    name: "<span style='color:red;'>Please enter your Name </span>",
                    
                     new_password: {
                        required: "<span style='color:red;'>Please provide a password</span>",
                        minlength: "<span style='color:green;'>Your password must be at least 5 characters long</span>"
                    },
                    confirm_password: {
                        required: "<span style='color:red;'>Please provide a password</span>",
                        minlength: "<span style='color:green;'>Your password must be at least 5 characters long</span>",
                        equalTo: "Please enter the same password as above"
                    },
                    email: "<span style='color:red;'> Please enter a valid email address </span>",
                }
            });

        });
    </script>
    <style>
        #commentForm {
            width: 500px;
        }
        #commentForm label {
            width: 250px;
        }
        #commentForm label.error, #commentForm input.submit {
            margin-left: 253px;
        }
        .cmxform {
            width: 670px;
        }
        .cmxform label.error {
            margin-left: 10px;
            width: auto;
            display: inline;
        }
        
        .block {
            display: block;
        }
        form.cmxform label.error {
            display: none;
        }
    </style>
</head>
<body>
    <form class="cmxform" id="AddUser"  action="change_password_action.php" method="post">
        <h1>Change Password</h1>
        <?php
        
        if (isset($_SESSION['pass_error1']) && !empty($_SESSION['pass_error1'])) {
            echo "<span style='color:red;'>" . $_SESSION['pass_error1'] . "</span>";
            unset($_SESSION['pass_error1']);
        }
       
        ?>
        <fieldset>
            <legend>Change Password</legend>
            
            <input type="hidden" name="id" required value="<?php echo $_SESSION['User']['id'];?>"
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required readonly value="<?php echo $_SESSION['User']['email']; ?>" >
            
            <label for="old_password">Old Password:</label>
            <input type="password" id="old_password" name="old_password" placeholder="******" required >
            
            <label for="password">New Password: 
            <?php
        if (isset($_SESSION['pass_error']) && !empty($_SESSION['pass_error'])) {
            echo "<span style='color:red;'>" . $_SESSION['pass_error'] . "</span>";
            unset($_SESSION['pass_error']);
        }
        ?>
            </label>
            <input type="password" id="password" name="new_password" placeholder="******"  required >
            
            <label for="password">Confirm Password: </label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="******" required >
        </fieldset>
        <button type="submit">Change Password</button>
    </form>
</body>



<?php
require 'include.php';
include 'header.php';
include 'UserClass.php';

if (!empty($_POST)) {
    $name = ucwords(trim($_POST['name']));
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);
    $c_pass = trim($_POST['confirm_password']);
    $status = $_POST['status'];
    $error = 0;
    //echo 'jj'.$first_name;
//    if ($name == "") {
//        $error = 1;
//        if ($error == 1) {
//            header("location:add_users.php");
//        }
//    }

    $User = new UserClass;
    $flag = $User->checkUser($email);

    if ($flag == 1) {
        header("location: add_users.php");
    } else {
        if ($pass == $c_pass) {
            $data = array('name' => $name, 'email' => $email, 'password' => $pass, 'status' => $status);
            $User->addUser($data);
           
            $_SESSION['message'] = 'Account created successfully';
            header("location:index.php");
        } else {

            header("location:add_users.php");
        }
    }
}
?>
<head>
    <script>
//	$.validator.setDefaults({
//		submitHandler: function() {
//			alert("submitted!");
//		}
//	});

        $(document).ready(function () {

            $("#AddUser").validate({
                rules: {
                    name: "required",
                    password: {
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
                    password: {
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

            // propose username by combining first- and lastname
//            $("#user_name").focus(function () {
//                var firstname = $("#first_name").val();
//                var lastname = $("#last_name").val();
//                if (firstname && lastname && !this.value) {
//                    this.value = firstname + "." + lastname;
//                }
//            });

            //code to hide topic selection, disable for demo
            
            // newsletter topics are optional, hide at first
           
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
    <div id="main1">
        
        <form class="cmxform" id="AddUser" action="add_users.php" method="post">

            <h1>Add New User</h1>

            <fieldset>
                <legend> Basic Information</legend><br>
                <div style="float: left">
                    
                    <div style="padding-top: 20px">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter Your Name Here">
                    </div>
                <label for="email">Email:<?php
                    if (isset($_REQUEST['q']) && $_REQUEST['q'] == 1) {
                        echo "<span style='color:red;'> * Email Already Exist.</span>";
                    }
                    ?></label>
                <input type="email" id="email" name="email" placeholder="E-mail"required >

                <label for="password">Password:<?php
                    if (isset($_REQUEST['q']) && $_REQUEST['q'] == 2) {
                        echo "<span style='color:red;'> * Password and confirm password doesnot matches.</span>";
                    }
                    ?></label>
                <input type="password" id="password" name="password" placeholder="********" required >

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="********" required >
                
                <label for="name">Status:</label>
            <select id="name" name="status" required >
            
                <option value="1">Active</option>
                <option value="0">Inactive</option>
       
            </select>
                </div>
            </fieldset>
            <button type="submit">Submit</button>
        </form>
            
        <?php
        if (isset($_REQUEST['q']) && $_REQUEST['q'] == 11) {
            echo "<h3><span style='color:red;'> * Please fill all the mendatory fields with valid data.</span><h3>";
        }
        ?>
    </div>
</body>
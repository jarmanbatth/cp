<?php
require 'include.php';
//if (!isset($_SESSION['User']))
  //  header("location:login.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Business Card</title>
<meta name="keywords" content="Business Card, free website templates, css templates, CSS, HTML" />
<meta name="description" content="The Wall is a free website template provided by templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
    
    <meta http-equiv="Content-Language" content="en-us" />
	<meta name="author" content="Niall Doherty" />
    <script src="js/jquery-1.2.1.pack.js" type="text/javascript"></script>
    <script src="js/jquery-easing.1.2.pack.js" type="text/javascript"></script>
    <script src="js/jquery-easing-compatibility.1.2.pack.js" type="text/javascript"></script>
    <script src="js/coda-slider.1.1.1.pack.js" type="text/javascript"></script>
    <!-- 
    The CSS. You can of course have this in an external .css file if you like.
    Please note that not all these styles may be necessary for your use of Coda-Slider, so feel free to take out what you don't need.
    -->
    <!-- Initialize each slider on the page. Each slider must have a unique id -->
    <script type="text/javascript">
    jQuery(window).bind("load", function() {
    jQuery("div#slider1").codaSlider()
    // jQuery("div#slider2").codaSlider()
    // etc, etc. Beware of cross-linking difficulties if using multiple sliders on one page.
    });
    </script>

</head>
    <body>
        <div class="">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="add_users.php">Add Users</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="add_employees.php">Add Employees</a></li>
                <li><a href="employees.php">Employees</a></li>
                <li><a href="addtemplate.php">Add Templates</a></li>
                <li><a href="templates.php">Templates</a></li>                
                <li><a href="change_password.php">Change Password</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </div>    

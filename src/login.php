<?php
require_once('include.php');
require_once('UserClass.php');
if (!empty($_POST)) {
    $User = new UserClass;
   $userData = $User->getUserDataByEmail($_POST['email']);
    if ($userData['password'] == $_POST['password']) {
        unset($userData['password']);
        $_SESSION['User'] = $userData;
        $_SESSION['flash'] = array('type' => 'success', 'message' => 'Login Successfull.');
        header('Location:index.php');die('xxu');die('dd');
    } else {
        $_SESSION['flash'] = array('type' => 'error', 'message' => 'Wrong Email or Password');
    }
}
?>
<html>
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
        <div id="templatemo_site_title_bar_wrapper">

	<div id="templatemo_site_title_bar">
    
    	<div id="site_title">
            <h1><a href="#" target="_parent">
                <img src="images/logo.png" alt="css templates" />
                <span>Easy way to Print Business card with dynamic Templates</span>
            </a></h1>
        </div>
        
        
	</div> <!-- end of templatemo_site_title_bar -->
</div> <!-- end of templatemo_site_title_bar_wrapper -->

       
        <div id="templatemo_content_wrapper" >
            <div id="templatemo_content" >
              
        
        <div id="contact_form">
        <form id="signupForm" action="" method="post">
            <h1>Login </h1>
             <div class="cleaner_h30"></div>
            <?php
            if (isset($_SESSION['flash']) && !empty($_SESSION['flash'])) { 
                echo '<div class="flash-message"><span class="' . $_SESSION['flash']['type'] . '">' . $_SESSION['flash']['message'] . '</span></div>';
                unset($_SESSION['flash']);
            }
            ?>
            
           <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="E-mail"required >
        <div class="cleaner_h10"></div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="********" required 
          <label for="status">Status:</label>
            <select id="status" name="status" required >
                <option value="1">Active</option>
                <option value="0">Inactive</option>
       
            </select>  
            <br><br><input style="font-weight: bold;" type="submit" class="submit_btn" name="submit" id="submit" value=" Login" />
         </form>
         </div>
        
        </div> 
	<!-- end of templatemo_content -->
</div> <!-- end of templatemo_content_wrapper -->
        
    </body>
</html>


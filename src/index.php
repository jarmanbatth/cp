<?php
require 'include.php';
include 'header.php';
?>
<div id="body">
    <div id="identity">
        <center><br><br>
        <h3 class="info"> WELCOME Mr.<?php echo strtoupper($_SESSION['User']['name']); ?></h3>
        <?php
            if (isset($_SESSION['flash']) && !empty($_SESSION['flash'])) { 
                echo '<div class="flash-message"><span class="' . $_SESSION['flash']['type'] . '">' . $_SESSION['flash']['message'] . '</span></div>';
                unset($_SESSION['flash']);
            }
            ?>
        <span style="font-size: x-large; color: #000"> <b>Email Id : </b><?php echo $_SESSION['User']['email']; ?></span>                
        </center>
    </div>
</div>

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


<div id="templatemo_content_wrapper">

  <div id="templatemo_content">
    
    
    <!-- start of slider -->

<div class="slider-wrap">
	<div id="slider1" class="csw">
		<div class="panelContainer">
		
			<div class="panel" title="Home">
				<div class="wrapper">
                
					<h2>Welcome to Business Card!</h2>
                    
					<div class="image_wrapper fl_image">
	                    <img src="images/templatemo_image_01.jpg" alt="image"/>
                    </div>
                    
                    <p class="em_text"> This website is basically using for create , Download and print Business cards of any employee of an organisation .  , </p>
                    
                   <div class="cleaner_h40"></div>                    
                    
                    <div class="section_w320 fl">
	                    <img class="fl" src="images/portfolio.png" alt="portfolio" />
                        <div class="w320_content">
                            <h3>Template with Mobile Number</h3>
                            <p>Donec ultricies fermentum sapien in facilisis.</p>
    	                    <div class="cleaner"></div>
	                        <div class="button_01"><a href="#2" class="cross-link">Details</a></div>
        				</div>
                                        
                   	</div>
                    
                    <div class="section_w320 fr">
	                    <img class="fl" src="images/aboutme.png" alt="portfolio" />
                        <div class="w320_content">
                            <h3>Template without Mobile Number</h3>
                            <p>Integer egestas nibh eget neque ornare tempor.</p>
    	                    <div class="cleaner"></div>
	                        <div class="button_01"><a href="#3" class="cross-link" >View All</a></div>
        				</div>
                                        
                   	</div>
                    
                    <div class="cleaner_h20"></div>
                    
                    
					<p><a href="#5" class="cross-link" title="Go to Page 5">&#171; Previous</a> | <a href="#2" class="cross-link" title="Go to Page 2">Next &#187;</a></p>
				</div>
			</div>
			<di
                    
                    <div class="cleaner_h20"></div>
                    
					<p><a href="#4" class="cross-link" title="Go to Page 4">&#171; Previous</a> | <a href="#1" class="cross-link" title="Go to Page 1">Next &#187;</a></p>
				</div>
			</div>
			
		</div><!-- .panelContainer -->
	</div><!-- #slider1 -->
</div><!-- .slider-wrap -->

<p id="cross-links" style="width:0px; height: 0px; font-size:0; overflow: hidden;">
	Same-page cross-link controls:<br />
	<a href="#1" class="cross-link">Page 1</a> | <a href="#2" class="cross-link">Page 2</a> | <a href="#3" class="cross-link">Page 3</a> | <a href="#4" class="cross-link">Page 4</a> | <a href="#5" class="cross-link">Page 5</a>
</p>

   
    <!-- end of slider -->
       
	</div> 
	<!-- end of templatemo_content -->
</div> <!-- end of templatemo_content_wrapper -->

<div id="templatemo_footer_wrapper">

	<div id="templatemo_footer">

	    Copyright © 2048 <a href="#">Your Company Name</a> | 
        <a href="http://www.iwebsitetemplate.com" target="_parent">Website Templates</a> by <a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a>
      
	</div> <!-- end of templatemo_footer -->
</div> <!-- end of templatemo_footer_wrapper -->

<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>

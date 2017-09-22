<?php

//This is where it all begins.
// version 5/28/13

define("SECURE",1);  //A defined variable used to prevent direct access to the logic and content
                     //modules.

error_reporting(E_ALL ^ E_NOTICE);  //Report every error except notices.  Only for debugging purposes.

include "logic/logic.submission.php";  //Check for form input. (registration, login, etc.)

include "content/content.headersmall.php";  //Output the page header.

//Is the user logged in?
if(isset($_SESSION['loggedIn']))
{ ?>
<div class="navbar transparent navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
<a class="brand" href="/"><img src = "./bootstrap/docs/assets/img/SwarmSports-Header-225x45.jpg"></a> 
    <div class="container">

          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
 	 	<li><a href="index.php#featured">Featured</a></li>
              <li><a href="index.php#more">More</a></li>
              <li><a href="index.php#new">New</a></li>
            
             </ul>

 <div align = "right">
<?php include "content/content.search.php"; ?>
 </div>


          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./bootstrap/docs/assets/js/jquery.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-transition.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-alert.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-modal.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-dropdown.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-scrollspy.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-tab.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-tooltip.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-popover.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-button.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-collapse.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-carousel.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-typeahead.js"></script>
<div align = "left">
<table><tr><td>
<?php
include "content/content.storiesForm.php";
?>
</td>
</tr>
</table>
</div>
<?php
include "content/content.footersmall.php";
?>   
<?php
  
 	
}
else
{ ?>
<div class="navbar transparent navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
<a class="brand" href="/"><img src = "./bootstrap/docs/assets/img/SwarmSports-Header-225x45.jpg"></a> 
    <div class="container">

          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

          </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
 	 	<li><a href="index.php#featured">Featured</a></li>
              <li><a href="index.php#more">More</a></li>
              <li><a href="index.php#new">New</a></li>
            
             </ul>

 <div align = "right">
<?php include "content/content.search.php"; ?>
 </div>


          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
   
<?php
include "content/content.footersmall.php";
?>  

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./bootstrap/docs/assets/js/jquery.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-transition.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-alert.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-modal.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-dropdown.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-scrollspy.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-tab.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-tooltip.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-popover.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-button.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-collapse.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-carousel.js"></script>
    <script src="./bootstrap/docs/assets/js/bootstrap-typeahead.js"></script>

<?php
}

?>

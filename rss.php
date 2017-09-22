<?php

//This is where it all begins.
// version 5/4/13

define("SECURE",1);  //A defined variable used to prevent direct access to the logic and content
                     //modules.

error_reporting(E_ALL ^ E_NOTICE);  //Report every error except notices.  Only for debugging purposes.

include "logic/logic.initialize.php";  //Get access to the MySQL database.

include "logic/logic.rss.php";

?>

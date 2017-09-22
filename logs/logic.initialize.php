<?php

// This file handles the initialization logic.
// It handles session control, connects to the database server and recreates the database
// structure if needed.

//Start a new sesssion for this user if necessary.
if(session_id()=="")
{
  session_start();  
  header("Cache-control: private");
}

//Database connection details.
$config_database_username="whitetra_bee23";
$config_database="whitetra_bee";
$config_password="l[*%Rak(eQb-";

//Connect to a database server which is on the same machine at port 3306
$dbcnx = mysql_connect("127.0.0.1:3306", $config_database_username, $config_password)
         or die("Unable to connect to the database. <br>  Please check your settings in config.php!");
         
//Find the desired database on the connected server.
mysql_select_db($config_database) or die("Unable to select the database schemata. <br>  Please check your settings in config.php!");

//See if the necessary database tables need to be reinstalled.
$result = mysql_query("select * from options where optionName='installed'");
if($result==0)
{
  include "logic/logic.install.php";  //Run the install logic.
}

?>
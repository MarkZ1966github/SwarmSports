<?php
include "content/content.xmlheader.php";
?>
<?php
if(!defined("SECURE"))
{
  //Someone is trying to access this page directly without going through the proper
  //channel, a classic hacker ploy, so trick the sneaky hacker into thinking
  //that the page doesn't exist.  This is a good combination of security and obscurity.
  header('HTTP/1.1 404 Not Found');
  echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n";
	echo "<html><head>\n<title>404 Not Found</title>\n</head><body>\n";
	echo "<h1>Not Found</h1>\n";
  echo "<p>The requested URL ".$_SERVER['REQUEST_URI']." was not found on this server.</p>\n";
	echo "</body></html>";
	exit;
}
?>	

<?php

//A script for displaying the stories and putting them into a table

$query="SELECT * FROM swarmstories order by datetime desc LIMIT 20";
$result=mysql_query($query);
$num=mysql_numrows($result);

mysql_close();
?>

<?php
$i=0;
while ($i < $num) {

$f1=mysql_result($result,$i,"storytitle");
$f2=mysql_result($result,$i,"remarks");
$f3=mysql_result($result,$i,"url");
$f4=mysql_result($result,$i,"datetime");
?>

<item>
<title><?php echo $f1; ?></title>
<link><?php echo $f3; ?></link>
<description><?php echo $f2; ?></description>
<pubDate><?php echo date(DATE_RSS, strtotime($f4)); ?></pubDate>
<guid><?php echo $f3; ?></guid>
</item>

<?php
$i++;
}

?>
<?php
include "content/content.xmlfooter.php";
?>




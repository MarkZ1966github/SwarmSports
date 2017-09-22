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
<div align = "center">Copyright &copy; 2013 | <a href="/">SwarmSports</a>&nbsp;|&nbsp;<a href = "/about.php">About</a>&nbsp;|&nbsp;<a href = "http://blog.swarmsports.com/">Blog</a>&nbsp;|&nbsp;<a href = "/faq.php">FAQ</a> | <a href="/contact.php">Contact</a> | <a href = "https://www.facebook.com/SwarmSports" target = "_blank">Facebook</a></li> | <a href = "https://www.twitter.com/SwarmSports" target = "_blank">Twitter</a> | <a href = "http://feeds.feedburner.com/SwarmsportsFeed" target = "_blank"><img src = "./bootstrap/docs/assets/img/24x24-rss.png"></a>
</div>	
  </body>
</html>


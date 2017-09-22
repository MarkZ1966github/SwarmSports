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
<div style="margin-left: 25px;">
<div style="width: 50%; height: 100%">
<?php
require('../blog/wp-config.php'); 
$wp->init();
$wp->parse_request();
$wp->query_posts();  
$wp->register_globals();
// Retrieve only Pages and exclude About, links, contact, etc.
  //     $args = array(       // set up arguments
//	         'post_type' => 'page',              // Only Pages
//	         'post__in' => array()   // Do NOT show postID 2,9,5,or 12
 //           );
       query_posts('page_id=27');   // execute the arguments
//
while (have_posts()) : the_post();
	the_content( 'Read the full post »' );
endwhile;

// Reset Query
wp_reset_query();
?>
</div>
</div>

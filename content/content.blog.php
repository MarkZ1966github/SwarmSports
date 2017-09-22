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
require('../blog/wp-config.php'); 
$wp->init();
$wp->parse_request();
$wp->query_posts();  
$wp->register_globals();
?>
<?php query_posts('showposts=5'); ?>
<?php while (have_posts()) : the_post(); ?>
     <h2><strong><a href="<?php the_permalink() ?>" rel="bookmark" title="Go to <?php the_title(); ?>"></strong></h2>
         <?php the_title(); ?></strong></a></h2>
         <div class="entry">
         <small><?php the_time('F jS, Y') ?> by SwarmSports</small>
   <?php the_content(); ?>
 </div>
     </a><br />
<?php endwhile;?>
<a href = "http://blog.swarmsports.com">Read more posts</a>
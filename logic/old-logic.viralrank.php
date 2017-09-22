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


function get_tweets($url) {
	$curl = curl_init('http://urls.api.twitter.com/1/urls/count.json?url=' . $url);
	curl_setopt($curl, CURLOPT_FAILONERROR, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
	$tweets = curl_exec($curl);
    	$json = json_decode($tweets, true);
 
return intval( $json['count'] );
}

function get_fb($url) {

    	$fql = 'SELECT total_count FROM link_stat WHERE url="'.$url.'"';
    	$curl = curl_init('https://api.facebook.com/method/fql.query?format=json&query=' . urlencode($fql));
	curl_setopt($curl, CURLOPT_FAILONERROR, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
	$fbcount = curl_exec($curl);
	$jason = strpbrk($fbcount, ':');
	$trimmed = trim($jason, "}]");
	$fbscore = trim($trimmed,":");
 
return $fbscore;
}
function get_reddit($url) {
	$curl = curl_init('http://buttons.reddit.com/button_info.json?url="'.$url.'"');
	curl_setopt($curl, CURLOPT_FAILONERROR, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
	$reddit_count = curl_exec($curl);
	$reddit_count = str_replace("\":"," ",$reddit_count);
	$reddit_count = str_replace("\""," ",$reddit_count);
	$reddit_count = strstr($reddit_count, 'score');		
	$reddit_count = str_replace("\":"," ",$reddit_count);
	$reddit_count = str_replace("\""," ",$reddit_count);
	$reddit_count = strstr($reddit_count, 'score');
	$reddit_count2 = strstr($reddit_count, 'num_comments');
	$reddit_count = explode(",", $reddit_count);
	$reddit_count = $reddit_count[0];
	$reddit_count2 = explode(",", $reddit_count2);
	$reddit_count2 = $reddit_count2[0];
	$reddit_count = str_replace("score"," ",$reddit_count);
	$reddit_count2 = str_replace("num_comments"," ",$reddit_count2);
 	$reddit_total = $reddit_count+$reddit_count2;
return $reddit_total;
}

function get_viralscore($url){
	$viralscore = get_fb($url)+get_tweets($url)+get_reddit($url);
return $viralscore;
}
?>
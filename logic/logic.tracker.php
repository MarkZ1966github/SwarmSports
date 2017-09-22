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

function is_bot(){
	$botlist = array("Teoma", "alexa", "froogle", "Gigabot", "inktomi",
		"looksmart", "URL_Spider_SQL", "Firefly", "NationalDirectory",
		"Ask Jeeves", "TECNOSEEK", "InfoSeek", "WebFindBot", "girafabot",
		"crawler", "www.galaxy.com", "Googlebot", "Scooter", "Slurp",
		"msnbot", "appie", "FAST", "WebBug", "Spade", "ZyBorg", "rabaz",
		"Baiduspider", "Feedfetcher-Google", "TechnoratiSnoop", "Rankivabot",
		"Mediapartners-Google", "Sogou web spider", "WebAlta Crawler","TweetmemeBot",
		"Butterfly","Twitturls","Me.dium","Twiceler","Purebot","facebookexternalhit",
		"Yandex","CatchBot","W3C_Validator","Jigsaw","PostRank","Purebot","Twitterbot",
		"Voyager","zelist","www.majestic12.co.uk", "MJ12bot","Sogou web spider","www.sogou.com","linkdex.com","Mail.RU_Bot","YisouSpider","Yeti","bingbot","AhrefsBot","Ezooms","psbot","PHP","Disqus","Exabot/3.0");

	foreach($botlist as $bot){
		if(strpos($_SERVER['HTTP_USER_AGENT'],$bot)!==false)
		return true;	// Is a bot
	}
	return false;	// Not a bot
}

// get ip
$ip = $_SERVER['REMOTE_ADDR'];
$query_string = $_SERVER['QUERY_STRING'];
$http_referer = $_SERVER['HTTP_REFERER'];
$http_user_agent = $_SERVER['HTTP_USER_AGENT'];
$request_uri = $_SERVER['REQUEST_URI'];

// check if it's a bot
if (is_bot())
	$isbot = 1;
else
	$isbot = 0;

// get country and city


include "logic/ip2locationlite.class.php";
//Load the class
$ipLite = new ip2location_lite;
$ipLite->setKey('71beb354acdcde1fb7548c286b0f446dac8ef1de2206ff053d03b11cc4d70d00');
 
//Get errors and locations
$locations = $ipLite->getCity($ip);
$errors = $ipLite->getError();
 
//Getting the result
if (!empty($locations) && is_array($locations)) {
  foreach ($locations as $field => $val) {
  	if ($field == 'countryName')
  		$country = $val;
    if ($field == 'cityName')
  		$city = $val;
  }
}

// insert into db
$date = date("Y-m-d");
$time = date("H:i:s");

include "logic/logic.initialize.php";

$query = "insert into `swarmtracker` (`country`,`city`,`date`, `time`, `ip`, `query_string`, `http_referer`, `http_user_agent`, `isbot`) 
values ('$country','$city','$date', '$time', '$ip', '$query_string', '$http_referer' ,'$http_user_agent' , $isbot)";

$result = mysql_query($query);

//COMBINE VARS INTO OUR LOG ENTRY
$time2 = date("M j G:i:s Y");

$msg = "##IP: " . $ip . " ##TIME: " . $time2 . " ##REFERRER: " . $http_referer . " ##SEARCHSTRING: " . $query_string . " ##USERAGENT: " . $http_user_agent . "##ISBOT: " . $isbot . "##CITY: " . $city . "##COUNTRY: " . $country ;
 
//CALL OUR LOG FUNCTION
writeToLogFile($msg);
 
function writeToLogFile($msg) {
     $today = date("Y_m_d");
     $logfile = $today."_log.txt";
     $dir = './logs';
     $saveLocation=$dir . '/' . $logfile;
     if  (!$handle = @fopen($saveLocation, "a")) {
          exit;
     }
     else {
          if (@fwrite($handle,"$msg\r\n") === FALSE) {
               exit;
          }
   
          @fclose($handle);
     }
}
?>
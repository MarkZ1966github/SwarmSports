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
 
    $json_string = file_get_contents('http://graph.facebook.com/?ids=' . $url);
    $json = json_decode($json_string, true);
 
    return intval( $json[$url]['shares'] );
}

function get_reddit($url) {
 			
	$reddit_count = file_get_contents("http://buttons.reddit.com/button_info.json?url=" . $url);
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

function get_plusones($url) {
 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    $curl_results = curl_exec ($curl);
    curl_close ($curl);
 
    $json = json_decode($curl_results, true);
 
    return intval( $json[0]['result']['metadata']['globalCounts']['count'] );
}

function get_viralscore($url){
	$viralscore = get_fb($url)+get_tweets($url)+get_reddit($url)+get_plusones($url);
return $viralscore;
}

?>
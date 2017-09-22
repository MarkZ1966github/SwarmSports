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
 
    	$curl = curl_init('http://graph.facebook.com/?ids=' . $url);
    	curl_setopt($curl, CURLOPT_FAILONERROR, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
	$facebook = curl_exec($curl);
    	$json = json_decode($facebook, true);
 
    return intval( $json[$url]['shares'] ) + intval( $json[$url]['comments'] ) ;
}

function get_reddit($url) {
 		
 	$curl = curl_init('http://buttons.reddit.com/button_info.json?url=' . $url);
    	curl_setopt($curl, CURLOPT_FAILONERROR, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  
	$reddit = curl_exec($curl);
    	$json = json_decode($reddit, true);	
return intval( $json[$url]['num_comments'] );
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
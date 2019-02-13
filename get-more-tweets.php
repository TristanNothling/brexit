<?php 
$consumer_key = "yReEmIJrCRcN3joTRyBEoGXAk";
$consumer_secret_key = "puh97Sb0pkHhzSLrwQw5RzPfpU5jesd5v5fib9vRF7GwxOhiSa";

$twitter_ = $consumer_key.":".$consumer_secret_key;
$bearer_tc = base64_encode($twitter_);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.twitter.com/oauth2/token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,     "grant_type=client_credentials" ); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded','Authorization: Basic '. $bearer_tc)); 
                                                            
$result = curl_exec($ch);

$json_dict = json_decode($result, true);
$access_token = ($json_dict['access_token']);

$ch = curl_init();

$query_string = '?f=tweets&q=brexit&count=50&result_type=recent';

curl_setopt($ch, CURLOPT_URL, "https://api.twitter.com/1.1/search/tweets.json" . $query_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token)); 

$result = curl_exec($ch);
$just_tweets = json_decode($result,true);

$outputFileName = "tweets.txt"; /*quick way to make a db*/
$logFile = fopen("/kunden/homepages/29/d697604814/htdocs/Bid4MyJob/trexit/".$outputFileName, "r") or die("Unable to open the txt file.");
$tweet_buffer_string = "";

foreach ($just_tweets['statuses'] as $oneTweet)
	{
    echo $oneTweet['id_str'] . ' ~ ' . $oneTweet['text'] . ' ~ ' . $oneTweet['created_at'] PHP_EOL;
    //echo '<p>'.$oneTweet['text'].'</p>';
	}

fclose($logFile);
$logFile = fopen("/kunden/homepages/29/d697604814/htdocs/Bid4MyJob/trexit/".$outputFileName,"a") or die("Unable to open the txt file.");
fwrite($logFile,$tweet_buffer_string);
fclose($logFile);

?>
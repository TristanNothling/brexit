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
curl_setopt($ch, CURLOPT_HTTPHEADER, array('grant_type: client_credentials','Content-Type: application/x-www-form-urlencoded','Authorization: Basic '. $bearer_tc)); 

/*Retrieve access token from Twitter authorisation endpoint*/
                                                             
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

foreach ($just_tweets['statuses'] as $oneTweet)
{
	echo '<p>'.$oneTweet['text'].'</p>';
}

?>
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

$query_string = '?f=tweets&q=brexit';

curl_setopt($ch, CURLOPT_URL, "https://api.twitter.com/1.1/search/tweets.json" . $query_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
	'Authorization: Bearer '. $access_token)); 

$result = json_decode(curl_exec($ch),true);

print_r($result);

?>

<!DOCTYPE html>
<html>
<title></title>
<body>

</body>
</html>
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

$query_string = '?f=tweets&q=brexit&count=100&result_type=recent';

curl_setopt($ch, CURLOPT_URL, "https://api.twitter.com/1.1/search/tweets.json" . $query_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token)); 

$result = curl_exec($ch);
$just_tweets = json_decode($result,true);

$host_name = 'db773293947.hosting-data.io';
$database = 'db773293947';
$user_name = 'dbo773293947';
$password = 'N5cDPAV24wbsUKb***';
$conn = mysqli_connect($host_name, $user_name, $password, $database);

if (mysqli_connect_errno()) 
{
    die('<p>Failed to connect to MySQL: '.mysqli_connect_error().'</p>');
} 

foreach ($just_tweets['statuses'] as $oneTweet)
	{
	$sql = "SELECT * FROM tweets WHERE id_str='". $oneTweet['id_str'] ."'";
	$result = $conn->query($sql);
	if ($result->num_rows == 0) 
		{
		$formatted_time = substr($oneTweet['created_at'],4,-10);
		$dt = date("Y-m-d H:i:s", strtotime($formatted_time));

		$escaped_string = mysqli_real_escape_string($conn,$oneTweet['text']);

		$sql = "INSERT INTO tweets (id_str,text,created_at) VALUES ('".$oneTweet['id_str']."', '$escaped_string', '$dt')";

		if (!mysqli_query($conn, $sql)) 
			{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

	}

?>
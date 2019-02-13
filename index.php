<!DOCTYPE html>
<html>
<title></title>
<body>
<div class="tweet-list" style="width:66%;height:100%;padding:1rem;">

<?php 

$host_name = 'db773293947.hosting-data.io';
$database = 'db773293947';
$user_name = 'dbo773293947';
$password = 'N5cDPAV24wbsUKb***';
$conn = mysqli_connect($host_name, $user_name, $password, $database);

if (mysqli_connect_errno()) 
{
    die('<p>Failed to connect to MySQL: '.mysqli_connect_error().'</p>');
} 

$sql = "SELECT * FROM tweets ORDER BY created_at DESC";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) 
{
    echo "<p>" . $row['text'] . " " . $row['created_at'] . "</p>";
}
?>

</div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
</script>
  
<script>
function get_more_tweets()
{
	var request = $.get({
		url: "http://bid4myjob.co.uk/get-more-tweets.php",
		method: "GET"
		});
	request.done(function(tweets)
		{        
        console.log(tweets);
		$('.tweet-list').append(tweets);
		});
}

get_more_tweets();



</script>
</html>
<!DOCTYPE html>
<html>
<head>
<title>Brexit On The Brain</title>

<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<style>
#fetch
{
	padding:1rem;
	font-weight:600;
	border-radius: 25px;
	color:#1da1f2;
	border: 2px solid #1da1f2;
	transition: all 0.2s ease-in;
	background-color: #FFFFFF00;
	outline:none;
    cursor:pointer;
}

#fetch:hover
{
	background-color:#1da1f2;
	color:#FFF;
}

p
{
	padding: 0.5rem;
    border-bottom: 1px solid #33333322;
    padding-bottom: 20px;
    font-size: 16px;
	font-family: 'Montserrat', sans-serif;
}

</style>
</head>

<body style="margin:0;">

	<div style="padding:1rem;">
	<button id="fetch">Fetch More</button>
	</div>

<div class="tweet-list" style="width:92%;height:100%;padding:1rem;">

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

	var second_request = $.get({
		url: "http://bid4myjob.co.uk/tweet-list.php",
		method: "GET"
		});
	second_request.done(function(tweets)
		{        
		$('.tweet-list').html(tweets);
		});
}

$('#fetch').click( function() {
	get_more_tweets();
})

</script>
</html>
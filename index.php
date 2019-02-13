<!DOCTYPE html>
<html>
<title></title>
<body>
<div class="tweet-list" style="width:66%;height:100%;padding:1rem;">
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
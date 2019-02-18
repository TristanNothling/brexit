<?php

/*ways to improve - */

/* introduce small buttons next to each tweet, positive or negative. on a positive click, scan
entire sentance for new words and apply a score of +1 in the db to all of them (or add 1 to the score
if this word already exists in the word table) and -1 for a negative click. with enough data
you could train the data model to recognise the same words you do. expanding on this, left and right
clicks on words could also indocate very strongly positive or negative words */

/* phrase analysis and puncuation analysis. some phrases are more often used when the 
person using them is being sarcastic or is mocking something - this could play 
into the anlysis, as well as the use of full stops and quotes */


?>

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
	border-radius: 26px;
	color:#1da1f2;
	border: 2px solid #1da1f2;
	transition: all 0.12s ease-in;
	background-color: #FFFFFF00;
	outline:none;
    cursor:pointer;
    font-family: 'Montserrat', sans-serif;
}

#fetch:hover
{
	background-color:#1da1f2;
	color:#FFF;
}

.score
{
    letter-spacing: 8px;
    font-size: 26px;
    font-weight: 800;

}

.bad
{

	color: #f21d56;
}
.good
{

	color: #33d418;

}
.meh
{
	color: #1da1f2;

}

.tweety
{
	width:80%;
	border-bottom: 1px solid #22222222;
	font-size: 16px;
	
}

td
{
	font-family: 'Montserrat', sans-serif;
	padding:1.8rem;
}

</style>
</head>

<body style="margin:0;">

<div style="padding:1rem;">
	<button id="fetch">Fetch More</button>
</div>

<div class="tweet-list" style="width:92%;height:100%;padding:1rem;">
	<table class="tweet-list-tab">
		


</div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
</script>
  
<script>
function get_more_tweets()
{
	var first_request = $.get({
		url: "get-more-tweets.php",
		method: "GET"
		});
	first_request.done(function(msg)
		{        
		console.log(msg);
		list_the_tweets();
		});
}

function list_the_tweets()
{
	var second_request = $.get({
		url: "tweet-list.php",
		method: "GET"
		});
	second_request.done(function(tweets)
		{        
		$('.tweet-list-tab').html(tweets);
		});
}

$('#fetch').click( function() {
	get_more_tweets();
})

list_the_tweets();

</script>
</html>
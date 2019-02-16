<?php

function get_word_score($word,$mysql_connection)
{
	$pn_score = 0;
	$sql = "SELECT * FROM words";
	$result = $mysql_connection->query($sql);
	while ($row = $result->fetch_assoc()) 
	{
		if (row['word'] == $word)
		{
			$pn_score = row['score'];
		}
	}
	return $pn_score; /*positive negative score, signed int. if no word is found return 0*/
	/*later versions might be good to store words that appear a lot in new table*/

}

function tweet_to_tokens($tweet_string)
{	
	$sentence_lowered = strtolower($tweet_string);
	$list_of_tokens = $sentence_lowered.explode(' ');

	/*remote rt tokens*/

	/*remove hash tag from tokens*/

	/*may be sensible to assign a score to each token to indicate it's empahsis .e.g words at end of sentance are perceived to be more emphasised.*/

	return $list_of_tokens; /*stemming out of scope for now*/
}
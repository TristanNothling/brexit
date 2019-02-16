<?php 
include 'scorer.php';
include 'db-connector.php';

/*print_r(get_word_score('bad',$conn));*/

$thing = (tweet_to_tokens("Rees-Mogg now saying on @BBCr4today that Brexit can only be a success with the “right” policy decisions. Problem is, Jacob, that those policies you have in mind screw over workers - and will never be acceptable to the public. That leaves us with a Brexit even you admit is bad."));

		foreach ($thing as $oneWord)
		{
			$pn_score+= get_word_score($oneWord,$conn);
		}

		echo $pn_score;

?>
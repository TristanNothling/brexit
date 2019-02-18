<?php 

function get_smiley($sc)
{
	if ($sc<0)
	{
return "<span class='bad'>:(</span>";
	}
	if ($sc>0)
	{
return "<span class='good'>:)</span>";
	}
	return "<span class='meh'>:|</span>";
}

include 'db-connector.php';

echo '<tr><th>Tweet</th><th>Score</th></tr>';

$sql = "SELECT * FROM tweets ORDER BY created_at DESC";
$result = $conn->query($sql);
$overall_sentiment = 0;

while ($row = $result->fetch_assoc()) 
{
    echo "<tr><td class='tweety'>" . $row['text'] . "</td><td class='score'>". get_smiley($row['score']) . "</td></tr>";
    $overall_sentiment += $row['score'];
}

?>
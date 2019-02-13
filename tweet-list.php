<?php 

include 'db-connector.php';

$sql = "SELECT * FROM tweets ORDER BY created_at DESC";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) 
{
    echo "<p>" . $row['text'] . " " . $row['created_at'] . "</p>";
}

?>
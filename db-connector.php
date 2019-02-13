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
?>
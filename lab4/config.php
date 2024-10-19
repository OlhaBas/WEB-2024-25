<?php
$servername = "localhost";
$username = "root"; 
$password = "12345";    
$dbname = "users_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
    die("Failed to connect: " . $conn->connect_error);
}
?>

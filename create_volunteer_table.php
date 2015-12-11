<?php

$servername = "localhost";
$username = "root";
$password = "opennow";
$states = array("TamilNadu");
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE India";

if ($conn->query($sql) === TRUE) 
{
    echo "Database created successfully";
    mysqli_select_db($conn,'India');
} 
else 
{
	mysqli_select_db($conn,'India');
}

foreach ($states as $state)
{

	$sqlt = "CREATE TABLE ".$state." 
	(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL,
	city VARCHAR(100) NOT NULL,
	area VARCHAR(100)
	)";
} 

if ($conn->query($sqlt) === TRUE) 
{
    echo "\nTable created successfully";
} 
else 
{
    // echo "Error creating table:".$conn->error;
}
?>
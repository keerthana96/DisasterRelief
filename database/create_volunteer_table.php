<?php

$servername = "localhost";
$username = "root";
$password = "opennow";
// $password = "9701c$%";
>>>>>>> Stashed changes
$states = array("TamilNadu");
$cities = array("TamilNadu"=>array("Chennai","Trichy"));
$areas = array("Chennai"=>array("Poongavanapuram","two"),"Trichy"=>array("three","four"));

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error)
{
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

$sqlt = "CREATE TABLE VolInfo
(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL,
	state VARCHAR(100) NOT NULL,
	city VARCHAR(100) NOT NULL,
	area VARCHAR(100),
	contact VARCHAR(20)
)";

if ($conn->query($sqlt) === TRUE)
{
    echo "\nTable created successfully";
}
else
{
    // echo "Error creating table:".$conn->error;
}
mysqli_select_db($conn,'India');
//echo "no error";
?>

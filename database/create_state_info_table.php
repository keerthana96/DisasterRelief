<?php
require("create_volunteer_table.php");
foreach ($states as $state1)
{
	$sqlc = "CREATE TABLE ReqInfo (
	state VARCHAR(100) NOT NULL,
	city VARCHAR(100) NOT NULL,
	area VARCHAR(50) PRIMARY KEY,
	requirement TEXT(700)
	)";
	// var_dump($sqlc);
	// die();
	
}
if ($conn->query($sqlc) === TRUE) {
    echo "Table created successfully";
} else {
    //echo "Error creating table:".$conn->error;
}

?>
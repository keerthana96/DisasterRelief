<?php

$i=0;
require("create_volunteer_table.php");
$state="Tamil Nadu";
$usernames=array("Shru","Keer","Chan");
$passwords=array("one","two","three");
$cities=array("Chennai","Trichy","Chennai");
for($i=0;$i<3;$i++)
{

	$sqlv = "INSERT INTO VolInfo(username,password,city,state)
	VALUES (\"".$usernames[$i]."\", \"".sha1($passwords[$i])."\", \"".$cities[$i]."\",\"".$state."\")";
	if ($conn->query($sqlv) === TRUE) {
	    echo $i + " New record created successfully";
	} else {
	    echo "Error: " . $sqlv . "<br>" . $conn->error;
	}
}


?>
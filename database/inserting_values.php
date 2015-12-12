<?php
require("create_volunteer_table.php");
//$state = $_SESSION['state'];
$state="TamilNadu";
$usernames=array("Shru","Keer","Chan");
$passwords=array("one","two","three");
$cities=array("Chennai","Trichy","Chennai");
for($i=0;$i<3;$i++)
{
	$sql = "INSERT INTO ".$state."(username, password, city)
	VALUES (\"".$usernames[$i]."\", \"".sha1($passwords[$i])."\", \"".$cities[$i]."\")";
		if ($conn->query($sql) === TRUE) {
	    echo $i + " New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


?>
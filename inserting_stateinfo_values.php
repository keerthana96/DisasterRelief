<?php

require("create_state_info_table.php");
foreach($states as $state)
{
	foreach($cities[$state] as $city)
	{
		echo $city;
		foreach($areas[$city] as $area)
		{
			$sqla = "INSERT INTO ".$state."Info(city, area)
			VALUES (\"".$city."\", \"".$area."\")";
			if ($conn->query($sqla) === TRUE) {
		    echo $area." New record created successfully";
			} else 
			{
		    echo "Error: " . $sqla. "<br>" . $conn->error;
			}
		}
	}


}



?>
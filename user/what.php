<html>

<?php
session_start();
require("../database/create_volunteer_table.php");
// $sqlur = "SELECT * FROM ReqInfo WHERE city=\"".$_SESSION['city']."\" ";
$sqlur = "SELECT area, requirement FROM ReqInfo WHERE city=\"Chennai\"";

$resu = mysqli_query($conn, $sqlur);
echo "<div id=\"req\"> </div>";

if (mysqli_num_rows($resu) > 0) {
   
    while($row = mysqli_fetch_assoc($resu)) 
    {
        $arr = explode(" ",$row['requirement']);
        $c = $row['area'];
		 echo "<table>";

		 foreach($arr as $block)
		 {
			if($block!=NULL)
			{	
			$str = explode(":",$block);
			echo "<tr><td>".$c."</td><td>".$str[0]."</td><td>".$str[1]."</td></tr>"; 
		 	}
		 }
		 echo "</table>";



    }
} else {
    echo "No Requirements";
}
?>
</html>
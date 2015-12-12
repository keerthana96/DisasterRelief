

<?php  session_start(); ?>
<?php
echo "
<html>
<p> Hi ".$_SESSION['username']."!</p>
<p>You are from ".$_SESSION['state']."!</p>
<p> You live in ".$_SESSION['city']."!</p>
<p> You live in ".$_SESSION['area']."! </p>";

require("../database/create_volunteer_table.php");
$sqlpr = "SELECT * FROM ReqInfo WHERE city=\"".$_SESSION['city']."\" AND area=\"".$_SESSION['area']."\"";
// var_dump($sqlpr);
// die();
$res2 = $conn->query($sqlpr);
$infor = mysqli_fetch_row($res2);
$req = $infor[3];
 $arr = explode(" ",$req);
 echo "<table>";
 foreach($arr as $block)
 {
	$str = explode(":",$block);
	echo "<tr> <td>".$str[0]."</td><td>".$str[1]."</td></tr>"; 
 }
 echo "</table>";


?>
<form id="login" method="POST" action="update_info.php">
	<table>
		<tr>
			<span>
				<td>
					Item:
				</td>
				<td>
					<input id="item" type="text" name="item" required>
				</td>
			</span>
		</tr>
		<tr>
			<span>
				<td>
					Quantity:
				</td>
				<td>
					<input id="quantity" type="number" name="quantity" required>

				</td>
			</span>
		</tr>		
	</table>
	<input type="submit" name="submit" value="+">
	
</form>
</html>

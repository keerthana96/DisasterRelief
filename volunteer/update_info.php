<?php
// echo "heyo";

session_start();
$state = "TamilNadu";
$city = $_SESSION['city'];
$area = $_SESSION['area'];
require("../database/create_volunteer_table.php");
$sqlca = "SELECT * FROM ReqInfo WHERE city=\"".$city."\" AND area=\"".$area."\"";
$res = $conn->query($sqlca);
$info = mysqli_fetch_row($res);
$requirement = $info[3];
if(!empty($_POST['item']) && !empty($_POST['quantity']))
{
	if($requirement)
$requirement = $requirement." ".$_POST['item'].":".$_POST['quantity'];
else
$requirement = $_POST['item'].":".$_POST['quantity'];
}
$update = "UPDATE ReqInfo SET requirement = \"".$requirement."\" WHERE city = \"".$city."\" AND area = \"".$area."\"";
$done = $conn->query($update);
if($done)
{
echo "success";
header("Location:volunteer_area_part2.php");
}
?>

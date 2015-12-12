<?php
// echo "heyo";

session_start();
$state = "TamilNadu";
$city = $_SESSION['city'];
$area = $_SESSION['area'];
// var_dump($city);
// die();
/*
$servername = "localhost";
$username = "root";
$password = "root";
$states = array("TamilNadu");
$cities = array("TamilNadu"=>array("Chennai","Trichy"));
$areas = array("Chennai"=>array("one","two"),"Trichy"=>array("three","four"));
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// else echo "success";
mysqli_select_db($conn,'India');
// var_dump($conn);
// die();
*/
require("../database/create_volunteer_table.php");
//require("../database/create_state_info_table.php");
$sqlca = "SELECT * FROM ReqInfo WHERE city=\"".$city."\" AND area=\"".$area."\"";
// var_dump($sqlca);
// die();
$res = $conn->query($sqlca);
$info = mysqli_fetch_row($res); 
// var_dump($info);
// die();
$requirement = $info[3];
if(!empty($_POST['item']) && !empty($_POST['quantity'])) 
$requirement = $requirement." ".$_POST['item'].":".$_POST['quantity'];
// var_dump($requirement);
// die();
$update = "UPDATE ReqInfo SET requirement = \"".$requirement."\" WHERE city = \"".$city."\" AND area = \"".$area."\"";
// var_dump($update);
// die();
$done = $conn->query($update);
if($done)
{
echo "success";
header("Location:volunteer_area_part2.php");
}
?>
<?php
session_start();
$cityname = $_GET['cityname'];
$_SESSION['city']=$cityname;

//require("../database/create_volunteer_table.php");
//$sqlpr = "SELECT * FROM ReqInfo WHERE city=\"".$_SESSION['city']."\"";
// var_dump($sqlpr);
// die();
// $res2 = $conn->query($sqlpr);
// $infor = mysqli_fetch_row($res2);
// $req = $infor[3];
?>
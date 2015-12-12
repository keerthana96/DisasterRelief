<?php
session_start();
$area = $_GET['area'];
// $area = "Chennai";
$_SESSION['area']=$area;
require("../database/create_volunteer_table.php");
$sqlarea = "UPDATE VolInfo SET area = \"".$area."\" WHERE username = \"".$_SESSION['username']."\"";
$conn->query($sqlarea);
// var_dump($sqlarea);
// die();
//update area column table
?>
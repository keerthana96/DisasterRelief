<?php
session_start();
$area = $_GET['area'];
$_SESSION['area']=$area;
//update area column table
?>
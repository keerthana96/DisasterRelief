<?php
$state = $_GET['state'];
session_start();
$_SESSION['state']=$state;
?>
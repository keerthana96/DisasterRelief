<?php
session_start();
session_unset();
session_destroy();
header("Location: volunteer/volunteer_login.php");
?>
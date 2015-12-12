<?php
session_start();
session_unset();
session_destroy();
header("Location: volunteer_login.html");
?>